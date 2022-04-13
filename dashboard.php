<?php 
$dashboard_status = "active";
include('path.php');

include($ROOTPATH . '/app/controllers/users.php');

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <?php include("lender/head.php"); ?>
    <link rel="stylesheet" href="assets/css/sidenav.css">

    <script src="assets/js/sidenav.js"></script>
    <title>Result Management System</title>
</head>
<body id="body-pd">
<?php include("lender/sidebar.php"); ?>
<!--Container Main start-->
<div class="height-100 ">
    <br>
    <h4>Dashboard</h4>
    <div class="row">
        <div class="card col-lg-3 m-4 p-3">
            <div class="">
                Total Student
                <hr>
            </div>
            <div class="card-body">
                <h4>400</h4>
            </div>
        </div>
        <div class="card bg-warning col-lg-3 m-4 p-3">
            <div class="">
                Total Teacher
                <hr>
            </div>
            <div class="card-body">
                <h4>400</h4>
            </div>
        </div>
        <div class="card bg-info col-lg-3 m-4 p-3">
            <div class="">
                Total Classes
                <hr>
            </div>
            <div class="card-body">
                <h4>400</h4>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="card col-lg-3 m-4 p-3">
            <div class="">
                Total User
                <hr>
            </div>
            <div class="card-body">
                <h4>400</h4>
            </div>
        </div>
        <div class="card bg-warning col-lg-3 m-4 p-3">
            <div class="">
                Result Status
                <hr>
            </div>
            <div class="card-body">
                <h4>400</h4>
            </div>
        </div>
        <div class="card bg-info col-lg-3 m-4 p-3">
            <div class="">
                Total Classes
                <hr>
            </div>
            <div class="card-body">
                <h4>400</h4>
            </div>
        </div>
    </div>
</div>

<!--Container Main end-->

</body>
</html>