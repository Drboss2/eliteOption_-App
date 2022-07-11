<?php
include_once '../config/db.php';
include_once "script.php";

//instantiate database object
$database = new Database;
$db = $database->connect();

//instantiate user object
$user  = new User($db);

 if(isset($_POST['delete_user'])){
     echo $user->deleteUsers($_POST['data']);
 }




