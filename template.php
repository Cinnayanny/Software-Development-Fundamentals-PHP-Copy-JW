<?php session_start(); ?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/navbar.css" rel="stylesheet">

    <div class="navbar">
        <img src="Images/Prototype.png" width="153.5" height="107">
        <a href="index.php">Home</a>
        <a href="contact.php">Contacts</a>
        <?php
        if (isset($_SESSION["FirstName"])) {
            echo '<li class="nav-item" ><a class="nav-link" href = "orderForm.php"> Order Form </a ></li >';
            echo '<li class="nav-item" ><a class="nav-link" href = "invoiceList.php"> Invoice list</a ></li >';
        } else {
            echo '<li class="nav-item"><a class="nav-link" href="register.php">Register</a></li>';
        }
        ?>
        <!--<form><p><label for="search"></label>
                <input type="text" id="search" name="search">
                <button onclick="authentication(this.form)">Search</button></p>
        </form> -->
    </div>
    <?php
    if (isset($_SESSION["FirstName"])) {
        echo '<div class="bg-light">Welcome, ' . $_SESSION["FirstName"] . '!<a class="nav-link" href="logout.php">Logout</a></div>';
    }
    ?>
</head>


<?php

session_start();
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
