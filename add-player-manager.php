<?php
require("./includes/initialize.php");

if((isset($_POST["playerGivenName"])) && (isset($_POST["playerFamilyName"])) && (isset($_POST["playerGenderID"])) && (isset($_POST["playerBirthDate"])) && (isset($_POST["playerEmail"])) && (isset($_POST["playerClubID"])))
{
  
  
  $contentManager->addPlayer($_POST["playerGivenName"], $_POST["playerFamilyName"], $_POST["playerGenderID"], $_POST["playerBirthDate"], $_POST["playerEmail"], $_POST["playerClubID"]);
}
?>