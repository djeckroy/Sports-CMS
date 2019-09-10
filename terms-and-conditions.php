<?php 
    $title = "Peterman Ratings | Terms and Conditions";

    include("./includes/header.php");
    include("./includes/navigation.php");
?>

<article class="privacy-and-terms-articles">
  
<?php
	echo nl2br( file_get_contents('./includes/terms-and-conditions.txt') );
?>

</article>

<?php
    include("./includes/footer.php");
?>
