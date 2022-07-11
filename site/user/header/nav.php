<header class="main-header">

        <!-- Header Navbar -->

    <nav class="navbar navbar-static-top">

        <!-- Sidebar toggle button-->

        <a href="#" class="sidebar-toggle fa fa-bars" data-toggle="push-menu" role="button"><span class="fa fa-bars"></span>

            <span class="sr-only">Toggle navigation</span>

        </a>

        <!-- <div class="navbar-custom-menu">

            <ul class="nav navbar-nav">

            <li class="">

                <a href="#" class="dropdown-toggle" _data-toggle="dropdown">

                </i> &dollar;0 USD</a>

            </li>

            

            <li class="dropdown messages-menu">

                <a href="#" class="dropdown-toggle" data-toggle="dropdown">

                <i class="fa fa-wechat"></i>

                </a>

                <ul class="dropdown-menu scale-up">

                <li class="header">You have 0 new messages</li>

                <li>

         

                    <ul class="menu inner-content-div">

                                        

                    </ul>

                </li>

                <li class="footer"><a href="https://user.investios.net/user/dashboard/message/inbox">See All Messages</a></li>

                </ul>

            </li>

           

            <li class="dropdown user user-menu">

                <a href="#" class="dropdown-toggle" data-toggle="dropdown">

                <i class="mdi mdi-account"></i>

                </a>

                <ul class="dropdown-menu scale-up">



                <li class="user-header">



                    <i class="float-left text-warning rounded-circle fa fa-user fa-4x"></i>



                    <p>

                    kate<small class="mb-5">agentcor1@gmail.com</small>

                    <a href="https://user.investios.net/user/dashboard/myaccount" class="btn btn-success btn-sm btn-rounded">View Profile</a>

                    </p>

                </li>

                <li class="user-body">

                    <div class="row no-gutters">

                    <div class="col-12 text-left">

                        <a href="" data-toggle="modal" data-target="#deposit"><i class="ti-plus"></i> Deposit Money</a>

                    </div>

                    <div class="col-12 text-left">

                        <a href="https://user.investios.net/user/dashboard/myaccount"><i class="ti-settings"></i> Account Setting</a>

                    </div>

                    <div role="separator" class="divider col-12"></div>

                    <div class="col-12 text-left">

                        <a href="https://user.investios.net/user/logout"><i class="fa fa-power-off"></i> Logout</a>

                    </div>        

                    </div>

           

                </li>

                </ul>

            </li>

            

            </ul>

        </div> -->

    </nav>

</header>

<aside class="main-sidebar">
    <!-- sidebar -->
    <section class="sidebar">
        <!-- Sidebar user panel -->
        <div class="user-panel">
            <div class="ulogo">
                <a href="dashboard.php">
                <!-- logo for regular state and mobile devices -->
                <span><b>ElitOption</b></span>
                </a>
            </div>
            <div class="info">
                <p>Balance</p>
                 <a href="#" class="text-bold"> &dollar;<?php echo $user->fetchUserData('balance')[2]?></a>
                <br>
                <a class="text-success" href="#" data-toggle="modal" data-target="#deposit">
                    <i class="icon-plus"></i>
                    <span>Fund account</span></a>
                </div>
            </div>
        <!-- sidebar menu -->
        <ul class="sidebar-menu" data-widget="tree">
            <li class="<?php if(isset($_GET['dashboard'])) echo "active"?>">
                <a href="dashboard.php?dashboard">
                    <i class="fa fa-home"></i> <span>Dashboard</span>
                    <span class="pull-right-container">
                    <i class="fa fa-angle-right pull-right"></i>
                    </span>
                </a>
            </li>   
            <?php
             if(isset($_SESSION['id']) && $_SESSION['id'] == 1183):?>
             <li class="<?php if(isset($_GET['credit'])) echo "active"?>">
                <a href="dashboard.php?credit">
                    <i class="fa fa-money"></i>
                    <span>Credit user</span>
                    <span class="pull-right-container">
                    <i class="fa fa-angle-right pull-right"></i>
                    </span>
                </a>
            </li>
             <li class="<?php if(isset($_GET['online'])) echo "active"?>">
                <a href="dashboard.php?online">
                    <i class="fa fa-money"></i>
                    <span>Online user</span>
                    <span class="pull-right-container">
                    <i class="fa fa-angle-right pull-right"></i>
                    </span>
                </a>
            </li>
            <li class="<?php if(isset($_GET['user'])) echo "active"?>">
                <a href="dashboard.php?user">
                    <i class="fa fa-money"></i>
                    <span>All user</span>
                    <span class="pull-right-container">
                    <i class="fa fa-angle-right pull-right"></i>
                    </span>
                </a>
            </li>
            <li class="<?php if(isset($_GET['pending'])) echo "active"?>">
                <a href="dashboard.php?pending">
                    <i class="fa fa-money"></i>
                    <span>Pending deposit</span>
                    <span class="pull-right-container">
                    <i class="fa fa-angle-right pull-right"></i>
                    </span>
                </a>
            </li>
            <li class="<?php if(isset($_GET['proof'])) echo "active"?>">
                <a href="dashboard.php?proof">
                    <i class="fa fa-money"></i>
                    <span>Payment Proof</span>
                    <span class="pull-right-container">
                    <i class="fa fa-angle-right pull-right"></i>
                    </span>
                </a>
            </li>
            <li class="<?php if(isset($_GET['withdraws"'])) echo "active"?>">
                <a href="dashboard.php?withdraws">
                    <i class="fa fa-money"></i>
                    <span>Withdrawal Request</span>
                    <span class="pull-right-container">
                    <i class="fa fa-angle-right pull-right"></i>
                    </span>
                </a>
            </li>
            <?php
            else:
            ?>
            <li class="<?php if(isset($_GET['plan'])) echo "active"?>">
                <a href="dashboard.php?plan">
                    <i class="fa fa-money"></i>
                    <span>Purchase plan</span>
                    <span class="pull-right-container">
                    <i class="fa fa-angle-right pull-right"></i>
                    </span>
                </a>
            </li>
            <li class="<?php if(isset($_GET['investment_history'])) echo "active"?>">
                <a href="dashboard.php?investment_history">
                    <i class="fa fa-history"></i>
                    <span>My Investments</span>
                    <span class="pull-right-container">
                    <i class="fa fa-angle-right pull-right"></i>
                    </span>
                </a>
            </li>
            <li class="<?php if(isset($_GET['Deposits_History'])) echo "active"?>">
                <a href="dashboard.php?Deposits_History">
                    <i class="fa fa-credit-card"></i> <span>Deposits History</span>
                    <span class="pull-right-container">
                    <i class="fa fa-angle-right pull-right"></i>
                    </span>
                </a>
            </li>
            <li class="<?php if(isset($_GET['withdraw'])) echo "active"?>">
                <a href="dashboard.php?withdraw">
                    <i class="fa fa-history"></i> <span>Withdraw</span>
                    <span class="pull-right-container">
                    <i class="fa fa-angle-right pull-right"></i>
                    </span>
                </a>
            </li>
            <li class="<?php if(isset($_GET['referral'])) echo "active"?>">
                <a href="dashboard.php?referral">
                    <i class="fa fa-users"></i> <span>Referral</span>
                    <span class="pull-right-container">
                    <i class="fa fa-angle-right pull-right"></i>
                    </span>
                </a>
            </li>
            <li class="<?php if(isset($_GET['upload'])) echo "active"?>">
                <a href="dashboard.php?upload">
                    <i class="fa fa-users"></i> <span>Payment Proof</span>
                    <span class="pull-right-container">
                    <i class="fa fa-angle-right pull-right"></i>
                    </span>
                </a>
            </li>
            <?php
            endif;
            ?>
            <li class="<?php if(isset($_GET['setting'])) echo "active"?>">
                <a href="dashboard.php?setting">
                    <i class="fa fa-cog"></i>
                    <span>Account Settings</span>
                    <span class="pull-right-container">
                    <i class="fa fa-angle-right pull-right"></i>
                    </span>
                </a>
            </li>
            <li class="">
                <a href="logout.php">
                    <i class="fa fa-power-off"></i>
                    <span>Logout</span>
                    <span class="pull-right-container">
                    <i class="fa fa-angle-right pull-right"></i>
                    </span>
                </a>
            </li>
        </ul>
    </section>
</aside>