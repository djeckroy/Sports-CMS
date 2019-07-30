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
   <!--<aside id="account-panel">    DO NOT USE, NEED A PANEL THAT IS IN THE ARTICLE AND ABOVE OTHER ELEMENTS
        <div class="username">
            <a>User Name</a>
            <hr>
            <h2>ADMIN</h2>


        </div>
        <div class="list">
            <a class="current"><i class="fa fa-address-card"></i> Dashboard</a>
            <a><i class="fa fa-user-circle"></i> Profile</a>
            <a>Club Profile</a>
            <a>Players</a>
            <a>Events</a>
            <a>Settings</a>
        </div>
    </aside> -->
    
    <div class="recent-event">
        <div class="recent-club">
            <a>Your Club: Club Name</a>
            <a>Players:20</a>
            <a>Event:20</a>
            <a>Director:10</a>
            <button class="buton" style="background-color:#1FC498;">Add New Player</button>
            <button class="buton" style="background-color:#FC429B;">Add New Event</button>
            <button class="buton" style="background-color:#3AAAFE;">Add New Director</button>
        </div>
        <div class="heading">
            <a>Recent Players</a>
            <div class="recent-search">
                <input type="text" placeholder="Search.." name="search">
                <button type="submit"><i class="fa fa-search"></i></button>
            </div>
        </div>

        <div class="tbl-header">
            <table id="tbl-header-rows" cellpadding="0" cellspacing="0">
                <thead>
                    <tr>
                        <th>Event</th>
                        <th>Club</th>
                        <th>Date</th>
                        <th>Sport</th>

                    </tr>
                </thead>
            </table>
        </div>
        <div class="tbl-content">
            <table id="tbl-content-rows" cellpadding="0" cellspacing="0">
                <tbody>
                    <tr>
                        <td>Event Name</td>
                        <td>AUSTRALIAN </td>
                        <td>25/07/2019</td>
                        <td>Tennis</td>

                    </tr>
                    <tr>
                        <td>Event Name</td>
                        <td>AUSTRALIAN </td>
                        <td>25/07/2019</td>
                        <td>Tennis</td>
                    </tr>
                    <tr>
                        <td>Event Name</td>
                        <td>AUSTRALIAN </td>
                        <td>25/07/2019</td>
                        <td>Tennis</td>
                    </tr>
                    <tr>
                        <td>Event Name</td>
                        <td>AUSTRALIAN </td>
                        <td>25/07/2019</td>
                        <td>Tennis</td>
                    </tr>
                    <tr>
                        <td>Event Name</td>
                        <td>AUSTRALIAN </td>
                        <td>25/07/2019</td>
                        <td>Tennis</td>
                    </tr>
                    <tr>
                        <td>Event Name</td>
                        <td>AUSTRALIAN </td>
                        <td>25/07/2019</td>
                        <td>Tennis</td>
                    </tr>
                    <tr>
                        <td>Event Name</td>
                        <td>AUSTRALIAN </td>
                        <td>25/07/2019</td>
                        <td>Tennis</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
    <div class="club-player">
        <div class="heading">
            <a>Club Player</a>
            <div class="club-search">
                <input type="text" placeholder="Search.." name="search">
                <button type="submit"><i class="fa fa-search"></i></button>
            </div>
        </div>
        <div class="detail">
            <table>
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>E-mail</th>
                        <th>ID</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>Nick Pettit</td>
                        <td>nick@example.com</td>
                        <td>23423</td>
                    </tr>
                    <tr>
                        <td>Andrew Chalkley</td>
                        <td>andrew@example.com</td>
                        <td>31413</td>
                    </tr>
                    <tr>
                        <td>Dave McFarland</td>
                        <td>dave@example.com</td>
                        <td>123112</td>
                    </tr>
                    <tr>
                        <td>Guil Hernandez</td>
                        <td>guil@example.com</td>
                        <td>123112</td>
                    </tr>


                </tbody>
            </table>
        </div>
    </div>
</article>

<?php
    include("./includes/footer.php");
?>