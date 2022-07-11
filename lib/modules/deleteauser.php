<?php
include_once '../config/db.php';
include_once "script.php";

//instantiate database object
$database = new Database;
$db = $database->connect();

//instantiate user object
$user  = new User($db);

 if(isset($_POST['manageRecode'])){
     echo $user->deleteAUser($_POST['pageno']);
 }

 if(isset($_POST['trans'])){
     echo $user->transfer($_POST['amount']);
 }
  if(isset($_POST['gebalance'])){
     echo $user->checkBalance();
 }

 if(isset($_POST['deletePay'])){ // delete payment proof
     echo $user->deleteUp($_POST['pageno']);
 }
  if(isset($_POST['banuser'])){ // ban a user
     echo $user->banUnban('ban',$_POST['pageno']);
 }
if(isset($_POST['Unbanuser'])){ // ban a user
     echo $user->banUnban('unban',$_POST['pageno']);
 }
 if(isset($_POST['dele'])){ // ban a user
     echo $user->deleteTrans('withdrawal',$_POST['pageno']);
 }





