<?php
   include "adminpannel/admin_forms/classes/Db.php" ;
   include "adminpannel/admin_forms/classes/book.php";
   include "userTheme/navbar.php";
   $books   = new book();
   $results = $books->showcategory();
   $book    = new book();
?>
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
                <img src="images/1.jpg" alt="Iraniyan Library" style="width:100% ; height: 500px;">
                <div class="carousel-caption"
                "br-border">
                <h3>Iraniyan Library </h3>
                <p>This article needs additional citations for verification. Please help improve this article by adding citations to reliable sources. Unsourced material may be challenged and removed.</p>
            </div>
        </div>
        <div class="item">
            <img src="images/2.jpg" alt="Iraniyan Library" style="width:100% ; height: 500px;">
            <div class="carousel-caption">
                <h3>Iraniyan Library </h3>
                <p>This article needs additional citations for verification. Please help improve this article by adding citations to reliable sources. Unsourced material may be challenged and removed. </p>
            </div>
        </div>
        <div class="item">
            <img src="images/3.jpg" alt="happy chrismas" style="width:100% ; height: 500px;">
            <div class="carousel-caption">
                <h3>Iraniyan Library </h3>
                <p>This article needs additional citations for verification. Please help improve this article by adding citations to reliable sources. Unsourced material may be challenged and removed. </p>
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
            <?php
            $book       = new book();
            $books     = $book->showCategoryBook($_GET['id']);
            foreach ($books as $book)
            {
            ?>
            <div class="col-md-3 card-body card style="width: 18rem;">
            <img class="imgm" src="adminpannel/admin_forms/uploads/<?php echo $book['bookImage'] ?>"
            <h5 class="card-title  "><?php echo "Name Of Book: ".$book['name'] ?></h5>
            <h5 class="card-title  text-danger"><?php $conditions = $book->bookCondition($book['name'])?></h5>
            <h5 class="card-title"><?php echo "Title Of Book: ".$book['title'] ?></h5>
            <a href="ShowInformation.php?id=<?php echo $book['bookID'];?>" class="btn btn-primary"> more Imformation</a>
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
    <span>copyrighy @Iraniyan Library 2018</span>
</div>
</div>
</body>

</html>
