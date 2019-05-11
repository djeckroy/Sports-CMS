<?php

class ContentManager
{
	private $database;

	public function __construct($database)
	{
		$this->database = $database;
	}


	public function getAllPlayers()
	{
		$query = "SELECT * FROM player";
		$result = $this->database->query($query, null);

		return $result;
	}
	
	public function getAllCountries()
	{
		$query = "SELECT * FROM country;";
		$result = $this->database->query($query,null);
		
		return $result;
	}
	
	public function getStatesByCountry($countryID)
	{
		$query = "SELECT state_id, name FROM state WHERE country_id = ?;";
		$result = $this->database->query($query,[$countryID]);
		
		return $result;
		
	}
	
	public function newGame($winnerID, $winnerMean, $winnerSD, $loserID, $loserMean, $loserSD, $eventID)
	{
		//create game
		$query = "INSERT INTO `game` (`game_id`, `mean_before_winning`, `mean_after_winning`, `standard_deviation_before_winning`, `standard_deviation_after_winning`, `mean_before_losing`, `mean_after_losing`, `standard_deviation_before_losing`, `standard_deviation_after_losing`, `event_id`) VALUES (NULL, '?', NULL, '?', NULL, '?', NULL, '?', NULL, '?');";
		
		$result = $this->database->query($query,[$winnerMean,$winnerSD,$loserMean,$loserSD,$eventID]);
		
		//need a way to get the game id back from db
		$gameID= 456
		
		//create game result for both winner and loser
			//not implemented yet
		
		return $gameID;

	}
	
	public function getPlayerCurrentStats($playerID)
	{
		$query = 	"SELECT player.last_played, rating.mean, rating.standard_deviation 
					FROM player, rating
					WHERE 
						rating.player_id = ?
						AND
						rating.player_id = player.player_id";
		$result = $this->database->query($query,[$playerID])->fetch();
		
		return $result;
	}
	
	/**
	 * problem with this function.
	 * We actually want to selct by state not by country. Needs DB update.
	 * ?fix phase 2.
	 */
	public function getPlayersByNameAndCountry($nameFilter, $countryID)
	{
		//$nameFilter = '%'.$nameFilter.'%';
		//problem with this SQL statement. I (JW) can't get to execute with wild cards (%) in place. 
		$query = "SELECT `player_id`,`given_name`,`family_name` FROM `player` WHERE `country_id` = ?";// AND 'given_name' LIKE ?;";
		$result = $this->database->query($query,[$countryID]); //need to add here too.

		
		return $result;
	}
	
	//returns the type of sport being played in an event
	public function getEventSport($eventID)
	{
		$query = "SELECT sport_id FROM event WHERE event_id = ?";
		$result = $this->database->query($query,[$eventID])->fetch();
		
		return $result["sport_id"];
	}
	
	/**
	 * After running maple script this function updates the ratings for 
	 * winners and losers of each match in a tournament.
	 * 
	 */
	public function updateAfterMatchStatisticComputed($tournamentDate, $sportID, $matchID, $winnerID, $winnerNewMean, $winnerNewSD, $loserID, $loserNewMean, $loserNewSD)
	{
		//update entry in game
		$query = "UPDATE game
					SET 
						game.mean_after_winning = ?,
						game.standard_deviation_after_winning = ?,
						game.mean_after_losing = ?,
						game.standard_deviation_after_losing = ?
					WHERE 
						game.game_id = ? AND;";
		
		$result = $this->database->query($query,[$winnerNewMean,$winnerNewSD, $loserNewMean, $loserNewSD, $matchID]);
		
		//update players ratings.
		
		$query = "UPDATE player, rating
					SET
						player.last_played = STR_TO_DATE(?,'%d/%m/%Y'),
						rating.mean = ?,
						rating.standard_deviation = ?,
						rating.last_calculated = NOW()
					WHERE
						player.player_id = ? AND
						player.rating_id = rating.rating_id AND
						rating.sport_id = ?;";

		$result = $this->database->query($query,[$tournamentDate,$winnerNewMean,$winnerNewSD,$winnerID,$sportID]);
		
		$result = $this->database->query($query,[$tournamentDate,$loserNewMean,$loserNewSD,$loserID,$sportID]);
	}
}
	
?>
