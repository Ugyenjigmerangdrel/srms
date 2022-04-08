<?php

include($ROOTPATH.'/app/database/db.php');
include($ROOTPATH.'/app/helpers/validateClass.php');
$table = "subject";

$error = array();

$classes = selectAll($table);

$subject = "";
$subject_type = "";


$p = '';


if(isset($_GET['del_id'])){
    $id = $_GET['del_id'];
    $count = delete($table, $id);
    $_SESSION['message'] = "Suject Deleted Successfully";
    header('location:'. $BASE_URL. "/srms/subject_list.php");
    exit();
}

if (isset($_POST['add-btn'])){
    unset($_POST['add-btn']);
    //printD($_POST);
    //$error = validateClass($_POST);
    //printD($error);
    if (empty($error)){
        $class_id = create($table, $_POST);
        //printD($item_id);
        header('location:'.$BASE_URL.'/srms/classes_list.php');
    } else {
        //$p = $error;
        $class_name = $_POST['class_name'];
        $number_name = $_POST['number_name'];
        $section = $_POST['section'];

    }

}
