<div class = "initial-rating-border">
  <div class = "initial-rating-content">
    
    <div class = "initial-rating-exit-button">
      <div class = "initial-rating-exit-button" onclick = "hideInitialRatingModal()">+</div>
      <p>This player does not have an initial rating for this sport</p>
      <form method = "post" action = "<?php echo htmlentities($_SERVER['PHP_SELF']); ?>">
        <select class = "player-initial-rating" name ="player-initial-rating" id="player-initial-rating">
          <option value = "200"> Beginner</option>
          <option value = "500"> Intermediate</option>
          <option value = "1000"> Advanced</option>
          </select>
        <input type= "text" id = "initial-mean-ID" name="initial-mean-name" placeholder = "Initial Rating "/>+/-
        <input type= "text" id = "initial-sd-ID" name="initial-sd-name" placeholder = "Standard deviation"/><br/>
        <button type = "submit" name = "initial-rating-button" id="initial-rating-ID">Add Rating</button>
      </form>
    </div>
  </div>
</div>