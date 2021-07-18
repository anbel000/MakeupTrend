<?php
require_once('includes/load.php');

if (isset($_SESSION["loginUser"]) && $_SESSION["loginUser"] == true) {


?>
    <!DOCTYPE html>
    <html class="no-js" lang="zxx">

    <head>
        <meta charset="utf-8" />
        <meta http-equiv="x-ua-compatible" content="ie=edge" />
        <title>Makeup Trend</title>
        <meta name="description" content="" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />

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

        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/6.11.0/sweetalert2.css" />

    </head>

    <link rel="apple-touch-icon" sizes="57x57" href="9324c10bb96c639ec6140724f5bb097a/apple-icon-57x57.png">
    <link rel="apple-touch-icon" sizes="60x60" href="9324c10bb96c639ec6140724f5bb097a/apple-icon-60x60.png">
    <link rel="apple-touch-icon" sizes="72x72" href="9324c10bb96c639ec6140724f5bb097a/apple-icon-72x72.png">
    <link rel="apple-touch-icon" sizes="76x76" href="9324c10bb96c639ec6140724f5bb097a/apple-icon-76x76.png">
    <link rel="apple-touch-icon" sizes="114x114" href="9324c10bb96c639ec6140724f5bb097a/apple-icon-114x114.png">
    <link rel="apple-touch-icon" sizes="120x120" href="9324c10bb96c639ec6140724f5bb097a/apple-icon-120x120.png">
    <link rel="apple-touch-icon" sizes="144x144" href="9324c10bb96c639ec6140724f5bb097a/apple-icon-144x144.png">
    <link rel="apple-touch-icon" sizes="152x152" href="9324c10bb96c639ec6140724f5bb097a/apple-icon-152x152.png">
    <link rel="apple-touch-icon" sizes="180x180" href="9324c10bb96c639ec6140724f5bb097a/apple-icon-180x180.png">
    <link rel="icon" type="image/png" sizes="192x192" href="9324c10bb96c639ec6140724f5bb097a/android-icon-192x192.png">
    <link rel="icon" type="image/png" sizes="32x32" href="9324c10bb96c639ec6140724f5bb097a/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="96x96" href="9324c10bb96c639ec6140724f5bb097a/favicon-96x96.png">
    <link rel="icon" type="image/png" sizes="16x16" href="9324c10bb96c639ec6140724f5bb097a/favicon-16x16.png">
    <link rel="manifest" href="9324c10bb96c639ec6140724f5bb097a/manifest.json">
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="msapplication-TileImage" content="9324c10bb96c639ec6140724f5bb097a/ms-icon-144x144.png">
    <meta name="theme-color" content="#ffffff">

    <body>
        <!--[if lte IE 9]>
      <p class="browserupgrade">
        You are using an <strong>outdated</strong> browser. Please
        <a href="https://browsehappy.com/">upgrade your browser</a> to improve
        your experience and security.
      </p>
    <![endif]-->

        <?php
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
                                            <a href="index.php?closeSession=1qa2s*21" aria-label="Toggle navigation">Cerrar Sesión</a>
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


        <!-- Start Catalogue Area -->
        <section class="why-choose section" style="padding-top: 150px;">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="section-title" style="background-color: #ffffff;">
                            <h2 class="wow fadeInUp" data-wow-delay=".4s" style="background: -webkit-linear-gradient(#e91e63, #bf01ef);
                        -webkit-background-clip: text;-webkit-text-fill-color: transparent;">CURSOS</h2>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="choose-content">
                            <div class="row">
                                <div class="col-lg-6 col-md-6 col-12">
                                    <!-- Start Single List -->

                                    <div class="single-list wow fadeInUp" data-wow-delay=".2s">

                                        <div class="col-12">
                                            <video src="https://codingyaar.com/wp-content/uploads/video-in-bootstrap-card.mp4" style="width: inherit;" controls></video>
                                        </div>
                                        <h4 style="margin: inherit;">¿Cómo aplicar el maquillaje?</h4>
                                    </div>
                                    <!-- Start Single List -->
                                </div>
                                <div class="col-lg-6 col-md-6 col-12">
                                    <!-- Start Single List -->

                                    <div class="single-list wow fadeInUp" data-wow-delay=".2s">

                                        <div class="col-12">
                                            <video src="https://codingyaar.com/wp-content/uploads/video-in-bootstrap-card.mp4" style="width: inherit;" controls></video>
                                        </div>
                                        <h4 style="margin: inherit;">¿Cómo aplicar el maquillaje?</h4>
                                    </div>
                                    <!-- Start Single List -->
                                </div>
                                <div class="col-lg-6 col-md-6 col-12">
                                    <!-- Start Single List -->

                                    <div class="single-list wow fadeInUp" data-wow-delay=".2s">

                                        <div class="col-12">
                                            <video src="https://codingyaar.com/wp-content/uploads/video-in-bootstrap-card.mp4" style="width: inherit;" controls></video>
                                        </div>
                                        <h4 style="margin: inherit;">¿Cómo aplicar el maquillaje?</h4>
                                    </div>
                                    <!-- Start Single List -->
                                </div>
                                <div class="col-lg-6 col-md-6 col-12">
                                    <!-- Start Single List -->

                                    <div class="single-list wow fadeInUp" data-wow-delay=".2s">

                                        <div class="col-12">
                                            <video src="https://codingyaar.com/wp-content/uploads/video-in-bootstrap-card.mp4" style="width: inherit;" controls></video>
                                        </div>
                                        <h4 style="margin: inherit;">¿Cómo aplicar el maquillaje?</h4>
                                    </div>
                                    <!-- Start Single List -->
                                </div>
                                <div class="col-lg-6 col-md-6 col-12">
                                    <!-- Start Single List -->

                                    <div class="single-list wow fadeInUp" data-wow-delay=".2s">

                                        <div class="col-12">
                                            <video src="https://codingyaar.com/wp-content/uploads/video-in-bootstrap-card.mp4" style="width: inherit;" controls></video>
                                        </div>
                                        <h4 style="margin: inherit;">¿Cómo aplicar el maquillaje?</h4>
                                    </div>
                                    <!-- Start Single List -->
                                </div>
                                <div class="col-lg-6 col-md-6 col-12">
                                    <!-- Start Single List -->

                                    <div class="single-list wow fadeInUp" data-wow-delay=".2s">

                                        <div class="col-12">
                                            <video src="https://codingyaar.com/wp-content/uploads/video-in-bootstrap-card.mp4" style="width: inherit;" controls></video>
                                        </div>
                                        <h4 style="margin: inherit;">¿Cómo aplicar el maquillaje?</h4>
                                    </div>
                                    <!-- Start Single List -->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- /End Catalogue Area -->



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
                                    <ul class="footer-social">
                                        <li><a href="https://www.facebook.com/makeuptrend.col/?ref=page_internal"><i class="lni lni-facebook-filled"></i></a></li>
                                        <li><a href="https://www.instagram.com/makeuptrend_col/"><i class="lni lni-instagram-original"></i></a></li>
                                        <li><a href="https://www.tiktok.com/@makeuptrend_colofic?lang=es&is_copy_url=1&is_from_webapp=v1">
                                                <ion-icon name="logo-tiktok"></ion-icon>
                                            </a></li>
                                        <li><a href="http://wa.link/4yfpye"><i class="lni lni-whatsapp"></i></a></li>
                                    </ul>
                                    <p class="copyright-text">Copyright 2021 © Makeup Trend | Todos los derechos reservados</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End Footer Middle -->
        </footer>
        <!--/ End Footer Area -->

        <!-- ========================= JS here ========================= -->
        <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
        <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>


        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/6.11.0/sweetalert2.js"></script>
        <script src="assets/js/bootstrap.min.js"></script>
        <script src="assets/js/wow.min.js"></script>
        <script src="assets/js/tiny-slider.js"></script>
        <script src="assets/js/glightbox.min.js"></script>
        <script src="assets/js/main.js"></script>


    </body>

    </html>

<?php
} else {
    header("Location: index.php");
    die();
}
?>