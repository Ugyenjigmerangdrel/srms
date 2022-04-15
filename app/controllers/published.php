<?php

include($ROOTPATH.'/app/database/db.php');

$table = 'result_publish';
$total_students = '';

if (isset($_GET['config_id'])){
    $publish = selectOne($table, ['id' => $_GET['config_id']]);
    $no = $publish['total_students'];
}

if (isset($_GET['publish'])){
    $publish = selectAll($table);
    $data = $publish[0];
    //printD($data);
    $_POST['published'] = $_GET['publish'];
    $user_id = update($table, $data['id'], $_POST);
 
    header('location:'. $BASE_URL. "result_list.php");
}

if (isset($_POST['add-btn'])){
    unset($_POST['add-btn']);
    //printD($_POST);
    $_POST['published'] = 0;
    $publish = create($table, $_POST);
    //printD($item_id);
    header('location:'.$BASE_URL.'student_list.php');

}



if(isset($_POST['upt-btn'])){
    //$error = validateStudent($_POST);
   
    if (count($error) === 0){
        
        $id = $_POST['id'];
        
        unset($_POST['upt-btn'], $_POST['id']);
        //printD($_POST);
        
        $user_id = update($table, $id, $_POST);
 
        header('location:'. $BASE_URL. "result_list.php");
    } else{
        
    }

   
}


