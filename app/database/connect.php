<?php 

$host = "localhost";
$user = "root";
$pass = "";
$db_name = "srms";

$conn = new mysqli($host, $user, $pass, $db_name);

if ($conn -> connect_errno){
    echo "Database connection failed";
} else{
    //echo "Database connection successful";
}