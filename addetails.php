<!DOCTYPE html>
<!-- saved from url=(0068)https://demo.graygrids.com/themes/classigrids-demo/item-details.html -->
<html class="no-js" lang="zxx">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Ads Details - ClassiGrids Classified Ads and Listing Website Template</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" type="image/x-icon" href="https://demo.graygrids.com/themes/classigrids-demo/assets/images/favicon.svg">




    <link rel="stylesheet" href="./assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="./assets/css/LineIcons.2.0.css">
    <link rel="stylesheet" href="./assets/css/animate.css">
    <link rel="stylesheet" href="./assets/css/tiny-slider.css">
    <link rel="stylesheet" href="./assets/css/glightbox.min.css">
    <link rel="stylesheet" href="./assets/css/main.css">
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
    if (empty($_GET['id'])) {
        redirect('404.php');
    }
    $products = join_product_table_by_id((int)$_GET['id']);
    ?>

    <div class="preloader" style="opacity: 0; display: none;">
        <div class="preloader-inner">
            <div class="preloader-icon">
                <span></span>
                <span></span>
            </div>
        </div>
    </div>


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
                                        <a href="javascript:void(0)" aria-label="Toggle navigation">Inicio</a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="javascript:void(0)" aria-label="Toggle navigation">Brochas</a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="javascript:void(0)" aria-label="Toggle navigation">Cejas</a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="javascript:void(0)" aria-label="Toggle navigation">Cuidado de piel</a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="javascript:void(0)" aria-label="Toggle navigation">Labios</a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="javascript:void(0)" aria-label="Toggle navigation">Ojos</a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="javascript:void(0)" aria-label="Toggle navigation">Piel</a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="javascript:void(0)" aria-label="Toggle navigation">FAQ</a>
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

    <!-- Start indicative posisition page -->
    <div class="breadcrumbs">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6 col-md-6 col-12">
                    <div class="breadcrumbs-content">
                        <h1 class="page-title">Detalles del producto</h1>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-12">
                    <ul class="breadcrumb-nav">
                        <li><a href="./index.php">Inicio</a></li>
                        <li>Detalles</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- End indicative posisition page -->

    <!-- Start detailes of product -->
    <section class="item-details section">
        <div class="container">
            <div class="top-area">
                <div class="row">
                    <div class="col-lg-6 col-md-12 col-12">
                        <?php foreach ($products as $product) : ?>
                            <div class="product-images">
                                <main id="gallery">
                                    <div class="main-img">
                                        <img src="./assets/images/products/image1.jpg" id="current" alt="#">
                                    </div>
                                    <div class="images">
                                        <img src="./assets/images/products/image1.jpg" class="img" alt="#">
                                        <img src="./assets/images/products/image2.jpg" class="img" alt="#">
                                        <img src="./assets/images/products/image3.jpg" class="img" alt="#">
                                        <img src="./assets/images/products/image4.jpg" class="img" alt="#">
                                        <img src="./assets/images/products/image5.jpg" class="img" alt="#">
                                    </div>
                                </main>
                            </div>
                    </div>
                    <div class="col-lg-6 col-md-12 col-12">
                        <div class="product-info">
                            <h2 class="title"><?php echo remove_junk($product['name']); ?></h2>
                            <h3 class="price">$<?php echo remove_junk($product['sale_price']); ?></h3>
                            <div class="list-info">
                                <h4>Información</h4>
                                <ul>
                                    <li><span><?php echo remove_junk($product['description']); ?></span></li>
                                </ul>
                            </div>
                            <div class="list-info">
                                <ul>
                                    <li><span>Cantidades disponibles:</span><?php echo remove_junk($product['quantity']); ?></li>
                                    <li><span>Marca:</span><?php echo remove_junk($product['brand']); ?></li>
                                    <li><span>Categoria:</span><?php echo remove_junk($product['categorie']); ?></li>
                                </ul>

                            </div>
                        <?php endforeach; ?>
                        <div class="contact-info">
                            <ul>
                                <li>
                                    <a href="tel:+002562352589" class="call">
                                        <i class="lni lni-phone-set"></i>
                                        COMPRAR
                                    </a>
                                </li>
                            </ul>
                        </div>
                        <div class="social-share">
                            <h4>Share Ad</h4>
                            <ul>
                                <li><a href="javascript:void(0)" class="facebook"><i class="lni lni-facebook-filled"></i></a></li>
                                <li><a href="javascript:void(0)" class="twitter"><i class="lni lni-twitter-original"></i></a></li>
                                <li><a href="javascript:void(0)" class="google"><i class="lni lni-google"></i></a>
                                </li>
                                <li><a href="javascript:void(0)" class="linkedin"><i class="lni lni-linkedin-original"></i></a></li>
                                <li><a href="javascript:void(0)" class="pinterest"><i class="lni lni-pinterest"></i></a></li>
                            </ul>
                        </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End detailes of product -->

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


    <a href="#" class="scroll-top btn-hover">
        <i class="lni lni-chevron-up"></i>
    </a>

    <script src="./assets/js/bootstrap.min.js"></script>
    <script src="./assets/js/wow.min.js"></script>
    <script src="./assets/js/tiny-slider.js"></script>
    <script src="./assets/js/glightbox.min.js"></script>
    <script src="./assets/js/main.js"></script>
    <script type="text/javascript">
        const current = document.getElementById("current");
        const opacity = 0.6;
        const imgs = document.querySelectorAll(".img");
        imgs.forEach(img => {
            img.addEventListener("click", (e) => {
                //reset opacity
                imgs.forEach(img => {
                    img.style.opacity = 1;
                });
                current.src = e.target.src;
                //adding class 
                //current.classList.add("fade-in");
                //opacity
                e.target.style.opacity = opacity;
            });
        });
    </script>

</body>

</html>