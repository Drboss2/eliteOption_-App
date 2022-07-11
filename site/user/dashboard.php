<?php
include "../../lib/config/db.php";
include "../../lib/modules/script.php";

// instantiate database object
$database = new Database();

// instantiate connection method
$db = $database->connect();

//instantiate user object
$user = new User($db);

if(!isset($_SESSION['id'])){
    header("location:../../index.html");
}
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="shortcut icon" type="image/x-icon" href="../assets/img/favicon.png" />

    <title>dashboard</title>
    <!-- font awesome -->
    <link rel="stylesheet" href="../assets/css/icon.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css">
    <!-- Bootstrap 4.0-->
    <link rel="stylesheet" href="../assets/css/bootstrap.min.css">
        
    <!--amcharts -->
    <link href="../assets/css/chart.css" rel="stylesheet" type="text/css" />
    
    <!-- Bootstrap-extend -->
    <link rel="stylesheet" href="../assets/css/extend.css">
    
    <!-- theme style -->
    <link rel="stylesheet" href="../assets/css/admin.css">
    
    <!-- Unique_Admin skins -->
    <link rel="stylesheet" href="../assets/css/skin.css">
    <!-- Select2 -->
    <link rel="stylesheet" href="../assets/css/select2.css">
    <link rel="stylesheet" href="../assets/css/boost4.css">
    <!-- summernote -->
    <link rel="stylesheet" href="../assets/css/summernote.css">
    <style type="text/css">
    .main-header .sidebar-toggle:before {
        content: ""
    }
    @media(max-width: 768px) {
            .breadcrumb {
                display: none;
            }
        }
    </style>
    <script src="//code.jivosite.com/widget/BT6smJxOtz" async></script>
</head>
<body class="hold-transition skin-yellow sidebar-mini">
<div class="wrapper">
    <?php include_once "header/nav.php"?>
    <div class="content-wrapper">
        <section class="content-header">
            <h1>
                Dashboard
                <small>Control panel</small>
            </h1>
            <ol class="breadcrumb">
                <li class="breadcrumb-item active">Dashboard</li>
            </ol>
        </section>
        <!-- Main content -->
        <div class="content">
           <?php
             if(isset($_GET['dashboard'])){
                 include_once 'center/home.php';
             }elseif(isset($_GET['plan'])){
                 include_once "center/invest.php";
             }elseif(isset($_GET['investment_history'])){
                 include_once "center/investment_history.php";
             }elseif(isset($_GET['Deposits_History'])){
                 include_once 'center/deposit_history.php';
             }elseif(isset($_GET['withdraw'])){
                 include_once 'center/withdraw.php';
             }elseif(isset($_GET['referral'])){
                 include_once 'center/referral.php';
             }elseif(isset($_GET['setting'])){
                 include_once 'center/settings.php';
             }elseif(isset($_GET['credit'])){
                 include_once 'center/credit.php';
            }elseif(isset($_GET['pending'])){
                include_once 'center/pending.php';
             }elseif(isset($_GET['pay'])){
               include_once 'center/pay.php';
            }elseif(isset($_GET['online'])){
               include_once 'center/online.php';
            }elseif(isset($_GET['user'])){
                include_once 'center/user.php';
            }elseif(isset($_GET['transfer'])){
                 include_once 'center/transfer.php';
            }elseif(isset($_GET['u'])){
                 include_once 'center/u.php';
            }elseif(isset($_GET['proof'])){
                 include_once 'center/proof.php';
                }elseif(isset($_GET['withdraws'])){
                 include_once 'center/withdraws.php';
             }else{
                 include_once 'center/home.php';
             }
           ?>
        </div>
   </div>
   <?php include_once 'header/footer.php'?>
</div>
<!-- payment modal -->
    <div id="deposit" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="create" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="myModalLabel">Make New Deposit</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                </div>
                <form id="submit" action=""  accept-charset="utf-8" onsubmit="return false">
                <div class="modal-body">
                    <form class="form-horizontal form-material">
                        <div class="form-group col-md-12">
                           <input type="hidden" name="plan" id="plan">
                            <input type="text" placeholder="Enter amount - USD" class="form-control form-control-line" id="amount" name="amount">
                            <span id="error" class='text-danger'></span>
                        </div>
                        <div class="form-group col-md-12">
                            <label>Payment method</label>
                            <select class="form-control form-control-line" name="mode" required>
                                <option value="bitcoin">Bitcoin</option>
                            </select>
                        </div>
                </div>
                    <div class="modal-footer">
                    <!-- <a  class="btn btn-dark btn-rounded waves-effect" href="dashboard.php?pay">PROCCEED</a> -->
                        <button type="submit" class="btn btn-dark btn-rounded waves-effect">PROCEED</button>
                    </div>
                </form>
            </div>
            <!-- /.modal-content --> 
        </div>
        <!-- /.modal-dialog -->
    </div>
    <!-- /.payment modal -->
    <!-- REQUIRED SCRIPTS -->
    <!-- jQuery 3 -->
    <script src="../assets/js/jquery-3.3.1.min.js"></script>
    <!-- popper -->
    <script src="../asset/js/popper.min.js"></script>

      <!-- my js file-->
    <script src="my.js"></script>

    <!-- Bootstrap 4.0-->
    <script src="../assets/js/bootstrap.min.js"></script>

    <!-- SlimScroll -->

    <!-- FastClick -->
    <script src="../assets/fastclick.js"></script>

    <!-- Unique_Admin App -->
    <script src="../assets/js/template.js"></script>

    <!-- Unique_Admin for demo purposes -->
    <script src="../assets/js/demo.js"></script>

    <script src="../assets/js/full.js"></script>

</body>
</html>
