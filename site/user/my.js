$(document).ready(function(){
    $(".click").click(function(){
        var plan = $(this).attr('plan');
        var planInput = $("#plan").val(plan);
    });
    $("#submit").on("submit",function(){
        var amount = $("#amount");
        var real_amount = $("#amount").val();
        var plan = $("#plan").val();

        if(plan === "300% after 5 days"){
            if(real_amount < 20000){
                 alert("price amount invalid");
                 amount.focus();
                 return false;
            }
        }
        if(plan === "200% after 5 days"){
            if(real_amount < 5000){
                 alert("price amount invalid");
                 amount.focus();
                 return false;
            }
        }
        if(plan === "100% after 5 days"){
            if(real_amount < 1000){
                 alert("price amount invalid");
                 amount.focus();
                 return false;
            }
        }
            
        if(amount.val() === ""){
           alert("enter amount");
           amount.focus();
           amount.addClass("border-danger");
        }else{
            $.ajax({
                url: "../../lib/modules/deposit.php",
                method:"POST",
                data:{deposit:1,
                real_amount:real_amount,
                p:plan
                },
                success:function(data){
                    data = data.trim();

                    if(data == 1){
                        window.location.href="dashboard.php?pay";
                    }
                    console.log(data);
                }
            });
         }
    });
  // get deposit history
    $("#search").keypress(function(){
        var search = $(this).val();
        //   console.log(search);
           $.ajax({
             url: "../../lib/modules/deposit_history.php",
             method:"POST",
             data:{History:1,search:search},
             success:function(data){                    
                $('#history').html(data);
            }
        }); 
    });
    
    // fetch deposit history 
     getDepositHistory();
    function getDepositHistory(){
         $.ajax({
             url: "../../lib/modules/deposit_history.php",
             method:"POST",
             dataType:"JSON",
             data:{getHistory:1},
             success:function(data){                    
                var inner = "";
                // console.log(data);
                 $.each(data,function(index,value){
                    inner = `
                        <tr>
                           <td>${value.trans_id}</td>
                           <td>$${value.amount}</td>
                           <td>Bitcoin</td>
                           <td>${value.status}</td>
                           <td>${value.date}</td>
                        </tr> 
                    
                    `;
                    $('#history').append(inner);
                 });
             }
        });
    }
    getInvestmentHistory();
    function  getInvestmentHistory(){
          $.ajax({
             url: "../../lib/modules/deposit_history.php",
             method:"POST",
             dataType:"JSON",
             data:{getInvestmentHistory:1},
             success:function(data){                    
                var inner = "";
                 $.each(data,function(index,value){
    
                     var active = value.active;
                     var status = value.status;
                     var initial_amount = value.amount;
                     var amount_expected = value.plan ;
                     var percentage = amount_expected; 

                    var earn = (percentage / 100) * initial_amount;

                    if(active === "yes"){
                        inner = `
                            <tr>
                                <td>${amount_expected}%</td>
                                <td>$${initial_amount}</td>
                                <td>$${earn}</td>
                                <td>${status}</td>
                                <td>${value.date}</td>
                            </tr> 
                        `;
                        $('#investment_history').append(inner);
                    }
                      
                });
            }

        });
    }

    $(".creditForm").on('submit',(e)=>{
        e.preventDefault();
        let amount = $("#amount").val();
        let username = $("#username").val();
        let uerror = $("#uerror");
        let perror = $("#ok");


        $.ajax({
            url: "../../lib/modules/credit.php",
            method:'post',
            data:{
                credit:1,
                amount:amount,
                username:username
            },
            beforeSend:()=>{
                $("#submit").hide();
                 $("#loading").show();

            },
            success:(data)=>{
                data = data.trim();
                 $("#submit").show();
                 $("#loading").hide();
                if(data === 'not'){
                    uerror.html("<p class='text-danger'> username not found</p>");
                }else if(data === 'credit'){
                    perror.html("<p class='text-success'>successfully credited.</p>");
                    $(".creditForm")[0].reset();
                }else{
                console.log(data);
                }
            },
            error:(err)=>{
                console.log(err);
            }
        });
    });
    
    $('body').delegate('.deletetran','click',function(){
        let id = $(this).attr('did');
        if(confirm('Are you sure you want to delete this transaction ?')){
            $.ajax({
                url: "../../lib/modules/delete_transaction.php",
                method:'post',
                data:{
                    del:1,
                    data:id,
                },
            
                success:(data)=>{
                    data = data.trim();
                    location.reload();

                    console.log(data);
                },
                error:(err)=>{
                    console.log(err);
                }
            });

        }
    });
     $('body').delegate('.approved','click',function(){
        let id = $(this).attr('a');
        if(confirm('Are you sure you want to approved this transaction?')){
            $.ajax({
                url: "../../lib/modules/delete_transaction.php",
                method:'post',
                data:{
                    app:1,
                    data:id,
                },
                success:(data)=>{
                    location.reload();
                    console.log(data);
                },
                error:(err)=>{
                    console.log(err);
                }
            });
        }
    });
    $('body').delegate('.delete','click',function(){
        let id = $(this).attr('did');
        if(confirm('Are you sure you want to delete this user?')){
            $.ajax({
                url: "../../lib/modules/delete_user.php",
                method:'post',
                data:{
                    delete_user:1,
                    data:id,
                },
                success:(data)=>{
                    location.reload();
                    console.log(data);
                },
                error:(err)=>{
                    console.log(err);
                }
            });
        }
    });
    getRecodes(1);
    function getRecodes(pn){  // get all users record
        $.ajax({
            url: "../../lib/modules/pagination.php",
            method:"POST",
            data:{
                manageRecode:1,
                pageno:pn
                },
            success:function(data){
                  $('#table').html(data);
            }
        });
    }
    $("body").delegate(".page-link","click",function(){
        var n = $(this).attr("n");
         getRecodes(n);
    });

    $("body").delegate(".del","click",function(){ // delete user
        var n = $(this).attr("did");

         $.ajax({
            url: "../../lib/modules/deleteauser.php",
            method:"POST",
            data:{
                manageRecode:1,
                pageno:n
                },
            success:function(data){
                  location.reload();
            }
        });
   
    });
     $("body").delegate(".ban","click",function(){ // ban a user user
        var n = $(this).attr("d");

         $.ajax({
            url: "../../lib/modules/deleteauser.php",
            method:"POST",
            data:{
                banuser:1,
                pageno:n
            },
            success:function(data){
                  location.reload();
            }
        });
    });
       $("body").delegate(".unban","click",function(){ // unban a user user
        var n = $(this).attr("id");

         $.ajax({
            url: "../../lib/modules/deleteauser.php",
            method:"POST",
            data:{
                Unbanuser:1,
                pageno:n
            },
            success:function(data){
                  location.reload();
            }
        });
    });

    getwith(1)
    function getwith(pn){  // get all withdrawal request
        $.ajax({
            url: "../../lib/modules/pagination.php",
            method:"POST",
            data:{
                withdrawal:1,
                pageno:pn
                },
            success:function(data){
                  $('#withs').html(data);
            }
        });
    }
    $("body").delegate(".page-link","click",function(){
        var n = $(this).attr("n");
         getwith(n);
    });
     $("body").delegate(".del","click",function(){ // delete withdrawal request
        var n = $(this).attr("did");

         $.ajax({
            url: "../../lib/modules/deleteauser.php",
            method:"POST",
            data:{
                dele:1,
                pageno:n
                },
            success:function(data){
                  location.reload();
            }
        });
   
    });

        getBalance()
    function getBalance(){  // get balance
        $.ajax({
            url: "../../lib/modules/deleteauser.php",
            method:"POST",
            data:{
                gebalance:1,
            },
            success:function(data){
                $('#bal').html('$'+data);
            }
        });
    }

    $(".transfer").on("submit",function(e){
        e.preventDefault();
        let amount = $("#amount").val();
        if(isNaN(amount)){
            alert('enter only number')
            return false
        }
        $.ajax({
            url: "../../lib/modules/deleteauser.php",
            method:"POST",
            data:{
                trans:1,
                amount:amount
                },
            beforeSend:function(){
                $("#loading").show();
                $("#submit").hide();
            },
            success:function(data){
                $("#loading").hide();
                $("#submit").show();

                if(data == 'invalid amount'){
                    $("#ok").html('<p class="text-danger">Invalid amount</p>');
                }else if(data == 'credited'){
                    $("#ok").html('<p class="text-success"> Transaction successful</p>');
                    getBalance();
                }else{
                    console.log(data)
                }
                // location.reload();
            }
        });
    });
       getUp(1)
    function getUp(pn){  // get all pending record
        $.ajax({
            url: "../../lib/modules/pagination.php",
            method:"POST",
            data:{
                manageProof:1,
                pageno:pn
                },
            success:function(data){
                  $('#proof').html(data);
            }
        });
    }
    $("body").delegate(".page-link","click",function(){
        var n = $(this).attr("n");
         getUp(n);
    });
    $("body").delegate(".del","click",function(){ // delete payment proof
        var n = $(this).attr("did");

         $.ajax({
            url: "../../lib/modules/deleteauser.php",
            method:"POST",
            data:{
                deletePay:1,
                pageno:n
                },
            success:function(data){
                  location.reload();
            }
        });
   
    });
        getdepo(1)
    function getdepo(pn){  // get all pending record
        $.ajax({
            url: "../../lib/modules/pagination.php",
            method:"POST",
            data:{
                managedepo:1,
                pageno:pn
                },
            success:function(data){
                  $('#ids').html(data);
            }
        });
    }
    $("body").delegate(".page-link","click",function(){
        var n = $(this).attr("n");
         getdepo(n);
    });
});
