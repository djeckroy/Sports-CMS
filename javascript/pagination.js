
window.onload = retrieveRecentEventsForClub(1);

function retrieveRecentEventsForClub(page)
{
	var eventID = 0;

	$.ajax
	({
		url: "./account-pagination.php",
        type: "POST",
        data: {page: page, eventID: eventID},
        success: function(data) 
        {
            $("#account-event-information").html(data);
        }
    });
}

$(document).on('click', '.recent-events-link', function()
{
    var page = $(this).attr("id");
    retrieveRecentEventsForClub(page);
});