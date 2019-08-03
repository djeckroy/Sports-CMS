<?php

	include("./includes/initialize.php");

	if(!$account->isLoggedIn())
	{
		redirect("./index.php");
	}

	$resultsPerPage = 6;
	$currentPage = "";
	$tableOutput = "";

	if(isset($_POST["page"]))
	{
		$currentPage = $_POST["page"];

	}
	else
	{
		$currentPage = 1;
	}

	if(isset($_POST["eventID"]))
	{
		$clubID = $account->getRegisteredClubID();
		$resultsPageToStartFrom = ($currentPage - 1) * $resultsPerPage;

		$results = $contentManager->getEventsAttendedByClub($clubID, $resultsPageToStartFrom, $resultsPerPage);

		$tableOutput .= "
			<table class='account-tables'>
			<tr>
				<th class='account-row-name'>Name</th>
				<th class='account-row-match-type'>Type</th>
				<th class='account-row-date'>Date</th>
				<th class='account-row-country'>Country</th>
				<th class='account-row-state'>State</th>				
			</tr>";

		while($row = $results->fetch())
		{
			$tableOutput .= "
				<tr>
					<td> " . $row['event_name'] . "</td>
					<td> " . $row['type'] . "</td>
					<td> " . $row['start_date'] . "</td>
					<td> " . $row['country_name'] . "</td>
					<td> " . $row['state_name'] . "</td>
				</tr>";
		}

		$tableOutput .= "
			</table>
			<div class='pagination-buttons'>";

		$totalAttendedEvents = $contentManager->getTotalNumberOfAttendedEvents($clubID);
		$totalPages = ceil($totalAttendedEvents / $resultsPerPage);

		$tableOutput .= "<span class='recent-events-link' id='1'><</span>";

		$pageThreshold = $currentPage + 5;

		if($currentPage == 1)
		{
			for($i = $currentPage; $i <= $pageThreshold OR $i <= $totalPages; $i++)
			{
				$tableOutput .= "<span class='recent-events-link' id='" . $i . "'>" . $i . " </span>";
			}
		}
		elseif($currentPage == 2)
		{
			for($i = ($currentPage - 1); $i <= ($pageThreshold - 1) OR $i <= $totalPages; $i++)
			{
				$tableOutput .= "<span class='recent-events-link' id='" . $i . "'>" . $i . " </span>";
			}
		}
		else
		{
			for($i = ($currentPage - 2); $i <= ($pageThreshold - 2) AND $i <= $totalPages; $i++)
			{
				$tableOutput .= "<span class='recent-events-link' id='" . $i . "'>" . $i . " </span>";
			}
		}


		$tableOutput .= "<span class='recent-events-link' id=' " . $totalPages . "'>></span>";

		$tableOutput .= "</div>";
	}
	else
	{
		redirect("./index.php");
	}

	echo $tableOutput;
?>