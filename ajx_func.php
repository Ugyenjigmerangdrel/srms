<?php
include('path.php');
include($ROOTPATH.'/app/database/db.php');


$q = $_REQUEST["q"];

$code = "";

// lookup all codes from array if $q is different from ""
if ($q !== "") {
  $result = selectOne('student', ['name' => $q]);
  echo $result['index_number'];
}

// Output "no suggestion" if no code was found or output correct values
//echo $code === $code;