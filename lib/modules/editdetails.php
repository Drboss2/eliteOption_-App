<?php
 include_once "../config/db.php";
 include_once "script.php";

 // instantiate database
 $database = new Database();
 $db = $database->connect();

 //instantiate user object
 $user = new User($db);

 if(isset($_POST['update-account'])){
     $post = filter_var_array($_POST,FILTER_SANITIZE_STRING);

     $name = $post['fullname'];

     if(!empty($name)){
         $user->editOneColumn('user','name',$name);
         header("location:".DOMIAN."dashboard.php?dashboard=edit");
    }

}


?>