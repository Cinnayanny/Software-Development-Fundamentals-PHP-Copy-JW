<?php include "template.php";
/**  @var $conn */
?>
<title>Add Products</title>
<h1 class='text-primary'>Add Products</h1>

    <!-- Front End -->

<?php
// Check to see if User is Administrator (level 1)
// If they are, allow functionality, otherwise redirect them back to the front page.
if ($_SESSION['AccessLevel'] == 1) {
    ?>


    <?php
} else {
    header("location:index.php");
}
?>