<?php 
include('path.php');

include($ROOTPATH . '/app/controllers/std_front.php');

$publish = selectAll('result_publish');

if ($publish[0]['published'] == 0){
    header('location:'. $BASE_URL. "systemNotice.php");
} else{
   
}

$result_data = selectAll('result', ['student_code' => $per['student_code']]);
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
    <link rel="stylesheet" href="assets/css/landing.css">

    <script src="assets/js/landing.js"></script>
    <title>Result Management System</title>
</head>
<body>

<!--Container Main start-->
<div class="container">
    <div class="col-lg-5 col-md-8 col-sm-12 m-auto mt-4">
        <div class="card">
        <div class="card-header">
            <div class="image row">
                <div class="col-lg-2 col-md-2 col-sm-12 mt-3 text-center">
                <img src="https://www.drukjeganghss.bt/assets/img/logo.png" alt="" width="60" height="60">
                </div>
                <div class="col-lg-10 col-md-10 col-sm-12 mt-3">
                <h6 class="text-uppercase text-center">Drukjegang Higher Secondary School</h6>
                <p class="text-uppercase text-center">Examination Result</p>
                </div>
            </div>
            <br>
            
            </div>
                
            <div class="card-body">
                <p class="text-uppercase">
                    Result For: <b><?php echo $per['student_name']; ?></b>
                    <br>
                    Student Code: <b><?php echo $per['student_code']; ?></b>
                    <br>
                    Class: <b><?php echo $per['class']; ?></b>
                </p>
                <hr>
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
                        <td class='bg-light text-center'><?php echo $per['percentage']; ?>%</td>
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
                <div class="col-lg-12">
                    <a href="download_result.php?student_code=<?php echo url_encode($per['student_code']) ?>" class="btn btn-primary form-control">Download Result</a>
                </div>
                <hr>
                <div class="text-center">
                <a href="https://www.drukjeganghss.bt" >www.drukjeganghss.bt</a>
                </div>
                </div>
            </div>
        </div>
    </div>
</div>





<!--Container Main end-->

</body>
</html>