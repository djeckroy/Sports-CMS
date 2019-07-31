
<div class ="add-player-border">
 <div class = "player-content">
   <div class="player container">
      <div class =  "advanced-player-search-wrapper">
          
          <div class="add-player-exit-button" onclick="hideAddPlayerModal()">+</div>
  	   </div>
    
      
  
  
     <div class ="add-player-wrapper">
        <div class ="add-player-header">
          <h2>Add Player</h2>
        </div>

        <hr/>
        <!-- form for uploading excel file -->
        <form method= "post" action="" enctype="multipart/form-data">
          <input type="file" class="player-file" name="player-file"/>
          <input type="submit" id= "add-player-file" name="add-player-file" value="Add File"/>
        </form>

        <form method= "post" action = "<?php echo htmlentities($_SERVER['PHP_SELF']); ?>">

        <div class= "add-player-content">
          <input type="text" id="player-given-name" name="given-name" placeholder="Given Name" pattern="[a-zA-Z\s]{1,45}" required title="Given name must be within 1-45 characters">
          <input type="text" id="player-family-name" name="family-name" placeholder="Family Name" pattern="[a-zA-Z\s]{1,45}" required title="Family name must be within 1-45 characters">
        </div>
          
        <div class ="add-player-content">
           <select class="player-gender" name="player-gender">
              <option value="M">M</option>
              <option value="F">F</option>
            
          </select>
        <input name="player-birth-date" id="player-birth-date" placeholder="DOB" required type="text"onfocus="(this.type='date')" onblur="(this.type='text')">
         
          
          </div>
          
          <div class ="add-player-content">
            <input type="email" id="player-email" name="player-email" placeholder="Email" pattern="{7,75}" required title="Email must not exceed 75 characters"> 
            
             <select class="player-country" name="player-country-name" id="player-country-id">
             <?php
                $countries = $contentManager->getAllCountries();
                while ($country = $countries->fetch())
                {
                    echo "<option value=\"".$country["country_id"]."\">".$country["name"]."</option>";
                }
              ?>
            </select>
          </div>
          <div class="add-player-content">
         
            <select class="player-state" name="player-state-name" id="player-state-ID">
            </select>
            </div>
          <div class = "add-player-content">

          
          </div>
          <br/>

          <button type="submit" name="add-player-button" id="add-player-button" onclick="">Add Player</button>
        </form>

        </div>
    </div>
  </div>
</div>

