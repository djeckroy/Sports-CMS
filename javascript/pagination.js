
window.onload = retrieveRecentEventsForClub(1, "");
window.onload = retrieveClubPlayers(1, "");


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