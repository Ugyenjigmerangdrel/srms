<?php

include($ROOTPATH.'/app/database/db.php');
include($ROOTPATH.'/app/helpers/validateStudent.php');
$table = "student";

$error = array();

$subjects = selectAll($table);
$id= '';
$name = "";
$dob = "";
$email = "";
$code = "";
$codew_status = "";

$p = '';
$p_status = '';

if(isset($_GET['del_id'])){
    $id = $_GET['del_id'];
    $count = delete($table, $id);
    $_SESSION['message'] = "Suject Deleted Successfully";
    header('location:'. $BASE_URL. "/srms/student_list.php");
    exit();
}

if(isset($_GET['student_id'])){
    $id = $_GET['student_id'];
    $user = selectOne($table, ['id' => $id]);
    $id = $user['id'];
    $name = $user['name'];
    $email = $user['email'];
    $code = $user['index_number'];
    $dob = $user['dob'];
} 

if (isset($_POST['add-stu'])){
    unset($_POST['add-stu']);
    //printD($_POST);
    $error = validateStudent($_POST);
    //printD($error);
    if (empty($error)){
        $subject_id = create($table, $_POST);
        //printD($item_id);
        header('location:'.$BASE_URL.'/srms/student_list.php');
    } else {
        $p = $error;
        $p_status = 'is-invalid';
        $name = $_POST['name'];
        $dob = $_POST['dob'];
        $email = $_POST['email'];
        
    }

}



if(isset($_POST['update_stu'])){
    //$error = validateStudent($_POST);
   
    if (count($error) === 0){
        
        $id = $_POST['id'];
        
        unset($_POST['update_stu'], $_POST['id']);
        //printD($_POST);
        
        $user_id = update($table, $id, $_POST);
        $_SESSION['message'] = "User Updated Successfully";
        header('location:'. $BASE_URL. "/srms/student_list.php");
    } else{
        
    }

   
}
