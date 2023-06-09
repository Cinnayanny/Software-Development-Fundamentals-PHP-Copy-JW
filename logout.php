<!--Logs you out. It's a very simple "page" that ends your session and sends you back to the main page. It is a separate page so the function can be called upon elsewhere-->
<?php
session_start();
session_destroy();
header("Location:index.php");
?>

</body>
</html>