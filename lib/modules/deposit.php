<?php
include_once '../config/db.php';
include_once "script.php";

//instantiate database object
$database = new Database;
$db = $database->connect();

//instantiate user object
$user  = new User($db);

 if(isset($_POST['deposit'])){
     $post = filter_var_array($_POST,FILTER_SANITIZE_STRING);
     $user->amount = $post['real_amount'];
     $user->plan = $post['p'];


     $_SESSION['amount'] = $user->amount;
     $_SESSION['plan'] = $user->plan;

   
     echo $user->deposit();
    
 }

?>