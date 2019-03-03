<?php
session_start();
include "classes/UserController.php";
include "classes/user.php";

$users = new \adminpannel\admin_forms\classes\UserController();
$validations = $users->register();
if (isset($_POST['submit']) && $validations == null  )
{
    $user = new user();
    $user->addUser($_POST);
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

    <title>SB Admin - Register</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin.css" rel="stylesheet">

</head>

<body class="bg-dark">

<div class="container">
    <div class="card card-register mx-auto mt-5">
        <div class="card-header error">Register an Account<br>
            <?php
            if (is_array($validations)){
            foreach ($validations as $validation){?>
<div class="m-1"><button class="btn btn-danger"> <?php echo $validation[0] ;?></button></div>
               <?php

            }}

            ?>
            <?php /*        if(!$users->register()->$valid){
                var_dump($users->register()->$validation()->getErrores());
            } */?> </div>
        <div class="card-body">
            <form action="" method="post">
                <div class="form-group">
                    <div class="form-row">
                        <div class="col-md-6">
                            <div class="form-label-group">
                                <input type="text" name="name" class="form-control" placeholder="First name"  autofocus="autofocus">
                                <label for="firstName">First name</label>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-label-group">
                                <input type="text" name="lastName" class="form-control" placeholder="Last name">
                                <label for="lastName">Last name</label>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <div class="form-row">
                        <div class="col-md-6">
                            <div class="form-label-group">
                                <input type="text" name="city" class="form-control" placeholder="city"  autofocus="autofocus">
                                <label for="city">city</label>
                            </div>
                        </div>

                    </div>
                </div>
                <div class="form-group">
                    <div class="form-label-group">
                        <input type="date" name="birthday" class="form-control" placeholder="birthday" >
                        <label for="birthday">birthday</label>
                    </div>
                </div>
                <div class="form-group">
                    <div class="form-row">
                        <div class="col-md-6">
                            <div class="form-label-group">
                                <input type="postcode" name="postcode" class="form-control" placeholder="Password" >
                                <label for="inputPassword">postCode</label>
                            </div>
                        </div>



                        <div class="col-md-6">
                            <div class="form-label-group">
                                <input type="text" name="discipline" class="form-control" placeholder="discipline" >
                                <label for="discipline">discipline</label>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="form-row">
                                <div class="col-md-6">
                                    <div class="form-label-group">
                                        <input type="email" name="email" class="form-control" placeholder="email"  autofocus="autofocus">
                                        <label for="email">email</label>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-label-group">
                                        <input type="password" name="password" class="form-control" placeholder="password" >
                                        <label for="password">password</label>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-label-group">
                                        <input type="password" name="confirm_password" class="form-control" placeholder="password" >
                                        <label for="password">confirm_password</label>
                                    </div>
                                </div>
                            </div>
                        </div>

                </div>
                    <input type="submit" name = "submit" class="btn btn-primary"></input>

            </form>
            <div class="text-center">
                <a class="d-block small mt-3" href="login.php">Login Page</a>
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
