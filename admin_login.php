<?php 
include('path.php');

include($ROOTPATH . '/app/controllers/users.php');
loggedinUser();
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <?php include("lender/head.php"); ?>
    <link rel="stylesheet" href="assets/css/landing.css">

    <script src="assets/js/landing.js"></script>
    <title>Admin Login</title>
</head>
<body style="background: #9234eb;">

<!--Container Main start-->
<div class="container-fluid">
    <div class="col-lg-4 m-auto mt-5">
       <div class="card card-body p-5">
        <h4>Admin Login</h4>
        <hr>
       <form action="admin_login.php" method="post">
            <div class="form-group">
                <label for="">Email</label>
                <input type="email" name="email" aria-describedby="ademF" class="form-control <?php echo $email_status; ?>" value="<?php echo $email; ?>" id="">
                <div id="ademF" class="invalid-feedback">
                <?php echo $esm; ?>
                </div>
            </div>
            <div class="form-group">
                <label for="">Password</label>
                <input type="password" name="password" class="form-control  <?php echo $password_status; ?>" id="adpass" aria-describedby="adpassF" value="<?php echo $password; ?>" id="">
                <div id="adpassF" class="invalid-feedback">
                <?php echo $psm; ?>
                </div>
            </div>
            <br>
            <button type="submit" name="login" class="btn btn-primary form-control">Sign In</button>
        </form>
       </div>
    </div>
    
</div>

<!--Container Main end-->

</body>
</html>