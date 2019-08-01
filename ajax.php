<?php
require("./includes/initialize.php");

//var_dump($_POST);

switch($_POST['ajaxMethod'])
{
	case "player-event-history":
		$result = $contentManager->getPlayersRecentEvents($_POST['playerID'], $_POST['sportID'],$_POST['limitOffset']);
		
		//var_dump($result);
		$response = array();

		while ($row = $result->fetch())
		{
			$response[] = array($row);
		}

		echo json_encode($response);
		break;
	case "get-player-rating":
		$result = $contentManager->getPlayerRating($_POST['playerID'],$_POST['sportID']);

		$response = array("mean"=>$result['mean'],"sd"=>$result['standard_deviation']);
		echo json_encode($response);
		break;
	default:
		echo "Post Error";
		var_dump($_POST);
	
}
?>
