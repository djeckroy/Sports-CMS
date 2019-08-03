<?php 
    $title = "Peterman Ratings | Account";

    include("./includes/header.php");
    include("./includes/navigation.php");

    if(!$account->isLoggedIn())
    {
    	redirect("./index.php");
    }
?>

<article>
   
<div id="account-container-events">
	<div id="account-event-section">
		<div id="event-header" class="account-page-header">
			<h2>Recent Club Events</h2>
			<div class="account-searchbar-container">
				<input type="text" name="recent-events-searchbar" class="account-input-fields" id="event-searchbar" placeholder="Search Recent Club Events.."/> 
				<input type="image" src="./resources/images/search-icon.png" class="account-search-buttons" id="account-search-event-button"/>
			</div>
		</div>
		<div id="account-event-information">
		</div>
	</div>
</div>

<div id="account-container-players">
	<div id="account-players-section">
		<div id="players-header" class="account-page-header">
			<h2>Club Members</h2>
			<div class="account-searchbar-container">
				<input type="text" name="club-players-searchbar" class="account-input-fields" id="club-players-searchbar" placeholder="Search Club Players.."/> 
				<input type="image" src="./resources/images/search-icon.png" class="account-search-buttons" id="account-search-players-button"/>
			</div>
		</div>
		<div id="account-players-information">
			<table class="account-tables" id="club-players-table">
				<tr>
					<th>Name</th>
					<th>Email</th>
					<th>Gender</th>
					<th>Date of Birth</th>
					<th>Rating</th>				
				</tr>
			</table>
		</div>
		<div class="pagination-buttons">			
		</div>
	</div>
</div>

<div id="account-container-clubs">
	<div id="account-club-section">
		<div id="clubs-header" class="account-page-header">
			<h2>Club Information</h2>
			<div class="account-searchbar-container">
				<input type="text" name="club-directors-searchbar" class="account-input-fields" id="club-players-searchbar" placeholder="Search Club Directors.."/> 
				<input type="image" src="./resources/images/search-icon.png" class="account-search-buttons" id="account-search-directors-button"/>
			</div>
		</div>
		<div id="account-club-information">
			<div id="account-club-details">
				<div id="club-name" class="club-field">
					<p class="club-detail-headers">Name: </p>
					<p>Launceston Club</p>
				</div>
				<div id="club-sport" class="club-field">
					<p class="club-detail-headers">Sport: </p>
					<p>Squash</p>
				</div>
				<div id="club-country" class="club-field">
					<p class="club-detail-headers">Country: </p>
					<p>Australia</p>
				</div>
				<div id="club-state" class="club-field">
					<p class="club-detail-headers">State: </p>
					<p>Tasmania</p>
				</div>
			</div>
		</div>
		<div class="pagination-buttons">
					
		</div>
	</div>
</div>

<div id="account-container-personal"> 
	<div id="personal-header" class="account-page-header">
		<h2>Personal Information</h2>
	</div>
	<div id="account-personal-information">
			
	</div>
</div>
   
</article>

<?php
    include("./includes/footer.php");
?>

<script src="./javascript/pagination.js"></script>








