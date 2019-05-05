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
