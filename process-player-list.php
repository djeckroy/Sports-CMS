<?php

require("./includes/initialize.php");

$playerName = "%{$_POST['player-name']}%";
$playerAge = "%{$_POST['player-age']}%";
$recentMatch = "%{$_POST['recent-match']}%";
$clubName = "%{$_POST['club-name']}%";
$countryName = "%{$_POST['country-name']}%";
$stateName = "%{$_POST['state-name']}%";
//$recentCompetitor = $_POST["recent-competitor"];

if(isset($_POST["submit-search-filter"]))
{
	$searchFilter = $contentManager->playerSearchFilter($playerName, $playerAge, $recentMatch, $clubName, $countryName, $stateName);

	$player = array();	

	while($row = $searchFilter->fetch(PDO::FETCH_ASSOC))
	{   
		array_push($player, [$row["player_id"], 
							 $row["player_name"], 
							 $row["player_age"], 
							 $row["recent_match"], 
							 $row["club_name"], 
							 $row["country_name"], 
							 $row["state_name"]]); 	
	}

	$_SESSION["player"] = $player;
}

redirect("players.php");

?>