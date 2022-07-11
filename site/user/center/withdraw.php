<div class="_container-fluid">
    <div class="row">
        <div class="col-sm-12 col-lg-5 ">
            <div class="box">
                <div class="box-header with-border">
                    <h3 class="box-title">Request New Withdrawal</h3>
                </div>
            <?php
                if(isset($_POST['new-withdraw'])){
                      $amount = $_POST['amount'];
                      $bitcoin = $_POST['bitcoin'];

                      $balance = $_POST['balance'];

                      $error = '';

                      if($amount > $balance){
                          $error=  "<p class='text-danger'>invalid amount<p>";
                      }else if($amount < 100){
                          $error=  "<p class='text-danger'>minimum withdrawal is 100$<p>";
                      }else{

                         if($user->withdrawal($amount,$bitcoin)){
                            $error=  "<p class='text-success'>Your Withdrawal request has been submited for review.</p>";

                         }
                      }
                }
            
            ?>
                <div class="box-body">
                    <form action="" class="form-horizontal form-material" method="post" accept-charset="utf-8">
                    <?php
                        if(isset($error)){
                            echo $error;
                        }
                    
                    ?>
                        <div class="form-group">

                            <input name="bitcoin" type="text" class="form-control" required placeholder="enter bitcoin wallet address">
                            <input name="balance" type="hidden" value=<?php echo $user->fetchUserData('balance')[2] ?>>
                        </div>
                        <div class="form-group">
                            <input name="amount" type="number" class="form-control" required placeholder="enter amount to withdraw">
                            
                        </div>
                        <div class="form-group">
                            <select name="mode" class="form-control" required="">
                                <option value="">Select Method</option>
                                                        
                                <option  value="1">Bitcoin</option>
                                                        
                            </select>
                        </div>
                        <div class="form-group">
                            <button type="submit" name="new-withdraw" class="btn btn-dark btn-block">Sumbit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-sm-12 col-lg-7 ">
            <div class="box">
                <div class="box-header with-border">
                    <h3 class="box-title">Fees and Processing</h3>
                        
                </div>
                <div class="box-body table-responsive">
                    <table class="table no-margin">
                        <tr>
                            <th style="width: 20%;" class="text-bold">Mode</th>
                            <th>Minimun</th>
                            <th>Fee</th>
                            <th>Processing time</th>
                        </tr>
                            
                        <tr>
                            <td class="text-bold" style="width: 20%;">Bitcoin</td>
                            <td>&dollar;100 </td>
                            <td>&dollar;5 + 2%</td>
                            <td>24 hours </td>
                        </tr>
                            
                    </table>
                </div>
            </div>
        </div>
    </div>
    <!-- <div class="row">
        <div class="col-sm-12 col-lg-12">
            <div class="card">
                <div class="card-body">
                    <div class="d-md-flex align-items-center">
                        <div>
                            <h4 class="card-title">Withdraw</h4>
                        </div>
                        <div class="ml-auto">
                            <div class="dl">
                            </div>
                        </div>
                    </div>
                    <div class="table-responsive ">
                        <table class="table table-striped table-bordered no-margin">
                            <thead>
                                <tr class="bg-pale-dark">
                                    <th class="border-top-0">ID</th>
                                    <th class="text-center border-top-0">Amount</th>
                                    <th class="text-center border-top-0">Details</th>
                                    <th class="text-center border-top-0">Status</th>
                                    <th class="text-center border-top-0">Date Created</th>
                                </tr>
                            </thead>
                            <tbody>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>    
    </div> -->
</div>

  