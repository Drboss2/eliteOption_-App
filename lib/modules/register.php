<?php
     include_once "../config/db.php";
     include_once "script.php";
    
    //instantiate database object
    $database = new Database();
    $db = $database->connect();
    
    //instantiate user object
    $user = new User($db);

    $post = filter_var_array($_POST,FILTER_SANITIZE_STRING);
    $user->fullname =  $post['fullname'];
    $user->username =  $post['username'];
    echo $user->email =  $post['email'];
    $password =  $post['password'];
    $user->password = password_hash($password,PASSWORD_DEFAULT,['cost'=>8]);
    $repeat_pass = $post['repeat_password'];

    $date = new DateTime();
    $user->date = $date->format("Y:m:d:H:m:s:A");

    if(!filter_var($user->email,FILTER_VALIDATE_EMAIL)){
        die("invalid email address");
    }elseif($password != $repeat_pass){
        die("password not match");
    }elseif($user->userNameExist($user->username)){
        die("username already exist");
    }elseif($user->emailExist($user->email)){
        die("emaill already exist");
    }else{
        $user->createAccount();
        //  $user->SendMail($user->email,$user->email,$password);
            header("location:".DOMIAN."login.php?success=true");
        }
    




?>