<?php

class User{

  private $con;

  public $fullname;

  public $username;

  public $emaill;

  public $password;

  public $date;

  public $id;
  public $plan;

  public $amount;
    // constructor

    public function __construct($db){
        $this->con = $db;
    }

       // create account

        // create account
    public function createAccount(){
        $this->fullname =  $this->cleanString($this->fullname);
        $this->username =  $this->cleanString($this->username);
        $this->email =  $this->cleanString($this->email);
        $this->password =  $this->cleanString($this->password);
        $amount =0;
        $status ='uban';
        $islogin = 'no';
        
        $stmt = $this->con->prepare("insert into user(name,email,username,password,status,islogin,date)values(?,?,?,?,?,?,?)");
        $stmt->bind_param("sssssss",$this->fullname,$this->email,$this->username,$this->password,$status,$islogin,$this->date); 
        $result = $stmt->execute();
        if($result){
            $select = $this->con->prepare("select user_id from user where username =?");
            $select->bind_param("s",$this->username);
            $select->execute();
            $result1=  $select->get_result();
            $p = $result1->fetch_array();
            $uid = $p['user_id'];
    
            $stmt = $this->con->prepare("insert into profits(user_id,amount)values(?,?)");
            $stmt->bind_param("ss",$uid,$amount);
            $stmt->execute();
            
            $stmt = $this->con->prepare("insert into balance(user_id,amount)values(?,?)");
            $stmt->bind_param("ss",$uid,$amount);
            $stmt->execute();

            $stmt = $this->con->prepare("insert into total_balance(user_id,amount)values(?,?)");
            $stmt->bind_param("ss",$uid,$amount);
            $stmt->execute();
        }
    
        return $stmt;
    }
    // chect whether user exist
    public function userNameExist($username){

        $stmt = $this->con->prepare("select username from user where username =?");

        $stmt->bind_param("s",$username);

        $stmt->execute();
        $result=  $stmt->get_result();
        if($result->num_rows > 0){
            return true;
        }else{
            return false;

        }

    }

    // check whether email exist

    public function emailExist($email){

        $stmt = $this->con->prepare("select email from user where email =?");

        $stmt->bind_param("s",$email);

        $stmt->execute();

        $result=  $stmt->get_result();

        

        if($result->num_rows > 0){

            return true;

        }else{

            return false;

        }

    }

    // login script
    public function login(){
        // clean data
        $this->email =  $this->cleanString($this->email);
        $status = 'ban';
        $stmt = $this->con->prepare("select name,user_id,username,email,password from user where email=? and status != ?");
        $stmt->bind_param("ss",$this->email,$status);
        $stmt->execute();
        $result = $stmt->get_result();

        if($result->num_rows < 1){ 
            return "not";
        }else{
            $row = $result->fetch_array();
            if(password_verify($this->password,$row['password'])){   
                $_SESSION['name'] = $row['name'];
                $_SESSION['id'] = $row['user_id'];
                $_SESSION['email'] = $row['email'];
                $_SESSION['username'] = $row['username'];
                $_SESSION['password'] = $this->password;
                $_SESSION['message'] = "Welcome to our investment platform ".strtoupper($_SESSION['name'])." Your user name is ".strtoupper($_SESSION['username'])." and password is {$_SESSION['password']}";

                 $this->isLogin(); // is login

                 return true;
            }else{
                return false;
            }
        }
    }

    public function isLogin(){
        $yes = 'yes';
        $stmt = $this->con->prepare("update user set islogin =? where email  = ?");
        $stmt->bind_param("ss",$yes,$this->email);
        $stmt->execute();
    }
    public function NotLogin(){
        $id = $_SESSION['id'];
        $yes = 'no';
        $stmt = $this->con->prepare("update user set islogin =? where user_id  = ?");
        $stmt->bind_param("ss",$yes,$id);
        $stmt->execute();
    }
    // fetch all user data

    public function fetchUserData($table){

        if(isset($_SESSION['id'])){

            $this->id = $_SESSION['id'];

            $stmt = $this->con->prepare("select * from {$table} where user_id = ?");

            $stmt->bind_param("s",$this->id);

            $stmt->execute();

            $result = $stmt->get_result();



            $row =[];

            $row = $result->fetch_array();



            return $row;

        }

    }

    // edit one column of data

     public function editOneColumn($table,$column,$name){

        if(isset($_SESSION['id'])){

            $this->id = $_SESSION['id'];

            $stmt = $this->con->prepare("update {$table} set {$column} =? where user_id =?");

            $stmt->bind_param("ss",$name,$this->id);

            $stmt->execute();

            

        }

    }

       // edit four column of data

     public function editFourColumn($table,$column1,$column2,$column3,$column4,$name1,$name2,$name3,$name4){

        if(isset($_SESSION['id'])){

            $this->id = $_SESSION['id'];

            $stmt = $this->con->prepare("update {$table} set {$column1} =?,{$column2} =?,{$column3}=?, {$column4}=? where user_id =?");

            $stmt->bind_param("sssss",$name1,$name2,$name3,$name4,$this->id);

            $stmt->execute(); 

        }

    }



    public function totalBalance(){

        if(isset($_SESSION['id'])){

            $id = $_SESSION['id'];

             $stmt = $this->con->prepare("select sum(amount) as total from deposit where user_id = $id and status='confrimed'");

             $stmt->execute();

             $result = $stmt->get_result();
             
             if($result->num_rows > 0){
                 
                 $row = $result->fetch_array();
    
                 return $row['total'];

             }else{
                 return 0;
             }

        }

    }

    // deposit money

     public function deposit(){
        if(isset($_SESSION['id'])){
             $id = $_SESSION['id'];
             $status = "pending";
             $active = "no";
             $date =  new DateTime;
             $time = $date->format("Y:m:d:H:m:s A");  // current time
             $start_date = $date->format("Y:m:d H:m:s"); // start time
             $date->add(new DateInterval('PT1M'));  // interval of 1 mins
                        $paid_time = $date->format('Y:m:d H:m:s');
             $trans_id = random_int(5000,9000);
         
             $stmt = $this->con->prepare("insert into deposit(user_id,trans_id,amount,plan,status,active,date,start_date,paidtime)values(?,?,?,?,?,?,?,?,?)");
             echo $this->con->error;
             $stmt->bind_param("sssssssss",$id,$trans_id,$this->amount,$this->plan,$status,$active,$time,$start_date,$paid_time);
                if($stmt->execute()){
                    return true;
                }else{
                    return "error". $this->con->error;
                }
        }
    }

     // update paidTime

    private function updatePaidTime($id,$time){

        $stmt = $this->con->prepare("update deposit set paidtime =? where id =$id");

        $stmt->bind_param("s",$time);

        $stmt->execute();

    }
      public function pendingDeposit(){
        $id = $_SESSION['id'];
        $status = 'pending';
        $stmt = $this->con->prepare("select sum(amount)total from deposit where user_id = ? and status =?");
        $stmt->bind_param("ss",$id,$status);
        $stmt->execute();
        $result = $stmt->get_result();
       
        if($result->num_rows > 0){
            $row = $result->fetch_array();

            return $row['total'];
        }else{
            return 'no data';
        }
    }

    // get active amount

    private function DepositAmount($user_id){

        $yes = "yes";

        $stmt = $this->con->prepare("select plan,amount,paidtime from deposit where user_id = $user_id and active='yes'");

        $stmt->execute(); 



        $rows = array();

        $result = $stmt->get_result();



        if($result->num_rows > 0){

            while($row = $result->fetch_array()){

                $rows[] = $row;

            }

            return $rows;

        }

    }
   // fetch user deposit history
    public function getDepostHistory(){
        if(isset($_SESSION['id'])){
            $id = $_SESSION['id'];
            $stmt = $this->con->prepare("select * from deposit where user_id = ? order by 1 desc limit 10");
            $stmt->bind_param("s",$id);
            $stmt->execute();
            $result = $stmt->get_result();
            $row = array();
            if($result->num_rows > 0){
                while($rows =$result->fetch_array()){
                    $row[] = $rows;
                }
                return $row;
            }else{
                return 'no data';
            }
        }
    }

    public function topUp($amount,$username){
        if($this->userExist($username)){
            return 'not';
        }else{
            $id = $this->getIdByUsername($username);
            $stmt = $this->con->prepare("update profits set amount = (amount + $amount) where user_id=?");
            $stmt->bind_param("s",$id);
            if($stmt->execute()){
                return "credit";
            }
        }
       
    }
    private function getIdByUsername($username){
        $stmt = $this->con->prepare("select user_id from user where username =?");
        $stmt->bind_param("s",$username);
        $stmt->execute();
        $result=  $stmt->get_result();  
        $row = $result->fetch_array();

        return $row['user_id'];
    }
    private function userExist($username){
        $stmt = $this->con->prepare("select username from user where username =?");
        $stmt->bind_param("s",$username);
        $stmt->execute();
        $result=  $stmt->get_result();
        
        if($result->num_rows < 1){
            return true;
        }
    }
    public function getData($table){
        $stmt = $this->con->prepare("select count(*) total from $table");
        $stmt->execute();
        $result = $stmt->get_result();
        $row = $result->fetch_array();

        return $row['total'];
    }
    
     public function GetAllDeposit($page_no){
        // $status = 'pending';
        $a =  $this->pagination('deposit',$page_no,20);
        $stmt = $this->con->prepare("select email,username,name,amount,d.date as date,d.status,plan, id from user u inner join deposit d on u.user_id = d.user_id  where d.status ='pending' order by 1 desc " .$a['limit']);

        $stmt->execute();
        $result = $stmt->get_result();
        $row = array();

        if($result->num_rows > 0){
            while($rows = $result->fetch_array()){
                $row[] = $rows;
            }
            return['rows'=>$row,'pagination'=>$a['pagination']];
        }else{
            return 'no';
        }

        // $stmt->bind_param("s",$status);
        $stmt->execute();
        $result = $stmt->get_result();

        $rows = array();
        if($result->num_rows > 0){
            while($row = $result->fetch_array()){
                $rows[]= $row;  
            }
            return $rows;
        }else{
            return 0;
        }
    }
   
    public function checkPendingDeposit(){
        $stmt = $this->con->prepare("select count(*) as total from deposit where status = 'pending'");
        $stmt->execute();
        $result = $stmt->get_result();

        if($result->num_rows > 0){
             $row = $result->fetch_array();
            return $row['total'];
        }
    }
    public function deleteTrans($table,$id){
        $stmt = $this->con->prepare("delete from $table where id =$id");
        $stmt->execute();
    }
     public function approveTrans($id){
        $stmt = $this->con->prepare("update deposit set status ='confirmed' where id =$id");
        $stmt->execute();
    }
    public function confirmedDeposit(){
        $id = $_SESSION['id'];
        $status = 'confirmed';
        $stmt = $this->con->prepare("select sum(amount)total from deposit where user_id = ? and status =?");
        $stmt->bind_param("ss",$id,$status);
        $stmt->execute();
        $result = $stmt->get_result();

        if($result->num_rows > 0){
            $row = $result->fetch_array();

            return $row['total'];
        }else{
            return 0;
        }
        
    }
    
    public function AllDeposit(){
        $stmt = $this->con->prepare("select sum(amount) as total from deposit where status ='confirmed'");
        $stmt->execute();
        $result = $stmt->get_result();

        if($result->num_rows > 0){
            
            $row = $result->fetch_array();
             return $row['total'];
        }else{
            return 0;
        }
        
    }
    private function debitUser($amount,$id){ // debit user
        $stmt = $this->con->prepare("update balance set amount = (amount-$amount) where user_id =$id");
        $stmt->execute();
    }
    public function withdrawal($amount,$bitcoin){ // withdrawal request
        $email = $_SESSION['email'];
        $name = $_SESSION['name'];
        $username = $_SESSION['username'];
        $user_id = $_SESSION['id'];
        $stmt = $this->con->prepare("insert into withdrawal(name,email,username,amount,bitcoin)value(?,?,?,?,?)");
        $stmt->bind_param('sssss',$name,$email,$username,$amount,$bitcoin);
        $stmt->execute();

         $this->debitUser($amount,$user_id); // debit user

        return $stmt;

    }
    public function getloginUsers(){
        $yes = 'yes';
        $stmt = $this->con->prepare("select count(*) as login from user where islogin = ?");
        $stmt->bind_param("s",$yes);
        $stmt->execute();
        $result = $stmt->get_result();

         if($result->num_rows > 0){
            
            $row = $result->fetch_array();
             return $row['login'];
        }else{
            return 0;
        }
    }
    public function geAllLoginUsers(){
        $stmt = $this->con->prepare("select * from user where islogin = 'yes'");
        $stmt->execute();
        $result = $stmt->get_result();
        $rows = array();

        if($result->num_rows > 0){
            while($row = $result->fetch_array()){
                $rows[]= $row;  
            }
            return $rows;
        }else{
            return 0;
        }
       
    }


    public function manageRecordsWitnPagination($table,$page_no){ // records with pagination
        $a =  $this->pagination($table,$page_no,20,$id);

        $stmt = $this->con->prepare("select * from  ".$table. " order by 1 desc " .$a['limit']);
        $stmt->execute();
        $result = $stmt->get_result();

        $row = array();

        if($result->num_rows > 0){
            while($rows = $result->fetch_array()){
                $row[] = $rows;
            }
            return['rows'=>$row,'pagination'=>$a['pagination']];
        }else{
            return 'no';
        }

    }
     function pagination($table,$page_no,$nun_per_page){
        $stmt = $this->con->prepare("select * from " . $table);
        $stmt->execute();
        $result = $stmt->get_result();
        $rows = $result->num_rows;

        $last = ceil($rows/$nun_per_page);

        $pagination = "<ul class='pagination'>";
         if($last != 1){
             if($page_no > 1){
                 $prev = $page_no -1 ;
                 $pagination .="<li class='page-item'><a class='page-link' n='".$prev."' href='#'>Previous</a></li>";
             }
         }
         if($page_no < 1){
                $pagination .= "<li class='page-item'><a href='#'>$page_no Of  $last pages </a></li>";
         }else{
             $next  = $page_no + 1;
           //  $last = $last -1;
             $pagination .="<li class='page-item'><a class='page-link' n='".$next."' href='#'>Next</a></li>";
             $pagination .= "<li class='page-item'><a href='#'>$page_no Of $last pages </a></li>";
         }
             
         $pagination .= '</ul>';

        
        $limit = "LIMIT ".($page_no - 1) * $nun_per_page.",".$nun_per_page;
        return ['pagination'=>$pagination,'limit'=>$limit];
    }

    public function deleteUsers($id){
        $stmt = $this->con->prepare("delete from deposit where user_id =$id");
        $stmt->execute();
    }
    public function deleteAUser($id){
        $stmt = $this->con->prepare("delete from user where user_id =$id");
        $stmt->execute();
    }
    public function banUnban($status,$id){ // ban and unban user
        $stmt = $this->con->prepare("update user set status ='$status' where user_id =$id");
        $stmt->execute();
    }
     public function totalPendingDeposit(){
        $stmt = $this->con->prepare("select sum(amount) as total from deposit where status = 'pending'");
        $stmt->execute();
        $result = $stmt->get_result();
         $row = $result->fetch_array();

        if($result->num_rows > 0){

             return $row['total'];
        }else{
            return 'no data';
        }
        
    }
     public function checkBalance(){ // check user profits balance
        $id = $_SESSION['id'];
        $stmt = $this->con->prepare("select amount from profits where user_id = $id");
        $stmt->execute();
        $result = $stmt->get_result();
        $row = $result->fetch_array();

        return $row['amount'];

    }
    public function transfer($amount){
        $id = $_SESSION['id'];
        if($this->checkBalance() < $amount){
            return 'invalid amount';
        }else{
            $stmt = $this->con->prepare("update profits set amount = (amount - $amount) where user_id = $id");
            if($stmt->execute()){
                $stmt1 = $this->con->prepare("update balance set amount = (amount + $amount) where user_id = $id");
                $stmt1->execute();

                return 'credited';
            }
        }
    }


    public function paymentProof($amount,$file){ // payment proof
        $email = $_SESSION['email'];
        $name  = $_SESSION['name'];
        $stmt = $this->con->prepare("insert into proof(email,name,amount,file)values(?,?,?,?)");
        $stmt->bind_param("ssss",$email,$name,$amount,$file);
        $stmt->execute();

        return $stmt;

        $stmt->close;
    }
     public function deleteUp($id){ // delete payment Proof
        $stmt = $this->con->prepare("delete from proof where id =$id");
        $stmt->execute();
    }


    public function AllBalance(){

        $stmt = $this->con->prepare("select sum(amount) as total from deposit");

        $stmt->execute();

        $result = $stmt->get_result();

        if($result->num_rows > 0){
            
            $row = $result->fetch_array();
             return $row['total'];
        }else{
            return 0;
        }
    }

    public function resetPassword($to){

        $subject = "Reset your password";


        $htmlContent = "

            <html> 



                <head> 



                    <title>Quick link</title> 



                </head> 



                <body> 



                    <h1>Please Reset Your password!</h1> 



                    <p>Hi there, click on this <a href='http://elitsoption.com/site/user/changepassword.php?list_data=$to'><b>Link</b></a> To reset your password</p>;



                </body> 



            </html>";



        $header = "noreply@eliteOption.com";

        $header .= "MIME-Version: 1.0" . "\r\n"; 

        $header .= "Content-type:text/html;charset=UTF-8"; 

         mail($to,$subject,$htmlContent,$header);

         //header("location:site/user/changepassword.php?list_data=$to");

            // $error = "<p class='text-success'>A verification link has been sent to your email</p>";

    }

    public function SendMail($to,$email,$password){

        $subject = "ElitsOption Registeration Complete";
        $htmlContent = "
            <html> 
                <head> 
                    <title>Quick link</title> 
                </head> 
                <body> 

                    <h3>Thanks for joining ElitsOption!</h2> 

                    <p><b>email:</b>$email<br>

                    <b>Password:</b>$password<br>

                    </p>

                    <p>Please verified you are visiting www.elitsoption.com</p>
                </body> 
            </html>";
        $header  = "from: Elitsoption.com <noreply@elitsOption.com>". "\r\n"; 
        $header .= "Reply-to: Elitsoption.com <noreply@elitsOption.com>" . "\r\n"; 

        $header .= "MIME-Version: 1.0" . "\r\n"; 

        $header .= "Content-type:text/html;charset=UTF-8" . "\r\n"; 

         mail($to,$subject,$htmlContent,$header);
    }

    public function changePassword($email,$pass){

        $stmt = $this->con->prepare("update user set password=? where email =?");

        $stmt->bind_param("ss",$pass,$email);

        $stmt->execute();

    }

    // escape strings

    private function cleanString($data){

       $data = htmlspecialchars($data);

       $data = trim($data);

       $data = stripslashes($data);

       $data = strip_tags($data);

        return $data;

    }

     public function __destruct(){
          $this->con->close()
            OR die("There was a problem disconnecting from the database.");
     }
}











?>