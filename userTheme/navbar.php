<?php
include "adminpannel/admin_forms/classes/writer.php";

$writer = new writer();
$writers = $writer->getwriters();
$books   = new book();
$results = $books->showcategory();
?>

<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <title>Library</title>
    <meta name="viewport" content="width=device-width , intial-scale=1">
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <!--ink rel="stylesheet" href="./css/bootstrap.min.css">
    <script src="./js/bootstrap.min.js"></script>
    <script src="./js/jquery.min.js"></script>-->
    <link rel="stylesheet" type="text/css" href="adminpannel/admin_forms/css/style.css">

</head>

<body>
<div class="content">
    <!-- notification message -->

    <!-- logged in user information -->

</div>

<!--navbar-->
<nav class="navbar navbar-inverse vn-navbar">
    <?php if (isset($_SESSION['success'])) : ?>
        <div class="error success" >
            <h4>
                <?php
                echo $_SESSION['success'];
                unset($_SESSION['success']);
                ?>
            </h4>
        </div>
    <?php endif ?>
    <div class="container">
        <div class="navbar-header">
    <span class="navbar-nav" style="color: white">
    <?php  if (isset($_SESSION['username'])) : ?>
        <p>Welcome <strong><?php echo $_SESSION['username']; ?></strong></p>
        <p> <a href="index.php" style="color: red;">logout</a> </p>
    <?php endif ?></span>
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#MyNavbar">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>

            <!--<a href="#" class="navbar-brand">christmas shopping</a>-->
        </div>

        <div id="MyNavbar" class="collapse navbar-collapse ">

            <ul class="nav navbar-nav ">

                <li><a href="#">about us</a></li>

                <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#">books Category <span
                            class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <?php foreach ($results as $result)
                        {
                            ?>
                            <li class="dropdown"><a
                                    href="showCategoryBook.php?id=<?php echo $result['id']; ?>"><?php echo $result['title']; ?></a>
                            </li>
                        <?php } ?>
                    </ul>
                </li>

                <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#">Writers Book <span
                                class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <?php foreach ($writers as $writer) { ?>
                            <li class="dropdown"><a
                                        href="showWriter.php?id=<?php echo $writer['id']; ?>"><?php echo $writer['name']; ?></a>
                            </li>
                        <?php } ?>
                    </ul>
                </li>

                <li><a href="showWriterImage.php">Writers</a></li>

                    </ul>
                </li>

            </ul>
            <ul class="nav navbar-nav navbar-right">
                <li><a href="adminpannel/admin_forms/login.php"><span class="glyphicon glyphicon-user"></span></a></li>
                <li><a href="#"><span class="glyphicon glyphicon-shopping-cart"></span></a></li>
                <li><a href="#"><span class="glyphicon glyphicon-search"></span></a></li>

            </ul>
        </div>
    </div>

</nav>