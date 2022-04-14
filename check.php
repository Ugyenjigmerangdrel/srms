<?php 
include('path.php');
include($ROOTPATH.'/app/database/db.php');
superadminOnly();
/**
$data = ['name' => 'hello', 'class' => '12 A', 'student_code' => '222332324', 'subject'=>['math(elective)','cs'],'marks' => ['',56]];

$marks = $data['marks'];
//printD($data);

foreach($data['subject'] as $i => $subject){
    if (!empty($marks[$i])){
        print($marks[$i]);
    }else{
        unset($marks[$i]);
    }
}

function checkST($data){
    $sub = $data;

    if(strpos($data, 'Elective') !== false){
        echo "There is elective: ".$data;
    } else if(strpos($data, 'Main') !== false){
        echo "There is Main: ".$data;
    }
}

 * 
 */
//checkST('Mathematics(elective)');


function url_encode($input)

{

return strtr(base64_encode($input), '+/=', '-_,');

}

function url_decode($input)

{

return base64_decode(strtr($input, '-_,', '+/='));

}

$p = url_encode('hello');
echo $p;

echo "<br>".url_decode($p);
