<?php

function validateStudent($user){
    
    $existingUser = selectOne('student', ['index_number' => $user['index_number']]);

    if ($existingUser) {
        $n_err = 'Student with this code Already Exists';
        
    } else{
        $n_err = '';
    }

    return $n_err;
}