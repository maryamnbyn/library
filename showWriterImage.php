<?php include "adminpannel/admin_forms/classes/Db.php" ;
include "adminpannel/admin_forms/classes/book.php";




$books = new book();
$results = $books->showcategory();



?>
<?php include "userTheme/navbar.php"?>
<!--slide show-->


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


            <?php $writer = new writer();
            $writers = $writer->getwriters();
            foreach ($writers as $writer){
            ?>

            <div class="col-md-3 card-body card style="width: 18rem;">

            <img class="imgm" src="adminpannel/admin_forms/uploads/<?php echo $writer['image'] ?>"
            <h5 class="card-title  "><?php echo "Writer Name: ".$writer['name'] ?></h5>
            <h5 class="card-title"><?php echo "Writer Birthday: ".$writer['birthday'] ?></h5>
            <h5 class="card-title"><?php echo "Writer City: ".$writer['city'] ?></h5>



            <a href="showInformationWriters.php?id=<?php echo $writer['id'];?>" class="btn btn-primary"> more Imformation</a>
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
<?php include "userTheme/userFooter.php"?>
