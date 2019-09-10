<?php 
    $title = "Peterman Ratings | Privacy Policy";

    include("./includes/header.php");
    include("./includes/navigation.php");
?>

<article>
  
<?php
	echo nl2br( file_get_contents('./includes/privacy-policy.txt') );
?>

</article>

<?php
    include("./includes/footer.php");
?>
