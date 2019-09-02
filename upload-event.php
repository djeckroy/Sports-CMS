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
		
		<input id="sport-type" name="sport-type" value=<?php echo ("'".$account->getRegisteredClubSportID()."'");?>   hidden/>
		
        <h1 class="event-details-header">Event Upload-Details</h1>

        <div class="event-form" action="">
            <div class="event-details-row">
                <input class="event-field-input" type="text" id="event-name" name="event-name" placeholder="Event Name"
                    pattern="[a-zA-Z0-9\s]{1,90}" required
                    title="Event name must be within 1-90 characters and can contain letters and numbers"><br /><br />
                <input class="event-field-date" name="event-date" id="event-date" placeholder="Event Start Date"
                    required type="text" onfocus="(this.type='date')" onblur="(this.type='text')"><br />
                
                <br /><br /><br /><br />
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

            <select class="event-type" id="event-type" name="event-type" required>
                <option disabled selected value="">Match type</option>
                <option value="Single">Singles</option>
                <option value="Double">Doubles</option>
            </select><br /><br />
            <input class="match-input" id="match-field-input" type="number" id="match-number" name="match-number"
                placeholder="Number of Matches" pattern="[0-9]{1,3}" title="Number must be within 1-300">
            <button class="match-number-input" id="match-number-submit" name="match-number-submission" value="Add Matches" type="button">Add Matches</button>
            <p class="fill-help"> Need Help on how to fill the Event upload form? Click <a href="#">Here</a></p>
           <div> <table class="match-input-table" id="match-input-table"></table></div>
        </div>


        <div class="ui-widget" id = "submit_event">
            <p class="more-matches"> Need more matches? Click <a name="add-button" id="add-button" onclick="addMoreRows(); return false;" href="#">Here</a></p>
            <input class="match-submit" id="match-final-submit" type="submit" name="event-page-submission"
                value="Submit Event"><br />

        </div>





    </form>
</article>

<!-- advanced search -->

<?php include("./includes/advancedPlayerSearch.php"); ?>

<!-- add player -->

<?php include("./includes/add-player.php"); ?>

<!-- initial rating -->
<?php include("./includes/initialRating.php"); ?>

</div>

<?php
  include("./includes/footer.php");
?>
