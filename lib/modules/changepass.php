<?php
 include_once "../config/db.php";
 include_once "script.php";

 // instantiate database
 $database = new Database();
 $db = $database->connect();

 //instantiate user object
 $user = new User($db);

if(isset($_POST['update-password'])){
     $post = filter_var_array($_POST,FILTER_SANITIZE_STRING);

     $user->password = $post['new_password'];
     $hash = password_hash($user->password,PASSWORD_DEFAULT,['cost'=>8]);

     if(!empty($user->password)){
         $user->editOneColumn('user','password',$hash);
         header("location:".DOMIAN."dashboard.php?dashboard=passchange");
    }
}

?>