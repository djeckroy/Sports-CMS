<?php 
    $title = "Peterman Ratings | Account";

    include("./includes/header.php");
    include("./includes/navigation.php");

    if(!$account->isLoggedIn())
    {
    	redirect("./index.php");
    }
?>

<article>
   

   
</article>

<?php
    include("./includes/footer.php");
?>