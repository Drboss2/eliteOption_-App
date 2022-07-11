<?php
include_once '../config/db.php';
include_once "script.php";

//instantiate database object
$database = new Database;
$db = $database->connect();

//instantiate user object
$user  = new User($db);

if(isset($_POST['manageRecode'])){  // getrecode with pagination
    $result = $user->manageRecordsWitnPagination('user',$_POST['pageno']);
    if($result !== 'no'){
        $rows = $result['rows'];
        $pagination = $result['pagination'];
        if(($rows) > 0){
            foreach($rows as $key=> $row){?>
                <tr>
                    <td><?php echo $row['name']?></td>
                    <td><?php echo $row['email']?></td>
                    <td><?php echo $row['username']?></td>
                    <td><?php echo $row['status']?></td>
                    <td><?php echo $row['date']?></td>
                    <td><a class='btn btn-danger btn-sm del' did="<?php echo $row['user_id']?>" href="javascript:void(0)">delete</a></td>
                    <td><a class='btn btn-info btn-sm ban' d="<?php echo $row['user_id']?>" href="javascript:void(0)">ban</a>
                    <a class='btn btn-success btn-sm unban' id="<?php echo $row['user_id']?>" href="javascript:void(0)">unban</a></td>
                    </td>
                </tr>
            <?php
            }
        }
        ?>
            <tr><td colspan="5"><?php echo $pagination?></td></tr>
        <?php

    }else{
        echo "<tr><td colspan='5'>no record found</td></tr>";
    }
}
if(isset($_POST['manageProof'])){  // getrecode with pagination
    $result = $user->manageRecordsWitnPagination('proof',$_POST['pageno']);
    if($result !== 'no'){
        $rows = $result['rows'];
        $pagination = $result['pagination'];
        if(($rows) > 0){
            foreach($rows as $key=> $row){?>
                <tr>
                    <td><?php echo $row['name']?></td>
                    <td><?php echo $row['email']?></td>
                    <td>$<?php echo $row['amount']?></td>
                    <td><img style="width:200px; max-height:500px;" class='img-fluid' src="../img/<?php echo $row['file']?>"></td>
                    <td><?php echo $row['date']?></td>
                    <td><a class='btn btn-danger btn-sm del' did="<?php echo $row['id']?>" href="javascript:void(0)">remove</a></td>
                </tr>
            <?php
            }
        }
        ?>
            <tr><td colspan="5"><?php echo $pagination?></td></tr>
        <?php

    }else{
        echo "<tr><td colspan='5'>no record found</td></tr>";
    }
}
if(isset($_POST['withdrawal'])){  // getrecode with pagination
    $result = $user->manageRecordsWitnPagination('withdrawal',$_POST['pageno']);
    if($result !== 'no'){
        $rows = $result['rows'];
        $pagination = $result['pagination'];
        if(($rows) > 0){
            foreach($rows as $key=> $row){?>
                <tr>
                    <td><?php echo $row['name']?></td>
                    <td><?php echo $row['email']?></td>
                    <td><?php echo $row['username']?></td>
                    <td>$<?php echo $row['amount']?></td>
                    <td><?php echo $row['date']?></td>
                    <td><a class='btn btn-danger btn-sm del' did="<?php echo $row['id']?>" href="javascript:void(0)">remove</a></td>
                </tr>
            <?php
            }
        }
        ?>
            <tr><td colspan="5"><?php echo $pagination?></td></tr>
        <?php

    }else{
        echo "<tr><td colspan='5'>no record found</td></tr>";
    }
}
if(isset($_POST['managedepo'])){  // getrecode with pagination
    $result = $user->GetAllDeposit($_POST['pageno']);
    if($result !== 'no'){
        $rows = $result['rows'];
        $pagination = $result['pagination'];
        if(($rows) > 0){
            foreach($rows as $key=> $r){?>
                <tr>
                    <td><?php echo $r['name']?></td>
                    <td><?php echo $r['email']?></td>
                    <td><?php echo $r['username']?></th>
                    <td><?php echo $r['plan']?></td>
                    <td>$<?php echo $r['amount']?></td>
                    <td><?php echo $r['status']?></td>
                    
                    <td>
                        <a class='btn btn-danger btn-sm deletetran' did="<?php echo $r['id']?>" href="javascript:void(0)">delete</a>
                        <a class='btn btn-success btn-sm approved' a="<?php echo $r['id']?>" href="javascript:void(0)">approve</a>
                    </td>
                    <td><?php echo $r['date']?></td>
                </tr>
            <?php
            }
        }
        ?>
            <tr><td colspan="5"><?php echo $pagination?></td></tr>
        <?php

    }else{
        echo "<tr><td colspan='5'>no record found</td></tr>";
    }
}

?>