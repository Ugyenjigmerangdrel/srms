<?php 
$dashboard_status = "active";
include('path.php');

include($ROOTPATH . '/app/controllers/dashboard.php');
adminOnly();
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <?php include("lender/head.php"); ?>
    <link rel="stylesheet" href="assets/css/sidenav.css">
    <link rel="stylesheet" href="assets/css/dashboard.css">
    <script src="assets/js/sidenav.js"></script>
    <title>Result Management System</title>
</head>
<body id="body-pd">
<?php include("lender/sidebar.php"); ?>
<!--Container Main start-->
<div class="height-100 ">
    <br>
    <div class="container">
        <div class="row">
            <div class="col-lg-5">
            <div class="card">
                <div class="card-body">
                    <h4>Hello <?php echo $user_data['name']; ?> 👋</h4>
                    <hr>
                    <h6>Class Assigned: <?php echo $user_data['class_assigned']; ?></h6>
                    <h6>Email: <?php echo $user_data['email']; ?></h6>
                    <h6>Contact: <?php echo $user_data['contact']; ?></h6>
                    <h6>Role: <?php echo $user_data['role']; ?></h6>
                </div>
            </div>
            </div>
            <div class="col-lg-2"></div>
            <div class="col-lg-4 col-sm-12">
            <div class="circle-tile ">
                <a href="#"><div class="circle-tile-heading purple"><i class="fa fa-users fa-fw fa-3x"></i></div></a>
                <div class="circle-tile-content purple">
                <div class="circle-tile-description text-faded"> Students In Class <?php echo $user_data['class_assigned']; ?> </div>
                <div class="circle-tile-number text-faded "><?php echo count($class_data); ?></div>
                <a class="circle-tile-footer" href="#">More Info<i class="fa fa-chevron-circle-right"></i></a>
                </div>
            </div>
            </div> 
        </div>
        
    </div>
    <br>
    <hr>
    <div class="container bootstrap snippet">
    <div class="row">
        <div class="col-lg-4 col-sm-12">
        <div class="circle-tile ">
            <a href="#"><div class="circle-tile-heading dark-blue"><i class="fa fa-users fa-fw fa-3x"></i></div></a>
            <div class="circle-tile-content dark-blue">
            <div class="circle-tile-description text-faded">Total Users</div>
            <div class="circle-tile-number text-faded "><?php echo count($users); ?></div>
            <a class="circle-tile-footer" ></a>
            </div>
        </div>
        </div>
        
        <div class="col-lg-4 col-sm-12">
        <div class="circle-tile ">
            <a href="#"><div class="circle-tile-heading green"><i class="fa fa-users fa-fw fa-3x"></i></div></a>
            <div class="circle-tile-content green">
            <div class="circle-tile-description text-faded"> Today Students Registered </div>
            <div class="circle-tile-number text-faded "><?php echo count($students)?></div>
            <a class="circle-tile-footer" ></a>
            </div>
        </div>
        </div> 

        <div class="col-lg-4 col-sm-12">
        <div class="circle-tile ">
            <a href="#"><div class="circle-tile-heading blue"><i class="fa fa-home fa-fw fa-3x"></i></div></a>
            <div class="circle-tile-content blue">
            <div class="circle-tile-description text-faded"> Classes Registered</div>
            <div class="circle-tile-number text-faded "><?php echo count($class)?></div>
            <a class="circle-tile-footer"></a>
            </div>
        </div>
        </div> 
    </div> 
    <br>
    <div class="row">
        <div class="col-lg-4 col-sm-12">
        <div class="circle-tile ">
            <a href="#"><div class="circle-tile-heading bg-info"><i class="fa fa-users fa-fw fa-3x"></i></div></a>
            <div class="circle-tile-content bg-info">
            <div class="circle-tile-description text-faded">Class Average</div>
            <div class="circle-tile-number text-faded "><?php echo $class_avg?>%</div>
            <a class="circle-tile-footer" ></a>
            </div>
        </div>
        </div>
        
        <div class="col-lg-8 col-sm-12">
        <div class="circle-tile ">
            <a href="#"><div class="circle-tile-heading red"><i class="fa fa-book fa-fw fa-3x"></i></div></a>
            <div class="circle-tile-content red">
            <div class="circle-tile-description text-faded">Subjects</div>
            <div class="circle-tile-number text-white "><h6><?php listSub();?></h6></div>
            <a class="circle-tile-footer"></a>
            </div>
        </div>
        </div>
        
    </div> 
    </div>  
    
    </div>
    </div>
</div>

<!--Container Main end-->

</body>
</html>