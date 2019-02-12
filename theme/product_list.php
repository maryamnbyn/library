<?php


?>

<div class="products">
    <div class="row mx-0">



        <?php foreach ($Array_mobile as $mobile ){

            $ProductNameStyle="";

            //set for Mobile Image
            $mobile_image=$mobile->getMobileImagePath()."default.jpg";
            if(trim($mobile->getMobileImage())!="")
            {
                $mobile_image=$mobile->getMobileImagePath().$mobile->getMobileImage();

            }
            else
            {
                $mobile_image=$mobile->getMobileImagePath()."default.jpg";
            }


            $product_link="http://localhost/shop-v3/product_details.php?ID=".$mobile->getMobileId();

            ?>
        <div class="col-lg-3 px-0">
            <div class="prodct-box px-3 py-4">
                <div class="product-img">
                    <ul class="list-unstyled d-inline color-property">
                        <li class="rounded-circle yellow border"></li>
                        <li class="rounded-circle black border"></li>
                        <li class="rounded-circle grey border"></li>
                    </ul>
                    <a href="<?php echo $product_link ?>" target="_blank">
                        <img src="<?php  echo $mobile_image; ?>" class="img-fluid img-product">
                    </a>
                </div>
                <div class="product-info p-2 mb-4">
                    <p class="font-weight-bold" style="font-size: 12px; line-height: 22px; "><a href="#" style="<?php echo $ProductNameStyle ?>"> <?php echo $mobile->getBrandName()." ".$mobile->getModel() ?>   </a></p>
                    <p class="text-left font-weight-bold h5"><?php echo $mobile->getPrice()  ?> تومان</p>
                    <span class="compare">  <input type="checkbox" name="vehicle3" value="Boat" style="color:#eee;"> مقایسه</span>
                </div>
                <div class="rate-shop pt-3 mb-3 px-4 border-top">
                    <span class="px-1 pt-1 rate"><i class="fas fa-star text-white"></i> 4.2</span>
                    <span class="px-1 shop"><i class="fas fa-store"></i> فروشنده : دیجیکالا</span>
                </div>

            </div>
        </div>
        <?php } ?>






    </div>
</div>
