<?php
function __autoload($class)
{
    require_once "classes/$class.php";
}
if (isset($_GET['del'])){
    $id = $_GET['del'];
    $trustbook =new trustbook();
    $trustbook->destroy($id);
}

?>
<html>
<head>
    <meta charset=utf-8>
    <title>List Trust Book</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
          integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>
<!--navbar-->
<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="#">List Trust Book</a>
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
            <h4 class="mb-4">List Trust Book!</h4>
            <table class="table">
                <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Book ID</th>
                    <th scope="col">lend Of Book </th>
                    <th scope="col">To Take Back</th>

                </tr>
                </thead>
                <tbody>
                <?php
                $trustbook = new trustbook();
                $rows = $trustbook->select();
                foreach ($rows as $row) {
                    ?>
                    <tr>
                        <th scope="row"><?php echo $row['id'];?></th>
                        <td><?php echo  $row['name'];?></td>
                        <td><?php echo $row['lend_of_book'];?></td>
                        <td><?php echo $row['to_take_back'];?></td>

                        <td><a class="btn btn-sm btn-primary" href="edit_trustbook.php?id=<?php echo $row['id'];?>">Edit</a>&nbsp
                            <a class="btn btn-sm btn-danger" href="listTrustBook.php?del=<?php echo $row['id'];?>">Delete</a></td>
                    </tr>
                    <?php

                }
                ?>


                </tbody>
            </table>
        </div>

    </div>
</div>
</body>
</html>