<?php 
$result_status = "active";
include('path.php');

include($ROOTPATH . '/app/controllers/result.php');
adminOnly();


$result_data = selectAll('result', ['student_code' => $single_data['student_code']]);
//printD($result_data);
$main = [];
$el = [];
foreach($result_data as $i => $data){
    $subject = selectOne('subject_combo', ['subject' => $data['subject']]);
    //echo $data['subject'];
    $min = $subject['pmin'];
    
    if (strpos($data['subject'], 'Main')){
        if($data['marks'] <= $min){
            array_push($main, "1");
        } else{
            
        }
    } else if(strpos($data['subject'], 'Elective')){
        if($data['marks'] <= $min){
            array_push($el, "1");
        } else{
            
        }
    }

    
}
//echo count($main).' '.count($el);

if (count($main) >= 1 || count($el) >= 2){
    $pass_status = "Fail";
    $pass_class = "bg-danger";
} else{
    $pass_status = "Pass";
    $pass_class = "bg-success";
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
 
<div class="container pt-2">
    <div class="col-lg-6  mt-4">
        <div class="card">
        <div class="card-header">
                    <p class="text-uppercase">
                        Result For: <b><?php echo $s_name ?></b>
                        <br>
                        Student Code: <b><?php echo $s_code ?></b>
                        <br>
                        Class: <b><?php echo $single_data['class'] ?></b>
                    </p>
                </div>
                
            <div class="card-body">
                <h6 class="text-uppercase">Scoresheet</h6>
                <hr>
                <div class="table-responsive">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Subject</th>
                            <th class=" text-center">Scores</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php foreach($datas as $data): ?>
                        <tr>
                            <td><?php echo $data['subject'] ?></td>
                            <td class='bg-light text-center'><?php echo $data['marks'] ?></td>
                        </tr>
                    <?php endforeach; ?>
                    <tr>
                        <td>Percentage</td>
                        <td class='bg-light text-center'><?php echo $single_data['percentage'] ?>%</td>
                    </tr>
                    <tr>
                        <td>Status</td>
                        <td class='<?php echo $pass_class ?> text-white text-center'><?php echo $pass_status ?></td>
                    </tr>
                    <tr>
                        <td>SUPW</td>
                        <td class='bg-light text-center'><?php echo $single_data['supw'] ?></td>
                    </tr>
                    </tbody>
                   
                </table>
                <br>
                <div class="mb-1">
                <a href="download_result.php?student_code=<?php echo url_encode($s_code) ?>" class="btn btn-success form-control">Download</a>
                </div>
               
                <div class="">
                <a href="result_list.php?" class="btn btn-primary form-control">Return Back</a>
                
               
                </div>
                
                
                <hr>
                
                </div>
            </div>
        </div>
    </div>
</div>
</div>

<!--Container Main end-->

</body>
</html>