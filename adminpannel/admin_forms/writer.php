<?php
function __autoload($class)
{
    require_once "classes/$class.php";
}
if (isset($_POST['submit'])) {


    $name = $_POST['name'];
    $birthday= $_POST['birthday'];
    $city = $_POST['city'];




    $fields = [
        'name' => $name,
        'birthday' => $birthday,
        'city' => $city,

    ];
    $writer = new writer();

    $writer->insert($fields);
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
        <div class="card-header">Login  </div>
        <div class="card-body">
            <form method="post" action="">
                <div class="form-group">
                    <div class="form-label-group">
                        <input type="text" name="name" class="form-control" placeholder="name" required="required" autofocus="autofocus">
                        <label for="inputEmail">name</label>
                    </div>
                </div>
                <div class="form-group">
                    <div class="form-label-group">
                        <input type="date" name="birthday" class="form-control" placeholder="birthday" required="required">
                        <label for="birthday">birthday</label>
                    </div>
                </div>
                <div class="form-group">
                    <div class="form-label-group">
                        <input type="text" name="city" class="form-control" placeholder="city" required="required">
                        <label for="city">city</label>
                    </div>
                </div>

                <input type="submit" name = "submit" class="btn btn-primary"></input>
            </form>
            <div class="text-center">
                <a class="d-block small mt-3" href="register.html">Register an Account</a>
                <a class="d-block small" href="forgot-password.html">Forgot Password?</a>
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
