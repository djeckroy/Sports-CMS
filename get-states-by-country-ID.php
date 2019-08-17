<?php
    require("./includes/initialize.php");
	
	$result = $contentManager->getStatesByCountryID($_POST["countryID"]);
	
	echo json_encode($result->fetchAll());
?>
