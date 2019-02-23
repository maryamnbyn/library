<?php
function __autoload($class)
{
    require_once "classes/$class.php";
}
if (isset($_POST['submit'])){


    $name     = $_POST['name'];
    $userID   = $_POST['userID'];
    $date     = $_POST['date'];
    $datee    = $_POST['datee'];
    $writerID = $_POST['writerID'];

    $fields =
        [
        'bookID'      => $name,
        'userID'      => $userID,
        'lend_of_book'=> $datee,
        'to_take_back'=> $datee,
        'writerID'    => $writerID,
        ];

    $trustbook = new trustbook();
    $trustbook->insert($fields);

}
            $trustbook = new trustbook();
            $books     = $trustbook->getBooks();
            $trustbook = new trustbook();
            $users     = $trustbook->getusers();
            $trustbook = new trustbook();
            $writers   = $trustbook->getwriters();
?>


<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Add Trust Book</title>

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
        <div class="card-header">Add TrustBook</div>
        <div class="card-body">
            <form action="" method="post">
                <div class="form-group">
                    <div class="form-row">
                        <div class="col-md-6">
                            <div class="form-label-group">
                                <select type="text" name="name" class="form-control"  required="required" autofocus="autofocus">
                                    <label for="Name">name</label>
                                    <?php
                                    foreach ($books as $book){
                                        ?>
                                        <option value="<?= $book['id'] ?>" ><?= $book['name'] ?></option>

                                    <?php } ?>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-label-group">
                                <select type="text" name="userID" class="form-control" placeholder="userID" required="required">
                                    <label for="userID">userID</label>
                                    <?php
                                    foreach ($users as $user){
                                        ?>
                                        <option value="<?= $user['id'] ?>" ><?= $user['name'] ?></option>

                                    <?php } ?>
                                </select>
                            </div>
                        </div>


                    </div>
                </div>
                <div class="form-group">
                    <div class="form-label-group">
                        <input type="date" name="date" class="form-control" placeholder="lend Of Book" required="required">
                        <label for="lend_of_book">lend Of Book</label>
                    </div>
                </div>
                <div class="form-group">
                    <div class="form-label-group">
                        <input type="date" name="datee" class="form-control" placeholder="To Take Back" required="required">
                        <label for="to_take_back">To Take Back</label>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-label-group">
                        <select type="text" name="writerID" class="form-control" placeholder="userID" required="required">
                            <label for="text">writerID</label>
                            <?php
                            foreach ($writers as $writer){
                                ?>
                                <option value="<?= $writer['id'] ?>" ><?= $writer['name'] ?></option>

                            <?php } ?>
                        </select>
                    </div>
                </div>

                <div class="form-group">
                    <div class="form-row">

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
