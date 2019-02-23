<?php
function __autoload($class)
{
    require_once "classes/$class.php";
}
if(isset($_GET['id'])){
    $uid = $_GET['id'];
    $trustbook = new trustbook();
    $result =  $trustbook->selectOne($uid);



}





if (isset($_POST['submit'])){


    $bookID = $_POST['bookID'];
    $date = $_POST['date'];
    $datee = $_POST['datee'];



    $fields = [
        'bookID'=>$bookID,
        'lend_of_book'=>$date,
        'to_take_back'=>$datee,

    ];
    $id =$_POST['id'];
    $trustbook = new trustbook();
    $trustbook->update($fields,$id);


}
$trustbook = new trustbook();
$books = $trustbook->getBooks();
$trustbook = new trustbook();
$users = $trustbook->getusers();
?>
<html>
<head>
    <meta charset=utf-8>
    <title>Edit Books</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
          integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>
<?php include "admin_thems/navbar.php"?>
<?php include "admin_thems/sidebar.php"?>

<!--create table-->
<div class="container mt-4">
    <div class="col-lg-12">
        <div class="jumbotron">
            <h4 class="mb-4">Edit trustbook</h4>

            <form action="" method="post">
                <input type="hidden" name="id" value="<?php echo $result['id'];?>">
                <div class="form-group">
                    <label for="name">book Name: </label>
                    <select type="text" class="form-control"   name = "bookName" aria-describedby="emailHelp"
                           placeholder="Enter Name" value="">
                        <?php
                        foreach ($books as $book){
                            ?>

                            <option value="<?= $book['id'] ?>" ><?= $book['name'] ?></option>

                        <?php } ?>
                    </select>

                    <label for="name">User Name: </label>
                    <select type="text" class="form-control"   name = "UserName" aria-describedby="emailHelp"
                            placeholder="Enter Name" value="">
                        <?php
                        foreach ($users as $user){
                            ?>

                            <option value="<?= $user['id'] ?>" ><?= $user['name'] ?></option>

                        <?php } ?>
                    </select>



                <div class="form-group">
                    <label for="date_of_print">Lent Of Book</label>
                    <input type="date" name = "date" class="form-control"  placeholder="Date_Of_Print" value="<?php echo $result['lend_of_book']?>">
                </div>
                <div class="form-group">
                    <label for="date_of_print">To Take Back</label>
                    <input type="date" name ="datee" class="form-control"  placeholder="title" value="<?php echo $result['to_take_back']?>">
                </div>

                </div>
                <input type="submit" name = "submit" class="btn btn-primary"></input>

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