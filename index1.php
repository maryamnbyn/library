<?php include "adminpannel/admin_forms/classes/Db.php";
include "adminpannel/admin_forms/classes/book.php";
include "adminpannel/admin_forms/classes/user.php";


$books = new book();
$results = $books->showcategory();
$book = new book();
$images = $book->select();
$book = new book();


?>

<?php include "userTheme/navbar.php" ?>

<!--slide show-->
<?php include "userTheme/userSlider.php" ?>

<!--about us-->
<?php include "userTheme/userAboutUs.php" ?>

<!--icons-->
<?php include "userTheme/userIcons.php"?>
<!--product-->
<div class="container">
    <div class="row">
        <div class="col-sm">

            <?php

            foreach ($images

            as $image){
            ?>

            <div class="col-md-3  card-body card style=" width: 18rem;
            ">

            <img class="imgm text-left" src="adminpannel/admin_forms/uploads/<?php echo $image['bookImage']; ?>"
            <h5 class="card-title  "><?php echo "Name Of Book: " . $image['name'] ?></h5>
            <h5 class="card-title  text-danger"><?php $conditions = $book->bookCondition($image['name']) ?></h5>
            <h5 class="card-title  "><?php echo "Title Of Book: " . $image['title'] ?></h5>


            <p class="card-text"><?php echo $image['description'] ?></p>

            <a href="ShowInformation.php?id=<?php echo $image['id']; ?>" class="btn btn-primary"> more Imformation</a>
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
<?php include "userTheme/userFooter.php" ?>
