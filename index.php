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
                <h1 class="mb-4">User Lgin</h1>
                <form method="POST">
                    <div class="mb-3">
                        <label>User Name</label>
                        <input type="text" class="form-control" name="username">
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Password</label>
                        <input type="password" class="form-control" name="password" value="1234">
                    </div>

                    <button type="submit" class="btn btn-primary" name='login'>Login</button>
                    <a href="user.register.php">Create new Account</a>
                </form>




                <?php

                if (isset($_POST['login'])) {
                    //collect the input values
                    $userName  = $_POST['username'];
                    $password =  $_POST['password'];

               

                    // Create a new user:
                    $data = $crud->login($userName,$password);

                    
                }




                ?>
            </div>

        </div>
    </div>
</section>






<?php
include('footer.php');

?>