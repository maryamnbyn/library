<?php
include "make.php";
$MyBasket=new basket($MyDB);
$FactorSet=false;
if($_SERVER["REQUEST_METHOD"]=="POST")
{
    if(@$_POST["add_to_basket"]=="1")
    {
        $productID=$_POST["mobile_id"];
        $MyBasket->addProduct($productID,1);
    }
    if(@$_POST["delete_from_basket"]=="1")
    {
        $productID=$_POST["mobile_id"];
        $MyBasket->deleteProduct($productID);
    }

    if(@$_POST["final"]=="1")
    {
        $thisFactor=new factor(0,$_POST["CustomerName"].
            " ".$_POST["CustomerLastName"],
            $_POST["CustomerAddress"],$_POST["CustomerMobile"],
            $_POST["CustomerPostalCode"],1,$MyDB);

        $FactorID=$thisFactor->insertFactor();
        if($FactorID>0) {
            $FactorSet=true;
            $MyBasket->setBasketInDB($FactorID);
            $MyBasket->deleteAllProduct();
        }
    }

}


include "theme/header.php";
include  "theme/menu.php";

?>
<div class="container my-5 px-5 py-4 bg-light border rounded cart">


    <?php if(!$FactorSet){ ?>

    <h4 class="text-info"> سبد خرید</h4>


    <table class="table table-bordered table-striped">
        <thead>
        <tr>
            <th scope="col">نام کالا</th>
            <th scope="col">تصویر</th>
            <th scope="col">تعداد</th>
            <th scope="col">قیمت واحد</th>
            <th scope="col">قیمت کل</th>
            <th scope="col"> </th>
        </tr>
        </thead>
        <tbody>

        <?php

        $sumPrice=0;
        foreach ($_SESSION['basket'] as $basket)
        {
            $ProductID=$basket["ID"];
            $ProductNum=$basket["num"];
            $ThisMobile=new mobile($ProductID,0,"",
                "",0,0,0,"",$MyDB);
            $ThisMobile->setThisMobileFromDB();


        ?>

            <tr class=" text-center">
                <th scope="row"><?php echo $ThisMobile->getBrandName()." ".$ThisMobile->getModel(); ?></th>
                <td>
                    <img src="<?php echo $ThisMobile->getMobileImagePath().$ThisMobile->getMobileImage() ?>" alt="" style="width: 80px; height: 80px;">
                </td>
                <td><?php echo $ProductNum ?></td>
                <td><?php echo $ThisMobile->getPriceWithOff(); ?> تومان</td>
                <td><?php echo $ThisMobile->getPriceWithOff()*$ProductNum ?> تومان</td>
                <td>

                    <form method="post" action="basket.php">
                    <input type="hidden"
                           value="<?php echo $ThisMobile->getMobileId() ?>" name="mobile_id">
                        <input type="hidden" value="1" name="delete_from_basket">
                    <button >حذف</button>
                    </form>
                </td>
            </tr>

        <?php
            $sumPrice=$sumPrice+
                ($ThisMobile->getPriceWithOff()*$ProductNum);

        }


        ?>




    </table>
    <div class="alert alert-info text text-center" role="alert">
        قیمت کل : <?php echo $sumPrice; ?> تومان
    </div>

    <?php if(count(@$_SESSION['basket'])>0){ ?>
    <div class="col-lg-12 px-0">
        <div class="address-information">
            <span class="h5 font-weight-bold">اطلاعات ارسال</span>
            <form method="post" action="basket.php">
                <input type="hidden" value="1" name="final">
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="name">نام</label>
                        <input type="text" class="form-control"
                               id="name" name="CustomerName" placeholder="نام">
                    </div>
                    <div class="form-group col-md-6">
                        <label for="lastname">نام خانوادگی</label>
                        <input type="text" class="form-control"
                               id="lastname" name="CustomerLastName" placeholder="نام خانوادگی">
                    </div>
                </div>
                <div class="form-group">
                    <label for="inputAddress">آدرس</label>
                    <input type="text"
                           class="form-control" id="inputAddress"
                           name="CustomerAddress" placeholder="1234 Main St">
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="mobileNumber">شماره تلفن</label>
                        <input type="text" class="form-control"
                               name="CustomerMobile" id="mobileNumber">
                    </div>
                    <div class="form-group col-md-6">
                        <label for="inputZip">کدپستی</label>
                        <input type="text" class="form-control"
                               id="inputZip" name="CustomerPostalCode">
                    </div>
                </div>
                <button type="submit" class="btn btn-info w-100">تکمیل خرید</button>
            </form>
        </div>
    </div>
    <?php } ?>

    <?php }
    else {?>

        <h4 class="text-info"> خرید شما با موفقیت ثبت شد .کد خرید <?php echo $FactorID  ?></h4>

    <?php } ?>


</div>

<?php
include "theme/footer.php";
?>
