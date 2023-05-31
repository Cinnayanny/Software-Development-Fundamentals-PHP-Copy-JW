<?php session_start(); ?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/navbar.css" rel="stylesheet">

<!--    <div class="navbar">-->
<!--        <img src="Images/Prototype.png" width="153.5" height="107">-->
<!--        <a href="index.php">Home</a>-->
<!--        <a href="contact.php">Contacts</a>-->
    <nav class="navbar navbar-expand-sm bg-info">
        <div class="container-fluid">
            <a class="navbar-brand" href="#"> <img src="Images/Prototype.png" width="40rem" height="40rem"> </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
                    aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="index.php">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="contact.php">Contact Us</a>
                    </li>
        <?php
        if (isset($_SESSION["FirstName"])) {
            echo '<li class="nav-item" ><a class="nav-link" href = "orderForm.php"> Order Form </a ></li >';
            echo '<li class="nav-item" ><a class="nav-link" href = "invoice.php"> Invoice list</a ></li >';
        } else {
            echo '<li class="nav-item"><a class="nav-link" href="register.php">Register</a></li>';
        }
        if (isset($_SESSION["AccessLevel"])) {
            if ($_SESSION["AccessLevel"] == 1) {
                ?>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                           aria-expanded="false">
<!--                <li class="nav-item dropdown">-->
<!--                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown"-->
<!--                       aria-expanded="false">-->
                        Product Management
                    </a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="productAdd.php">Add Products</a></li>
                        <li><a class="dropdown-item" href="productList.php">Product List</a></li>
                        <li><a class="dropdown-item" href="invoiceHistory.php">Invoice History</a></li>
                    </ul>
                </li>
                <?php
            }
        }

        ?>
        <!--<form><p><label for="search"></label>
                <input type="text" id="search" name="search">
                <button onclick="authentication(this.form)">Search</button></p>
        </form> -->
                </ul>
            </div>
        </div>
    </div>

    <?php
    if (isset($_SESSION["FirstName"])) {
        echo '<div class="bg-light">Welcome, ' . $_SESSION["FirstName"] . '!<a class="nav-link" href="logout.php">Logout</a></div>';
    }
    ?>
    </nav>
</head>


<?php

$conn = new SQLite3("db") or die("Unable to open database");

$productNames = array("product1"=>"Catgirl Headphones", "product2"=>"ArlePlush", "product3"=>"Funny Jigsaw", "product4"=>"Pirated copy of Photoshop", "product5"=>"Good Opinions");
$productPrices= array("product1"=>299.0, "product2"=>32.95, "product3"=>219.95, "product4"=>24.95, "product5"=>24.95);

function footer():string
{
    date_default_timezone_set('Australia/Canberra');
    $filename = basename($_SERVER["SCRIPT_FILENAME"]);
    $footer = "This page was last modified: " . date("F d Y H:i:s.", filemtime($filename));
    return $footer;
}

function sanitiseData($unsanitisedData):string
{
    $unsanitisedData = trim($unsanitisedData);
    $unsanitisedData = stripslashes($unsanitisedData);
    $sanitisedData = htmlspecialchars($unsanitisedData);
    return $sanitisedData;
}

?>
