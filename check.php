<?php
include('path.php');
include($ROOTPATH.'/app/database/db.php');


$marks = selectAll('result', ['student_code' => '101005004']);
//printD($marks);
$main = [];
$el = [];
foreach($marks as $i => $data){
    $subject = selectOne('subject_combo', ['subject' => $data['subject']]);
    //echo $data['subject'];
    $min = $subject['pmin'];
    
    if (strpos($data['subject'], 'Main')){
        if($data['marks'] <= $min){
            array_push($main, "1");
        } else{
            
        }
    } else if(strpos($data['subject'], 'Elective')){
        if($data['marks'] <= $min){
            array_push($el, "1");
        } else{
            
        }
    }

    
}
//echo count($main).' '.count($el);

if (count($main) >= 1 || count($el) >= 2){
    echo "fail";
} else{
    echo "pass";
}