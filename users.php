<?php
include('header.php');
if (!isset($_SESSION['username'])) {
   // header('Location: index.php');
   // exit;
}

?>

<section class="mt-5">
    <div class="container">
        <div class="row">
            <h1 class="mb-4">User Table</h1>
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">User Name</th>
                        <th scope="col">Phone</th>
                        <th scope="col">Gender</th>
                        <th scope="col">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $i = 1;
                    
                
                    $datas = $crud->users();
                    foreach($datas as $data){
                    ?>
                        <tr>
                            <th scope="row"><?php echo $i;$i++; ?></th>
                            <td><?php echo $data['username'] ?></td>
                            <td><?php echo $data['phone'] ?></td>
                            <td><?php echo $data['gender'] ?></td>


                            <td>
                                <a href="view.user.php?id=<?php echo base64_encode($data['id']) ?>" class="btn btn-info">View</a>
                                <a href="edit.user.php?id=<?php echo base64_encode($data['id']) ?>" class="btn btn-warning">Edit</a>
                                <a href="delete.user.php?id=<?php echo base64_encode($data['id']) ?>" class="btn btn-danger">Delete</a>
                            </td>

                        </tr>   

                    <?php
                    }

                    ?>

                </tbody>
            </table>
            <a href="logout.php" class="btn btn-danger" style="width:90px">logout</a>
        </div>
    </div>
</section>



<?php
include('footer.php');

?>