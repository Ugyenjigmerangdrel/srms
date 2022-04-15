<?php

include($ROOTPATH.'/app/database/db.php');
include($ROOTPATH.'/app/helpers/validateResult.php');

$code = '';
$date = '';
$errors = array();
if(isset($_POST['submit'])){
    //printD($_POST);
    //$errors = validateCode($_POST);

    if (count($errors) === 0){
        $user = selectOne('student', ['index_number' => $_POST['student_code'], 'dob' => $_POST['dob']]);

        if ($user){
            //login and redirect
            //printD($user);
            header('location:'. $BASE_URL. "check_result.php?student_code=".url_encode($user['index_number']));
        } else{
            
            $p_stat = 'is-invalid';
            $psm = 'Check Your Credientials';
        }
    }
}

if(isset($_GET['student_code'])){
    $code = url_decode($_GET['student_code']);
    $datas = dispSort(['result', 'subject', 'asc'], ['student_code' => $code]);
    //printD($result);
    $per = selectOne('result_record', ['student_code' => $code]);
    
}