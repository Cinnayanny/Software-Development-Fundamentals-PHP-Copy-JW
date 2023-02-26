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
        <!--<form><p><label for="search"></label>
                <input type="text" id="search" name="search">
                <button onclick="authentication(this.form)">Search</button></p>
        </form> -->
    </div>
</head>


<?php

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
