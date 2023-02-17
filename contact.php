<?php include "template.php"; ?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>PHP Template</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<h1>Contact Us</h1>

<div class="container-fluid">
    <form action="contact.php" method="post">
        <div class="mb-3">
            <label for="inputEmail" class="form-label">Email address</label>
            <input type="email" class="form-control" id="inputEmail" name="inputEmail" aria-describedby="emailHelp">
            <div id="emailHelp" class="form-text">We'll share your email with everyone else.</div>
        </div>
        <div class="mb-3">
            <label for="inputMessage" class="form-label">Message</label>
            <input type="text" class="form-control" id="inputMessage" name="inputMessage">
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $formError = false;
    if (empty($_POST['inputEmail'])) {
        $formError = true;
        echo "Enter an email address.";
    }
    if (empty($_POST['inputMessage'])) {
        $formError = true;
        echo "Enter a message to submit.";
    }
    if ($formError == false) {
        $emailAddress = sanitisedData($_POST['inputEmail']);
        $messageSubmitted = sanitisedData($_POST['inputMessage']);
        # Oddly, you can't put sanitiseData on these because it sanitises 100% of the data. Nothing gets submitted.

        echo "Thanks, your email has been posted to Twitter.com along with your bad take.";
        $csvFile = fopen ("contact.csv", "a");
        fwrite($csvFile, $emailAddress. ", " .$messageSubmitted. "\n");
        fclose($csvFile);
    }

}
?>

</body>
<script src="js/bootstrap.bundle.min.js" ></script>
</html>