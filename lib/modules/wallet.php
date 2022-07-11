<?php
 include_once "../config/db.php";
 include_once "script.php";

 // instantiate database
 $database = new Database();
 $db = $database->connect();

 //instantiate user object
 $user = new User($db);

 if(isset($_POST['wallet'])){
     $post = filter_var_array($_POST,FILTER_SANITIZE_STRING);

     $bank = $post['bank_info'];
     $btc = $post['btc'];
     $ltc = $post['ltc'];
     $eth = $post['eth'];

    $user->editFourColumn('user','bank','bitcoin','litecoin','etherum',$bank,$btc,$ltc,$eth);
    header("location:".DOMIAN."dashboard.php?dashboard=wallet");

}


?>