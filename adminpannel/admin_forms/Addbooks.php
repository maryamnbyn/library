<?php
function __autoload($class)
{
    require_once "classes/$class.php";
}

include "classes/UserController.php";
$users = new \adminpannel\admin_forms\classes\UserController();
$validations = $users->addbookvalidation();


if (isset($_POST['submit']) && $validations == null) {
    $book = new book();
    $book->addBook($_POST, $_FILES);

}
$book = new book();
$categoryBooks = $book->categoryBook();
$book = new book();
$writers = $book->getwriters();

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="js/script.js"></script>
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Add Books</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin.css" rel="stylesheet">

</head>

<body class="bg-dark">
<?php include "admin_thems/navbar.php" ?>
<?php include "admin_thems/sidebar.php" ?>

<div class="container">
    <div class="card card-register mx-auto mt-5">
        <div class="card-header">Add Books<br>
            <?php
            if (is_array($validations)) {
                foreach ($validations as $validation) {
                    ?>
                    <div class="m-1">
                        <button class="btn btn-danger"> <?php echo $validation[0]; ?></button>
                    </div>
                    <?php

                }
            }

            ?>
        </div>
        <div class="card-body">
            <form action="" method="post" enctype="multipart/form-data">
                <div class="form-group">
                    <div class="form-row">
                        <div class="col-md-6">
                            <div class="form-label-group">

                                <input type="hidden" name="id">

                                <input type="text" name="name" class="form-control"
                                       autofocus="autofocus">
                                <label for="Name">name</label>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-label-group">
                                <input type="date" name="date" class="form-control" placeholder="Date Of Print"
                                >
                                <label for="date">Date Of Print</label>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="form-label-group">
                        <input type="text" name="title" class="form-control" placeholder="Title">
                        <label for="inputTitle">Title</label>
                    </div>
                </div>
                <div class="form-group">
                    <div class="form-label-group">
                        <select type="text" name="writerID" class="form-control" placeholder="witerID"
                        >
                            <label for="witerID">witerID</label>
                            <?php
                            foreach ($writers as $writer) {
                                ?>
                                <option value="<?= $writer['id'] ?>"><?= $writer['name'] ?></option>

                            <?php } ?>
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <div class="form-label-group">
                        <select type="text" name="categoryID" class="form-control" placeholder="categoryID"
                                r>
                            <label for="categoryID">categoryID</label>
                            <?php
                            foreach ($categoryBooks as $categoryBook) {
                                ?>
                                <option value="<?= $categoryBook['id'] ?>"><?= $categoryBook['title'] ?></option>

                            <?php } ?>
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <div class="form-row">

                        <div class="col-md-6">
                            <div class="form-label-group">
                                <input type="text" name="num" class="form-control" placeholder="Num Of Print"
                                >
                                <label for="Num Of Print">Num Of Print</label>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="form-row">

                                <div class="col-md-6">
                                    <div class="form-label-group">
                                        <input type="text" name="description" class="form-control" placeholder="description">
                                        <label for="description">description</label>
                                    </div>
                                </div>

                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-label-group">
                                <fieldset id="buildyourform">
                                    <input type="file" name="image[0]" class="form-control" placeholder="picbook">
                                </fieldset>

                            </div>

                            <input type="button" value="+" class="add" id="add"/>
                        </div>
                    </div>
                </div>
                <input type="submit" name="submit" class="btn btn-primary"></input>
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
