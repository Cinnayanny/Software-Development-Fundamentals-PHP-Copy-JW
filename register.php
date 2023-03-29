<?php include "template.php"; ?>
<title>User Registration</title>
<h1 class='text-primary'>User Registration</h1>

<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" enctype="multipart/form-data">
    <div class="container-fluid">
        <div class="row">
            <!--Customer Details-->

            <div class="col-md-6">
                <h2>Account Details</h2>
                <p>Please enter wanted username and password:</p>
                <p>Email Address<input type="text" name="username" class="form-control" required="required"></p>
                <p>Password<input type="password" name="password" class="form-control" required="required"></p>

            </div>
            <div class="col-md-6">
                <h2>More Details</h2>
                <!--Product List-->
                <p>Please enter More Personal Details:</p>
                <p>Name<input type="text" name="name" class="form-control" required="required"></p>
            </div>
        </div>
    </div>
    <input type="submit" name="formSubmit" value="Submit">
</form>