<?php 
$student_status = "active";
include('path.php');

include($ROOTPATH . '/app/controllers/student.php');
adminOnly();


if ($_SESSION['role'] == 'Superadmin'){
    $classes = dispSort(['student', 'name', 'asc']);
} else{
    $classes = dispSort(['student', 'name', 'asc'], ['class' => $_SESSION['class_assigned']]);
}

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
                    <div class="card-body ">
                        <h5 class="">Manage Student</h5>
                        <div class="row">
                            <div class="col-lg-9">
                            <p class="card-description">Details of student</p>
                            </div>
                            <div class="col-lg-3">
                                <a href="add_student.php" class="btn-success p-2">+ Add Student</a>
                            </div>
                        </div>
                        <div class="table-responsive">
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th>Sl.No</th>
                                        <th>Name</th>
                                        <th>Student Code</th>
                                        <th>Date of Birth</th>                                    
                                        <th>Email</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php foreach ($classes as $key => $mem): ?>
                                    <tr>
                                        <td><?php echo $key + 1; ?></td>
                                        <td><?php echo $mem['name']; ?></td>
                                        <td><?php echo $mem['index_number']; ?></td>
                                        <td><?php echo $mem['dob']; ?></td>
                                        <td><?php echo $mem['email']; ?></td>
                                        <td><a href="edit_student.php?student_id=<?php echo $mem['id']; ?>" class="p-2 btn-primary text-white">Edit</a> <a href="?del_id=<?php echo $mem['id']; ?>" class="p-2 btn-danger ">Remove</a>  </td>

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