<?php 
    $title = "Peterman Ratings | Club-profile";

    include("./includes/header.php");
    include("./includes/navigation.php");
    
    if (isset($_GET['id'])){
		$clubID = $_GET['id'];
	}
	else
	{
		//somehow the user has got to the event profile page without an event id
		//send them to the event search page
		redirect("./clubs.php");
	}


$clubInfo =  $contentManager->getClubInformation($clubID);

?>

<article id="club-profile-page-article">
  <div class="clubs-information-container">
		<h1><?php echo($clubInfo['club_name']) ?></h1>
		<h2><?php echo($clubInfo['sport_name']) ?></h2>
		<h2><?php echo($clubInfo['region']) ?></h2>
  </div>
  <div class="club-members-container">
      <h2>Club Members List</h2>
      <table class='club-members-table'>
	      <tr>
	      <th>Player</th>
	      <th>Age</th>
	      <th>Last Played</th>
	      </tr>
          <tr>
          <td>PlayName</td>
          <td>28</td>
          <td>19 August 2019</td>
          </tr>
          <tr>
          <td>PlayName</td>
          <td>28</td>
          <td>19 August 2019</td>
          </tr>
          <tr>
          <td>PlayName</td>
          <td>28</td>
          <td>19 August 2019</td>
          </tr>
          <tr>
          <td>PlayName</td>
          <td>28</td>
          <td>19 August 2019</td>
          </tr>
          <tr>
          <td>PlayName</td>
          <td>28</td>
          <td>19 August 2019</td>
          </tr>
          <tr>
          <td>PlayName</td>
          <td>28</td>
          <td>19 August 2019</td>
          </tr>
          <tr>
          <td>PlayName</td>
          <td>28</td>
          <td>19 August 2019</td>
          </tr>
          <tr>
          <td>PlayName</td>
          <td>28</td>
          <td>19 August 2019</td>
          </tr>
          <tr>
          <td>PlayName</td>
          <td>28</td>
          <td>19 August 2019</td>
          </tr>
          <tr>
          <td>PlayName</td>
          <td>28</td>
          <td>19 August 2019</td>
          </tr>
        </table>
    
  </div>
    
  <div class="search-pagination-buttons">
        <span class="player-search-link player-search-link-active" id="1">&lt;&lt;</span>
        <span class="player-search-link player-search-link-active" id="1">1 </span>
        <span class="player-search-link player-search-link-active" id="2">2 </span>
        <span class="player-search-link player-search-link-active" id="3">3 </span>
        <span class="player-search-link player-search-link-active" id="4">4 </span>
        <span class="player-search-link player-search-link-active" id="4">&gt;&gt;</span>
    </div>
    
    <div class="events-list-container">
    <h2>Events List</h2>
    <table class='events-list-table'>
	      <tr>
	      <th>Player</th>
	      <th>Date</th>
	      <th>Type</th>
          <th>Region</th>
	      </tr>
          <tr>
          <td>EventName</td>
          <td>04/04/2019</td>
          <td>Single</td>
          <td>Australia, Tasmania</td>
          </tr>
          <tr>
          <td>EventName</td>
          <td>04/04/2019</td>
          <td>Single</td>
          <td>Australia, Tasmania</td>
          </tr>
          <tr>
          <td>EventName</td>
          <td>04/04/2019</td>
          <td>Single</td>
          <td>Australia, Tasmania</td>
          </tr>
          <tr>
          <td>EventName</td>
          <td>04/04/2019</td>
          <td>Single</td>
          <td>Australia, Tasmania</td>
          </tr>
          <tr>
          <td>EventName</td>
          <td>04/04/2019</td>
          <td>Single</td>
          <td>Australia, Tasmania</td>
          </tr>
          <tr>
          <td>EventName</td>
          <td>04/04/2019</td>
          <td>Single</td>
          <td>Australia, Tasmania</td>
          </tr>
          <tr>
          <td>EventName</td>
          <td>04/04/2019</td>
          <td>Single</td>
          <td>Australia, Tasmania</td>
          </tr>
          <tr>
          <td>EventName</td>
          <td>04/04/2019</td>
          <td>Single</td>
          <td>Australia, Tasmania</td>
          </tr>
          <tr>
          <td>EventName</td>
          <td>04/04/2019</td>
          <td>Single</td>
          <td>Australia, Tasmania</td>
          </tr>
          <tr>
          <td>EventName</td>
          <td>04/04/2019</td>
          <td>Single</td>
          <td>Australia, Tasmania</td>
          </tr>
        
        </table>
    
  </div>
    
    <div class="search-pagination-buttons">
        <span class="player-search-link player-search-link-active" id="1">&lt;&lt;</span>
        <span class="player-search-link player-search-link-active" id="1">1 </span>
        <span class="player-search-link player-search-link-active" id="2">2 </span>
        <span class="player-search-link player-search-link-active" id="3">3 </span>
        <span class="player-search-link player-search-link-active" id="4">4 </span>
        <span class="player-search-link player-search-link-active" id="4">&gt;&gt;</span>
    </div>


</article>

<?php
    include("./includes/footer.php");
?>
