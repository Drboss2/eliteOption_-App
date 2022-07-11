<?php

 include_once "../config/db.php";

 include_once "script.php";



 // instantiate database

 $database = new Database();

 $db = $database->connect();



 //instantiate user object

 $user = new User($db);



if(isset($_POST['btn-fpassword'])){

    $post = filter_var_array($_POST,FILTER_SANITIZE_STRING);



   $user->email =  $post['email'];

   $error = "";



   if(!filter_var($user->email,FILTER_VALIDATE_EMAIL)){

       $error = "<p class='text-danger'>invalid email</p>";

   }else{

       $user->resetPassword($user->email);

       $error = "<p class='text-success'>We have email you a verification link to reset your password</p>";

   }



}



?>

<!DOCTYPE html>

<html>

<head>

    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Reset Password - Elitsoption</title>

    <!-- favicon -->

    <link rel="shortcut icon" type="image/x-icon" href="../../site/assets/img/favicon.png" />

    <!-- bootstrap -->

    <link rel="stylesheet" href="../../site/assets/css/bootstrap.min.css">

    <!-- fontawesome icon  -->

    <link rel="stylesheet" href="../../site/assets/css/fontawesome.min.css">

    <!-- flaticon css -->

    <link rel="stylesheet" href="../../site/assets/fonts/flaticon.css">



    <!-- magnific popup -->

    <link rel="stylesheet" href="../../site/assets/css/magnific-popup.css">

    <!-- stylesheet -->

    <link rel="stylesheet" href="../../site/assets/css/style9e36.css?v">

    <!-- responsive -->

    <link rel="stylesheet" href="../../site/assets/css/responsive.css">

</head>

<body>

    <!-- preloader end -->

    <!-- header end --> 

    <div class="login login-4">

        <div class="container">

            <div class="row justify-content-center">

                <div class="col-xl-5 col-lg-6">

                    <div class="part-form  mb-3">

                        <h3 class="login-title">Reset Password </h3>

                        <p class="pb-3"><?php if(isset($error)){ echo $error; }?></p>

                    </div>

                </div>

            </div>

        </div>

    </div>

</body>

</html> 