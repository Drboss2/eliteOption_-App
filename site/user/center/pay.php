<!-- Add icon library -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<div class="_container-fluid">
    <div class="row">
        <div class="col-lg-7 mx-auto">
        <br>
        <br>
            <div class="card border">
                <div class="card-body">
                  <p><b>Pay </b>$<?php echo $_SESSION['amount']?> to the bitcoin address below<br><br> <b>34ydXSiX4CLCFAb1hnsoyxGBBWdfVhPL7E</b></p>
                    <button class="btn btn-primary btn-block">
                        <span class="fa fa-spinner fa-spin"></span> waiting for payment....
                    </button>
                    <br>
                    <p class='mt-4'>Click <a class='btn btn-warning btn-sm' href="dashboard.php?u"> Here </a> if you have made payment or <br> contact support on live chat now</p>
                    <small>please make sure you pay the exact $<?php echo $_SESSION['amount']?> if not our payment system will ignore your payments</small>
                </div>
            </div>
        </div>
    </div>
</div>