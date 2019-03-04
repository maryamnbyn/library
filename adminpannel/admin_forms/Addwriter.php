<?php

    function __autoload($class)
    {
        require_once "classes/$class.php";
    }

include "classes/UserController.php";

$users = new \adminpannel\admin_forms\classes\UserController();
$validations = $users->AddWriterValidation();
    if (isset($_POST['submit']) && $validations == null  ) {
        $writer = new writer();
        $writer->addWriter($_POST,$_FILES);
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

    <title>Add Writer</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin.css" rel="stylesheet">

</head>

<body class="bg-dark">
<?php include "admin_thems/navbar.php"?>
<?php include "admin_thems/sidebar.php"?>

<div class="container">
    <div class="card card-login mx-auto mt-5">
        <div class="card-header">Add Writer  <br>
            <?php
            if (is_array($validations)){
                foreach ($validations as $validation){?>
                    <div class="m-1"><button class="btn btn-danger"> <?php echo $validation[0] ;?></button></div>
                    <?php

                }}

            ?>
        </div>
        <div class="card-body">
            <form method="post" action="" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="Name">Writer Name:</label>

                    <div class="form-label-group">
                        <input type="text" name="name" class="form-control" placeholder="name"  autofocus="autofocus">
                        <label for="inputEmail">name</label>
                    </div>
                </div>
                <div class="form-group">
                    <div class="form-label-group">
                        <input type="date" name="birthday" class="form-control" placeholder="birthday" >
                        <label for="birthday">birthday</label>
                    </div>
                </div>
                <div class="form-group">

                    <div class="form-label-group">
                        <input type="text" name="description" class="form-control" placeholder="description"  autofocus="autofocus">
                        <label for="description">Writer Description:</label>
                    </div>
                </div>
                <div class="form-group">
                    <div class="form-label-group">
                        <input type="text" name="city" class="form-control" placeholder="city" >
                        <label for="city">city</label>
                    </div>
                </div>
                <div class="form-group">

                    <div class="form-label-group">
                        <input type="file" name="writerImage" class="form-control" placeholder="image"  autofocus="autofocus">
                        <label for="image">Writer Image:</label>
                    </div>
                </div>
                <input type="submit" name = "submit" class="btn btn-primary"></input>
            </form>

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
