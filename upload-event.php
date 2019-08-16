<?php
  $title = "Peterman Ratings | Upload Event";
  
  include("./includes/header.php");
  include("./includes/navigation.php");

  if(!$account->isLoggedIn())
  {
  	redirect("./index.php");
  }
?>

<head>
    <link rel="stylesheet" href="jquery.range.css">
    <script src="jquery.range.js"></script>
</head>
<div>
<article class="event-details-border">

    <form class="event-upload-form" id="event-upload-form"  autocomplete="off" action=".\process-event.php" method="post">
        <h1 class="event-details-header">Event Upload-Details</h1>

        <div class="event-form" action="">
            <div class="event-details-row">
                <input class="event-field-input" type="text" id="event-name" name="event-name" placeholder="Event Name"
                    pattern="[a-zA-Z0-9\s]{1,90}" required
                    title="Event name must be within 1-90 characters and can contain letters and numbers"><br /><br />
                <input class="event-field-date" name="event-date" id="event-date" placeholder="Event Start Date"
                    required type="text" onfocus="(this.type='date')" onblur="(this.type='text')"><br />
                <select class="sport-type" name="sport-type" id="sport-type" required>
                    <option value="">Event Sport Type</option>
                    <?php
            $sports = $contentManager->getAllSports();

            while ($sport = $sports->fetch())
            {
                echo "<option value=\"".$sport["sport_id"]."\">".$sport["name"]."</option>";
            }
        ?>
                </select><br /><br />
                <select class="Host-country" name="country-id" id="country-id">

                    <?php
			$countries = $contentManager->getAllCountries();
			while ($country = $countries->fetch())
			{
				echo "<option value=\"".$country["country_id"]."\">".$country["name"]."</option>";
			}
		  ?>
                </select>
                <br /><br />
                <!-- <input class="event-field-input" type="text" name="state-name" placeholder="State"><br/><br/> -->
                <select class="Host-state" name="state-name" id="state-name">
                </select>
                <br /><br />
            </div>

            <select class="event-type" id = "type" name="event-type" required>
                <option value="">Match type</option>
                <option value="Single">Singles</option>
                <option value="Double">Doubles</option>
            </select><br /><br />
            <input class="match-input" id="match-field-input" type="number" id="match-number" name="match-number"
                placeholder="Number of Matches" pattern="[0-9]{1,3}" title="Number must be within 1-300">
            <button class="match-number-input" id="match-submit" name="match-number-submission" value="Add Matches"
                onclick="showUploadMatchRows(); return false;">Add Matches</button>
            <p class="fill-help"> Need Help on how to fill the Event upload form? Click <a href="#">Here</a></p>
           <div> <table class="match-input-table" id="match-input-table"></table></div>
        </div>


        <div class="ui-widget" id = "submit_event">
            <p class="more-matches"> Need more matches? Cick <a name="add-button" id="add-button"
                    onclick="addMoreRows(); return false;" href="#">Here</a></p>
            <input class="match-submit" id="match-final-submit" type="submit" name="event-page-submission"
                value="Submit Event"><br />

        </div>





    </form>
</article>

<!-- advanced search -->

<div class="player-advanced-search-border">
    <div class="advanced-search-content">
      <div class="player-advanced-search-wrapper">
          <h2>Advanced player search</h2>
          <div class="advanced-player-exit-button" onclick="hideAdvancedSearchModal()">+</div>
  	   </div>
  <div class="input-advanced-player-name-wrapper">
       <input type="text" id="input-player-name" name="given-name" placeholder="Player Name" pattern="[a-zA-Z\s]{1,45}" required="" title="Player name must be within 1-45 characters"><br>
     </div>
  </div>
</div>

<!-- add player -->

<div class="add-player-border">
      <div class="player-content">
      <div class="player container">
      <div class="advanced-player-search-wrapper">
          
          <div class="add-player-exit-button" onclick="hideAddPlayerModal()">+</div>
  	   </div>
  
     <div class="add-player-wrapper">
        <div class="add-player-header">
          <h2>Add Player</h2>
        </div>

        <hr>
        <!-- form for uploading excel file -->
        <form method="post" action="" enctype="multipart/form-data">
          <input type="file" class="player-file" name="player-file">
          <input type="submit" id="add-player-file" name="add-player-file" value="Add File">
        </form>

        <form method="post">

        <div class="add-player-content">
          <input type="text" id="player-given-name" name="given-name" placeholder="Given Name" pattern="[a-zA-Z\s]{1,45}" required="" title="Given name must be within 1-45 characters">
          <input type="text" id="player-family-name" name="family-name" placeholder="Family Name" pattern="[a-zA-Z\s]{1,45}" required="" title="Family name must be within 1-45 characters">
        </div>
          
        <div class="add-player-content">
           <select class="player-gender" name="player-gender" id="player-gender-ID">
              <option value="M">Male</option>
              <option value="F">Female</option>
            
          </select>
        <input name="player-birth-date" id="player-birth-date" placeholder="DOB" required="" type="text" onfocus="(this.type='date')" onblur="(this.type='text')">
         
          
          </div>
          
          <div class="add-player-content">
            <input type="email" id="player-email" name="player-email" placeholder="Email" pattern="{7,75}" required="" title="Email must not exceed 75 characters"> 
            
             <select class="player-club" name="player-club-name" id="player-club-ID">
              <option value="1">Launceston Badminton Club</option><option value="2">Otago Squash Club</option>            </select>
          </div>
          
          <br>

          <button type="button" name="add-player-button" id="add-player-button" onclick="addPlayer()">Add Player</button>
        </form>

        </div>
    </div>
</div>
</div>


<!-- initial rating -->
<?php include("./includes/initialRating.php"); ?>

</div>

<?php
  include("./includes/footer.php");
?>
