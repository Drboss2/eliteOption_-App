<div class="_container-fluid">-->
     <?php if(isset($_SESSION['message'])):?>
        <div class="alert alert-success">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
            </button> <i class="fa fa-arrow-circle-o-right"></i> <span class="font-bold">Notice:</span><?php  echo $_SESSION['message']?>
        </div>
    <?php unset($_SESSION['message']); endif; ?>

    <?php if(($_GET['dashboard'] === 'edit')){?>
        <div class="alert alert-success">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
            </button> <i class="fa fa-arrow-circle-o-right"></i> <span class="font-bold">Notice:</span> Your account has been updated succesfully
        </div>
    <?php }else if($_GET['dashboard']==='passchange'){ ?>
        <div class="alert alert-success">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
            </button> <i class="fa fa-arrow-circle-o-right"></i> <span class="font-bold">Notice:</span> Your password has been updated succesfully
        </div>
    <?php }else if($_GET['dashboard'] ==='wallet'){ ?>
        <div class="alert alert-success">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
            </button> <i class="fa fa-arrow-circle-o-right"></i> <span class="font-bold">Notice:</span> Your wallet address has been updated successul
        </div>
    <?php }else{ ?>

    <?php } ?>
    <div class="row">
        <?php  if(isset($_SESSION['id']) && $_SESSION['id'] == 1183):?>
        <div class="col-lg-12">
            <div class="alert alert-warning">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
                </button> <i class="fa fa-arrow-circle-o-right"></i> <span class="font-bold">Notice:</span> There are currently <?php echo $user->getloginUsers()?> user online  click <a href="dashboard.php?online">here to view it </a> 
            </div>
        </div>
        <div class="col-lg-12">
            <div class="alert alert-success">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
                </button> <i class="fa fa-arrow-circle-o-right"></i> <span class="font-bold">Notice:</span> You have a total of <?php echo $user->checkPendingDeposit()?> 
                pending deposit click <a href="dashboard.php?pending">here to view it </a></div>
        </div>
         <div class="col-xl-4 col-md-6 col-12 ">
            <div class="box box-body text-center">
                <div class="font-size-40 font-weight-200"> <?php
                 echo $user->getData('user'); ?></div>
                <div>Total user</div>
               
            </div>
        </div>
        <div class="col-xl-4 col-md-6 col-12 ">
            <div class="box box-body text-center text-green">
                <div class="font-size-40 font-weight-200">&dollar;<?php
                    $pending = $user->totalPendingDeposit();
                    if($pending == 'no data'){
                        echo 0;
                    }else{
                        echo $pending;
                    }
    
                    ?>
                
                </div>
                <div>Pending deposit</div>
            </div>
        </div>
        <div class="col-xl-4 col-md-6 col-12 ">
            <div class="box box-body text-center text-green">
                <div class="font-size-40 font-weight-200">&dollar;<?php echo $user->AllDeposit()?></div>
                <div>Confirmed deposit</div>
            </div>
        </div>
        <?php else:?>
         <div class="col-xl-3 col-md-6 col-12">
            <div class="box box-body text-center">
                <div class="font-size-40 font-weight-200">&dollar; <?php
                 echo $user->fetchUserData('balance')[2] ?></div>
                <div>Wallet Balance</div>
            </div>
        </div>
         <div class="col-xl-3 col-md-6 col-12 ">
            <div class="box box-body text-center text-red">
                <div class="font-size-40 font-weight-200">&dollar;<?php echo $user->fetchUserData('profits')[2]?></div>
                <div>Profits</div>
                <a class='text-blue' href="dashboard.php?transfer">transfer to balance</a>
            </div>
        </div>
         <div class="col-xl-3 col-md-6 col-12 ">
            <div class="box box-body text-center text-green">
                <div class="font-size-40 font-weight-200">&dollar;<?php echo $user->pendingDeposit()?></div>
                <div>Pending deposit</div>
            </div>
        </div>
        <div class="col-xl-3 col-md-6 col-12 ">
            <div class="box box-body text-center text-blue">
                <div class="font-size-40 font-weight-200">&dollar;<?php echo $user->confirmedDeposit()?></div>
                <div>Total deposit</div>
            </div>
        </div>
        <?php endif;?>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <div style="width: 100%; height:62px; background-color: #FFFFFF; overflow:hidden; box-sizing: border-box; border: 1px solid #FFFFFF; border-radius: 4px; text-align: right; line-height:14px; block-size:62px; font-size: 12px; box-sizing:content-box; font-feature-settings: normal; text-size-adjust: 100%; box-shadow: inset 0 -20px 0 0 #FFFFFF;padding:1px;padding: 0px; margin: 0px;"><div style="height:40px;"><iframe src="https://widget.coinlib.io/widget?type=horizontal_v2&theme=light&pref_coin_id=1505&invert_hover=no" width="100%" height="36" scrolling="auto" marginwidth="0" marginheight="0" frameborder="0" border="0" style="border:0;margin:0;padding:0;"></iframe></div><div style="display: none; color: #FFFFFF; line-height: 14px; font-weight: 400; font-size: 11px; box-sizing:content-box; margin: 5px 6px 10px 0px; font-family: Verdana, Tahoma, Arial, sans-serif;"></div></div>
        </div>
    </div>
    <div style="padding: 15px;" class="p-5"></div>
    <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12">
             <!--TradingView Widget BEGIN -->
            <div class="tradingview-widget-container">
            <div id="tradingview_044b7"></div>
            <div class="tradingview-widget-copyright"><a href="#" rel="noopener" target="_blank"><span class="blue-text">Market chart</span></a></div>
            <script type="text/javascript" src="https://s3.tradingview.com/tv.js"></script>
            <script type="text/javascript">
            new TradingView.widget(
            {
            "width": "100%",
            "height": "550",
            "symbol": "NASDAQ:AAPL",
            "interval": "1",
            "timezone": "exchange",
            "theme": "Dark",
            "style": "3",
            "locale": "en",
            "toolbar_bg": "#f1f3f6",
            "enable_publishing": false,
            "hide_legend": true,
            "withdateranges": true,
            "hide_side_toolbar": false,
            "allow_symbol_change": true,
            "container_id": "tradingview_044b7"
            }
            );
            </script>
            </div>
             <!--TradingView Widget END -->
        </div>
    </div>
</div>