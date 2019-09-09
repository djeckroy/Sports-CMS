<?php
  $title = "Peterman Ratings | Profile";
  
  include("./includes/header.php");
  include("./includes/navigation.php");

  //Testing purposes, this will get dynamically sent eventually.
  //$_GET["profile-id"] = 1;
	
	
  $continue = true;
  
  if(isset($_GET["profile-id"])) 
  {
	  $playerId = $_GET["profile-id"];
	  if ($contentManager->playerExists($playerId))
	  {
		  $playerInfo = $contentManager->getSpecificPlayerInformation($playerId);
		  $playerClub = $contentManager->getPlayerClub($playerId);
		  $playerRating = $contentManager->getPlayerRating($playerId, 1);

		  $userDob = new DateTime($playerInfo["date_of_birth"]);
		  $today = new Datetime(date("Y-m-d"));
		  $age = $today->diff($userDob)->y;
	  }
	  else
	  {
		$continue = false;  
	  }
  }
  else
  {
	  $continue = false;
  }
  
  if (!$continue)
  {
	  //profile-id not set or not correct format
	  ?>
	  <a href="./index.php">Unexpected Error. Click Here To Return Home</a>
	  <?php
	  include("./includes/footer.php");
	  die();
  }
  
?>

<article>

  <div class="favourite-icon-border" id="favourite-button">
      <a class="favourite-icon-link" href="#">
        <img class="favourite-icon" alt="favourite-icon" src="resources/images/favourite-icon-24.png" onclick="changeImageWhenClicked();">favourite
      </a>
  </div>

  <div class="player-details-border">

    <h1>
		<?php 
			echo $playerInfo["given_name"] . " " . $playerInfo["family_name"];
		?> 
    </h1>
    
    <h2 class="profile-sport-name" id="profile-sport">
		
    </h2>

    <ul class="player-bio-list">
		
		
		
		<li id="player-bio-row">
      	<span id="player-bio-row-heading"><b>Select Sport</b></span>
      	<span id="player-bio-row-value">
      		<select class="select-sport-menu" id="profile-select-sport">
      			<?php
            $sports = $contentManager->getPlayerSports($playerId);

            while ($sport = $sports->fetch())
            {
                echo "<option value=\"".$sport["sport_id"]."\">".$sport["name"]."</option>";
            }
        ?>
      		</select>
      	</span>
      </li>
      <li id="player-bio-row">
      	<span id="player-bio-row-heading"><b>First Name</b></span>
      	<span id="player-bio-row-value"> <?php echo $playerInfo["given_name"]; ?> </span>
      </li>
      <li id="player-bio-row">
      	<span id="player-bio-row-heading"><b>Last Name</b></span>
      	<span id="player-bio-row-value"> <?php echo $playerInfo["family_name"]; ?> </span>
      </li>
      <li id="player-bio-row">
      	<span id="player-bio-row-heading"><b>Gender</b></span>
      	<span id="player-bio-row-value"> <?php echo $playerInfo["gender"]; ?> </span>
      </li>
      <li id="player-bio-row">
      	<span id="player-bio-row-heading"><b>Age</b></span>
      	<span id="player-bio-row-value"> <?php echo $age; ?> </span>
      </li>
      <li id="player-bio-row">
      	<span id="player-bio-row-heading"><b>Country</b></span>
      	<span id="player-bio-row-value"> <?php echo $playerInfo["country_name"]; ?> </span>
      </li>
      <li id="player-bio-row">
      	<span id="player-bio-row-heading"><b>State</b></span>
      	<span id="player-bio-row-value"> <?php echo $playerInfo["state_name"]; ?> </span>
      </li>
      <li id="player-bio-row">
      	<span id="player-bio-row-heading"><b>Club</b></span>
      	<span id="player-bio-row-value"> <?php echo $playerClub["name"]; ?> </span>
      </li>
      
    </ul>

    <div class="rating-border">
 	  <div class="mean-border">
	    <div id="side-colour-mean">&nbsp</div>	    	
		  <p id="mean-value">
		  <?php
			echo (int)$playerRating['mean'];
		  ?>
		  </p>
		  <p>Badminton Rating</p>   	
      </div>
	     
	  <div class="sd-border"> 
	    <div id="side-colour-sd">&nbsp</div>
		  <p id="sd-value">
			  &plusmn;
		  <?php
			echo (int)$playerRating['standard_deviation'];
		  ?>
		  
		  </p>
		  <p>Standard Deviation</p>   	
	  </div>
	</div>

  </div> 

  <div class="player-history-border">

    <h1>Player History</h1>

    <h2 class="profile-sport-name"></h2>

    <table class="player-history-table" border="0">
		  <tr class="odd-row">
			<th>Event</th>
			<th>Initial Rating</th>
			<th>Point Change</th>
			<th>Final Rating</th>
		  </tr>
		  
		  <tbody id="player-history-table-body">
		  </tbody>
    </table>

    <p id="player-history-view-more">
      View More
    </p>

  </div>

</article>


<?php
  include("./includes/footer.php");
?>


