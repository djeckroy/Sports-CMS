<?php

require("./includes/initialize.php");

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

?>