<?php
	$title = "Peterman Ratings | Upload Event";

	include("./includes/header.php");
	include("./includes/navigation.php");
	
	if(!$account->isLoggedIn())
	{
		redirect("./index.php");
	}
	
?>

<script>
	function getHomeState()
	{
		return <?php echo($account->getRegisteredClubRegion()['state_id']); ?>;
	}
</script>

<div>
	<article class="event-details-border">

		<form class="event-upload-form" id="event-upload-form" autocomplete="off" action=".\process-event.php" method="post">
			<input value=<?php echo ("'".$account->getRegisteredClubSportID()."'");?> id="sport-type" name="sport-type" hidden />
			<h1 class="event-details-header">Event Details</h1>

			<div class="event-form" action="">
				<div class="event-field">
					<input class="event-field-input" type="text" id="event-name" name="event-name"
					placeholder="Event Name" pattern="[a-zA-Z0-9\s]{1,90}" required
					title="Event name must be within 1-90 characters and can contain letters and numbers">
				</div>
				<div class="event-rows">
					<div class="event-details-row">
						<input class="event-field-date" name="event-date" id="event-date" placeholder="Event Start Date"
						required type="text" onfocus="(this.type='date')" onblur="(this.type='text')">
						<select class="Host-country" name="country-id" id="country-id">
						<?php
							$countryToSelect = $account->getRegisteredClubRegion()['country_id'];
							$countries = $contentManager->getAllCountries();
							while ($country = $countries->fetch())
							{
								if ($country["country_id"] == $countryToSelect)
								{
									echo "<option selected value=\"".$country["country_id"]."\">".$country["name"]."</option>";
								}
								else
								{
									echo "<option value=\"".$country["country_id"]."\">".$country["name"]."</option>";
								}
							}
						?>
						</select>
						<select class="Host-state" name="state-name" id="state-name"></select>
					</div>

					<div class="event-details-row2">
						<select class="event-type" id="event-type" name="event-type" required onchange="changeValue();">
							<option disabled selected value="">Match type</option>
							<option value="Single">Singles</option>
							<option value="Double">Doubles</option>
						</select>
						<input class="match-input" id="match-field-input" type="number" id="match-number"
						name="match-number" placeholder="Number of Matches" pattern="[0-9]{1,3}"
						title="Number must be within 1-300">
						<button class="match-number-input" id="match-number-submit" name="match-number-submission"
						value="Add Matches" type="button">Add Matches</button>
					</div>
				</div>

				<div class="input-table">
					<p class="fill-help"> Need Help on how to fill the Event upload form? Click <a href="#">Here</a>
					</p>
					<table class="match-input-table" id="match-input-table"></table>
				</div>

			</div>

			<div class="ui-widget" id="submit_event">
				<p class="more-matches"> Need more matches? Click <a name="add-button" id="add-button"
					onclick="addMoreRows(); return false;" href="#">Here</a></p>
				<input class="match-submit" id="match-final-submit" type="submit" name="event-page-submission"
					value="Submit Event">
			</div>
		</form>
	</article>
</div>

<?php
	include("./includes/advancedPlayerSearch.php");
	include("./includes/add-player.php");
	include("./includes/initialRating.php");
	include("./includes/event-type-notification-modal.php");
	include("./includes/footer.php");
?>
