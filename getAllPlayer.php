<?php
require("./includes/initialize.php");

$result = $contentManager->getAllPlayersByAdvancedSearch($_POST['name']);
$response = array();

while ($row = $result->fetch())
{
	$response[] = array("id"=>$row['player_id'],"label"=>$row['family_name'].", ".$row['given_name'] . " (" . $row['state'] . ", " . $row['country'] . ")");
}

echo json_encode($response);
?>
