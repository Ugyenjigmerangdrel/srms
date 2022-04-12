<?php

include($ROOTPATH.'/app/database/db.php');

if(isset($_GET['del_id'])){
    $id = $_GET['del_id'];
    $count = delete($table, $id);
    $_SESSION['message'] = "Suject Deleted Successfully";
    header('location:'. $BASE_URL. "/srms/student_list.php");
    exit();
}

if(isset($_POST['submit'])){
    printD($_POST);
}