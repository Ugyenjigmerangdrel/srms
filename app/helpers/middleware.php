<?php

function loggedinUser($redirect = "dashboard.php"){
    if (!empty($_SESSION['id']) || !empty($_SESSION['role'])) {
        header('location:'.$BASE_URL.$redirect);
        exit(0);
    } 
    
}

function superadminOnly($redirect = "dashboard.php"){
    if (empty($_SESSION['id']) || $_SESSION['role'] != 'Superadmin') {
        $_SESSION['message'] = 'You Are Not Authorized';
        header('location:'.$BASE_URL.$redirect);
        printD('location:'.$BASE_URL.$redirect);
        exit(0);
    } 
}

function adminOnly($redirect = "index.php"){
    if (empty($_SESSION['id'])) {
        $_SESSION['message'] = 'You Are Not Authorized';
        header('location:'.$BASE_URL.$redirect);
        printD('location:'.$BASE_URL.$redirect);
        exit(0);
    } 
}

function guestOnly($redirect = 'dashboard.php'){
    if (!empty($_SESSION['id'])) {
        $_SESSION['message'] = 'You Cannot Access';
        header('location:'.$BASE_URL.$redirect);
        exit(0);
    } 
}