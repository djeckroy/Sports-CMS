<?php 
    $title = "Peterman Ratings | Account";

    include("./includes/header.php");
    include("./includes/navigation.php");
?>

<article>
<?php
echo nl2br( file_get_contents('./editable/about-us.html') );
?>
</article>

<?php
    include("./includes/footer.php");
?>
