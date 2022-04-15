<?php

include($ROOTPATH.'/app/database/db.php');
include($ROOTPATH.'/app/helpers/validateUser.php');

$errors = array();

$name = '';
$email = '';
$password = '';
$contact = '';
$class_assigned = '';
$role = '';
$email_status = "";
$password_status = "";
$table = 'r_users';
$psm = "";
$esm = "";
$p = ['',''];

if(isset($_GET['del_id'])){
    $id = $_GET['del_id'];
    $count = delete($table, $id);
    $_SESSION['message'] = "User Deleted Successfully";
    header('location:'. $BASE_URL. "/srms/user_edit.php");
    exit();
}

if(isset($_GET['user_id'])){
    $id = $_GET['user_id'];
    $user = selectOne($table, ['id' => $id]);
    $id = $user['id'];
    $name = $user['name'];
    $email = $user['email'];
    $role = $user['role'];
    $class_assigned = $user['class_assigned'];
    $contact = $user['contact'];
    $password = $user['password'];
} 

function loginUser($user){
    $_SESSION['id'] = $user['id'];
    $_SESSION['name'] = $user['name'];
    $_SESSION['role'] = $user['role'];
    $_SESSION['class_assigned'] = $user['class_assigned'];
    $_SESSION['message'] = 'Sucessfully Logged In';
    $_SESSION['type'] = 'success';
    header('location:'. $BASE_URL. 'dashboard.php');
    exit();
}

if (isset($_POST['register-btn'])){

    //printD($_POST);
    $errors = validateUser($_POST);
    
    if ($errors[0] == '' and $errors[1] == ''){
        unset($_POST['register-btn'], $_POST['password_conf']);
        
       
        $_POST['password'] = password_hash($_POST['password'], PASSWORD_DEFAULT);
        
        $user_id = create($table, $_POST);
        header('location:'. $BASE_URL. 'user_edit.php');
       
       

    } else{
        $p = $errors;
        
        $name = $_POST['name'];
        $email = $_POST['email'];
        $role = $_POST['role'];
        $contact = $_POST['contact'];
        $class_assigned = $_POST['class_assigned'];
       
    }
}

if (isset($_POST['login'])) {
    //printD($_POST);
    $errors = validateLogin($_POST);

    if (count($errors) === 0){
        $user = selectOne($table, ['email' => $_POST['email']]);

        if ($user && password_verify($_POST['password'], $user['password'])){
            //login and redirect
            
            loginUser($user);
        } else{
            array_push($errors, 'Wrong Credientials');
            $email = $_POST['email'];
            $password = '';
            $password_status = "is-invalid";
            $psm = "Wrong Credientials";
        }
    } 
} 

if(isset($_POST['update-btn'])){
    //$errors = validateUserUpdate($_POST);
   
    if (count($errors) === 0){
        
        $id = $_POST['id'];
        
        unset($_POST['update-btn'], $_POST['id']);
        //$_POST['password'] = $password;
        $user_id = update($table, $id, $_POST);
        $_SESSION['message'] = "User Updated Successfully";
        header('location:'. $BASE_URL. "user_edit.php");
    } else{
        $p = $errors;
        
        $name = $_POST['name'];
        $email = $_POST['email'];
        $role = $_POST['role'];
        $contact = $_POST['contact'];
        $class_assigned = $_POST['class_assigned'];
        header('location:'. $BASE_URL. "edit_user.php?user_id=" . $id);
    }

   
}

