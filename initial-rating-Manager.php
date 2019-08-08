<?php
$playerID = $_POST["playerID"];
$sportID = $_POST["sportID"];

$result = true;//$contentManager->initialRatingExists($playerID, $sportID);

if($result == true)
{
  echo true;
}
else
{
  echo false;
}


?>