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

    $user->email =  $post['hidden'];
    $user->password =  $post['pass'];
    $pass = password_hash($user->password,PASSWORD_DEFAULT);
    $error ="";

    if(empty($user->password)){
        $error = "<p class='text-danger'>password is required</p>";

    }else{
        $user->changePassword($user->email,$pass);
        $error = "<p class='text-success'>Password change successfull <a href='../../site/user/login.php'>Login here</a></p>";

    }

}

?>
<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />

    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reset Password - eliteOption</title>
    <!-- favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="../assets/img/favicon.png" />
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
    <!-- google font -->
    <link href="../../fonts.googleapis.com/css91d4.css?family=Poppins:300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
    <link href="../../fonts.googleapis.com/cssd172.css?family=Crete+Round:400,400i&amp;subset=latin-ext" rel="stylesheet">
  
</head>
<body>
   
    <!-- preloader end -->
    <!-- header end --> 
    <div class="login login-4">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xl-5 col-lg-5">
                    <div class="part-form  mb-3">
                        <?php
                        if(isset($error)){
                            echo $error;
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>