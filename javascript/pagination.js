window.onload = retrieveSearchedPlayers(1, "", "", "", "", "", "", "", "");

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