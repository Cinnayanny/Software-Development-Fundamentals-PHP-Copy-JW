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
        <a href="orderForm.php">Order</a>
        <a href="invoice.php">Invoice</a>
        <a href="invoiceHistory.php">Invoice History</a>
        <!--<form><p><label for="search"></label>
                <input type="text" id="search" name="search">
                <button onclick="authentication(this.form)">Search</button></p>
        </form> -->
    </div>
</head>


<?php

$productNames = array("product1"=>"Darth Vader Helmet", "product2"=>"Grogu Plush", "product3"=>"ROTJ Jigsaw", "product4"=>"Aftermath", "product5"=>"Alphabet Squadron");
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
