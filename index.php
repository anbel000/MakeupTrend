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

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/6.11.0/sweetalert2.css" />

</head>

<body style="background-image:url(./assets/images/25077201.jpg)">
    <!--[if lte IE 9]>
      <p class="browserupgrade">
        You are using an <strong>outdated</strong> browser. Please
        <a href="https://browsehappy.com/">upgrade your browser</a> to improve
        your experience and security.
      </p>
    <![endif]-->

    <?php
    require_once('includes/load.php');
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

    <!-- Start Hero Area -->
    <section class="hero-area overlay">
        <div class="container">
            <div class="row">
                <div class="col-lg-10 offset-lg-1 col-md-12 col-12">
                    <div class="hero-text text-center">
                        <!-- Start Hero Text -->
                        <div class="section-heading">
                            <h2 class="wow fadeInUp" data-wow-delay=".3s">Bienvenida a Makeup Trend</h2>
                            <p class="wow fadeInUp" data-wow-delay=".5s">Pon tu belleza, a cuidado de nosotros.<br>Encuentra
                                productos de alta calidad y buen precio.</p>
                        </div>
                        <!-- End Search Form -->
                        <!-- Start Search Form -->
                        <div class="search-form wow fadeInUp" data-wow-delay=".7s">
                            <form action="search.php" method="get">
                                <div class="row">

                                    <div class="col-lg-10 col-md-10 col-12 p-0">
                                        <div class="search-input">
                                            <label for="keyword"><i class="lni lni-search-alt theme-color"></i></label>
                                            <input type="text" name="keyword" id="keyword" placeholder="Buscar un producto">
                                        </div>
                                    </div>
                                    <div class="col-lg-2 col-md-2 col-12 p-0">
                                        <div class="search-btn button">
                                            <button class="btn"><i class="lni lni-search-alt"></i>Search</button>
                                        </div>
                                    </div>

                                </div>
                            </form>
                        </div>
                        <!-- End Search Form -->
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End Hero Area -->

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
                                    <img src="./assets/images/categories/<?php echo remove_junk($categorie['name']); ?>.jpg" alt="#">
                                </div>
                                <div class="content">
                                    <h4 class="name">
                                        <?php echo remove_junk($categorie['name']); ?>
                                        <span><?php echo remove_junk($count_categorie['total']); ?></span>
                                    </h4>
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
                                    <a href="assets/catálagos/Catalogo Al Por Mayor - Makeup Trend.pdf" download="Catalogo Al Por Mayor - Makeup Trend.pdf"> <i class="lni lni-book"></i></a>
                                    <h4>Catálogo Al Mayor</h4>
                                    <p>Descarga nuestro catálogo al por mayor para enterar de precios y productos.</p>
                                </div>
                                <!-- Start Single List -->
                            </div>
                            <div class="col-lg-6 col-md-6 col-12">
                                <!-- Start Single List -->
                                <div class="single-list wow fadeInUp" data-wow-delay=".4s">
                                    <a href="assets/catálagos/Catalogo Al Detal - Makeup Trend.pdf" download="Catalogo Al Detal - Makeup Trend.pdf"> <i class="lni lni-book"></i></a>
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
        <div class="container">
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
                        <div class="col-lg-4 col-md-6 col-12">
                            <!-- Start Single Grid -->
                            <div class="single-grid wow fadeInUp" data-wow-delay=".2s">
                                <div class="image">
                                    <a href="addetails.php?id=<?php echo (int)$product['id']; ?>" class="thumbnail"><img src="assets/images/items-grid/img1.jpg" alt="#"></a>
                                    <?php if ($product['quantity'] == 0) { ?>
                                        <div class="author">
                                            <p class="sale">Agotado</p>
                                        </div>
                                    <?php } ?>
                                </div>
                                <div class="content">
                                    <div class="top-content">
                                        <p class="tag"><?php echo remove_junk($product['categorie']); ?></p>
                                        <h3 class="title">
                                            <a href="addetails.php?id=<?php echo (int)$product['id']; ?>"><?php echo remove_junk($product['name']); ?></a>
                                        </h3>
                                    </div>
                                    <div class="bottom-content">
                                        <p class="price">Precio: <span>$<?php echo remove_junk($product['sale_price']); ?></span></p>
                                        <?php
                                        $validation = validation_product_session((int)$product['id']);
                                        if ($validation == true) {
                                        ?>
                                            <a href="shopping_cart.php"><button type="button" class="btn btn-primary" style="background: rgb(223,3,152);
                                        background: linear-gradient(90deg, rgba(223,3,152,1) 0%, rgba(132,0,255,1) 78%); margin-left: 50%; width:100px;">Ver carrito<i class="fa fa-cart-plus"></i></button></a>
                                        <?php
                                        } else {

                                        ?>
                                            <a><button type="button" onclick="agregarCarrito(<?php echo $product['id'] ?>, 1 ); return false;" class="btn btn-primary" style="background: rgb(223,3,152);
                                        background: linear-gradient(90deg, rgba(223,3,152,1) 0%, rgba(132,0,255,1) 78%); margin-left: 50%;">Comprar<i class="fa fa-cart-plus"></i></button></a>
                                        <?php
                                        }
                                        ?>
                                    </div>
                                </div>
                            </div>
                            <!-- End Single Grid -->
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </section>
    <!-- /End Items Grid Area New Products -->

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