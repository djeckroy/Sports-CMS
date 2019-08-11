
window.onload = retrieveRecentEventsForClub(1, "", "");
window.onload = retrieveClubPlayers(1, "", "");
window.onload = retrieveTournamentDirectors(1, "", "");
window.onload = retrieveAdministrators(1, "");


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
});


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

