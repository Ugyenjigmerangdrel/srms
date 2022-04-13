<?php

function validateResult($result){

    $existingResult = selectOne('result_record', ['student_id' => $result['s_code']]);

    if ($existingResult) {
        $n_err = 'Result Already Exists';
    } else{
        $n_err = '';
    }

    return $n_err;
}