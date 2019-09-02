<?php
  $title = "Peterman Ratings | Team Profile";
  
  include("./includes/header.php");
  include("./includes/navigation.php"); 

  $teamID = $_GET['team-id'];

  $teamPlayers = $contentManager->getTeamPlayers($teamID); 

  $playerNames = $contentManager->getTeamPlayerNames($teamPlayers['player_one_id'], $teamPlayers['player_two_id']);

  $teamSport = $contentManager->getTeamSports($teamID);

  $teamRating = $contentManager->getTeamRating($teamID, $teamSport['sport_id']);

?>

<article id="team-profile-page-article">

  <div class="player-details-border">
	<div class="team-player-names-border">

		<a id="player-name-link" href="profile.php?profile-id=<?php echo $teamPlayers['player_one_id']; ?>">
			<?php 
				echo "<h1>".$playerNames['player_one'].",&nbsp</h1>";
			?>
		</a>
    
		<a id="player-name-link" href="profile.php?profile-id=<?php echo $teamPlayers['player_two_id']; ?>">
			<?php 
				echo "<h1>".$playerNames['player_two']."</h1>";
			?>
		</a>

	</div>

  <div class="team-rating-border">
    <div class="team-mean-border">       
      <p class="mean-value">
        <?php
          echo (int)$teamRating['mean'];
        ?>
      </p>
      <p>Mean</p>   
    </div>

    <div class="team-sd-border">       
      <?php
        if($teamRating['standard_deviation'] >= 0 && $teamRating['standard_deviation'] <= 50)
        {
      ?>    
        <p class="sd-value-green">
          &plusmn
            <?php
              echo (int)$teamRating['standard_deviation'];
            ?>  
        </p>    
      <?php
        }

        if($teamRating['standard_deviation'] > 50 && $teamRating['standard_deviation'] < 100)
        {
      ?> 
        <p class="sd-value-orange">
          &plusmn
            <?php
              echo (int)$teamRating['standard_deviation'];
            ?>  
        </p>
      <?php
        }

        if($teamRating['standard_deviation'] > 100)
        {
      ?>
        <p class="sd-value-red">
          &plusmn
          <?php
            echo (int)$teamRating['standard_deviation'];
          ?>  
        </p>     
      <?php
        }
      ?>
      <p class="sd-name">Standard Deviation</p>
    </div>
  </div>
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