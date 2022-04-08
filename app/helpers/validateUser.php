<?php

function validateUser($user){

    if ($user['password_conf'] !== $user['password']){
        $pa_con = 'Password doesnt match';
    
    } else{
        $pa_con = '';
    }

    $existingUser = selectOne('r_users', ['email' => $user['email']]);

    if ($existingUser) {
       
        if (isset($user['register-btn'])) {
            $n_err = 'User Already Exists';
           
        } 
        
    } else{
        $n_err = '';
    }

    return [$n_err, $pa_con];
}



function validateLogin($user){
    $errors = array();

    if (empty($user['email'])){
        array_push($errors, 'Email Required');
       
    }

    if (empty($user['password'])){
        array_push($errors, 'Password Required');
       
    }

    return $errors;
}

