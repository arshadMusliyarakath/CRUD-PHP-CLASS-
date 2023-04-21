<?php
include('header.php');
if (!isset($_SESSION['username'])) {
    header('Location: index.php');
    exit;
}
if (isset($_REQUEST['id'])) {

    $id =  base64_decode($_REQUEST['id']);
    $row = $crud->singleView($id);
}
?>

<section class="mt-5">
    <div class="container">
        <div class="row">
            <div class="form_area">
                <h1 class="mb-4">Edit User</h1>
                <form method="POST" enctype="multipart/form-data">
                    <div class="mb-3">
                        <label>User Name</label>
                        <input type="text" class="form-control" name="username" value="<?php echo $row['username'] ?>" required>
                    </div>
                    <div class="mb-3">
                        <label>Phone Number</label>
                        <input type="number" class="form-control" name="phone" value="<?php echo $row['phone'] ?>" required>
                    </div>
                    <div class="mb-3">
                        <label>Gender: </label>
                        <div class="form-check form-check-inline">

                            <input class="form-check-input" type="radio" name="gender" id="inlineRadio1" value="MALE" <?php if ($row['gender'] == "MALE") echo "checked"; ?>>
                            <label class="form-check-label" for="inlineRadio1">Male</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="gender" id="inlineRadio2" value="FEMALE" <?php if ($row['gender'] == "FEMALE") echo "checked"; ?>>
                            <label class="form-check-label" for="inlineRadio2">Female</label>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label>Address</label>
                        <textarea name="address" class="form-control" cols="30" rows="10" required><?php echo $row['address'] ?></textarea>
                    </div>
                    <div class="mb-3">
                        <label>Upload Photo</label>
                        <input type="file" class="form-control" name="image">
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Password</label>
                        <input type="password" class="form-control" name="password" required value="<?php echo $row['password'] ?>" required>
                    </div>

                    <button type="submit" class="btn btn-primary" name='edit_user'>Edit User</button>

                </form>
            </div>
        </div>
    </div>
</section>

<?php

if (isset($_POST['edit_user'])) {

    $id = $row['id'];
    //collect the input values
    $userName  = $_POST['username'];
    $phone  = $_POST['phone'];
    $address  = $_POST['address'];
    $gender =  $_POST['gender'];
    $password =  $_POST['password'];

    //get the image informations
    if (isset($_FILES['image'])) {
        $fileName =  $_FILES['image']['name'];
        $fileTempName =  $_FILES['image']['tmp_name'];
    } else {
        $fileName = $row['photo'];
    }

    //move the file to project directory
    $targetDirectory = "uploads/";
    $targetFile = $targetDirectory . basename($fileName);
    //move_uploaded_file($fileTempName, $targetFile);


    $crud->update($id, $userName, $phone, $gender, $address, $fileName, $password);
}


?>




<?php
include('footer.php');

?>