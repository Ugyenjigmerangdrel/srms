<?php

include($ROOTPATH.'/app/database/db.php');
include($ROOTPATH.'/app/helpers/validateResult.php');

$errors = array();

$s_name = '';
$s_code = '';
$s_marks = '';
$supw = '';
$table = 'result';
if(isset($_GET['del_id'])){
    $id = $_GET['del_id'];
    $count = delete($table, $id);
    $_SESSION['message'] = "Suject Deleted Successfully";
    header('location:'. $BASE_URL. "student_list.php");
    exit();
}

if(isset($_GET['del_s_code'])){
    $stu_code = $_GET['del_s_code'];
    $count = deleteResult($table, $stu_code);
    $count2 = deleteResult('result_record', $stu_code);
    $_SESSION['message'] = "Result Deleted Successfully";
    header('location:'. $BASE_URL. "result_list.php");
    exit();
}

if(isset($_GET['student_id'])){
    $s_code = $_GET['student_id'];
    $datas = selectAll($table, ['student_code' => $s_code]);
    //printD($user);
    $single_data = selectOne('result_record', ['student_code' => $s_code]);
    $s_name = $single_data['student_name']; 
    $supw = $single_data['supw']; 
} 

if(isset($_POST['submit'])){
    unset($_POST['submit']);
    //printD($_POST);
    $errors = validateResult($_POST);
   if(empty($errors)){
        $s_name = $_POST['s_name'];
        $s_code = $_POST['s_code'];
        $s_subject  = $_POST['subject'];
        $s_marks = $_POST['marks'];
        $supw = $_POST['supw'];
        foreach($s_subject as $i => $subject){
            if (!empty($s_marks[$i])){
                
            }else{
                unset($s_marks[$i], $s_subject[$i]);
            }
        }
        //printD($s_subject);
        $m_sum = array_sum($s_marks);
        $average = $m_sum/count($s_marks);
        //printD($average);
       
        $s_adder = $_SESSION['name'];
        $s_data = selectOne('student', ['index_number' => $s_code]);
        $class = $s_data['class'];
        $s_name = $s_data['name'];
        foreach($s_subject as $index => $subject){
            global $conn;
            $sub_name = $subject;
            $marks = $s_marks[$index];

            
            //echo $subject." ".$class."".$marks."<br>";

            $query = "INSERT INTO result (student_code, class, subject, marks, added_by) VALUES ('$s_code','$class', '$subject', '$marks', '$s_adder');";

            //printD($query);

            $query_run = mysqli_query($conn, $query); 
        }

        $r_query = "INSERT INTO result_record (student_code, percentage, class, student_name, supw) VALUES ('$s_code', '$average', '$class', '$s_name', '$supw');";
        //printD($r_query);
        $r_ex = mysqli_query($conn, $r_query);
        
        if($query_run && $r_ex)
        {
            $_SESSION['status'] = "Result Inserted Successfully";
            header("Location: result_list.php");
            exit(0);
        }
        else
        {
            $_SESSION['status'] = "Result Not Inserted";
            header("Location: result_list.php");
            exit(0);
        }
   } else {
    $p = $errors;
    $p_status = 'is-invalid';
   }
}

if(isset($_POST['update-result'])){

    unset($_POST['update-result']);
    //printD($_POST);
    $s_name = $_POST['s_name'];
    $s_code = $_POST['s_code'];
    $s_subject  = $_POST['subject'];
    $s_marks = $_POST['marks'];
    $supw = $_POST['supw'];
    
    $m_sum = array_sum($s_marks);
    $average = $m_sum/count($s_marks);
    //printD($average);
    
    $s_adder = $_SESSION['name'];
    $s_data = selectOne('student', ['index_number' => $s_code]);
    $class = $s_data['class'];
    $s_name = $s_data['name'];
    foreach($s_subject as $index => $subject){
        global $conn;
        $sub_name = $subject;
        $marks = $s_marks[$index];

        
        //echo $subject." ".$class."".$marks."<br>";

        $query = "UPDATE result SET marks='$marks' WHERE student_code=$s_code AND subject='$subject'";
        
        //printD($query);
        $query_run = mysqli_query($conn, $query); 
    }

    $r_query = "UPDATE result_record SET percentage='$average', supw='$supw' WHERE student_code=$s_code";

    //printD($r_query);

    $r_ex = mysqli_query($conn, $r_query);
    
    if($query_run && $r_ex)
    {
        $_SESSION['status'] = "Result Updated Successfully";
        header("Location: result_list.php");
        exit(0);
    }
    else
    {
        $_SESSION['status'] = "Result Not Updated";
        header("Location: result_list.php");
        exit(0);
    }
}

if(isset($_GET['disp'])){
    //printD($_GET['disp']);
    $records = dispSort(['result_record', 'percentage', 'DESC'], ['class' => $_GET['disp']]);
} else{
    
    if ($_SESSION['role'] == 'Superadmin'){
        $records = dispSort(['result_record', 'percentage', 'DESC']);
        
    } else{
        $records = dispSort(['result_record', 'percentage', 'DESC'], ['class' => $_SESSION['class_assigned']]);
    }

}
