<?php 
    $title = "Peterman Ratings | Players";

    include("./includes/header.php");
    include("./includes/navigation.php");
?>

<article>

    <div class="player-search-filter-container">  
        <form action="process-player-list.php" method="post">
            <input type="text" name="player-name" class="" placeholder="Enter Player Name">

            <input type="text" name="player-age" class="" placeholder="Age">

            <input type="text" name="recent-match" class="" placeholder="Most Recent Match" onfocus="(this.type='date')" onblur="(this.type='text')">

            <input type="text" name="club-name" class="" placeholder="Enter Club Name">

            <select name="country-name" class="" placeholder="Select Country">
                <option>Select Country</option>
                <option>Australia</option>
            </select>

            <select name="state-name" class="" placeholder="Select State">
                <option>Select State</option>
                <option>Tasmania</option>
                <option>Western Australia</option>
            </select>

            <input type="text" name="recent-competitor" class="" placeholder="Most Recent Competitor">

            <button type="submit" name="submit-search-filter" class="">Search</button>
        </form>
    </div>

    <div class="player-search-result-container">
        <table class="player-search-result-table">
            <?php
                if(isset($_SESSION["player"]) && $_SESSION["player"] != NULL)
                {
                    $playerDetails = $_SESSION["player"];

                    echo "<tr class='player-search-result-table-headers'>
                            <th>Player</th>
                            <th>Age</th>
                            <th>Recent Match</th>
                            <th>Club</th>
                            <th>Region</th>
                          </tr>";
                    
                    for($i = 0; $i < count($playerDetails); $i++)
                    {
                        echo "<tr>";
                        echo "<td><a href='profile.php?profile-id=".$playerDetails[$i][0]."'>".$playerDetails[$i][1]."</a></td>";
                        echo "<td>".$playerDetails[$i][2]."</td>";
                        echo "<td>".$playerDetails[$i][3]."</td>";
                        echo "<td>".$playerDetails[$i][4]."</td>";
                        echo "<td>".$playerDetails[$i][5].", ".$playerDetails[$i][6]."</td>";
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