<?php 
    $title = "Peterman Ratings | Players";

    include("./includes/header.php");
    include("./includes/navigation.php");
?>

<article>

    <div class="player-search-filter-container">

        
        <div id="player-search-filter-line"><h1 id="player-search-filter-title">Search for a Player</h1></div>
 
            <div class="top-row-filter-inputs">
                <input type="text" name="playerName" id="player-name-filter" placeholder="Enter Player Name">

                <input type="text" name="playerAgeMin" id="player-age-min-filter" placeholder="Age">

                <span id="player-age-filter-dash">-</span>

                <input type="text" name="playerAgeMax" id="player-age-max-filter" placeholder="Age">  

                <select name="countryName" id="player-country-filter">
                    <option selected disabled hidden>Select Country</option>
                    <option>Australia</option>
                </select>
            </div>

            <div class="middle-row-filter-inputs">
                <input type="text" name="clubName" id="player-club-filter" placeholder="Enter Club Name">

                <input type="text" name="lastPlayed" id="player-recent-match-filter" placeholder="Last Played" onfocus="(this.type='date')" onblur="(this.type='text')">  

                <select name="stateName" id="player-state-filter">
                    <option selected disabled hidden>Select State</option>
                    <option>Tasmania</option>
                    <option>Western Australia</option>
                </select>
            </div> 

            <div class="bottom-row-filter-inputs">       

                <button type="button" name="submitSearchFilter" id="submit-search-filter">Search</button>

            </div>

    </div>

    <div class="player-search-result-container">
    </div>

</article>

<?php
    include("./includes/footer.php");
?>

<script src=./javascript/pagination.js></script>