<?php 
$result_status = "active";
include('path.php');

include($ROOTPATH . '/app/controllers/result.php');

adminOnly();


$classes = selectAll('classes');

if ($_SESSION['role'] == 'Superadmin'){
    $fil_stat = "d-block";
    
} else{
    $fil_stat = "d-none";
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
    
    
    <!--The Script for ajx for student data retrieval-->
    <script type="text/javascript">
        function submitForm(){
            document.getElementById('dispForm').submit();
        }
    </script>
</head>
<body id="body-pd">
<?php include("lender/sidebar.php"); ?>
<!--Container Main start-->
<div class="height-100 ">

<div class="card">
        
                    <div class="card-body">
                    
                        <h5 class="">Manage Results</h5>
                        <div class="row">
                            <div class="col-lg-10">
                            <p class="card-description">Details of Classes in the school </p>
                            </div>
                            <div class="col-lg-2">
                                <a href="add_result.php" class="btn-success p-2">+ Add Result</a>
                            </div>
                        </div>
                        <br>
                        <div class="col-lg-4 <?php echo $fil_stat; ?>">
                           <form action="result_list.php" action="post" id="dispForm">
                            <select name="disp" onchange="submitForm()" id="result_class_query" class="form-control ">
                                <option value="">Filter Class</option>
                                <?php foreach ($classes as $key => $mem): ?>
                                <option value="<?php echo $mem['class_comb'] ?>"><?php echo $mem['class_comb'] ?></option>
                                <?php endforeach;?>
                            </select>
                           </form>
                        </div>
                        
                        <div class="table-responsive">
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th>Sl.No</th>
                                        <th>Student Name</th>
                                        <th>Class</th>
                                        <th>Student Code</th>
                                        <th>Percentage</th>
                                        <th>Status</th>
                                        
                                    </tr>
                                </thead>
                                <tbody>
                                <?php foreach ($records as $key => $mem): ?>
                                    <tr>
                                        <td><?php echo $key + 1; ?></td>
                                        <td><?php echo $mem['student_name']; ?></td>
                                        <td><?php echo $mem['class']; ?></td>
                                        <td><?php echo $mem['student_code']; ?></td>
                                        <td><?php echo $mem['percentage']; ?></td>
                                        <td><a href="view_result.php?student_id=<?php echo $mem['student_code']; ?>" class="p-2 btn-info text-white">View</a> <a href="edit_result.php?student_id=<?php echo $mem['student_code']; ?>" class="p-2 btn-primary ">Edit</a>  <a href="?del_s_code=<?php echo $mem['student_code']; ?>" class="p-2 btn-danger ">Remove</a>  </td>

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