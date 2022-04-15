<?php 
$combo_status = "active";
include('path.php');

include($ROOTPATH . '/app/controllers/subjectcombo.php');
adminOnly();
$classes = dispSort(['subject_combo', 'class', 'desc']);
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <?php include("lender/head.php"); ?>
    <link rel="stylesheet" href="assets/css/sidenav.css">
    <link rel="stylesheet" href="assets/css/user.css">
    <script src="assets/js/sidenav.js"></script>
    <title>Result Management System</title>
</head>
<body id="body-pd">
<?php include("lender/sidebar.php"); ?>
<!--Container Main start-->
<div class="height-100 ">
<div class="card">
                    <div class="card-body">
                        <h5 class="">Manage Suject Combination</h5>
                        <div class="row">
                            <div class="col-lg-9">
                            <p class="card-description">Details of subject combination</p>
                            </div>
                            <div class="col-lg-3">
                                <a href="add_subjectcomb.php" class="btn-success p-2">+ Add Combination</a>
                            </div>
                        </div>
                        <div class="table-responsive">
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th>Sl.No</th>
                                        <th>Class</th>
                                        <th>Subjects</th>
                                        <th>Action</th>
                                        
                                    </tr>
                                </thead>
                                <tbody>
                                <?php foreach ($classes as $key => $mem): ?>
                                    <tr>
                                        <td><?php echo $key + 1; ?></td>
                                        <td><?php echo $mem['class']; ?></td>
                                        <td><?php echo $mem['subject']; ?></td>
                                       
                                        <td> <a href="?del_id=<?php echo $mem['id']; ?>" class="p-2 btn-danger ">Remove</a> </td>

                                    </tr>
                                <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
</div>

<!--Container Main end-->

</body>
</html>