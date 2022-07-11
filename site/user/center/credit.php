<!-- Add icon library -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<div class="_container-fluid">
    <div class="row">
        <div class="col-lg-5 mx-auto">
        <br>
        <br>
            <div class="">
                <p  id="ok"></p>
               <form class='creditForm'>
                   <p class='text-center'>Top up user balance</p>
                   <input type="text" id="amount" class='form-control' placeholder='enter amount' required>
                   <span id='aerror' class='text-danger'></span>
                   <br>
                   <br>
                   <input type="text" id="username" class='form-control' placeholder='enter user name 'required>

                    <span id='uerror'></span>
                   <br>
                    <input type="submit" id="submit" class='form-control btn-info' value='credit'>
                    <button style='display:none' id="loading" class='btn btn btn-info btn-block' disabled>loading....</button>
               </form>
            </div>
        </div>
    </div>
</div>