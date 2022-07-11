<?php
 include_once "../../lib/config/db.php";
 include_once "../../lib/modules/script.php";

 // instantiate database
 $database = new Database();
 $db = $database->connect();

 //instantiate user object
 $user = new User($db);

if(isset($_POST['btn_login'])){
    $post = filter_var_array($_POST,FILTER_SANITIZE_STRING);

    $user->email =  $post['email'];
    $user->password =  $post['pass'];

    if(empty($user->email || $user->password)){
        $error = "email or password is required";
    }elseif($user->login() === "not"){
        $error ="No user found";
    }elseif($user->login() === true){
        header("location:".DOMIAN."dashboard.php?dashboard=login");
    }else{
        $error = "Invalid password";
    }

}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - elitption</title>
    <!-- favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="../assets/img/favicon.png" />
    <!-- bootstrap -->
    <link rel="stylesheet" href="../assets/css/bootstrap.min.css">
    <!-- fontawesome icon  -->
    <link rel="stylesheet" href="../assets/css/fontawesome.min.css">
    <!-- flaticon css -->
    <link rel="stylesheet" href="../assets/fonts/flaticon.css">
    <!-- animate.css -->
    <link rel="stylesheet" href="../assets/css/animate.css">
    <!-- Owl Carousel -->
    <link rel="stylesheet" href="../assets/css/owl.carousel.min.css">
    <link rel="stylesheet" href="ahttps://user.investios.net/ssets/css/swiper.min.css">
    <!-- magnific popup -->
    <link rel="stylesheet" href="../assets/css/magnific-popup.css">
    <!-- stylesheet -->
    <link rel="stylesheet" href="../assets/css/style9e36.css?v">
    <!-- responsive -->
    <link rel="stylesheet" href="../assets/css/responsive.css">
  
</head>
<body>
   

    <!-- header begin-->
    <!-- header end -->
    <div class="login login-4">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xl-5 col-lg-5">
                    <div class="part-form  mb-3">
                        <?php
                            if(isset($_GET['success'])){
                                echo "<p class='alert alert-success'>Registration successful you can now login!</p>";
                            }
                            if(isset($error)){
                                echo "<p class='alert alert-danger'>$error</p>";

                            }
                        ?>
                        <h3 class="login-title">Login to your account</h3>
                        <form action="" class="" id="loginform" method="post" accept-charset="utf-8">
                            <input type="email" name="email" placeholder="your e-mail here" required="">
                            <input type="password" name="pass" placeholder="your password here" required="">
                            <button type="submit" name="btn_login">Login Now</button>
                        </form>
                        <span class="forget-password">Forgot Your Password?<a href="reset_password.php">Reset Now</a></span>
                        <div id="social-login">
                            <div class="d-flex align-items-center my-4">
                              <hr class="flex-grow-1">
                              <span class="mx-2">OR</span>
                              <hr class="flex-grow-1">
                          </div>
                          <div class="row">
                            <div class="col-12">
                                <button onclick="location.href='register.php'" type="button" class="btn btn-block btn-outline-success"><i class="fa fa-user"></i> Register your account</button>
                            </div>
                            
                            <p>go back home <a class='btn btn-danger mt-3 btn-sm' href="https://elitsoption.com/index.html"> Here</a></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
  </div>
   
    <!-- footer end -->
    
    <!-- jquery -->
    <script src="../assets/js/jquery-3.3.1.min.js"></script>
    <script src="../assets/js/jquery-migrate-3.0.1.js"></script>
    <!-- bootstrap -->
    <script src="../assets/js/bootstrap.min.js"></script>
    <!-- owl carousel -->
    <script src="../assets/js/owl.carousel.js"></script>

    <!-- magnific popup -->
    <script src="../assets/js/jquery.magnific-popup.js"></script>
    <!-- counter up js -->
    <script src="../assets/js/jquery.counterup.min.js"></script>
    <!-- way poin js-->
    <script src="../assets/js/waypoints.min.js"></script>
    <!-- wow js-->
    <script src="../assets/js/wow.min.js"></script>
    <!-- main -->
    <script src="../assets/js/main.js"></script>
     <script src="../assets/js/main2.js"></script>
     <!-- others -->
    <script src="../assets/lib/popper/popper.min.js"></script>
    <script src="../assets/lib/easing/easing.min.js"></script>
    <script src="../assets/lib/scrollreveal/scrollreveal.min.js"></script>
    <!-- init -->
    <script>
        jQuery(window).load(function(){
            jQuery("#animation-slide").owlCarousel({
                items: 1,
                loop: true,
                autoplay: true,
                dots: true,
                nav: true,
                autoplayTimeout: 7000,
                navText: ["<i class='fa fa-angle-left'></i>", "<i class='fa fa-angle-right'></i>"],
                animateIn: "zoomIn",
                animateOut: "fadeOutDown",
                autoplayHoverPause: false,
                touchDrag: true,
                mouseDrag: true
            });
            jQuery("#animation-slide").on("translate.owl.carousel", function () {
                jQuery(this).find(".owl-item .slide-text > *").removeClass("fadeInUp animated").css("opacity","0");
                jQuery(this).find(".owl-item .slide-img").removeClass("fadeInRight animated").css("opacity","0");
            });          
            jQuery("#animation-slide").on("translated.owl.carousel", function () {
                jQuery(this).find(".owl-item.active .slide-text > *").addClass("fadeInUp animated").css("opacity","1");
                jQuery(this).find(".owl-item.active .slide-img").addClass("fadeInRight animated").css("opacity","1");
            });
        });
    </script>
       
</body>
</html> 