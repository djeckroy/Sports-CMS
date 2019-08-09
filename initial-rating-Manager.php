<?php
require("./includes/initialize.php");

if(isset($_POST["setRating"]))
{
  $playerID = $_POST["playerID"];
  $sportID = $_POST["sportID"];
  
  $ratingExists = $contentManager->initialRatingExists($playerID, $sportID);
 
  if($ratingExists == "true")
  {
      echo "true";
  }
  else
  {
    echo "false";
  }
}


if((isset($_POST["meanID"]) && isset($_POST["sdID"])))
{
  $playerID = $_POST["playerID"];
  $sportID = $_POST["sportID"];
  $mean = $_POST["meanID"];
  $sd = $_POST["sdID"];
  
  $result = $contentManager->insertInitialRating($mean, $sd, $playerID, $sportID);
  
}
?>