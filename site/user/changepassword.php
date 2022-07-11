<!DOCTYPE html>

<html>

<head>

    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">


    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Reset Password - elitsOption</title>

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

    <!-- google font -->

    <link href="../../fonts.googleapis.com/css91d4.css?family=Poppins:300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <link href="../../fonts.googleapis.com/cssd172.css?family=Crete+Round:400,400i&amp;subset=latin-ext" rel="stylesheet">

  

</head>

<body style="background-color:grey!important">

    <!-- header end --> 

    <div class="login login-4">

        <div class="container">

            <div class="row justify-content-center">

                <div class="col-xl-5 col-lg-5">

                    <div class="part-form  mb-3">

                        <h3 class="login-title">Change your password </h3>



                        <form action="../../lib/modules/passchange.php" class="" id="loginform" method="post" accept-charset="utf-8">

                            <input type="text" name="pass" placeholder='enter new password' required>

                    

                            <input type="hidden" name="hidden" value="<?php echo isset($_GET['list_data']) ? $_GET['list_data']  :"" ?> ">

                            <button type="submit" name="btn-fpassword">change password</button>

                        </form>

                    </div>

                </div>

            </div>

        </div>

    </div>

   

</body>



</html> 