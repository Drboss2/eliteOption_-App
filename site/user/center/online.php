<?php
$data = $user->geAllLoginUsers();
?>

<div class="_container-fluid">
    <div class="row">
        <div class="col-lg-12 mx-auto">
        <p class='text-center'>list of Online Users</p>
            <div class="table-responsive">
                <table class='table table-bordered table-striped'>
                    <thead>
                        <th>No</th>
                        <th>name</th>
                        <th>email</th>
                        <th>username</th>
                        <th>amount</th>
                        <th>action</th>
                    </thead>
                    <tbody>
                        <?php 
                            $i = 1;
                        if($data != 0):
                            foreach($data as $r):?>
                                <tr>
                                    <td><?php echo $i++?></td>
                                    <td><?php echo $r['name']?></td>
                                    <td><?php echo $r['email']?></td>
                                    <td><?php echo $r['username']?></th>
                                    <td>
                                        <a class='btn btn-danger btn-sm delete' did="<?php echo $r['user_id']?>" href="javascript:void(0)">delete</a>
                                    </td>
                                    <td><?php echo $r['date']?></td>
                                <tr>
                            <?php endforeach;?>

                            <?php
                        endif;
                        ?>
                        </tbody>
                </table>
            </div>
        </div>
    </div>
</div>