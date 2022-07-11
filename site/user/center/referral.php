<?php

?>

<div class="_container-fluid">
    <div class="row">
    <div class="col-xl-12 col-md-12 col-12 ">
        <div class="box box-body text-center text-dark">
        <div>Your can refer users by sharing your referral link:</div>
            <div class="text-primary text-bold text-wrap"><p><?php echo DOMIAN."register.php?ref=".$_SESSION['id'] ?></p></div>
        </div>
    </div>
</div>
    <div class="row">
        <div class="col-sm-12 col-lg-12">
            <div class="card">
                <div class="card-body">
                    <div class="d-md-flex align-items-center">
                        <div>
                            <h4 class="card-title">Referral List</h4>
                        </div>
                        
                    </div>
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered no-margin ">
                            <thead>
                                <tr class="bg-pale-dark">
                                    <th class="text-center border-top-0">Username</th>
                                    <th class="text-center border-top-0">Account Status</th>
                                    <th class="text-center border-top-0"> Date Registered</th>
                                    <th class="text-center border-top-0">User's Investment</th>
                                    <th class="text-center border-top-0">Investment Status</th>
                                    <th class="text-center border-top-0">Ref Bonus</th>
                                </tr>
                            </thead>
                            <tbody>
                        </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
     
    
    