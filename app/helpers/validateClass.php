<?php

function validateClass($class){

    $existingClass= selectOne('classes', ['number_name' => $class['number_name']]);

    if ($existingClass) {
       
        $n_err = 'Class Already Exists';
        
    } else{
        $n_err = '';
    }

    return $n_err;
}

