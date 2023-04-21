<?php
include('header.php');
if (isset($_SESSION['username'])) {
    header('Location: users.php');
    exit;
}
?>


<section class="mt-5">
    <div class="container">
        <div class="row">
            <div class="form_area">
                <h1 class="mb-4">User Registration Form</h1>
                <form method="POST" enctype="multipart/form-data">
                    <div class="mb-3">
                        <label>User Name</label>
                        <input type="text" class="form-control" name="username" required>
                    </div>
                    <div class="mb-3">
                        <label>Phone Number</label>
                        <input type="number" class="form-control" name="phone" required>
                    </div>
                    <div class="mb-3">
                        <label>Gender: </label>
                        <div class="form-check form-check-inline">

                            <input class="form-check-input" type="radio" name="gender" id="inlineRadio1" value="MALE" checked>
                            <label class="form-check-label" for="inlineRadio1">Male</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="gender" id="inlineRadio2" value="FEMALE">
                            <label class="form-check-label" for="inlineRadio2">Female</label>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label>Address</label>
                        <textarea name="address" class="form-control" cols="30" rows="10" required></textarea>
                    </div>
                    <div class="mb-3">
                        <label>Upload Photo</label>
                        <input type="file" class="form-control" name="image" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Password</label>
                        <input type="password" class="form-control" name="password" required>
                    </div>

                    <button type="submit" class="btn btn-primary" name='add_user'>Add User</button>
                    <a href="index.php">I Have already an Account</a>
                </form>
            </div>
        </div>
    </div>
</section>

<?php

if (isset($_POST['add_user'])) {
    //collect the input values
    $userName  = $_POST['username'];
    $phone  = $_POST['phone'];
    $address  = $_POST['address'];
    $gender =  strtoupper($_POST['gender']);
    $password =  $_POST['password'];

    //get the image informations
    if (isset($_FILES['image'])) {
        $fileName =  $_FILES['image']['name'];
        $fileTempName =  $_FILES['image']['tmp_name'];
    }

    //move the file to project directory
    $targetDirectory = "uploads/";
    $targetFile = $targetDirectory . basename($fileName);
    //move_uploaded_file($fileTempName, $targetFile);





    $crud->create($userName, $phone, $gender, $address, $fileName, $password);
}


?>




<?php
include('footer.php');

?>