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
	case "activate-account":
		$account->activateAccount($_POST['accountID']);
		break;
	case "remove-account":
		$account->removeAccount($_POST['accountID']);
		break;
	case "retrieveClubInformation":
		$clubInformation = $account->getClubDetails($_POST['clubID']);
		
		echo '
			<div id="club-name" class="club-field">
				<p class="club-detail-headers">Name: </p>
				<p id="club-name-value">' . $clubInformation["name"] . '</p>
			</div>
			<div id="club-sport" class="club-field">
				<p class="club-detail-headers">Sport: </p>
				<p id="club-sport-value">' . $clubInformation["sport"] . '</p>
			</div>
			<div id="club-country" class="club-field">
				<p class="club-detail-headers">Country: </p>
				<p id="club-country-value">' . $clubInformation["country"] . '</p>
			</div>
			<div id="club-state" class="club-field">
				<p class="club-detail-headers">State: </p>
				<p id="club-state-value">' . $clubInformation["state"] . '</p>
			</div>';

		break;
	case "editPlayerModal":
		$playerDetails = $contentManager->getSpecificPlayerInformation($_POST['playerID']);

		$editPlayerModal = '
			<div class="register-input-group-double">
          		<input type="text" id="edit-given-name" name="given-name" value="' . $playerDetails["given_name"] . '" placeholder="Given Name" pattern="[a-zA-Z\s]{1,45} required title="Given name must be within 1-45 characters">
          		<input type="text" id="edit-family-name" name="family-name" value="' . $playerDetails["family_name"] . '" placeholder="Family Name" pattern="[a-zA-Z\s]{1,45} required title="Family name must be within 1-45 characters">
        	</div>

        	<div class="register-input-group-double">
          		<select id="player-gender">';

          			if($playerDetails["gender"] == "M")
          			{
          				$editPlayerModal .= '<option value="M" selected>Male</option>
                							 <option value="F">Female</option>';
          			}
          			else
          			{
          				$editPlayerModal .= '<option value="M">Male</option>
                							 <option value="F" selected>Female</option>';
          			}
          			
          		$editPlayerModal .= '</select>
          		<input class="event-field-date" class="edit-player-date" name="event-date" id="event-date" onfocus="(this.type=\'date\')" onblur="(this.type=\'text\')" value="' . $playerDetails["date_of_birth"] . '"> 
        	</div>

        	<input type="email" value="' . $playerDetails["email"] . '" id="edit-player-email" name="email" placeholder="Email" pattern="{7,75}" required title="Email must not exceed 75 characters"> 

        	<div class="register-input-group-double">
        	<select name="select-country" id="edit-player-country">';
                $countries = $contentManager->getAllCountries();

                while ($country = $countries->fetch())
                {
                	if($country["name"] == $playerDetails["country_name"])
                	{
                		$editPlayerModal .= '<option value="' . $country["country_id"] . '" selected>' . $country["name"] . '</option>';
                	}
                	else
                	{
                		$editPlayerModal .= '<option value="' . $country["country_id"] . '">' . $country["name"] . '</option>';
                	}
                }
        	
        	$editPlayerModal .= '
        		</select><select name="state-name" id="edit-player-state"></select></div>
        		<button type="button" name="edit-player" id="edit-player-button">Confirm</button>';

        	echo $editPlayerModal;
		break;
	case "editPlayer":
		$contentManager->editPlayer($_POST["playerID"], $_POST["givenName"], $_POST["familyName"], $_POST["gender"], $_POST["dob"], $_POST["email"], $_POST["country"], $_POST["state"]);
		break;
	default:
		echo "Post Error";
		var_dump($_POST);
	
}
?>
