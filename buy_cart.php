<!DOCTYPE html>
<html class="no-js" lang="zxx">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="x-ua-compatible" content="ie=edge" />
    <title>Makeup Trend</title>
    <meta name="description" content="" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="shortcut icon" type="image/x-icon" href="assets/images/favicon.svg" />
    <!-- Place favicon.ico in the root directory -->

    <!-- Web Font -->
    <link href="https://fonts.googleapis.com/css2?family=Jost:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Lato&display=swap" rel="stylesheet">

    <!-- ========================= CSS here ========================= -->
    <link rel="stylesheet" href="assets/css/bootstrap.min.css" />
    <link rel="stylesheet" href="assets/css/LineIcons.2.0.css" />
    <link rel="stylesheet" href="assets/css/animate.css" />
    <link rel="stylesheet" href="assets/css/tiny-slider.css" />
    <link rel="stylesheet" href="assets/css/glightbox.min.css" />
    <link rel="stylesheet" href="assets/css/main.css" />

    
</head>

<body>
    <!--[if lte IE 9]>
      <p class="browserupgrade">
        You are using an <strong>outdated</strong> browser. Please
        <a href="https://browsehappy.com/">upgrade your browser</a> to improve
        your experience and security.
      </p>
    <![endif]-->

    <?php
    require_once('includes/load.php');
    // Checkin What level user has permission to view this page
    //page_require_level(2);
    $categories = find_all("categories");
    ?>

    <!-- Preloader -->
    <div class="preloader">
        <div class="preloader-inner">
            <div class="preloader-icon">
                <span></span>
                <span></span>
            </div>
        </div>
    </div>
    <!-- /End Preloader -->

    <!-- Start Header Area -->
    <header class="header navbar-area">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-12">
                    <div class="nav-inner">
                        <nav class="navbar navbar-expand-lg">
                            <a class="navbar-brand" href="index.html">
                                <img src="assets/images/logo/logo.svg" alt="Logo">
                            </a>
                            <button class="navbar-toggler mobile-menu-btn" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                                <span class="toggler-icon"></span>
                                <span class="toggler-icon"></span>
                                <span class="toggler-icon"></span>
                            </button>
                            <div class="collapse navbar-collapse sub-menu-bar" id="navbarSupportedContent">
                                <ul id="nav" class="navbar-nav ms-auto">
                                    <li class="nav-item">
                                        <a href="index.php" aria-label="Toggle navigation">Inicio</a>
                                    </li>
                                    <?php foreach ($categories as $categorie) : ?>
                                        <li class="nav-item">
                                            <a href="adgird.php?id=<?php echo (int)$categorie['id']; ?>" aria-label="Toggle navigation"><?php echo remove_junk($categorie['name']); ?></a>
                                        </li>
                                    <?php endforeach; ?>
                                    <li class="nav-item">
                                        <a href="javascript:void(0)" aria-label="Toggle navigation">FAC</a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="cart.php" aria-label="Toggle navigation"><i style="font-size: 20px;" class="lni lni-cart"></i></a>
                                    </li>

                                </ul>
                            </div> <!-- navbar collapse -->
                        </nav> <!-- navbar -->
                    </div>
                </div>
            </div> <!-- row -->
        </div> <!-- container -->
    </header>
    <!-- End Header Area -->

    <!-- Start Shopping Cart Area -->
    <div class="card">
        <div class="row">
            <div class="col-md-12 cart">
                <div class="title">
                    <div class="row">
                        <div class="col">
                            <h4>Información de compra</h4>
                        </div>
                    </div>
                </div>
                <div class="row ">
                    <div class="row main align-items-center">
                        <div class="col-md-4">
                            <input type="text" class="form-control" name="name_sale" placeholder="Nombre">
                        </div>
                        <div class="col-md-4">
                            <input type="number" class="form-control" name="cel_phone" placeholder="Celular">
                        </div>
                        <div class="col-md-4">
                            <input type="text" class="form-control" name="direction" placeholder="Dirección">
                        </div>
                    </div>
                    <div class="row main align-items-center">
                        <div class="col-md-4">
                            <input type="text" class="form-control" name="neighborhood" placeholder="Barrio">
                        </div>
                        <div class="col-md-4">
                            <input type="text" class="form-control" name="type_ubication" placeholder="Apartamento o Casa">
                        </div>
                        <div class="col-md-4">
                            <input type="text" class="form-control" name="payment_method" placeholder="Método de pago">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>



    <div class="card2">
        <div class="row cart">
            <div class="title">
                <div class="row">
                    <div class="col">
                        <h4>Selecciona el método de pago</h4>
                    </div>
                </div>
                <div class="row">
                    <div class="col" style="padding-top: 10px;">
                        <p>Recuerda que deberas consignar el dinero de la compra con la información del método de pago seleccionado. Una vez se realice la consignación, el pedido sera enviado.</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-2 radio-group">
                <div class="row d-flex px-3 radio"> <img class="pay" src="https://i.imgur.com/WIAP9Ku.jpg">
                    <p class="my-auto">Credit Card</p>
                </div>
                <div class="row d-flex px-3 radio gray"> <img class="pay" src="https://i.imgur.com/OdxcctP.jpg">
                    <p class="my-auto">Debit Card</p>
                </div>
                <div class="row d-flex px-3 radio gray mb-3"> <img class="pay" src="https://i.imgur.com/cMk1MtK.jpg">
                    <p class="my-auto">PayPal</p>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="row px-2">
                    <div class="form-group col-md-6"> 
                        <label class="form-control-label">Name on Card</label> 
                        <input class="form-control" type="text" id="cname" name="cname" placeholder="Johnny Doe"> 
                    </div>
                    <div class="form-group col-md-6"> 
                        <label class="form-control-label">Card Number</label>
                        <input class="form-control" type="text" id="cnum" name="cnum" placeholder="1111 2222 3333 4444"> 
                    </div>
                </div>
                <div class="row px-2">
                    <div class="form-group col-md-6"> 
                        <label class="form-control-label">Expiration Date</label> 
                        <input class="form-control" type="text" id="exp" name="exp" placeholder="MM/YYYY"> 
                    </div>
                    <div class="form-group col-md-6"> 
                        <label class="form-control-label">CVV</label> 
                        <input class="form-control" type="text" id="cvv" name="cvv" placeholder="***"> 
                    </div>
                </div>
            </div>
            <div class="col-lg-4 ">
                <div class="row d-flex justify-content-between px-4">
                    <p class="mb-1 text-left">Subtotal</p>
                    <h6 class="mb-1 text-right">$23.49</h6>
                </div>
                <div class="row d-flex justify-content-between px-4">
                    <p class="mb-1 text-left">Shipping</p>
                    <h6 class="mb-1 text-right">$2.99</h6>
                </div>
                <div class="row d-flex justify-content-between px-4" id="tax">
                    <p class="mb-1 text-left">Total (tax included)</p>
                    <h6 class="mb-1 text-right">$26.48</h6>
                </div> 
                <button class="btn-block btn-blue"> 
                    <span> <span id="checkout">COMPRAR</span> 
                </button>
            </div>
        </div>
    </div>


    <!-- End Shopping Cart Area -->

    <!-- Start Footer Area -->
    <footer class="footer">
        <!-- Start Footer Bottom -->
        <div class="footer-bottom" style="background: rgb(223,3,152);
        background: linear-gradient(90deg, rgba(223,3,152,1) 0%, rgba(132,0,255,1) 78%);">
            <div class="container">
                <div class="inner">
                    <div class="row">
                        <div class="col-12">
                            <div class="content">
                                <p class="copyright-text">@MakeupTrend2021</p>
                                <ul class="footer-social">
                                    <li><a href="javascript:void(0)"><i class="lni lni-facebook-filled"></i></a></li>
                                    <li><a href="javascript:void(0)"><i class="lni lni-twitter-original"></i></a></li>
                                    <li><a href="javascript:void(0)"><i class="lni lni-youtube"></i></a></li>
                                    <li><a href="javascript:void(0)"><i class="lni lni-linkedin-original"></i></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Footer Middle -->
    </footer>
    <!--/ End Footer Area -->

    <!-- ========================= scroll-top ========================= -->
    <a href="#" class="scroll-top btn-hover">
        <i class="lni lni-chevron-up"></i>
    </a>

    <!-- ========================= JS here ========================= -->
    <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js'></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script src="assets/js/wow.min.js"></script>
    <script src="assets/js/tiny-slider.js"></script>
    <script src="assets/js/glightbox.min.js"></script>
    <script src="assets/js/main.js"></script>
    <script>
        $(document).ready(function(){

$('.radio-group .radio').click(function(){
$('.radio').addClass('gray');
$(this).removeClass('gray');
});

$('.plus-minus .plus').click(function(){
var count = $(this).parent().prev().text();
$(this).parent().prev().html(Number(count) + 1);
});

$('.plus-minus .minus').click(function(){
var count = $(this).parent().prev().text();
$(this).parent().prev().html(Number(count) - 1);
});

});
    </script>
</body>

</html>