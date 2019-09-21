<div class="dropdowns-menu">
  <div class="dropdown-header">
    <h3> Hi, <?php echo $account->getAccountName(); ?> </h3>
  </div>
  <div class="dropdown-options">
    <a href="./account.php">Club Administration</a>
    <a href="./upload-event.php">Upload Event</a>
    <hr/> 
    <div class="dropdown-signout-form">
      <form method="post" action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>">
        <button type="submit" name="signout-account" class="signout-account-button" onclick="">Sign Out</button>
      </form>
    </div>
  </div> 
</div>