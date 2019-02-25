<?php include "adminpannel/admin_forms/classes/Db.php" ;
include "adminpannel/admin_forms/classes/book.php";




$books = new book();
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

    <div class="container">
        <div class="navbar-header">
    <span class="navbar-nav" style="color: white">

    	<p>Welcome <strong></strong></p>
    	<p> <a href="index.php?logout='1'" style="color: red;">logout</a> </p>
    </span>
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#MyNavbar">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>


            </button>

            <!--<a href="#" class="navbar-brand">christmas shopping</a>-->
        </div>

        <div id="MyNavbar" class="collapse navbar-collapse ">

            <ul class="nav navbar-nav ">

                <li ><a href="#">about us</a></li>

                <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#">books Category <span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <?php foreach ($results as $result) { ?>
                            <li class="dropdown"><a href="showCategoryBook.php?id=<?php echo $result['id'];?>"><?php echo $result['title'] ; ?></a></li>
                        <?php }?>
                    </ul>
                </li>

                <li><a href="#">contact us</a></li>

            </ul>
            <ul class="nav navbar-nav navbar-right">
                <li><a href="login.php"><span class="glyphicon glyphicon-user"></span></a></li>
                <li><a href="#"><span class="glyphicon glyphicon-shopping-cart"></span></a></li>
                <li><a href="#"><span class="glyphicon glyphicon-search"></span></a></li>

            </ul>
        </div>
    </div>

</nav>

<!--slide show-->


<!--about us-->

<div class="about-us">
    <div class="container">
        <div class="img-about-us col-md-6">
            <?php $book = new book();
            $images = $book->showOneBook($_GET['id']);
            foreach ($images as $image){
            ?>
            <img src="adminpannel/admin_forms/uploads/<?php echo $image['bookImage'] ?>" width="100%" height="450px" ;>
            <!-- <div style ="background-image : url('images/4.jpg'); width :100% ; height:200px ;"> </div> -->
        </div>
        <div class="exp-about-us col-md-6">
            <h2>
                <mark><?php echo $image['label']?></mark>
                <small> <?php echo $image['title']?></small>
            </h2>
            <p>
                <?php echo $image['label']?>
            <blockquote>
                <?php echo $image['description']?>            </blockquote>
            </p>
<?php };?>
        </div>
    </div>


</div>
<!--icons-->
<div class="glyphicon-vn">
    <div class="container">
        <ul class="list-inline text-center">
            <li class="col-md-4"><i class="glyphicon glyphicon-shopping-cart"></i>
                <p>1,500</p></li>
            <li class="col-md-4"><i class="glyphicon glyphicon-user"></i>
                <p>1,500</p></li>
            <li class="col-md-4"><i class="glyphicon glyphicon-heart"></i>
                <p>1,500</p></li>
        </ul>
    </div>
</div>
<!--product-->



<div class="pager-vn">
    <ul class="pager">
        <li class="previous"><a href="#"></a></li>
        <li class="next"><a href="#"></a></li>
    </ul>

</div>


<!--footer-->
</div>
<div class="footer navbar-inverse text-center">
    <span>copyrighy @Iraniyan Library 2018</span>
</div>
</div>
</body>

</html>
