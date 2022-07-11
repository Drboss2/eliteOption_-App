<?php
include_once '../config/db.php';
include_once "script.php";

//instantiate database object
$database = new Database;
$db = $database->connect();

//instantiate user object
$user  = new User($db);

 if(isset($_POST['del'])){
     echo $user->deleteTrans('deposit',$_POST['data']);
 }
 
 if(isset($_POST['app'])){
     echo $user-> approveTrans($_POST['data']);
 }

