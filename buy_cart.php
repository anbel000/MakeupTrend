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

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/6.11.0/sweetalert2.css" />

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
                                        <a href="shopping_cart.php" aria-label="Toggle navigation"><i style="font-size: 20px;" class="lni lni-cart"></i></a>
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
                            <input type="text" class="form-control" id="name_sale" placeholder="Nombre">
                        </div>
                        <div class="col-md-4">
                            <input type="number" class="form-control" id="cel_phone" placeholder="Celular">
                        </div>
                        <div class="col-md-4">
                            <input type="text" class="form-control" id="direction" placeholder="Dirección">
                        </div>
                    </div>
                    <div class="row main align-items-center">
                        <div class="col-md-4">
                            <input type="text" class="form-control" id="neighborhood" placeholder="Barrio">
                        </div>
                        <div class="col-md-4">
                            <input type="text" class="form-control" id="type_ubication" placeholder="Apartamento o Casa">
                        </div>
                        <div class="col-md-4">
                            <input type="text" class="form-control" id="email" placeholder="Correo electronico">
                        </div>
                    </div>
                </div>
                <div class="row">
                    
                        <button class="btn" onclick="pagar()" style="height: 40px;">SIGUIENTE</button>
                    
                </div>
                <form method="post" action="https://sandbox.checkout.payulatam.com/ppp-web-gateway-payu/">
                    <input name="merchantId" type="hidden" value="508029">
                    <input name="accountId" type="hidden" value="512321">
                    <input name="description" type="hidden" value="Productos Makeup Trend">
                    <input name="referenceCode" type="hidden" value="PAGO01">
                    <input name="amount" type="hidden" value="30000">
                    <input name="tax" type="hidden" value="0">
                    <input name="taxReturnBase" type="hidden" value="0">
                    <input name="currency" type="hidden" value="COP">
                    <input name="signature" type="hidden" value="3c2d59d2395bf2e525592296f001e936">
                    <input name="test" type="hidden" value="1">
                    <input name="buyerEmail" type="hidden" value="wwandresbeltran@gmail.com">
                    <input name="buyerFullName" type="hidden" value="Andrés Beltrán">
                    <input name="mobilePhone" type="hidden" value="31231245">
                    <input name="shippingAddress" type="hidden" value="calle 91 n 47 - 65">
                    <input name="shippingCity" type="hidden" value="Bogota">
                    <input name="shippingCountry" type="hidden" value="COL">
                    <input name="shippingValue" type="hidden" value="12000">


                    <input name="kilogramWeight" type="hidden" value="12">
                    <input name="shipmentPackageHeightDimension" type="hidden" value="12">
                    <input name="shipmentPackageWidthDimension" type="hidden" value="24">
                    <input name="shipmentPackageLengthDimension" type="hidden" value="12">



                    <input name="responseUrl" type="hidden" value="http://www.test.com/response">
                    <input name="confirmationUrl" type="hidden" value="http://www.test.com/confirmation">
                    <input  id="payment" hidden name="Submit" type="submit" value="COMPRAR">
                </form>
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
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/6.11.0/sweetalert2.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script src="assets/js/wow.min.js"></script>
    <script src="assets/js/tiny-slider.js"></script>
    <script src="assets/js/glightbox.min.js"></script>
    <script src="assets/js/main.js"></script>
    <script src="libs/js/functions_buy.js"></script>

    
</body>

</html>