<!--This script takes user input, sanitises it incase of malicious code (using sanitiseData from template.php), and loads user details from the database.
This page is its own separate page as we may want to place login functions on other pages.
The steps this page takes is it sanitises the data inputted into the username and password fields, then looks at the database to see if the username is in the database on the emailAddress field.
It looks at it as an array. If it ends up with a count of more than 0 instances of the string, it takes the string inputted in the password section and takes the equivalent string from hashedPassword and unhashes it.
It then compares the passwords. If they are the same, it rehashes the password, then loads the user's information from the database. It gives a flash message that it worked. If any of these steps fail, it will instead showcase a message that tells you it failed.-->

<?php
/**  @var $conn */

if (isset($_POST['login'])) {
//    Sanitise the data using the centralised process in template.php
    $username = sanitiseData($_POST['username']);
    $password = sanitiseData($_POST['password']);

//    Look at the database for the user's username
    $query = $conn->query("SELECT COUNT(*) as count, * FROM Customers WHERE `EmailAddress`='$username'");
    $row = $query->fetchArray();
    $count = $row['count'];

    if ($count > 0) {
//        Checks if unhashed password is the same as stored password
        if (password_verify($password, $row['HashedPassword'])) {
//            Loads user details from database
            $_SESSION["FirstName"] = $row['FirstName'];
            $_SESSION['EmailAddress'] = $row['EmailAddress'];
            $_SESSION['AccessLevel'] = $row['AccessLevel'];
            $_SESSION['CustomerID'] = $row['CustomerID'];
//            Tells the user they logged in
            $_SESSION["flash_message"] = "<div class='bg-success'>Login Successful</div>";
            header("location:index.php");

        } else {
//            Tells you it hadn't worked
            $_SESSION["flash_message"] = "<div class='bg-danger'>Invalid Username or Password</div>";
        }
    } else {
        $_SESSION["flash_message"] = "<div class='bg-danger'>Invalid Username or Password</div>";
    }

    }
?>