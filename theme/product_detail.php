<?php

$ProductID=$_GET["ID"];

$thisMobile=new mobile($ProductID,0,"","",0,0,0,"",$MyDB);

$thisMobile->setThisMobileFromDB();



?>

<div class="col-12 products border" style="background: white;">
    <div class="row mx-0 mt-5">



        <div class="col-lg-4">
            <img src="<?php echo $thisMobile->getMobileImagePath().$thisMobile->getMobileImage() ?>" alt="" class="img-fluid">
        </div>
        <div class="col-lg-8">
            <h4><?php echo $thisMobile->getBrandName() . " ". $thisMobile->getModel(); ?></h4>
            <h5>دوربین : <?php echo $thisMobile->getCamera()."MG"; ?> </h5>
            <h5>قیمت : <?php echo $thisMobile->getPrice()." "."تومان"; ?></h5>

            <form method="post" action="basket.php">
            <input type="hidden" name="add_to_basket" value="1">
                <input type="hidden" value="
                <?php echo $thisMobile->getMobileId() ?>"
                       name="mobile_id">
            <button class="btn btn-info h4 font-weight-bold"> اضافه به سبد خرید</button>
            </form>
        </div>




    </div>
</div>

