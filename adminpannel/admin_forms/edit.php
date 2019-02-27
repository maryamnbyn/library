<?php
function __autoload($class)
{
    require_once "classes/$class.php";
}

if (isset($_GET['id'])) {
    $uid = $_GET['id'];
    $book = new book();
    $result = $book->selectOne($uid);
}


if (isset($_POST['submit'])) {
    $book = new book();
    $book->update($_POST, $_FILES);


}
$book = new writer();
$writers = $book->getwriters();
$category = new category();
$categoryBooks = $category->getcategory();
?>
<html>
<head>
    <meta charset=utf-8>
    <title>Edit Books</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
          integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>

<!--navbar-->

<?php include "admin_thems/navbar.php" ?>
<?php include "admin_thems/sidebar.php" ?>

<!--create table-->
<div class="container mt-4">

    <div class="col-lg-12">

        <div class="jumbotron">

            <h4 class="mb-12">Edit book</h4>


            <form action="" method="post" enctype="multipart/form-data">
                <input type="hidden" name="id" value="<?php echo $result['id']; ?>">
                <div class="form-group">
                    <label for="name">Name: </label>
                    <input type="text" class="form-control" name="name" aria-describedby="emailHelp"
                           placeholder="Enter Name" value="<?php echo $result['name']; ?>">

                </div>
                <div class="form-group">
                    <label for="date_of_print">Date Of Print</label>
                    <input type="date" name="date" class="form-control" placeholder="Date_Of_Print"
                           value="<?php echo $result['date_of_print'] ?>">
                </div>
                <div class="form-group">
                    <label for="date_of_print">Title</label>
                    <input type="text" name="title" class="form-control" placeholder="title"
                           value="<?php echo $result['title'] ?>">
                </div>
                <div class="form-group">
                    <label for="description">description</label>
                    <input type="text" name="description" class="form-control" placeholder="title"
                           value="<?php echo $result['description'] ?>">
                </div>


                <div class="form-group">
                    <label for="Writer Name">Writer Name</label>

                    <div class="form-label-group">
                        <select type="text" name="writerID" class="form-control" placeholder="witerID"
                        >
                            <?php
                            foreach ($writers as $writer) {
                                ?>
                                <option value="<?= $writer['id'] ?>"><?php echo $writer['name'] ?></option>

                            <?php } ?>
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label for="categoryID">categoryID</label>

                    <div class="form-label-group">
                        <select type="text" name="categoryID" class="form-control" placeholder="categoryID"
                                r>
                            <?php

                            foreach ($categoryBooks as $categoryBook) {
                                ?>
                                <option value="<?= $categoryBook['id'] ?>"><?php echo $categoryBook['title'] ?></option>

                            <?php } ?>
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label for="date_of_print">Pic Of Book</label>
                    <input type="file" name="picbook" class="form-control" placeholder="picbook"
                           value="<?php echo $result['picbook'] ?>">
                </div>


                <div class="form-group">
                    <label for="Num_of_print">num_of_print</label>
                    <input type="text" name="num" class="form-control" placeholder="Num_of_print"
                           value="<?php echo $result['num_of_print'] ?>">
                </div>

                <input type="submit" name="submit" class="btn btn-primary">Add Book</input>

            </form>

        </div>

    </div>
    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Page level plugin JavaScript-->
    <script src="vendor/chart.js/Chart.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin.min.js"></script>

    <!-- Demo scripts for this page-->
    <script src="js/demo/chart-area-demo.js"></script>
    <script src="js/demo/chart-bar-demo.js"></script>
    <script src="js/demo/chart-pie-demo.js"></script>
</body>
</html>