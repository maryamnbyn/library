<?php include "adminpannel/admin_forms/classes/Db.php" ;
include "adminpannel/admin_forms/classes/book.php";


?>

<?php include "userTheme/navbar.php"?>

<!--slide show-->


<!--about us-->

<div class="about-us">
    <div class="container">
        <div class="img-about-us col-md-6">
            <?php $writer = new writer();
            $writers = $writer->showOneWriter($_GET['id']);
            foreach ($writers as $writer){
            ?>
            <img src="adminpannel/admin_forms/uploads/<?php echo $writer['image'] ?>" width="100%" height="450px" ;>
            <!-- <div style ="background-image : url('images/4.jpg'); width :100% ; height:200px ;"> </div> -->
        </div>
        <div class="exp-about-us col-md-6">
            <h2>
                <mark><?php echo $writer['name']?></mark>
            </h2>
            <h4>
                <?php echo"Writer Name : ".$writer['city']?>
            </h4>
            <h4>
                <?php echo"Writer BirthDay : ".$writer['birthday']?>
            </h4>
            <p>
            <blockquote>
                <?php echo $writer['description']?>            </blockquote>
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
<?php include "userTheme/userFooter.php"?>
