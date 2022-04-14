<?php 


include($ROOTPATH.'/app/database/db.php');

$class_data = selectAll('student', ['class' => $_SESSION['class_assigned']]);
$users = selectAll('r_users');
$students = selectAll('student');
$user_data = selectOne('r_users', ['id' => $_SESSION['id']]);
$class = selectAll('classes');
$avg_sel = selectAll('result_record', ['class' => $_SESSION['class_assigned']]);
//printD($avg_sel);
$list = [];
foreach($avg_sel as $i => $data){
    array_push($list, $data['percentage']);
}
$avg_final = $list;
if(count($avg_final) == 0){
    $class_avg = 0;
} else{
    $class_avg = round(array_sum($avg_final)/count($avg_sel));
}


function listSub(){
    if (strlen($_SESSION['class_assigned']) > 5){
        $subjects = selectAll('subject_combo', ['class' => substr($_SESSION['class_assigned'], 0, 7)] );
    } else{
        $subjects = selectAll('subject_combo', ['class' => substr($_SESSION['class_assigned'], 0, 2)] );
    }
    //printD($_SESSION['class_assigned']);
    foreach($subjects as $i => $sub){
        echo $sub['subject']." | ";
    }
}
