<?php
include('header.php');
if(!isset($_SESSION['username']))
{
    header('Location: index.php');
    exit;
}



if(isset($_REQUEST['id'])){
   
    $id =  base64_decode($_REQUEST['id']);
    $row = $crud->singleView($id);
        ?>

<section class="mt-5 profile">
    <div class="container">
        <div class="row">
            <h1 class="mb-4">Profile</h1>

            <div class="col-md-4">
                <img src="uploads/<?php echo $row['photo']?>" alt="">
            </div>
            <div class="col-md-8">
                <h4>User Name: <b><?php echo $row['username']; ?></b></h4>
                <h4>Phone Number: <b><?php echo $row['phone']; ?></b></h4>
                <h4>Gender: <b><?php echo $row['gender']; ?></b></h4>
                <h4>Address: <b><?php echo $row['address']; ?></b></h4>
                <h4>Password: <b><?php echo $row['password']; ?></b></h4>

                <a href="edit.user.php?id=<?php echo base64_encode($row['id'])?>" class="btn btn-warning mt-2">EDIT</a>
            </div>

        </div>
    </div>
</section>






        <?php
    




}
