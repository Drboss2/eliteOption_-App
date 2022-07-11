<div class="_container-fluid">
    <div class="row">
        <div class="col-lg-5 mx-auto">
        <br>
        <br>
            <div class="">
                <p id="bal" class='text-center'></p>

                <p  id="ok"></p>
               <form class='transfer'>
                   <p class='text-center'>Transfer to wallet</p>
                   <input type="text" id="amount" class='form-control' placeholder='enter amount' required>
                   <input type="hidden" id="bal" value="<?php echo $user->fetchUserData('profits')[2] ?>">
                   <span id='aerror' class='text-danger'></span>
                   <br>
                    <input type="submit" id="submit" class='form-control btn-info' value='send'>
                    <button style='display:none' id="loading" class='btn btn btn-info btn-block' disabled>loading....</button>
               </form>
            </div>
        </div>
    </div>
</div>