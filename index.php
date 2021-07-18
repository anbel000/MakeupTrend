<?php
require_once('includes/load.php');
if (isset($_GET["closeSession"])) {
    if (isset($_SESSION["loginUser"])) {
        $_SESSION["loginUser"] = false;
    }
}

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
<link rel="icon" type="image/png" sizes="192x192"  href="9324c10bb96c639ec6140724f5bb097a/android-icon-192x192.png">
<link rel="icon" type="image/png" sizes="32x32" href="9324c10bb96c639ec6140724f5bb097a/favicon-32x32.png">
<link rel="icon" type="image/png" sizes="96x96" href="9324c10bb96c639ec6140724f5bb097a/favicon-96x96.png">
<link rel="icon" type="image/png" sizes="16x16" href="9324c10bb96c639ec6140724f5bb097a/favicon-16x16.png">
<link rel="manifest" href="9324c10bb96c639ec6140724f5bb097a/manifest.json">
<meta name="msapplication-TileColor" content="#ffffff">
<meta name="msapplication-TileImage" content="9324c10bb96c639ec6140724f5bb097a/ms-icon-144x144.png">
<meta name="theme-color" content="#ffffff">

<!--Start of Tawk.to Script-->
<script type="text/javascript">
    var Tawk_API = Tawk_API || {},
        Tawk_LoadStart = new Date();
    (function() {
        var s1 = document.createElement("script"),
            s0 = document.getElementsByTagName("script")[0];
        s1.async = true;
        s1.src = 'https://embed.tawk.to/60b6e2756699c7280daa333d/1f75696sg';
        s1.charset = 'UTF-8';
        s1.setAttribute('crossorigin', '*');
        s0.parentNode.insertBefore(s1, s0);
    })();
</script>
<style>
    img {
        display: block;
        max-width: 100%;
        height: auto;
    }
</style>
<!--End of Tawk.to Script-->

<body style="background-image:url(./assets/images/25077201.jpg)">
    <!--[if lte IE 9]>
      <p class="browserupgrade">
        You are using an <strong>outdated</strong> browser. Please
        <a href="https://browsehappy.com/">upgrade your browser</a> to improve
        your experience and security.
      </p>
    <![endif]-->

    <?php

    require_once('controller_shopping_cart.php');
    // Checkin What level user has permission to view this page
    //page_require_level(2);
    $products = join_product_table_new();
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
                            <a class="navbar-brand" href="index.php">
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
                                        <a href="login.php" aria-label="Toggle navigation">Cursos</a>
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

    <!-- Start Hero Area -->
    <section class="hero-area overlay">

        <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img src="./assets/images/logo/baner1.png" class="d-block w-100" alt="...">
                </div>
                <div class="carousel-item">
                    <img src="./assets/images/logo/baner2.png" class="d-block w-100" alt="...">
                </div>
                <div class="carousel-item">
                    <img src="./assets/images/logo/baner3.png" class="d-block w-100" alt="...">
                </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
    </section>
    <!-- End Hero Area -->

    <!-- Button trigger modal -->
    <button hidden type="button" class="btn btn-primary" id="info" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
        Información
    </button>
    <!-- Button trigger modal -->
    <!-- Start Modal -->
    <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">INFORMACIÓN</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    Por compras superiores o iguales a $60.000 COP
                    obtendras acceso a un curso gratuito de maquillaje. Y por compras superiores o iguales a $100.000 COP
                    obtendras envío gratis en tu compra.
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Genial!</button>
                </div>
            </div>
        </div>
    </div>
    <!--  End Modal -->
 
    <!-- Start Categories Grid Area-->
    <section class="browse-cities section">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="section-title">
                        <h2 class="wow fadeInUp" data-wow-delay=".4s" style="visibility: visible; animation-delay: 0.4s; animation-name: fadeInUp; background: -webkit-linear-gradient(#e91e63, #bf01ef);
                            -webkit-background-clip: text;-webkit-text-fill-color: transparent;">CATEGORIAS</h2>
                    </div>
                </div>
            </div>
            <div class="row ">
                <?php foreach ($categories as $categorie) :
                    $count_categorie = join_count_by_id("products", $categorie['id']); ?>
                    <div class="col-lg-4 col-md-4 col-12">
                        <div class="single-city wow fadeInUp" data-wow-delay=".2s" style="visibility: visible; animation-delay: 0.2s; animation-name: fadeInUp;">
                            <a href="adgird.php?id=<?php echo (int)$categorie['id']; ?>" class="info-box">
                                <div class="image">
                                    <img src="./assets/images/categories/<?php echo remove_junk($categorie['name']); ?>.png" alt="<?php echo remove_junk($categorie['name']); ?>">
                                </div>
                            </a>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </section>
    <!-- /End Categories Grid Area -->

    <!-- Start Catalogue Area -->
    <section class="why-choose section">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="section-title">
                        <h2 class="wow fadeInUp" data-wow-delay=".4s" style="background: -webkit-linear-gradient(#e91e63, #bf01ef);
                        -webkit-background-clip: text;-webkit-text-fill-color: transparent;">CATALOGOS</h2>
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
                                    <a href="assets/catálagos/Catalogo Al Por Mayor - Makeup Trend.pdf" download="Catalogo Al Por Mayor - Makeup Trend.pdf"> <i class="lni lni-download"></i></a>
                                    <h4>Catálogo Al Mayor</h4>
                                    <p>Descarga nuestro catálogo al por mayor para enterar de precios y productos.</p>
                                </div>
                                <!-- Start Single List -->
                            </div>
                            <div class="col-lg-6 col-md-6 col-12">
                                <!-- Start Single List -->
                                <div class="single-list wow fadeInUp" data-wow-delay=".4s">
                                    <a href="assets/catálagos/Catalogo Al Detal - Makeup Trend.pdf" download="Catalogo Al Detal - Makeup Trend.pdf"> <i class="lni lni-download"></i></a>
                                    <h4>Catálogo Al Detal</h4>
                                    <p>Descarga nuestro catálogo al detal para enterar de precios y productos.</p>
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


    <!-- Start Items Grid Area New Products -->
    <section class="items-grid section custom-padding">
        <div class="container justify-content-center">
            <div class="row">
                <div class="col-12">
                    <div class="section-title">
                        <h2 class="wow fadeInUp" data-wow-delay=".4s" style="background: -webkit-linear-gradient(#e91e63, #bf01ef);
                        -webkit-background-clip: text;-webkit-text-fill-color: transparent;">NUEVOS PRODUCTOS</h2>
                        <p class="wow fadeInUp" data-wow-delay=".6s">Encuentra los productos más recientes y con mayor cantidad de compra, aprovecha antes que se agoten!</p>
                    </div>
                </div>
            </div>
            <div class="single-head">
                <div class="row">
                    <?php foreach ($products as $product) : ?>
                        <input id="id" type="number" hidden value="<?php echo (int)$product['id']; ?>">
                        <input id="qty" type="number" hidden value="1">

                        <div class="col-lg-3 col-md-6">
                            <figure class="card2 card2-product-grid card2-lg">
                                <?php if ($product['quantity'] == 0) { ?>
                                    <div class="author2">
                                        <p class="sale" style="margin-top: 3px;">Agotado</p>
                                    </div>
                                <?php } ?>
                                <a href="addetails.php?id=<?php echo (int)$product['id']; ?>" class="img-wrap" data-abc="true">
                                    <img src="./assets/images/products/<?php echo remove_junk($product['image']); ?>/1.jpg">

                                </a>
                                <figcaption class="info-wrap">
                                    <div class="row">
                                        <div class="col-md-9 col-xs-9">
                                            <span class="rated"><?php echo remove_junk($product['categorie']); ?></span>
                                            <a href="addetails.php?id=<?php echo (int)$product['id']; ?>" class="title" data-abc="true" style="font-size: 18px;"><?php echo remove_junk($product['name']); ?></a>
                                        </div>
                                    </div>
                                </figcaption>
                                <div class="bottom-wrap-payment">
                                    <figcaption class="info-wrap">
                                        <div class="row">
                                            <div class="col-md-12 col-xs-12">
                                                <?php
                                                if ($product['offer'] == 0) {
                                                ?>
                                                    <a href="addetails.php?id=<?php echo (int)$product['id']; ?>" style="text-align: center; font-size:20px" class="title" data-abc="true">$<?php echo number_format($product['sale_price'], 0, ",", "."); ?></a>
                                                <?php
                                                } else {
                                                ?>
                                                    <a href="addetails.php?id=<?php echo (int)$product['id']; ?>" class="title" style="text-align: center; font-size:20px;" data-abc="true">$<s><?php echo number_format($product['sale_price'], 0, ",", "."); ?></s> -- $<?php echo number_format($product['offer'], 0, ",", "."); ?></a>
                                                <?php
                                                }
                                                ?>
                                            </div>
                                        </div>
                                    </figcaption>
                                </div>
                                <div class="bottom-wrap">
                                    <?php
                                    $validation = validation_product_session((int)$product['id']);
                                    if ($validation == true) {
                                    ?>
                                        <a href="shopping_cart.php" class="btn btn-primary float-right" data-abc="true">Ver carrito</a>
                                        <?php
                                    } else {
                                        if ($product['quantity'] > 0) {


                                        ?>
                                            <a onclick="agregarCarrito(<?php echo $product['id'] ?>, 1 ); return false;" class="btn btn-primary float-right" data-abc="true">Comprar</a>
                                        <?php
                                        } else {
                                        ?>

                                    <?php
                                        }
                                    }
                                    ?>
                                </div>
                            </figure>
                        </div>
                    <?php
                    endforeach;
                    ?>



                </div>
            </div>
        </div>
    </section>
    <!-- /End Items Grid Area New Products -->

    <!-- Start Metodos De Pago Area -->
    <section class="items-grid section custom-padding">
        <div class="container justify-content-center">
            <div class="row">
                <div class="col-12">
                    <div class="section-title">
                        <h2 class="wow fadeInUp" data-wow-delay=".4s" style="background: -webkit-linear-gradient(#e91e63, #bf01ef);
                        -webkit-background-clip: text;-webkit-text-fill-color: transparent;">MÉTODOS DE PAGO</h2>

                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-7" style="margin: auto;">
                    <img src="https://cdn.shopify.com/s/files/1/0044/7836/9859/files/metodos_de_pago.png?v=1618942617" class="img-fluid" alt="">
                </div>
            </div>
        </div>
    </section>
    <!-- /End Metodos De Pago -->

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
    
    <script type="text/javascript">
        document.getElementById("info").click();
    </script>

    <script type="text/javascript">
        function agregarCarrito(id, qty) {

            var formData = {
                //'id': document.getElementById("id").value,
                //'qty': document.getElementById("qty").value
                'id': id,
                'qty': qty
            };
            // process the form
            $.ajax({
                type: 'POST',
                url: 'add_shopping_cart.php',
                data: formData,
                dataType: 'json',
                encode: true
            }).done(function(respuesta) {
                if (respuesta['error'] == true) {
                    console.log(respuesta['msg']);
                    swal({
                        title: "¡Error!",
                        text: "Lo sentimos, no se ha podido almacenar el producto para su compra",
                        type: "error",
                    });
                } else {
                    swal({
                        title: "",
                        showCancelButton: true,
                        confirmButtonText: `Ir a pagar`,
                        cancelButtonText: `Añadir al carrito`,
                        text: "¿Qué deseas hacer?",
                        type: "question",
                    }).then(function() {
                        window.location.href = "shopping_cart.php";
                    }, function(dismiss) {
                        if (dismiss === 'cancel') {
                            swal({
                                title: "",
                                text: respuesta['msg'],
                                type: "success",
                            }).then(function() {
                                location.reload();
                            })

                        }
                    });

                }
                //Tratamos a respuesta según sea el tipo  y la estructura               
            }).fail(function(jqXHR, textStatus) {
                alert("Falta información para agregar");
            });
        }

        function getParameterByName(name) {
            name = name.replace(/[\[]/, "\\[").replace(/[\]]/, "\\]");
            var regex = new RegExp("[\\?&]" + name + "=([^&#]*)"),
                results = regex.exec(location.search);
            return results === null ? "" : decodeURIComponent(results[1].replace(/\+/g, " "));
        }

        verificar()

        function verificar() {
            state = getParameterByName("transactionState");

            if (state == '') {

            } else {
                if (state == 4) {

                    swal({
                        title: "Transacción Realizada",
                        text: "Tu pedido ha sido procesdo con exitó, en los proximos dias llegara a tu domicilio.",
                        type: "success",
                    });
                } else {
                    if (state == 6) {
                        swal({
                            title: "Transacción Rechazada",
                            text: "Lo sentimos, no se ha podido procesar tu pago porque la transacción fue rechazada.",
                            type: "error",
                        });
                    } else {
                        if (state == 104) {
                            swal({
                                title: "¡Error!",
                                text: "Lo sentimos, payU ha registrado un error interno, por lo cual no se ha podido realizar tu pedido. Por favor vuelve a intentarlo  más tarde.",
                                type: "error",
                            });
                        } else {
                            if (state == 7) {
                                swal({
                                    title: "Transacción Pendiente",
                                    text: "Tú trasacción ha quedo en estado pendiente, por lo cual tu pedido aun no sera procesado.",
                                    type: "warning",
                                });
                            }
                        }
                    }
                }
            }







        }
    </script>
</body>

</html>