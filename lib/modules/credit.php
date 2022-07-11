<?php
include_once '../config/db.php';
include_once "script.php";

//instantiate database object
$database = new Database;
$db = $database->connect();

//instantiate user object
$user  = new User($db);

 if(isset($_POST['credit'])){
     $post = filter_var_array($_POST,FILTER_SANITIZE_STRING);
     $user->amount = $post['amount'];
     $user->username = $post['username'];

     echo $user->topUp($user->amount,$user->username);
    //       header("location:dashboard.php?pay");
    //  }
 }

