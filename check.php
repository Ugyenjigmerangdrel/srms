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




$p = url_encode('hello');
echo $p;

echo "<br>".url_decode($p);


<?php foreach ($records as $key => $mem): ?>
    <tr>
        <td><?php echo $key + 1; ?></td>
        <td><?php echo $mem['student_name']; ?></td>
        <td><?php echo $mem['class']; ?></td>
        <td><?php echo $mem['student_code']; ?></td>
        <td><?php echo $mem['percentage']; ?></td>
        <td><a href="view_result.php?student_id=<?php echo $mem['student_code']; ?>" class="p-2 btn-info text-white">View</a> <a href="edit_result.php?student_id=<?php echo $mem['student_code']; ?>" class="p-2 btn-primary ">Edit</a>  <a href="?del_s_code=<?php echo $mem['student_code']; ?>" class="p-2 btn-danger ">Remove</a>  </td>

    </tr>
<?php endforeach; ?>