<?php 
    $title = "Peterman Ratings | Players";

    include("./includes/header.php");
    include("./includes/navigation.php");
?>

<article>

    <div class="player-search-filter-container">
        <h1 id="player-search-filter-title">Search for a Player</h1>
        <hr/>  
        <form action="process-player-list.php" method="post">

            <div class="top-row-filter-inputs">
                <input type="text" name="player-name" class="player-name-filter" placeholder="Enter Player Name">

                <input type="text" name="last-played" class="player-recent-match-filter" placeholder="Last Played" onfocus="(this.type='date')" onblur="(this.type='text')">

                <select name="country-name" class="player-country-filter">
                    <option selected disabled hidden>Select Country</option>
                    <option>Australia</option>
                </select>
            </div>

            <div class="middle-row-filter-inputs">
                <input type="text" name="club-name" class="player-club-filter" placeholder="Enter Club Name">

                <input type="text" name="recent-competitor" class="recent-competitor-filter" placeholder="Last Competitor">

                <select name="state-name" class="player-state-filter">
                    <option selected disabled hidden>Select State</option>
                    <option>Tasmania</option>
                    <option>Western Australia</option>
                </select>
            </div> 

            <div class="bottom-row-filter-inputs">
                <input type="text" name="player-age-min" id="player-age-filter-min" placeholder="Age">
                <span id="player-age-filter-dash">-</span>
                <input type="text" name="player-age-max" id="player-age-filter-max" placeholder="Age">           

                <button type="submit" name="submit-search-filter" class="submit-search-filter">Search</button>
            </div>

        </form>
    </div>

    <div class="player-search-result-container">
        <table class="player-search-result-table">
            <?php
                if(isset($_SESSION["player"]) && $_SESSION["player"] != NULL)
                {
                    $playerDetails = $_SESSION["player"];
                    $competitor = $_SESSION["competitor"];

                    echo "<tr class='player-search-result-table-headers'>
                            <th>Player</th>
                            <th>Age</th>
                            <th>Last Played</th>
                            <th>Club</th>
                            <th>Region</th>
                            <th>Recent Competitor</th>
                          </tr>";
                    
                    for($i = 0; $i < count($playerDetails); $i++)
                    {
                        echo "<tr>";
                        echo "<td><a href='profile.php?profile-id=".$playerDetails[$i][0]."'>".$playerDetails[$i][1]."</a></td>";
                        echo "<td>".$playerDetails[$i][2]."</td>";
                        echo "<td>".$playerDetails[$i][3]."</td>";
                        echo "<td>".$playerDetails[$i][4]."</td>";
                        echo "<td>".$playerDetails[$i][5].", ".$playerDetails[$i][6]."</td>";
                        echo "<td>".$competitor[$i]."</td>";
                        echo "</tr>";
                    }                   
                }
                else
                { 
                    echo "No player by the given search exists.";
                }

                /*unset($_SESSION["player"]);*/
            ?>
        </table>

</article>

<?php
    include("./includes/footer.php");
?>