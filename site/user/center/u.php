<?php
if(isset($_POST['proof'])){
    $post         = filter_var_array($_POST,FILTER_SANITIZE_STRING);

    $amount       = $post['amount'];
    
    $file         = $_FILES['file']['name'];
    $tmp          = $_FILES['file']['tmp_name'];


    $valid_extensions = array('jpeg', 'jpg', 'png'); // valid extensions

    $ext = strtolower(pathinfo($file, PATHINFO_EXTENSION));

    $final_image = time().'.'.$ext;

    $path = '../img/'.$final_image; // upload directory
    if(!in_array($ext,$valid_extensions)){
        $error ="<p class='alert alert-danger'>Invalid image format Only jpeg, jpg, png, are allowed </p>";
    }else{
        move_uploaded_file($tmp,$path);
        if($user->paymentProof($amount,$final_image)){
            $error = "<p class='alert alert-success'>Your Payment Proof has been Submitted for Review</p>";
        }
    }
}
?>
<div class="udex-main" id="main">
    <div class="bg-white p-4 mt-3 rounded mb-5">
        <h3 class="mb-4">Upoad Payment Proof</h3>
        <?php
            if(isset($error)){
                echo $error;
            }
        ?>
        <form method="post" action="" enctype="multipart/form-data">
            <div class="form-group">
               <label>Amount</label>
               <input required id="amount" required name="amount"type='text' class='form-control'>
            </div>
            <div class="form-group">
               <label>Image Proof</label>
               <input required type='file' required name="file" class='form-control'>
            </div>
            <div class="form-group">
               <input id="check" name="proof" type='submit' class='btn btn-info form-control'>
            </div>
        </form>
      
    </div>
</div>