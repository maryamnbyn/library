<?php
function __autoload($class)
{
    require_once "classes/$class.php";
}
if (isset($_POST['submit'])){


    $name = $_POST['name'];
    $date = $_POST['date'];
    $title = $_POST['title'];
    $writerID = $_POST['writerID'];
    $categoryID = $_POST['categoryID'];
    $num = $_POST['num'];

    $fields = [
        'name'=>$name,
        'date_of_print'=>$date,
        'title'=>$title,
        'writerID'=>$writerID,
        'categoryID'=>$categoryID,
        'num_of_print'=>$num,
    ];

    $book = new book();

    $book->insert($fields);
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
<?php include "admin_thems/navbar.php"?>
<?php include "admin_thems/sidebar.php"?>

<div class="container">
    <div class="card card-register mx-auto mt-5">
        <div class="card-header">Register an Account</div>
        <div class="card-body">
            <form action="" method="post">
                <div class="form-group">
                    <div class="form-row">
                        <div class="col-md-6">
                            <div class="form-label-group">
                                <input type="text" name="name" class="form-control"  required="required" autofocus="autofocus">
                                <label for="Name">name</label>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-label-group">
                                <input type="date" name="date" class="form-control" placeholder="Date Of Print" required="required">
                                <label for="date">Date Of Print</label>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="form-label-group">
                        <input type="text" name="title" class="form-control" placeholder="Title" required="required">
                        <label for="inputTitle">Title</label>
                    </div>
                </div>
                <div class="form-group">
                    <div class="form-label-group">
                        <input type="text" name="writerID" class="form-control" placeholder="witerID" required="required">
                        <label for="witerID">witerID</label>
                    </div>
                </div>
                <div class="form-group">
                    <div class="form-label-group">
                        <input type="text" name="categoryID" class="form-control" placeholder="categoryID" required="required">
                        <label for="categoryID">categoryID</label>
                    </div>
                </div>
                <div class="form-group">
                    <div class="form-row">

                        <div class="col-md-6">
                            <div class="form-label-group">
                                <input type="text" name="num" class="form-control" placeholder="Num Of Print" required="required">
                                <label for="Num Of Print">Num Of Print</label>
                            </div>
                        </div>
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
