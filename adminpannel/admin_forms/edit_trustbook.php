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
<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="#">POWER EMPOLAYEE</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
                <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">Link</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">contanct</a>
            </li>

        </ul>
        <form class="form-inline my-2 my-lg-0">
            <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
            <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
        </form>
    </div>
</nav>
<!--create table-->
<div class="container mt-4">
    <div class="col-lg-12">
        <div class="jumbotron">
            <h4 class="mb-4">Edit trustbook</h4>

            <form action="" method="post">
                <input type="hidden" name="id" value="<?php echo $result['id'];?>">
                <div class="form-group">
                    <label for="name">bookID: </label>
                    <select type="text" class="form-control"   name = "bookID" aria-describedby="emailHelp"
                           placeholder="Enter Name" value="<?php echo $result['bookID'];?>">
                        <?php
                        foreach ($books as $book){
                            ?>

                            <option value="<?= $book['id'] ?>" ><?= $book['name'] ?></option>

                        <?php } ?>
                    </select>


                </div>
                <div class="form-group">
                    <label for="date_of_print">Lent Of Book</label>
                    <input type="date" name = "date" class="form-control"  placeholder="Date_Of_Print" value="<?php echo $result['lend_of_book']?>">
                </div>
                <div class="form-group">
                    <label for="date_of_print">To Take Back</label>
                    <input type="date" name ="datee" class="form-control"  placeholder="title" value="<?php echo $result['to_take_back']?>">
                </div>


                <input type="submit" name = "submit" class="btn btn-primary">Add trustBook</input>

            </form>
        </div>
    </div>
</body>
</html>