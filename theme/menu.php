<?php


//set basket count
$MyBaskett=new basket($MyDB);

$BasketCount=$MyBaskett->getSumProductInBasket();


?>
<header>
<!--    <div class="container-fluid top-header"></div>-->
    <div class="container-fluid px-5">
        <div class="row">
    <!--logo-->
     <div class="col-lg-2 col-md-2 col-sm-4 col-4">
         <img src="img/logo.png" alt="" class="img-fluid" style="height: 70px;">
     </div>
    <!--search box-->
     <div class="col-lg-5 col-md-5 pt-3 d-none d-sm-none d-md-block">
        <form action="product_list.php" class="form-inline my-search" method="post">
            <input type="hidden" value="1" name="Search">
            <input class="form-control rounded-right" type="search"
                   name="text_search"
                   placeholder="Search" aria-label="Search"
                   style="width: 90%;">
            <button class="btn btn-mycolor rounded-left" style="width: 10%;"><i class="fas fa-search"></i></button>
        </form>
    </div>
    <!--login/register-->
<!--    <div class="col-lg-3 col-md-3 d-none d-sm-none d-md-block text-left pt-3 log-reg px-md-0 px-lg-3 px-xl-3">-->
<!--        <button type="button" class="btn btn-mycolor rounded-right"><i class="fas fa-sign-in-alt"></i> ورود</button>-->
<!--        <button type="button" class="btn btn-mycolor rounded-left"><i class="fas fa-user-plus"></i> ثبت نام</button>-->
<!--        <span class="circle"></span>-->
<!--        <span class="in_circle"></span>-->
<!--    </div>-->
    <!--mobile-login/register-->
     <div class="col-3 d-block d-sm-block d-md-none mt-3">ffffff</div>
    <!--shoppingcart-->
     <div class="col-md-2 d-none d-sm-none d-md-block text-left pt-3 shopping-cart px-lg-0 px-xl-3">
         <a href="basket.php">
        <button type="button" class="btn btn-outline-info w-100 pb-1 text-right px-xl-4 px-lg-2">
            <img class="img-fluid" src="img/shopping-cart.png">
            <span class="text-info h6 d-none d-lg-inline-block d-xl-inline-block">سبد خرید</span>
            <span class="shopping-count text-white bg-info rounded-circle float-left text-center"><?php echo $BasketCount;  ?></span>
        </button>
         </a>
    </div>
    <!--mobile-shoppingcart-->
     <div class="col-2 d-block d-sm-block d-md-none mt-3">
         <img class="img-fluid" src="img/shopping-cart.png">
         <span class="mob-shop-cart"><?php echo $BasketCount;  ?></span>
    </div>
     </div>
 </div>
<div class="container-fluid menu-place">
    <nav class="navbar navbar-expand-lg" id="menu">
        <button class="navbar-toggler float-left ml-4 mt-2" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <i class="fas fa-bars text-white"></i>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle hvr-underline-from-center" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        تماس با ما
                    </a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle hvr-underline-from-center" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        درباره ما
                    </a>
                </li>
            </ul>
        </div>


    </nav>
<!--    <div class="row" style="min-height: 2px; background: black; position: absolute; top: 38px; width: 100%;"></div>-->

</div>

</header>
