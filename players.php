<?php 
    $title = "Peterman Ratings | Players";

    include("./includes/header.php");
    include("./includes/navigation.php");
?>

<article>
    <div class="boxed">
        <h2>Search players</h2>
        <div class="vl"></div>
        <div class="container">
            <input type="text" id="fname" name="firstname" placeholder="Full Name">
        </div>
        <div class="sports">
            <select id="sports" name="sports">
                            <option value="Sports">Country</option>
                            <option value="Tennis">Australia</option>
                            <option value="Squash">New Zealand </option>
                            <option value="Badminton">America</option>
                        </select>
        </div>
        <div class="Region">
            <select id="region" name="region">
                            <option value="Region">state</option>
                            <option value="Tasmania">Tasmania</option>
                            <option value="Melbourne">Melbourne</option>
                            <option value="Sydney">Sydney</option>
                        </select>
        </div>
        <div class="Club">
            <input type="text" placeholder="Club" name="search">
            <button type="submit"><i class="fa fa-search"></i></button>
        </div>
        <div class="age">
            <h1>Players Age:</h1>
        </div>
        <div class="container1">
            <input type="text" id="fname" name="firstname" placeholder="Last Competitor">
        </div>
        <div class="tab">
            <h3>Recently:</h3>
            <button class="tablinks">7 Days</button>
            <button class="tablinks">30 Days</button>
            <button class="tablinks">180 Days</button>
        </div>

        <div class="tab2">
            <button class="tablink" id="clean" onclick=""><i class="fa fa-trash"></i> Clean</button>
        </div>
        <div class="tab3">
            <button class="tablink" id="clean" onclick="">Search</button>
        </div>
        <div id="slider"></div>
    </div>


    <table class="paleBlueRows">
        <thead>
            <tr>
                <th>Ranking</th>
                <th>Player Name</th>
                <th>Club</th>
                <th>Region</th>
                <th>Last Played</th>
                <th>Last competitor</th>
                <th>Age</th>
          
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>1</td>
                <td>YUSUF</td>
                <td>Club Name</td>
                <td>VIC,AU</td>
                <td>20 July 2018</td>
                <td>Adib</td>
                <td>20</td>
                
            </tr>
            <tr>
                <td>1</td>
                <td>YUSUF</td>
                <td>Club Name</td>
                <td>VIC,AU</td>
                <td>20 July 2018</td>
                <td>Adib</td>
                <td>20</td>
                
            </tr>
        </tbody>
    </table>

<script src="./javascript/nouislider.min.js"></script> 

</article>

<?php
    include("./includes/footer.php");
?>