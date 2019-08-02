<? php require("./header.php"); ?>
<div class = "add-rating-background">
  <div class = "add-rating-content">
    <div class = "add-rating-fields">
      <p>This player(s) don't have initial rating</p>
      <?php
      $lastPlayed = 1;
      $players = $contentManager->getNewPlayers();
      while($player = $players->fetch(PDO::FETCH_ASSOC))
      {
        ?>
      <tr>
        <td> <?php echo $players['given_name']; ?></td>
        <td><?php echo $players['family-name'];?></td>
        <td> <select class = "player-initial-rating" name ="player-initial-rating" id="player-initial-rating">
          <option value = "200"> Beginner</option>
          <option value = "500"> Intermediate</option>
          <option value = "1000"> Advanced</option>
          </select></td>
      </tr>
      <?php
      }
      ?>
    </div>
  </div>
</div>