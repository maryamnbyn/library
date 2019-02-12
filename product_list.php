<?php
include "make.php";



if(!$HAVE_ERROR) {




    $BrandID=@$_GET['BrandID'];

    $Navigate_title="همه گوشی ها";
    if($BrandID>0)
    {
        $query="select * from view_mobile where BrandID=$BrandID";
        $ThisBrand=new brand($BrandID,"","",0,$MyDB);
        $ThisBrand->setThisBrandFromDB();
        $Navigate_title=$ThisBrand->getBrandName();

    }
    elseif ($_SERVER["REQUEST_METHOD"]=="POST" && @$_POST["Search"]==1){
        $query="SELECT * FROM view_mobile WHERE 
Model LIKE '%".$_POST["text_search"]."%' OR BrandName LIKE '%".$_POST["text_search"]."%'";
    }
    else
    {
        $query="select * from view_mobile ";
    }

   // echo $query." ss<hr>";






    $Mobile_List_inDB=$MyDB->query($query);

    $Array_mobile=array();

    while ($row=$Mobile_List_inDB->fetch_assoc()) {

        $thisMobile=new mobile($row["ID"],$row["BrandID"],
            $row["BrandName"],$row["Model"],$row["Price"],
            $row["Price_off"],$row["Camera"],$row["MobileImage"],$MyDB);
        array_push($Array_mobile,$thisMobile);

    }
    $MOBILE_COUNT=count($Array_mobile);



    include "theme/header.php";
    include "theme/menu.php";
    include "theme/right_box.php";
    include "theme/navigate.php";
    include "theme/product_list_head.php";


    include "theme/product_list.php";
    include "theme/footer.php";
}
else
{
    include "theme/show_error.php";
}
?>