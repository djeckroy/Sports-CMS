
window.onload = retrieveRecentEventsForClub(1, "");
window.onload = retrieveClubPlayers(1, "");
window.onload = retrieveTournamentDirectors(1, "");


/* RECENT CLUB EVENTS */


function retrieveRecentEventsForClub(page, searchTerm)
{
	var eventID = 0;

	$.ajax
	({
		url: "./account-pagination.php",
        type: "POST",
        data: {page: page, eventID: eventID, searchTerm: searchTerm},
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

    if(page > 0)
    {
        retrieveRecentEventsForClub(page, searchValue);
    }
});

$(document).on('click', '#account-search-event-button', function()
{
    var searchValue = $("#event-searchbar").val();
    retrieveRecentEventsForClub(1, searchValue);
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
    
}


/* CLUB PLAYERS */


function retrieveClubPlayers(page, searchTerm)
{
    var playersID = 0;

    $.ajax
    ({
        url: "./account-pagination.php",
        type: "POST",
        data: {page: page, playersID: playersID, searchTerm: searchTerm},
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

    if(page > 0)
    {
        retrieveClubPlayers(page, searchValue);
    }
});

$(document).on('click', '#account-search-players-button', function()
{
    var searchValue = $("#club-players-searchbar").val();
    retrieveClubPlayers(1, searchValue);
});

$("#club-players-searchbar").keyup(function(event) 
{
    if (event.keyCode === 13) 
    {
        $("#account-search-players-button").click();
    }
});


/* TOURNAMENT DIRECTORS */


function retrieveTournamentDirectors(page, searchTerm)
{
    var directorID = 0;

    $.ajax
    ({
        url: "./account-pagination.php",
        type: "POST",
        data: {page: page, directorID: directorID, searchTerm: searchTerm},
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

    {
        retrieveTournamentDirectors(page, searchValue);
    }
});

$(document).on('click', '#account-search-directors-button', function()
{
    var searchValue = $("#directors-searchbar").val();
    retrieveTournamentDirectors(1, searchValue);
});

$("#directors-searchbar").keyup(function(event) 
{
    if (event.keyCode === 13) 
    {
        $("#account-search-directors-button").click();
    }
});