<?php
include_once('classes/user.php');
if (isset($_POST['submit'])){
    $email =$_POST['email'];
    $pass = $_POST['pass'];
    $object = new user();
    $object->userLogin($email,$pass);
}
$errors = array();
if (isset($_POST['submit']))
{
    if (empty($email)) { array_push($errors, "email is required"); }
    if (strlen($_POST['email']) < 5) { array_push($errors, "email must be atleast 6 letters in length"); }
    if (strlen($_POST['pass']) < 5){ array_push($errors, "password must be atleast 6 letters in length"); }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>SB Admin - Login</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin.css" rel="stylesheet">

</head>

<body class="bg-dark">

<div class="container">
    <div class="card card-login mx-auto mt-5">
        <div class="card-header"> Login </br>
            <?php if (isset($_POST['submit'])&& (count($errors)> 0)){
                foreach ($errors as $error)
                    echo $error ;}?> </div>
        <div class="card-body">

            <form method="post" action="">



                <div class="form-group">
                    <div class="form-label-group">
                        <input type="text" name="email" class="form-control" placeholder="email" autofocus="autofocus">
                        <label for="inputEmail">User Name</label>
                    </div>
                </div>
                <div class="form-group">
                    <div class="form-label-group">
                        <input type="password" name="pass" class="form-control" placeholder="Password">
                        <label for="inputPassword">Password</label>
                    </div>
                </div>

                <input type="submit" name="submit" class="btn btn-primary btn-block"  value="Login" "></input>
            </form>
            <div class="text-center">
                <a class="d-block small mt-3" href="register.php">Register an Account</a>
            </div>
        </div>
    </div>
</div>

<!-- Bootstrap core JavaScript-->
<script src="vendor/jquery/jquery.min.js"></script>
<script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

<!-- Core plugin JavaScript-->
<script src="vendor/jquery-easing/jquery.easing.min.js"></script>

</body>

</html>
}