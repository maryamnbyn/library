<div class="content_owla-carousel rounded my-3">
    <div class="border-bottom mx-5 py-4">
        <span class="title border-bottom font-weight-bold px-3 h5">برندها</span>
    </div>
    <div class="owl-carousel owl-theme owl-two">

<?php
//select brands
$query_selectBrands="select * from tbl_brands";
$result_select=$MyDB->query($query_selectBrands);

if($result_select)
{
    while ($row=$result_select->fetch_assoc())
    {
        $ThisBrand=new brand($row["ID"],$row["BrandName"],$row["BrandLogo"],1,$MyDB);

        $link_to_products="product_list.php?BrandID=".$ThisBrand->getBrandId();
?>



        <div class="item">
            <div class="item_brand text-center">
                <div class="px-4 py-3 rounded">
                    <a href="<?php echo $link_to_products; ?>">
                        <img class="mb-2" src="<?php echo $ThisBrand->getBrandImagePath().$ThisBrand->getBrandLogo() ?>" alt="">
                    </a>
                </div>
            </div>
        </div>


<?php


    }
}




?>


    </div>
</div>
