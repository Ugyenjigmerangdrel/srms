<?php

include($ROOTPATH.'/app/database/db.php');

$table = "subject_combo";

$error = array();

$subjects = selectAll($table);

$class = "";
$subject = "";


$p = '';


if(isset($_GET['del_id'])){
    $id = $_GET['del_id'];
    $count = delete($table, $id);
    $_SESSION['message'] = "Suject Deleted Successfully";
    header('location:'. $BASE_URL. "scombo_list.php");
    exit();
}

if (isset($_POST['subject-combo'])){
    unset($_POST['subject-combo']);
    //printD($_POST);
   
    //printD($error);
    if (empty($error)){
        $subject_id = create($table, $_POST);
        //printD($item_id);
        header('location:'.$BASE_URL.'scombo_list.php');
    } else {
        //$p = $error;
        $class = $_POST['class'];
        $subject = $_POST['subject'];
    }

}
