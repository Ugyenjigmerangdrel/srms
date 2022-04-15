<?php
include("path.php");

session_start();
unset($_SESSION['id']);
unset($_SESSION['name']);
unset($_SESSION['role']);
unset($_SESSION['class_assigned']);
unset($_SESSION['message']);
unset($_SESSION['type']);
session_destroy();

header('location:'. $BASE_URL .'admin_login.php');


