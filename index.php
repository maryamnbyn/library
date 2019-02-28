<?php
   session_start();
   include "adminpannel/admin_forms/classes/Db.php";
   include "adminpannel/admin_forms/classes/book.php";

   $book    = new book();
   $books  = $book->select();
   $book    = new book();
?>



<?php include "userTheme/navbar.php" ?>
<!--slide show-->
<?php include "userTheme/userSlider.php"?>
<!--about us-->
<?php include "userTheme/userAboutUs.php"?>
<!--icons-->
<?php include "userTheme/userIcons.php"?>
<!--product-->
<div class="container">
    <div class="row">
        <div class="col-sm">
            <?php
            foreach ($books as $book)
            {
            ?>
            <div class="col-md-3  card-body cardmargin card style=" width: 18rem;">
            <img class="imgm text-left" src="adminpannel/admin_forms/uploads/<?php echo $book['bookImage']; ?>"
            <h5 class="card-title  "><?php echo "Name Of Book: ".$book['name'] ?></h5>
            <h5 class="card-title  text-danger"><?php $conditions = $book->bookCondition($book['name'])?></h5>
            <h5 class="card-title  "><?php echo "Title Of Book: ".$book['title'] ?></h5>
            <p class="card-text"><?php echo $book['description'] ?></p>
            <a href="ShowInformation.php?id=<?php echo $book['id']; ?>" class="btn btn-primary"> more Imformation</a>
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