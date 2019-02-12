<?php



?>

</div>
</div>
</div>
</div>

</div>
<footer class="container-fluid px-5 mt-5 py-5">
    <div class="row px-5">
        <div class="col-8">
            <div class="row">
                <div class="col-4">
                    <ul class="list-unstyled">
                        <li class="f-title mb-2 font-weight-bold h5 py-2">برند ها</li>
                        <li class="f-submenu mr-3">vvv</li>
                        <li class="f-submenu mr-3">vv</li>
                        <li class="f-submenu mr-3">vv</li>
                    </ul>
                </div>
                <div class="col-4">
                    <ul class="list-unstyled">
                        <li class="f-title mb-2 font-weight-bold h5 py-2">لینک ها</li>
                        <li class="f-submenu mr-3">تماس با ما</li>
                        <li class="f-submenu mr-3">درباره ما</li>
                    </ul>
                </div>
                <div class="col-4">
                    <ul class="list-unstyled">
                        <li class="f-title mb-2 font-weight-bold h5 py-2">سوم</li>
                        <li class="f-submenu mr-3">تماس با ما</li>
                        <li class="f-submenu mr-3">درباره ما</li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="col-4 px-3">
            <h5 class="font-weight-bold">فروشگاه shop</h5>
            <p>
                متن آزمایشی برای توصیف فروشگاه خود . فروشکاه SHOP.متن آزمایشی برای توصیف فروشگاه خود . فروشکاه SHOP.متن آزمایشی برای توصیف فروشگاه خود . فروشکاه SHOP.متن آزمایشی برای توصیف فروشگاه خود . فروشکاه SHOP.
            </p>
        </div>
    </div>
</footer>


<script src="https://code.jquery.com/jquery-2.2.0.min.js" type="text/javascript"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script type="text/javascript" src="js/bootstrap/bootstrap.js"></script>
<script type="text/javascript" src="js/owl.carousel.min.js"></script>
<script type="text/javascript" src="js/index.js"></script>
<script>
    $('.owl-one').owlCarousel({
        loop: false,
        item: 4,
        margin: 1,
        dots:false,
        //  center: true,
        responsiveClass: true,
        animateIn: 'fadeIn',
        animateOut: 'fadeOut',
        autoplay: false,
        rtl:true,
        smartSpeed: 450,
        nav:true,
        // autoplayTimeout: 8500,
        // paginationSpeed : 400,
        navText: ['<i class="fas fa-angle-left"></i>','<i class="fas fa-angle-right"></i>'],
        responsive: {
            0: {
                items: 1,
                nav: true,
                margin:0,
            },
            600: {
                items: 3,
                nav: true,
                margin: 5,
                loop: false
            },
            1000: {
                items: 4,
                nav: true,
                navRewind:true,
                loop: false,
                margin: 1
            }
        }
    });
    $('.owl-two').owlCarousel({
        loop: false,
        item: 4,
        margin: 1,
        dots:false,
        //  center: true,
        responsiveClass: true,
        animateIn: 'fadeIn',
        animateOut: 'fadeOut',
        autoplay: false,
        rtl:true,
        smartSpeed: 450,
        nav:true,
        // autoplayTimeout: 8500,
        // paginationSpeed : 400,
        navText: ['<i class="fas fa-angle-left"></i>','<i class="fas fa-angle-right"></i>'],
        responsive: {
            0: {
                items: 1,
                nav: true,
                margin:0,
            },
            600: {
                items: 3,
                nav: true,
                margin: 5,
                loop: false
            },
            1000: {
                items: 5,
                nav: true,
                navRewind:true,
                loop: false,
                margin: 1
            }
        }
    });
    $('.owl-three').owlCarousel({
        loop: false,
        item: 3,
        margin: 1,
        dots:false,
        //  center: true,
        responsiveClass: true,
        animateIn: 'fadeIn',
        animateOut: 'fadeOut',
        autoplay: false,
        rtl:true,
        smartSpeed: 450,
        nav:true,
        // autoplayTimeout: 8500,
        // paginationSpeed : 400,
        navText: ['<i class="fas fa-angle-left"></i>','<i class="fas fa-angle-right"></i>'],
        responsive: {
            0: {
                items: 1,
                nav: true,
                margin:0,
            },
            600: {
                items: 2,
                nav: true,
                margin: 5,
                loop: false
            },
            1000: {
                items: 4,
                nav: true,
                navRewind:true,
                loop: false,
                margin: 1
            }
        }
    });
</script>
</body>
</html>
