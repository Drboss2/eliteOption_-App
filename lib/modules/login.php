<?php
 include_once "../config/db.php";
 include_once "script.php";

 // instantiate database
 $database = new Database();
 $db = $database->connect();

 //instantiate user object
 $user = new User($db);

if(isset($_POST['btn_login'])){
    $post = filter_var_array($_POST,FILTER_SANITIZE_STRING);

    $user->email =  $post['email'];
    $user->password =  $post['pass'];

    if(empty($user->email || $user->password)){
        exit("email or password is required");
    }elseif($user->login() === "not"){
        exit("No user found");
    }elseif($user->login() === true){
        header("location:http://elitsoption.com/site/user/dashboard.php?dashboard=login");
    }else{
        exit("Invalid password");
    }

    

}

?>