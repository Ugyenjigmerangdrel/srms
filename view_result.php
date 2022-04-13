<?php 
$result_status = "active";
include('path.php');

include($ROOTPATH . '/app/controllers/result.php');

if($single_data['percentage'] >= 45){
    $pass_status = "Pass";
    $pass_class = "bg-success";
} else{
    $pass_status = "Fail";
    $pass_class = "bg-danger";
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

    <script src="assets/js/sidenav.js"></script>
    <title>Result Management System</title>
</head>
<body id="body-pd">
<?php include("lender/sidebar.php"); ?>
<!--Container Main start-->
<div class="height-100 ">
    <br>
    <h5 class="text-uppercase "><b>Result Display</b></h5>
    <br>
    <div class="table-responsive col-lg-6">
    <table class="table table-bordered border-dark table-hover">
        <thead>
        <tr class="bg-primary text-white">
        <th class="" colspan='2'>Student Details</th>
            
        </tr>
        
        </thead>
        
        <tbody>
            <tr>
                <th>Name:</th>
                <td><?php echo $s_name ?></td>
                
            </tr>
            <tr>
                <th>Student Code:</th>
                <td><?php echo $s_code ?></td> 
            </tr>
            <tr>
                <th>Class:</th>
                <td><?php echo $single_data['class'] ?></td> 
            </tr>
            
        </tbody>
        <thead>
        <tr class="bg-info text-white">
        <th class="" colspan='2'>Scores</th>
        </tr>
        </thead>
        <tbody>
        <?php foreach($datas as $data): ?>
            <tr>
                <th><?php echo $data['subject'] ?></th>
                <td><?php echo $data['marks'] ?></td>
            </tr>
        <?php endforeach; ?>
        
        </tbody>
        <thead>
        <tr class="">
            <th>Percentage</th>
            <td><?php echo $single_data['percentage'] ?>%</td>
        </tr>
        <tr class="<?php echo $pass_class ?> text-white">
            <th>Status</th>
            <td><?php echo $pass_status ?></td>
        </tr>
        </thead>
    </table>
    </div>
    <br>
    <div class="col-lg-6">
    <a href="result_list.php" class="btn btn-primary form-control">Return Back</a>
    </div>
</div>

<!--Container Main end-->

</body>
</html>