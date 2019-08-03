<?php

require("./includes/initialize.php");

$playerName = "%{$_POST['player-name']}%";
$playerAgeMin = $_POST['player-age-min'];
$playerAgeMax = $_POST['player-age-max'];
$lastPlayed = "%{$_POST['last-played']}%";
$clubName = "%{$_POST['club-name']}%";
$countryName = "%{$_POST['country-name']}%";
$stateName = "%{$_POST['state-name']}%";
$recentCompetitor = "%{$_POST["recent-competitor"]}%";

if(isset($_POST["submit-search-filter"]))
{
	$searchFilter = $contentManager->playerSearchFilter($playerName, $playerAgeMin, $playerAgeMax, $lastPlayed, $clubName, $countryName, $stateName);

	$getRecentCompetitor = $contentManager->getRecentCompetitor($recentCompetitor, $playerName, $playerAgeMin, $playerAgeMax, $lastPlayed, $clubName, $countryName, $stateName);

	$player = array();
	$competitor = array();	

	while($row = $searchFilter->fetch(PDO::FETCH_ASSOC))
	{   
		array_push($player, [$row["player_id"], 
							 $row["player_name"], 
							 $row["player_age"], 
							 $row["last_played"], 
							 $row["club_name"], 
							 $row["country_name"], 
							 $row["state_name"]]); 	
	}

	while($row = $getRecentCompetitor->fetch(PDO::FETCH_ASSOC))
	{   
		array_push($competitor, $row["competitor_player_name"]); 	
	}

	$_SESSION["player"] = $player;
	$_SESSION["competitor"] = $competitor;
}

redirect("players.php");

?>