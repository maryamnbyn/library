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

                <li class="active"><a href="#">about us</a></li>

                <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#">Category books <span class="caret"></span></a>
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
<div>
    <div id="myCarousel" data-ride="carousel" class="carousel slide">
        <ol class="carousel-indicators">
            <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
            <li data-target="#myCarousel" data-slide-to="1"></li>
            <li data-target="#myCarousel" data-slide-to="2"></li>


        </ol>
        <div class="carousel-inner">
            <div class="item active">

                <img src="images/1.jpg" alt="happy chrismas" style="width:100% ; height: 500px;">
                <div class="carousel-caption"
                "br-border">
                <h3>christmas shopping </h3>
                <p>Industries completely dependent on Christmas include Christmas cards, of which 1.9 billion are </p>
            </div>
        </div>
        <div class="item">

            <img src="images/2.jpg" alt="happy chrismas" style="width:100% ; height: 500px;">
            <div class="carousel-caption">
                <h3>christmas shopping </h3>
                <p>Industries completely dependent on Christmas include Christmas cards, of which 1.9 billion are </p>
            </div>
        </div>
        <div class="item">

            <img src="images/3.jpg" alt="happy chrismas" style="width:100% ; height: 500px;">
            <div class="carousel-caption">
                <h3>christmas shopping </h3>
                <p>Industries completely dependent on Christmas include Christmas cards, of which 1.9 billion are </p>
            </div>
        </div>
    </div>

    <a class="left carousel-control" href="#myCarousel" data-slide="prev">
        <span class="glyphicon glyphicon-chevron-left"></span>
        <span class="sr-only">previous</span>
    </a>
    <a class="right carousel-control" href="#myCarousel" data-slide="next">
        <span class="glyphicon glyphicon-chevron-right"></span>
        <span class="sr-only">next</span>
    </a>
</div>

<!--about us-->
<div class="about-us">
    <div class="container">
        <div class="img-about-us col-md-6">
            <img src="images/20.jpg" width="100%" height="450px" ;>
        </div>
        <div class="exp-about-us col-md-6">
            <h2>
                <mark>Iraniyan Library</mark>
                <small> library Of Book</small>
            </h2>
            <p>
                Although, in the main, these are Persian and other Iranian language publications, the library has also a growing collection of foreign language books and publications on Iran.
            <blockquote>
                The Iranian Library is situated in Acton, in West London and is the library of the Iranian community in the United Kingdom. It is the largest library in the world outside Iran by number of items catalogued. The library is a major research library, holding around 30 thousands items. In addition to books the library also keep manuscripts, journals, newspapers, magazines, sound and music recordings, videos, play-scripts, patents, databases, maps, stamps, prints, drawings. The library is also committed to increasing its stock of books for younger readers. It continuously receives copies of newly published Persian books both in Iran and abroad
            </blockquote>
            </p>

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
<div class="container">
    <div class="row">
        <div class="col-sm">


            <?php $book = new book();
            $images = $book->showCategoryBook($_GET['id']);

            foreach ($images as $image){
            ?>

            <div class="col-md-3 ">
                <img class="imgm" src="adminpannel/admin_forms/uploads/<?php echo $image['bookImage'] ?>"
            </div>
        </div>
        <?php } ?>

    </div>
</div>


<div class="pager-vn">
    <ul class="pager">
        <li class="previous"><a href="#">pre</a></li>
        <li class="next"><a href="#">next</a></li>
    </ul>

</div>


<!--footer-->
</div>
<div class="footer navbar-inverse text-center">
    <span>copyrighy @christmas_shopping 2018</span>
</div>
</div>
</body>

</html>
