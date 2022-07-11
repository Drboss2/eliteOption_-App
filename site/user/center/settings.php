<?php
    $user_info = $user->fetchUserData('user');
    $user_balance= $user->fetchUserData('balance');
?>

<div class="row">
    <div class="col-lg-4 col-xlg-3 col-md-5">
        <div class="card">
            <h2 class="card-title">&dollar;<?php echo $user_balance[2]?> USD</h2>
            <div class="card-body"> 
                <small class="text-muted">Name </small>
                <h6><?php echo $user_info[3]?></h6>
                <small class="text-muted">Username </small>
                <h6><?php echo $user_info[2]?></h6>

                <small class="text-muted">Email Address </small>
                <h6><?php echo $user_info[1]?></h6> 
              
            </div>
        </div>
    </div>
    <div class="col-lg-8 col-xlg-9 col-md-7">
        <div class="card">
            <!-- Tabs -->
            <ul class="nav nav-pills custom-pills nav-dark" id="pills-tab" role="tablist">
                <li class="nav-item">
                    <a class="nav-link active" id="editprofile-tab" data-toggle="pill" href="#editprofile" role="tab" aria-controls="pills-timeline" aria-selected="true">Edit Details </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="password-tab" data-toggle="pill" href="#changepassword" role="tab" aria-controls="pills-profile" aria-selected="false">Change Password</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="verificaction-tab" data-toggle="pill" href="#verificaction" role="tab" aria-controls="pills-profile" aria-selected="false">Verifications</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="notice-tab" data-toggle="pill" href="#notice" role="tab" aria-controls="pills-notice" aria-selected="false">Notifications</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="withdraw-tab" data-toggle="pill" href="#withdraw" role="tab" aria-controls="withdraw-notice" aria-selected="false">Withdrawals</a>
                </li>
            </ul>
            <!-- Tabs -->
            <div class="tab-content" id="pills-tabContent">
                <div class="tab-pane fade show active" id="editprofile" role="tabpanel" aria-labelledby="editprofile-tab">
                    <div class="card-body">
                        <form action="../../lib/modules/editdetails.php" class="form-horizontal form-material" id="myform" method="POST" accept-charset="utf-8">
                            <div class="form-group">
                                <label class="col-md-12">Userame</label>
                                <div class="col-md-12">
                                    <input type="text" value="<?php echo $user_info[2]?>" class="form-control form-control-line" disabled>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-12">Full Name</label>
                                <div class="col-md-12">
                                    <input type="text" name="fullname" value="<?php echo $user_info[3]?>" class="form-control form-control-line" required="">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="example-email" class="col-md-12">Email</label>
                                <div class="col-md-12">
                                    <input type="email" name="email" value="<?php echo $user_info[1]?>" class="form-control form-control-line" id="example-email" disabled>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-sm-12">
                                    <button type="submit" name="update-account" class="btn btn-dark mx-auto text-uppercase">Update</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="tab-pane fade" id="changepassword" role="tabpanel" aria-labelledby="password-tab">
                    <div class="card-body">
                        <form action="../../lib/modules/changepass.php" onsubmit="return checkPassword()" class="form-horizontal form-material" id="myform" method="POST" accept-charset="utf-8">
                            <div class="form-group">
                                <label class="col-md-12">New Password</label>
                                <div class="col-md-12">
                                    <input type="password" id="newpass" name="new_password" autocomplete="off" class="form-control form-control-line">
                                    <span id="error" class='text-danger'></span>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-12">Confirm New Password</label>
                                <div class="col-md-12">
                                    <input type="password" id="confirmpass" name="confirm_newpassword" autocomplete="off" class="form-control form-control-line">
                                    <span id="error" class='text-danger'></span>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-sm-12">
                                    <button type="submit" name="update-password" class="btn btn-dark mx-auto text-uppercase">Update Password</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="tab-pane fade" id="verificaction" role="tabpanel" aria-labelledby="verificaction-tab">
                    <div class="card-body">
                        <form class="form-horizontal form-material">
                            
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-8">Email verification
                                        <div class="pb-3 float-right"><span class="btn btn-outline-danger"><i class="fa fa-times"></i> </span> 
                                        </div> <span class="float-right"><a href='#'>Resend</a> </span>
                                    </div>
                                        <div class="col-md-8">ID verification
                                           <div class="pb-3 float-right"><span class="btn btn-outline-danger"><i class="fa fa-times"></i> </span> </div>
                                        </div>
                                    <div class="col-md-8">KYC verification
                                       <div class="float-right"><span class="btn btn-outline-danger"> <i class="fa fa-times"></i> </span> </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="tab-pane fade" id="notice" role="tabpanel" aria-labelledby="notice-tab">
                    <div class="card-body">
                        <form action="" class="form-horizontal form-material" id="myform" method="POST"     accept-charset="utf-8">
                            <div class="form-group">
                                <div class="col-md-12">
                                    <div class="controls">
                                        <input type="checkbox" value="enabled" name="notice" id="checkbox_email" value="active" aria-invalid="false" checked>
                                        <label for="checkbox_email">Enable ROI email notification</label>
                                        <div class="help-block"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-sm-12">
                                    <button type="submit" name="update-account" class="btn btn-dark mx-auto text-uppercase">Update</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="tab-pane fade" id="withdraw" role="tabpanel" aria-labelledby="withdraw-tab">
                    <form action="../../lib/modules/wallet.php" onsubmit="return updateWallet()"class="form-horizontal form-material" id="myform" method="POST"   accept-charset="utf-8">
                        <div class="card-body">
                            
                            <h3 class="text-x">Bank Withdrawal</h3>
                            
                            <p> InvestiOS cannot be held responsible for delays, extra costs or financial loss that arises from being provided incorrect account information, so please ensure that you double check the details with your financial institution prior to submitting a request for a Bank Wire Transfer.</p>
                            <p>Please fill in your bank details as complete as possible, including:</p>
                            <ul>
                                <li>- Your Address</li>
                                <li>- Your bank's Address</li>
                                <li>- The name of the account holder</li>
                                <li>- Your account number and if possible IBAN</li>
                                <li>- Your bank's SWIFT code</li>
                            </ul>
                            <p>If you have any questions, don't hesitate to contact support</p>
                            <div class="form-group">
                                <label class="col-md-12">Bank  Details</label>
                                <div class="col-md-12">
                                    <textarea name="bank_info" id="bank" class="form-control"><?php echo $user_info[5]?></textarea>
                                </div>
                          </div>
                        </div>
                        <hr class="bg-yellow">
                        <div class="card-body">
                            <span id="c" class="text-danger"></span>
                                <h3 class="text-x">Cryptocurrency Withdrawal</h3>
                                <div class="form-group">
                                    <label class="col-md-12">Bitcoin Wallet Address</label>
                                    <div class="col-md-12">
                                        <input type="text" id="btc" name="btc" value="<?php echo $user_info[6]?>" class="form-control form-control-line" >
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-12">Litecoin Wallet Address</label>
                                    <div class="col-md-12">
                                        <input type="text" id="ltc" name="ltc" value="<?php echo $user_info[7]?>" class="form-control form-control-line" >
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-12">Ethereum Wallet Address</label>
                                    <div class="col-md-12">
                                        <input type="text" id="eth" name="eth" value="<?php echo $user_info[8]?>" class="form-control form-control-line" >
                                    </div>
                                </div>
                                <span id="c" class="text-danger"></span>
                                <div class="form-group">
                                    <div class="col-sm-12">
                                        <button type="submit" name="wallet" class="btn btn-dark mx-auto text-uppercase">Update</button>
                                    </div>
                                </div>
                            </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
 <script>
  function checkPassword(){
      let newpassword = document.getElementById("newpass").value;

      let confirmpass = document.getElementById("confirmpass").value;
      let error = document.getElementById("error");

      if(newpassword ===""){
         error.innerHTML = "enter password"; 
         return false
      }else if(confirmpass ===""){
         error.innerHTML = "enter password";
         return false
         
      }else if(newpassword !== confirmpass){
          error.innerHTML = "password do not match";
          return false;
      }else{
          return true
      }
  }

function updateWallet(){
    let bank = document.getElementById("bank").value;
    let btc = document.getElementById("btc").value;
    let ltc = document.getElementById("ltc").value;
    let eth = document.getElementById("eth").value;

    let error = document.getElementById("c");

    if(bank ===""){
        error.innerHTML = "a field is required"; 
        return false
    }else{
        return true
    }
}
</script>
            
   