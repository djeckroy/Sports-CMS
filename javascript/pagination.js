window.onload = retrieveRecentEventsForClub(1, "", "");
window.onload = retrieveClubPlayers(1, "", "");
window.onload = retrieveTournamentDirectors(1, "", "");
window.onload = retrieveAdministrators(1, "");
window.onload = retrieveInactiveAccounts(1, "");
window.onload = retrieveSearchedPlayers(1, "", "", "", "", "", "", "", "");
window.onload = uploadEventChangeStates($("#create-club-select-country"),$("#create-club-select-state"));


/* INACTIVE ACCOUNTS */


function retrieveInactiveAccounts(page, searchTerm)
{
    var inactiveID = 0;

    $.ajax
    ({
        url: "./account-pagination.php",
        type: "POST",
        data: {page: page, inactiveID: inactiveID, searchTerm: searchTerm},
        success: function(data) 
        {
            $("#account-requests-information").html(data);
        }
    });
}


$(document).on('click', '.admin-requests-link', function()
{
    var page = $(this).attr("id");
    var searchValue = $("#requests-searchbar").val();

    if(page > 0)
    {
        retrieveInactiveAccounts(page, searchValue);
    }
});

$(document).on('click', '#account-search-requests-button', function()
{
    var searchValue = $("#requests-searchbar").val();
    retrieveInactiveAccounts(1, searchValue);
});

$("#requests-searchbar").keyup(function(event) 
{
    if (event.keyCode === 13) 
    {
        $("#account-search-requests-button").click();
    }
});

$(document).on('click', '.account-table-deny-request-button', function(event)
{
    var accountID = $(this).closest('tr').find('.account-table-id').text();
    denyRequest(accountID);

});

$(document).on('click', '.account-table-approve-request-button', function(event)
{
    var accountID = $(this).closest('tr').find('.account-table-id').text();
    approveRequest(accountID);
    retrieveInactiveAccounts(1, "");
});

function approveRequest(accountID)
{
    $.ajax
    ({
        url: "./ajax.php",
        type: "POST",
        data: {ajaxMethod: "activate-account", accountID: accountID},
        success: function(data) 
        {
            retrieveInactiveAccounts(1, "");
            showNotificationModal("Account Activation", "The account has been activated successfully.");
        }
    });
}

function denyRequest(accountID)
{
    $.ajax
    ({
        url: "./ajax.php",
        type: "POST",
        data: {ajaxMethod: "remove-account", accountID: accountID},
        success: function(data) 
        {
            retrieveInactiveAccounts(1, "");
            showNotificationModal("Account Removal", "The account has been removed successfully.");
        }
    });
}


/* RECENT CLUB EVENTS */


function retrieveRecentEventsForClub(page, searchTerm, clubID)
{
	var eventID = 0;

	$.ajax
	({
		url: "./account-pagination.php",
        type: "POST",
        data: {page: page, eventID: eventID, searchTerm: searchTerm, clubID: clubID},
        success: function(data) 
        {
            $("#account-event-information").html(data);
        }
    });
}

$(document).on('click', '.recent-events-link', function()
{
    var page = $(this).attr("id");
    var searchValue = $("#event-searchbar").val();
    var clubID = "";

    if($("#admin-change-club-events").length > 0)
    {
        var clubID = $("#admin-change-club-events").find(":selected").val();
    }

    if(page > 0)
    {
        retrieveRecentEventsForClub(page, searchValue, clubID);
    }
});

$(document).on('click', '#account-search-event-button', function()
{
    var searchValue = $("#event-searchbar").val();
    var clubID = "";

    if($("#admin-change-club-events").length > 0)
    {
        var clubID = $("#admin-change-club-events").find(":selected").val();
    }

    retrieveRecentEventsForClub(1, searchValue, clubID);
});

$("#event-searchbar").keyup(function(event) 
{
    if (event.keyCode === 13) 
    {
        $("#account-search-event-button").click();
    }
});

$(document).on('click', '.account-table-events-button', function(event)
{
    var eventID = $(this).closest('tr').find('.account-table-id').text();
    sendEditEventID(eventID);

});

function sendEditEventID(eventID)
{
    var form;
    var inputElement;

    form = document.createElement('form');
    form.action = './upload-event.php';
    form.method = 'post';
    form.name = 'editEventForm';

    inputElement = document.createElement('input');
    inputElement.type = 'hidden';
    inputElement.name = 'editEventID';
    inputElement.value = 2;

    form.appendChild(inputElement);
    document.getElementById('account-edit-event-submission').appendChild(form);
    form.submit();
}

$(document).on('change', '#admin-change-club-events', function()
{
    var searchValue = $("#club-search-event-searchbar").val();
    var clubID = $("#admin-change-club-events").find(":selected").val();
    retrieveRecentEventsForClub(1, searchValue, clubID);
});


/* CLUB PLAYERS */


function retrieveClubPlayers(page, searchTerm, clubID)
{
    var playersID = 0;

    $.ajax
    ({
        url: "./account-pagination.php",
        type: "POST",
        data: {page: page, playersID: playersID, searchTerm: searchTerm, clubID: clubID},
        success: function(data) 
        {
            $("#account-players-information").html(data);
        }
    });
}

$(document).on('click', '.club-players-link', function()
{
    var page = $(this).attr("id");
    var searchValue = $("#club-players-searchbar").val();
    var clubID = "";

    if($("#admin-change-club-members").length > 0)
    {
        var clubID = $("#admin-change-club-members").find(":selected").val();
    }

    if(page > 0)
    {
        retrieveClubPlayers(page, searchValue, clubID);
    }
});

$(document).on('click', '#account-search-players-button', function()
{
    var searchValue = $("#club-players-searchbar").val();
    var clubID = "";

    if($("#admin-change-club-members").length > 0)
    {
        var clubID = $("#admin-change-club-members").find(":selected").val();
    }

    retrieveClubPlayers(1, searchValue, clubID);
});

$("#club-players-searchbar").keyup(function(event) 
{
    if (event.keyCode === 13) 
    {
        $("#account-search-players-button").click();
    }
});

$(document).on('change', '#admin-change-club-members', function()
{
    var searchValue = $("#club-players-searchbar").val();
    var clubID = "";

    if($("#admin-change-club-members").length > 0)
    {
        var clubID = $("#admin-change-club-members").find(":selected").val();
    }

    retrieveClubPlayers(1, searchValue, clubID);
});

$(document).on('click', '.account-edit-players-button', function()
{
    var playerID = $(this).closest('tr').find('.account-table-id').text();
    showEditPlayersModal(playerID);
});

$(document).on('click', '#edit-player-button', function()
{
    var playerID = $("#hidden-edit-player-id").val();
    var givenName = $("#edit-given-name").val();
    var familyName = $("#edit-family-name").val();
    var gender = $("#player-gender").find(":selected").val();
    var dob = $("#event-date").val();
    var email = $("#edit-player-email").val();
    var country = $("#edit-player-country").find(":selected").val();
    var state = $("#edit-player-state").find(":selected").val();

    editPlayer(playerID, givenName, familyName, gender, dob, email, country, state);
});

function editPlayer(playerID, givenName, familyName, gender, dob, email, country, state)
{
    $.ajax
    ({
        url: "./ajax.php",
        type: "POST",
        data: {ajaxMethod: "editPlayer", playerID: playerID, givenName: givenName, familyName: familyName, gender: gender, dob: dob, email: email, country: country, state: state},
        success: function(data) 
        {
            hideEditPlayersModal();
            $("#account-search-players-button").click();
        }
    });
}


/* TOURNAMENT DIRECTORS */


function retrieveTournamentDirectors(page, searchTerm, clubID)
{
    var directorID = 0;

    $.ajax
    ({
        url: "./account-pagination.php",
        type: "POST",
        data: {page: page, directorID: directorID, searchTerm: searchTerm, clubID: clubID},
        success: function(data) 
        {
            $("#account-directors-information").html(data);
        }
    });
}

$(document).on('click', '.tournament-directors-link', function()
{
    var page = $(this).attr("id");
    var searchValue = $("#directors-searchbar").val();
    var clubID = "";

    if($("#admin-change-club").length > 0)
    {
        clubID = $("#admin-change-club").find(":selected").val();
    }

    if(page > 0)
    {
        retrieveTournamentDirectors(page, searchValue, clubID);
    }
});

$(document).on('click', '#account-search-directors-button', function()
{
    var searchValue = $("#directors-searchbar").val();
    var clubID = "";

    if($("#admin-change-club").length > 0)
    {
        clubID = $("#admin-change-club").find(":selected").val();
    }

    retrieveTournamentDirectors(1, searchValue, clubID);
});

$("#directors-searchbar").keyup(function(event) 
{
    if (event.keyCode === 13) 
    {
        $("#account-search-directors-button").click();
    }
});

$(document).on('click', '.account-table-directors-button', function(event)
{
    var accountID = $(this).closest('tr').find('.account-table-id').text();
    removeDirectorFromClub(accountID);
});

function removeDirectorFromClub(accountID)
{
   $.ajax
    ({
        url: "./remove-director.php",
        type: "POST",
        data: {accountID: accountID},
        success: function(data) 
        {
            $("#account-search-directors-button").click();
        }
    });
}

$(document).on('change', '#admin-change-club', function()
{
    var searchValue = $("#directors-searchbar").val();
    var clubID = $("#admin-change-club").find(":selected").val();
    retrieveTournamentDirectors(1, searchValue, clubID);
    retrieveClubInformation(clubID);
});

function retrieveClubInformation(clubID)
{
    $.ajax
    ({
        url: "./ajax.php",
        type: "POST",
        data: {ajaxMethod: "retrieveClubInformation", clubID: clubID},
        success: function(data) 
        {
            $("#account-club-details").empty().html(data);
        }
    });
}


/* ADMINISTRATORS */


function retrieveAdministrators(page, searchTerm)
{
    var administrationID = 0;

    $.ajax
    ({
        url: "./account-pagination.php",
        type: "POST",
        data: {page: page, administrationID: administrationID, searchTerm: searchTerm},
        success: function(data) 
        {
            $("#account-administrator-information").html(data);
        }
    });
}

$(document).on('click', '.administrators-link', function()
{
    var page = $(this).attr("id");
    var searchValue = $("#directors-searchbar").val();

    if(page > 0)
    {
        retrieveAdministrators(page, searchValue);
    }
});

$(document).on('click', '#account-search-administrators-button', function()
{
    var searchValue = $("#administrators-searchbar").val();
    retrieveAdministrators(1, searchValue);
});

$("#administrators-searchbar").keyup(function(event) 
{
    if (event.keyCode === 13) 
    {
        $("#account-search-administrators-button").click();
    }
});

$(document).on('click', '.account-table-administrators-button', function(event)
{
    var accountID = $(this).closest('tr').find('.account-table-id').text();
    demoteAdministrator(accountID);
});

function demoteAdministrator(accountID)
{
   $.ajax
    ({
        url: "./demote-administrator.php",
        type: "POST",
        data: {accountID: accountID},
        success: function(data) 
        {
            $("#account-search-administrators-button").click();
        }
    });
}

$(document).on('click', '#account-add-administrator-button', function(event)
{
    showAdministratorModal();
});


/* SEARCH PLAYERS */


function retrieveSearchedPlayers(page, playerName, playerAgeMin, playerAgeMax, lastPlayed, clubName, countryName, stateName, submitSearchFilter)
{
    $.ajax
    ({
        url: "./process-player-list.php",
        type: "POST",
        data: {page: page, playerName: playerName, playerAgeMin: playerAgeMin, playerAgeMax: playerAgeMax, lastPlayed: lastPlayed, clubName: clubName, countryName: countryName, stateName: stateName, submitSearchFilter: submitSearchFilter},
        success: function(data) 
        {
            $(".player-search-result-container").html(data);
        }
    });
}

$(document).on('click', '.player-search-link', function()
{
    var page = $(this).attr("id");
    var playerName = $("#player-name-filter").val();
    var lastPlayed = $("#player-recent-match-filter").val();
    var countryName = $("#player-country-filter").val();
    var clubName = $("#player-club-filter").val();
    var stateName = $("#player-state-filter").val();
    var playerAgeMin = $("#player-age-min-filter").val();
    var playerAgeMax = $("#player-age-max-filter").val();
    var submitSearchFilter = $("#submit-search-filter").val();

    if(page > 0)
    {
        retrieveSearchedPlayers(page, playerName, playerAgeMin, playerAgeMax, lastPlayed, clubName, countryName, stateName, submitSearchFilter);
    }
});

$(document).on('click', '#submit-search-filter', function()
{
    var playerName = $("#player-name-filter").val();
    var lastPlayed = $("#player-recent-match-filter").val();
    var countryName = $("#player-country-filter").val();
    var clubName = $("#player-club-filter").val();
    var stateName = $("#player-state-filter").val();
    var playerAgeMin = $("#player-age-min-filter").val();
    var playerAgeMax = $("#player-age-max-filter").val();
    var submitSearchFilter = $("#submit-search-filter").val();

    retrieveSearchedPlayers(1, playerName, playerAgeMin, playerAgeMax, lastPlayed, clubName, countryName, stateName, submitSearchFilter);
});

$(".player-search-filter-container").keyup(function(event) 
{
    if (event.keyCode === 13) 
    {
        $("#submit-search-filter").click();
    }
});


/* Create Club Modal */


$("#create-club-select-country").on('change', function(){
    uploadEventChangeStates($("#create-club-select-country"),$("#create-club-select-state"));
});




