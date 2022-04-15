<?php
include('path.php');
include($ROOTPATH.'/app/database/db.php');
adminOnly();

if ($_SESSION['role'] == 'Superadmin'){
    $records = selectAll('result_record');
} else{
    $records = selectAll('result_record', ['class' => $_SESSION['class_assigned']]);
}

foreach ($records as $key => $mem): ?>
    <tr>
        <td><?php echo $key + 1; ?></td>
        <td><?php echo $mem['student_name']; ?></td>
        <td><?php echo $mem['class']; ?></td>
        <td><?php echo $mem['student_code']; ?></td>
        <td><?php echo $mem['percentage']; ?></td>
        <td><a href="view_result.php?student_id=<?php echo $mem['student_code']; ?>" class="p-2 btn-info text-white">View</a> <a href="edit_result.php?student_id=<?php echo $mem['student_code']; ?>" class="p-2 btn-primary ">Edit</a>  <a href="?del_s_code=<?php echo $mem['student_code']; ?>" class="p-2 btn-danger ">Remove</a>  </td>

    </tr>

<?php endforeach; ?>





// Output "no suggestion" if no code was found or output correct values
//echo $code === $code;