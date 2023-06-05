<?php include "template.php"; ?>
<title>Contact Us</title>
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
        $emailAddress = sanitiseData($_POST['inputEmail']);
        $messageSubmitted = sanitiseData($_POST['inputMessage']);

        echo "Thanks, your email has been posted to Twitter.com along with your bad take.";
        $sqlStmt = $conn->prepare("INSERT INTO Contact (ContactEmail, Message) VALUES (:ContactEmail, :Message)");
//        $csvFile = fopen ("contact.csv", "a");
//        fwrite($csvFile, $emailAddress. ", " .$messageSubmitted. "\n");
//        fclose($csvFile);
    }

}
?>

</body>
</html>