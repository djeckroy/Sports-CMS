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
		$searchTerm = "";

		if(isset($_POST["searchTerm"]))
		{
			$searchTerm = $_POST["searchTerm"];
		}

		$results = $contentManager->getEventsAttendedByClub($clubID, $resultsPageToStartFrom, $resultsPerPage, $searchTerm);

		$tableOutput .= "
			<table class='account-tables'>
			<tr>
				<th class='account-row-id'>ID</th>
				<th class='account-row-name'>Name</th>
				<th class='account-row-match-type'>Type</th>
				<th class='account-row-date'>Date</th>
				<th class='account-row-country'>Country</th>
				<th class='account-row-date'></th>				
			</tr>";

			/*<th class='account-row-date'></th>	*/

		while($row = $results->fetch())
		{
			$tableOutput .= "
				<tr>
					<td class='account-table-id'> " . $row['event_id'] . "</td>
					<td> " . $row['event_name'] . "</td>
					<td> " . $row['type'] . "</td>
					<td> " . $row['start_date'] . "</td>
					<td> " . $row['country_name'] . "</td>
					<td> <button class='account-table-events-button'>Edit Event</button> </td>
				</tr>";
		}

		$tableOutput .= "
			</table>
			<div class='pagination-buttons'>";

		$totalAttendedEvents = $contentManager->getTotalNumberOfAttendedEvents($clubID, $searchTerm);
		$totalPages = ceil($totalAttendedEvents / $resultsPerPage);

		if($totalPages < 1)
		{
			$tableOutput .= "<span class='recent-events-link' id='0'><<</span>";
		}
		else
		{
			$tableOutput .= "<span class='recent-events-link' id='1'><<</span>";
		}

		$pageThreshold = $currentPage + 4;

		if($currentPage == 1)
		{
			for($i = $currentPage; $i <= $pageThreshold AND $i <= $totalPages; $i++)
			{
				$tableOutput .= "<span class='recent-events-link' id='" . $i . "'>" . $i . " </span>";
			}
		}
		elseif($currentPage == 2)
		{
			for($i = ($currentPage - 1); $i <= ($pageThreshold - 1) AND $i <= $totalPages; $i++)
			{
				$tableOutput .= "<span class='recent-events-link' id='" . $i . "'>" . $i . " </span>";
			}
		}
		else
		{
			if($currentPage == $totalPages)
			{
				for($i = ($totalPages - 4); $i <= $totalPages; $i++)
				{
					$tableOutput .= "<span class='recent-events-link' id='" . $i . "'>" . $i . " </span>";
				}
			}
			elseif($currentPage == $totalPages - 1)
			{
				for($i = ($totalPages - 4); $i <= $totalPages; $i++)
				{
					$tableOutput .= "<span class='recent-events-link' id='" . $i . "'>" . $i . " </span>";
				}
			}
			elseif($currentPage == $totalPages - 2)
			{
				for($i = ($totalPages - 4); $i <= $totalPages; $i++)
				{
					$tableOutput .= "<span class='recent-events-link' id='" . $i . "'>" . $i . " </span>";
				}
			}
			else
			{
				for($i = ($currentPage - 2); $i <= ($pageThreshold - 2) AND $i < $totalPages; $i++)
				{
					$tableOutput .= "<span class='recent-events-link' id='" . $i . "'>" . $i . " </span>";
				}
			}
		}


		$tableOutput .= "<span class='recent-events-link' id=' " . $totalPages . "'>>></span></div>";
	}	
	elseif(isset($_POST["playersID"]))
	{
		$clubID = $account->getRegisteredClubID();
		$resultsPageToStartFrom = ($currentPage - 1) * $resultsPerPage;
		$searchTerm = "";
		
		if(isset($_POST["searchTerm"]))
		{
			$searchTerm = $_POST["searchTerm"];
		}

		$clubResults = $contentManager->getPlayersByClub($clubID, $resultsPageToStartFrom, $resultsPerPage, $searchTerm);

		$tableOutput .= "
			<table class='account-tables'>
			<tr>
				<th class='account-row-name'>Name</th>
				<th class='account-row-email'>Email</th>
				<th class='account-row-gender'>Gender</th>
				<th class='account-row-date'>DOB</th>
				<th class='account-row-rating'>Rating</th>				
			</tr>";

		while($row = $clubResults->fetch())
		{
			$tableOutput .= "
				<tr>
					<td> " . $row['player_name'] . "</td>
					<td> " . $row['email'] . "</td>
					<td> " . $row['gender'] . "</td>
					<td> " . $row['date_of_birth'] . "</td>
					<td> " . $row['mean'] . "</td>
				</tr>";
		}

		$tableOutput .= "
			</table>
			<div class='pagination-buttons'>";

		$totalClubMembers = $contentManager->getNumPlayersByClub($clubID, $searchTerm);
		$totalPages = ceil($totalClubMembers / $resultsPerPage);

		if($totalPages < 1)
		{
			$tableOutput .= "<span class='club-players-link' id='0'><<</span>";
		}
		else
		{
			$tableOutput .= "<span class='club-players-link' id='1'><<</span>";
		}

		$pageThreshold = $currentPage + 4;

		if($currentPage == 1)
		{
			for($i = $currentPage; $i <= $pageThreshold AND $i <= $totalPages; $i++)
			{
				$tableOutput .= "<span class='club-players-link' id='" . $i . "'>" . $i . " </span>";
			}
		}
		elseif($currentPage == 2)
		{
			for($i = ($currentPage - 1); $i <= ($pageThreshold - 1) AND $i <= $totalPages; $i++)
			{
				$tableOutput .= "<span class='club-players-link' id='" . $i . "'>" . $i . " </span>";
			}
		}
		else
		{
			if($currentPage == $totalPages)
			{
				for($i = ($totalPages - 4); $i <= $totalPages; $i++)
				{
					$tableOutput .= "<span class='club-players-link' id='" . $i . "'>" . $i . " </span>";
				}
			}
			elseif($currentPage == $totalPages - 1)
			{
				for($i = ($totalPages - 4); $i <= $totalPages; $i++)
				{
					$tableOutput .= "<span class='club-players-link' id='" . $i . "'>" . $i . " </span>";
				}
			}
			elseif($currentPage == $totalPages - 2)
			{
				for($i = ($totalPages - 4); $i <= $totalPages; $i++)
				{
					$tableOutput .= "<span class='club-players-link' id='" . $i . "'>" . $i . " </span>";
				}
			}
			else
			{
				for($i = ($currentPage - 2); $i <= ($pageThreshold - 2) AND $i < $totalPages; $i++)
				{
					$tableOutput .= "<span class='club-players-link' id='" . $i . "'>" . $i . " </span>";
				}
			}
		}


		$tableOutput .= "<span class='club-players-link' id=' " . $totalPages . "'>>></span>
						<button type='button' id='account-add-player-button'>Add Player</button> </div>";

	}
	elseif(isset($_POST["directorID"]))
	{
		$resultsPerPage = 4;
		$clubID = $account->getRegisteredClubID();
		$resultsPageToStartFrom = ($currentPage - 1) * $resultsPerPage;
		$searchTerm = "";
		
		if(isset($_POST["searchTerm"]))
		{
			$searchTerm = $_POST["searchTerm"];
		}

		$directorResults = $contentManager->getClubDirectors($clubID, $resultsPageToStartFrom, $resultsPerPage, $searchTerm);

		$tableOutput .= "
			<table id='directors-table'>
			<tr>
				<th class='account-row-name'>Name</th>
				<th class='account-row-email'>Email</th>
				<th class='account-row-email'>Organisation</th>			
			</tr>";

		while($row = $directorResults->fetch())
		{
			$tableOutput .= "
				<tr>
					<td> " . $row['account_name'] . "</td>
					<td> " . $row['email'] . "</td>
					<td> " . $row['organisation'] . "</td>
				</tr>";
		}

		$tableOutput .= "
			</table>
			<div class='pagination-buttons'>";

		$totalDirectors = $contentManager->getNumClubDirectors($clubID, $searchTerm);
		$totalPages = ceil($totalDirectors / $resultsPerPage);

		if($totalPages < 1)
		{
			$tableOutput .= "<span class='tournament-directors-link' id='0'><<</span>";
		}
		else
		{
			$tableOutput .= "<span class='tournament-directors-link' id='1'><<</span>";
		}

		$pageThreshold = $currentPage + 2;

		if($currentPage == 1)
		{
			for($i = $currentPage; $i <= $pageThreshold AND $i <= $totalPages; $i++)
			{
				$tableOutput .= "<span class='tournament-directors-link' id='" . $i . "'>" . $i . " </span>";
			}
		}
		elseif($currentPage == 2)
		{
			for($i = ($currentPage - 1); $i <= ($pageThreshold - 1) AND $i <= $totalPages; $i++)
			{
				$tableOutput .= "<span class='tournament-directors-link' id='" . $i . "'>" . $i . " </span>";
			}
		}
		else
		{
			if($currentPage == $totalPages)
			{
				for($i = ($totalPages - 4); $i <= $totalPages; $i++)
				{
					$tableOutput .= "<span class='tournament-directors-link' id='" . $i . "'>" . $i . " </span>";
				}
			}
			elseif($currentPage == $totalPages - 1)
			{
				for($i = ($totalPages - 4); $i <= $totalPages; $i++)
				{
					$tableOutput .= "<span class='tournament-directors-link' id='" . $i . "'>" . $i . " </span>";
				}
			}
			elseif($currentPage == $totalPages - 2)
			{
				for($i = ($totalPages - 4); $i <= $totalPages; $i++)
				{
					$tableOutput .= "<span class='tournament-directors-link' id='" . $i . "'>" . $i . " </span>";
				}
			}
			else
			{
				for($i = ($currentPage - 2); $i <= ($pageThreshold - 2) AND $i < $totalPages; $i++)
				{
					$tableOutput .= "<span class='tournament-directors-link' id='" . $i . "'>" . $i . " </span>";
				}
			}
		}


		$tableOutput .= "<span class='tournament-directors-link' id=' " . $totalPages . "'>>></span>
						<button type='button' id='account-add-director-button'>Add Director</button> </div>";
	}
	else
	{
		redirect("./index.php");
	}

	echo $tableOutput;
?>