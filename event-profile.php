<?php
$title = "Peterman Ratings | Event-profile";

include( "./includes/header.php" );
include( "./includes/navigation.php" );


if (isset($_GET['id'])){
	$eventID = $_GET['id'];
}
else
{
	//somehow the user has got to the event profile page without an event id
	//send them to the event search page
	redirect("./events.php");
}


$eventInfo =  $contentManager->getEventInformation($eventID);


function sign( $number ) { 
    return ( $number > 0 ) ? 1 : ( ( $number < 0 ) ? -1 : 0 ); 
} 

?>

<article id="event-profile-page-article">
	<div class="events-information-container">
		<h1><?php echo($eventInfo['name']) ?></h1>
		<h2><?php echo($eventInfo['club']) ?></h2>
		<h2><?php echo($eventInfo['type'] . 's') ?></h2>
		<h2><?php echo($eventInfo['date']) ?></h2>
		<h2><?php echo($eventInfo['region']) ?></h2>
	</div>
	
	<?php
		if (strcmp($eventInfo['type'],"Single") == 0 )
		{
			//singles event
			
			$result = $contentManager->getEventMatches($eventID, true);
			while ($row = $result->fetch())
			{
			?>
			
			<div class="matches-table-container">
		<table class='matches-table'>
			<tr>
				<th> </th>
				<th>
					<?php echo("<a id='player-link' href='/player/profile?id=" . $row['winning_id'] . "'>" . $row['winning_name'] . "</a>"); ?>
				</th>
				<th>defeats</th>
				<th>
					<?php echo("<a id='player-link' href='/player/profile?id=" . $row['losing_id'] . "'>" . $row['losing_name'] . "</a>"); ?>
				</th>
			</tr>
			<tr>

				<tr>
					<td class="strong">Previous Ranking:</td>
					<td>
					<?php echo((int)$row['mean_before_winning'] . " &plusmn" . (int)$row['standard_deviation_before_winning']); ?>
					</td>
					<td>-</td>
					<td>
					<?php echo((int)$row['mean_before_losing'] . " &plusmn" . (int)$row['standard_deviation_before_losing']); ?>
					</td>
				</tr>
				<tr>
					<td class="strong">Ranking Change:</td>
					<td>
					<?php
						$change = (int)($row['mean_after_winning'] - $row['mean_before_winning']);
						if (sign($change) < 0)
						{
							//negative change
							echo($change);
						}
						else
						{
							echo("+" . $change);
						}
					?>
					</td>
					<td>-</td>
					<td>
					<?php
						$change = (int)($row['mean_after_losing'] - $row['mean_before_losing']);
						if (sign($change) < 0)
						{
							//negative change
							echo($change);
						}
						else
						{
							echo("+" . $change);
						}
					?>
					</td>
				</tr>
				<tr>
					<td class="strong">New Ranking:</td>
					<td>
					<?php echo((int)$row['mean_after_winning'] . " &plusmn" . (int)$row['standard_deviation_after_winning']); ?>
					</td>
					<td>-</td>
					<td>
					<?php echo((int)$row['mean_after_losing'] . " &plusmn" . (int)$row['standard_deviation_after_losing']); ?>
					</td>
				</tr>
				<tr>
					<td class="strong">Set Score:</td>
					<td><?php echo ($row['winner_score']); ?></td>
					<td>-</td>
					<td><?php echo ($row['loser_score']); ?></td>
				</tr>
		</table>
	</div>
			
			
			<?php
			}
		}
	
	?>
	<div class="matches-table-container">
		<table class='matches-table'>
			<tr>
				<th> </th>
				<th><a id='player-link' href="/player/profile">Bailey Fred</a>
				</th>
				<th id="doubleDefeat">defeat</th>
				<th><a id='player-link' href="/player/profile">Collins George</a>
				</th>
				<th> </th>
			</tr>
			<tr>

				<tr>
					<th> </th>
					<th><a id='player-link' href="/player/profile">Clark Ernest</a>
					</th>
					<th> </th>
					<th><a id='player-link' href="/player/profile">Butler Alan</a>
					</th>
				</tr>
				<tr>

					<tr>
						<td class="strong">Previous Ranking:</td>
						<td>4326</td>
						<td>-</td>
						<td>3250</td>
					</tr>
					<tr>
						<td class="strong">Ranking Change:</td>
						<td>+100</td>
						<td>-</td>
						<td>-50</td>
					</tr>
					<tr>
						<td class="strong">New Ranking:</td>
						<td>4426</td>
						<td>-</td>
						<td>3200</td>
					</tr>
					<tr>
						<td class="strong">Set Score:</td>
						<td>426</td>
						<td>-</td>
						<td>332</td>
					</tr>
		</table>
	</div>

	<div class="matches-table-container">
		<table class='matches-table'>
			<tr>
				<th> </th>
				<th><a id='player-link' href="/player/profile">Bailey Fred</a>
				</th>
				<th>defeats</th>
				<th><a id='player-link' href="/player/profile">Collins George</a>
				</th>
			</tr>
			<tr>

				<tr>
					<td class="strong">Previous Ranking:</td>
					<td>4326</td>
					<td>-</td>
					<td>3250</td>
				</tr>
				<tr>
					<td class="strong">Ranking Change:</td>
					<td>+100</td>
					<td>-</td>
					<td>-50</td>
				</tr>
				<tr>
					<td class="strong">New Ranking:</td>
					<td>4426</td>
					<td>-</td>
					<td>3200</td>
				</tr>
				<tr>
					<td class="strong">Set Score:</td>
					<td>426</td>
					<td>-</td>
					<td>332</td>
				</tr>
		</table>
	</div>

</article>

<?php
include( "./includes/footer.php" );
?>
