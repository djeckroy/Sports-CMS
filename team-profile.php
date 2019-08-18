<?php
  $title = "Peterman Ratings | Team Profile";
  
  include("./includes/header.php");
  include("./includes/navigation.php"); 

  $teamID = $_GET['team-profile-id'];

  $teamPlayers = $contentManager->getTeamPlayers($teamID); 

  $playerNames = $contentManager->getTeamPlayerNames($teamPlayers['player_one_id'], $teamPlayers['player_two_id']);

  $teamSport = $contentManager->getTeamSports($teamID);

  $teamRating = $contentManager->getTeamRating($teamID, $teamSport['sport_id']);

?>

<article id="team-profile-page-article">

	<h1 id="team-name"><?php echo "<h1>Team".$teamID."</h1>"; ?></h1>

	<div class="team-player-names-border">

		<a id="player-name-link" href="profile.php?profile-id=<?php echo $teamPlayers['player_one_id']; ?>">
			<?php 
				echo "<div>".$playerNames['player_one']."</div>";
			?>
		</a>

		<a id="player-name-link" href="profile.php?profile-id=<?php echo $teamPlayers['player_two_id']; ?>">
			<?php 
				echo "<div>".$playerNames['player_two']."</div>";
			?>
		</a>

	</div>

	<div id="team-rating-border">
		<?php echo $teamRating['mean']."&plusmn".$teamRating['standard_deviation']; ?>
	</div>

	<div class="team-history-border">

    <h1>Team History</h1>

    <h2 id="team-profile-sport-name">
    	<input id="team-profile-sport-id" type="hidden" value="<?php echo $teamSport['sport_id']; ?>">
    	<?php echo $teamSport['name']; ?>
    </h2>

    <table class="team-history-table">
		  <tr class="odd-row">
  			<th>Event</th>
  			<th>Initial Rating</th>
  			<th>Point Change</th>
  			<th>Final Rating</th>
		  </tr>
		  
		  <tbody id="team-history-table-body">
		  </tbody>
    </table>

    <p id="team-history-view-more">
      View More
    </p>

  </div>

</article>

<?php
  include("./includes/footer.php");  
?>