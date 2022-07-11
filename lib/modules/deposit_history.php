<?php
 include_once "../config/db.php";
 include_once "script.php";

 // instantiate db object
 $database = new Database;
 $db = $database->connect();

 // instantiate user object
 $user = new User($db);

// check if javascript is set
if(isset($_POST['getHistory'])){
    // call the  getDepostHistory method
     echo json_encode($user->getDepostHistory());
     exit();  
}
 // call the  getDepostHistory method on keypress
if(isset($_POST['History'])){
    $data = $user->getDepostHistoryOnChange($_POST['search']);
    
    foreach($data as $key => $row){
        echo  " 
            <tr>
                <td>".$row['trans_id']."</td>
                <td>".$row['amount']."</td>
                <td>Bitcoin</td>
                <td>".$row['status']."</td>
                <td>".$row['date']."</td>
            </tr>
        ";
    }
    exit();
}
// send investment history to javascript
if(isset($_POST['getInvestmentHistory'])){
    echo json_encode($user->getDepostHistory());
}
?>
