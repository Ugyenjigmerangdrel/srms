<?php 
$user_status = "active";
include('path.php');

include($ROOTPATH . '/app/controllers/users.php');
superadminOnly();
$users_d = selectAll('r_users');
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
                        <h5 class="">User List</h5>
                        <div class="row">
                            <div class="col-lg-10">
                            <p class="card-description">Details of User of the system </p>
                            </div>
                            <div class="col-lg-2">
                                <a href="add_user.php" class="btn-success p-2">+ Add User</a>
                            </div>
                        </div>
                        <div class="table-responsive">
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th>Sl.No</th>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Role</th>
                                        <th>Assigned Class</th>
                                        <th>Contact</th>
                                        <th>Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php foreach ($users_d as $key => $mem): ?>
                                    <tr>
                                        <td><?php echo $key + 1; ?></td>
                                        <td><?php echo $mem['name']; ?></td>
                                        <td><?php echo $mem['email']; ?></td>
                                        <td><?php echo $mem['role']; ?></td>
                                        <td><?php echo $mem['class_assigned']; ?></td>
                                        <td><?php echo $mem['contact']; ?></td>
                                        <td><a href="edit_user.php?user_id=<?php echo $mem['id']; ?>" class="p-2 btn-primary ">Edit</a> <a href="?del_id=<?php echo $mem['id']; ?>" class="p-2 btn-danger">Remove</a> </td>
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