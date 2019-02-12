<?php
include "make.php";

if(!$HAVE_ERROR) {

    include "theme/header.php";
    include "theme/menu.php";
    include "theme/right_box.php";
    include "theme/navigate.php";


    include "theme/product_detail.php";

    //include "theme/product_list_head.php";
    //include "theme/product_list.php";

    include "theme/footer.php";



}
else
{
    include "theme/show_error.php";
}