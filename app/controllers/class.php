<?php

include($ROOTPATH.'/app/database/db.php');
include($ROOTPATH.'/app/helpers/validateClass.php');
$table = "classes";

$error = array();

$classes = selectAll($table);

$class_name = "";
$number_name = "";
$section = "";
$stream = "";
$p = '';


if(isset($_GET['del_id'])){
    $id = $_GET['del_id'];
    $count = delete($table, $id);
    $_SESSION['message'] = "User Deleted Successfully";
    header('location:'. $BASE_URL. "/srms/classes_list.php");
    exit();
}

if (isset($_POST['add-btn'])){
    unset($_POST['add-btn']);
    //printD($_POST);
    //$error = validateClass($_POST);
    //printD($error);
    if (empty($error)){
        $_POST['class_comb'] = $_POST['number_name']." ".$_POST['section'];
        //printD($_POST);

        $class_id = create($table, $_POST);
        //printD($item_id);
        header('location:'.$BASE_URL.'/srms/classes_list.php');
    } else {
        //$p = $error;
        $class_name = $_POST['class_name'];
        $number_name = $_POST['number_name'];
        $section = $_POST['section'];
        $stream = $_POST['stream'];
    }

}
