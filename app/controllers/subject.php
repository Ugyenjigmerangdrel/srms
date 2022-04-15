<?php

include($ROOTPATH.'/app/database/db.php');
include($ROOTPATH.'/app/helpers/validateClass.php');
$table = "subject";

$error = array();

$subjects = selectAll($table);

$subject = "";
$subject_type = "";


$p = '';


if(isset($_GET['del_id'])){
    $id = $_GET['del_id'];
    $count = delete($table, $id);
    $_SESSION['message'] = "Suject Deleted Successfully";
    header('location:'. $BASE_URL. "subject_list.php");
    exit();
}

if (isset($_POST['add-subj'])){
    unset($_POST['add-subj']);
    //printD($_POST);
   
    //printD($error);
    if (empty($error)){

        $_POST['s_structure'] = $_POST['subject'].'('.$_POST['subject_type'].')';
        if($_POST['subject_type'] == 'Main'){
            $_POST['status'] = 'required';
        } else{
            $_POST['status'] = '';
        }
        $subject_id = create($table, $_POST);
        //printD($item_id);
        header('location:'.$BASE_URL.'subject_list.php');
    } else {
        //$p = $error;
        $subject = $_POST['subject'];
        $subject_type = $_POST['subject_type'];
    }

}
