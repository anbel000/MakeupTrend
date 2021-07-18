<!DOCTYPE html>
<!-- saved from url=(0068)https://demo.graygrids.com/themes/classigrids-demo/item-details.html -->
<html class="no-js" lang="zxx">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Makeup Trend</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/6.11.0/sweetalert2.css" />



    <link rel="stylesheet" href="./assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="./assets/css/LineIcons.2.0.css">
    <link rel="stylesheet" href="./assets/css/animate.css">
    <link rel="stylesheet" href="./assets/css/tiny-slider.css">
    <link rel="stylesheet" href="./assets/css/glightbox.min.css">
    <link rel="stylesheet" href="./assets/css/main.css">

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
    require_once('controller_shopping_cart.php');
    // Checkin What level user has permission to view this page
    //page_require_level(2);
    if (empty($_GET['id'])) {
        redirect('404.php');
    }
    $products = join_product_table_by_id((int)$_GET['id']);
    $categories = find_all('categories');
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

                    <div class="col-lg-5 col-md-12 col-12">
                        <?php foreach ($products as $product) : ?>

                            <div class="xzoom-container">
                                <?php
                                $path = "./assets/images/products/{$product['image']}";
                                $dir = opendir($path);
                                // Leo todos los ficheros de la carpeta
                                $flag = 1;
                                while ($elemento = readdir($dir)) {
                                    // Tratamos los elementos . y .. que tienen todas las carpetas
                                    if ($elemento != "." && $elemento != "..") {
                                        // Si es una carpeta
                                        if (is_dir($path . $elemento)) {
                                            // Muestro la carpeta
                                            //echo "<p><strong>CARPETA: ". $elemento ."</strong></p>";
                                            // Si es un fichero
                                        } else {
                                            // Muestro el fichero
                                            //echo "<br />". $elemento;
                                            $images[$flag] = $elemento;
                                            $flag++;
                                        }
                                    }
                                }
                                ?>
                                <img class="xzoom" id="xzoom-default" alt="<?php echo remove_junk($product['name']); ?>" src="./assets/images/products/<?php echo remove_junk($product['image']); ?>/<?php echo $images[3] ?>" xoriginal="././assets/images/products/<?php echo remove_junk($product['image']); ?>/<?php echo $images[3] ?>" />
                                <div class="xzoom-thumbs">
                                    <a href="./assets/images/products/<?php echo remove_junk($product['image']); ?>/<?php echo $images[3] ?>">
                                        <img class="xzoom-gallery" width="80" alt="<?php echo remove_junk($product['name']); ?>" src="./assets/images/products/<?php echo remove_junk($product['image']); ?>/<?php echo $images[3] ?>" xpreview="./assets/images/products/<?php echo remove_junk($product['image']); ?>/<?php echo $images[3] ?>">
                                    </a>
                                    <a href="./assets/images/products/<?php echo remove_junk($product['image']); ?>/<?php echo $images[2] ?>">
                                        <img class="xzoom-gallery" width="80" alt="<?php echo remove_junk($product['name']); ?>" src="./assets/images/products/<?php echo remove_junk($product['image']); ?>/<?php echo $images[2] ?>" xpreview="./assets/images/products/<?php echo remove_junk($product['image']); ?>/<?php echo $images[2] ?>">
                                    </a>
                                    <a href="./assets/images/products/<?php echo remove_junk($product['image']); ?>/<?php echo $images[1] ?>">
                                        <img class="xzoom-gallery" width="80" alt="<?php echo remove_junk($product['name']); ?>" src="./assets/images/products/<?php echo remove_junk($product['image']); ?>/<?php echo $images[1] ?>" xpreview="./assets/images/products/<?php echo remove_junk($product['image']); ?>/<?php echo $images[1] ?>">
                                    </a>
                                </div>
                            </div>


                    </div>

                    <div class="col-lg-6 col-md-12 col-12">
                        <div class="product-info">
                            <input id="id" type="number" hidden value="<?php echo remove_junk($product['id']); ?>">
                            <?php $id_product = $product['id']; ?>
                            <h2 class="title"><?php echo remove_junk($product['name']); ?></h2>
                            <?php
                            if ($product['offer'] == 0) {
                            ?>
                                <h3 class="price">$<?php echo number_format($product['sale_price'], 0, ",", "."); ?></h3>
                            <?php
                            } else {
                            ?>
                                <h3 class="price">$<s><?php echo number_format($product['sale_price'], 0, ",", "."); ?></s> - $<?php echo number_format($product['offer'], 0, ",", "."); ?></h3>
                            <?php
                            }
                            ?>
                            <div class="list-info">
                                <h4>Información</h4>
                                <ul>
                                    <li><span><?php echo remove_junk($product['description']); ?></span></li>
                                </ul>
                            </div>
                            <div class="list-info">
                                <ul>
                                    <li><span>Marca:</span><?php echo remove_junk($product['brand']); ?></li>
                                    <li><span>Categoria:</span><?php echo remove_junk($product['categorie']); ?></li>
                                </ul>
                                <BR></BR>
                                <form style="display: contents;" action="javascript::none">
                                    <ul>
                                        <li>Cantidad</li>
                                        <li>
                                            <input type="number" style="width:80px;text-align: center;" onchange="document.getElementById('qtyDisp').click()" id="qty" class="form-control" value="1" min="1" max="<?php echo $product['quantity']; ?>" />
                                        </li>
                                    </ul>
                                    <input type="submit" hidden id="qtyDisp">
                                </form>
                            </div>
                        <?php endforeach; ?>
                        <div class="contact-info">
                            <?php if (validation_product_session($id_product)) { ?>
                                <a href="shopping_cart.php"><button type="button" class="btn btn-primary" style="background: rgb(223,3,152);
                                                border-color:white; font-weight:400">Ver carrito</button></a>
                                <?php } else {
                                if ($product['quantity'] > 0) {
                                ?>
                                    <button type="button" class="btn btn-primary" style="background: rgb(223,3,152);
                                                border-color:white; font-weight:400" onclick="agregarCarrito(); return false;">Añadir al carrito</button>
                                <?php
                                } else {
                                ?>

                            <?php
                                }
                            }
                            ?>

                            <!-- 4Vj8eK4rloUd272L48hsrarnUA~508029~PAGO01~30000~COP~12000 -->
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


    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>


    <script src="https://cdn.jsdelivr.net/npm/table-to-json@1.0.0/lib/jquery.tabletojson.min.js" integrity="sha256-H8xrCe0tZFi/C2CgxkmiGksqVaxhW0PFcUKZJZo1yNU=" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/6.11.0/sweetalert2.js"></script>
    <script src="./assets/js/bootstrap.min.js"></script>
    <script src="./assets/js/wow.min.js"></script>
    <script src="./assets/js/tiny-slider.js"></script>
    <script src="./assets/js/glightbox.min.js"></script>
    <script src="./assets/js/main.js"></script>

    <script src="./assets/js/jquery.js"></script>
    <script type="text/javascript" src="./assets/js/xzoom.min.js"></script>
    <script src="./assets/js/setup.js"></script>

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


    <script type="text/javascript">
        function agregarCarrito() {

            id = document.getElementById("id").value;
            qty = parseInt(document.getElementById("qty").value);
            qtyMin = parseInt(document.getElementById("qty").min);
            qtyMax = parseInt(document.getElementById("qty").max);

            if (qty >= qtyMin && qty <= qtyMax) {

                var formData = {
                    id,
                    qty
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
                        swal({
                            title: "¡Error!",
                            text: respuesta['msg'],
                            type: "error",
                        });
                    } else {
                        swal({
                            title: "",
                            showCancelButton: true,
                            confirmButtonText: `Ir a pagar`,
                            cancelButtonText: `Seguir comprando`,
                            text: respuesta['msg'],
                            type: "success",
                        }).then(function() {
                            window.location.href = "shopping_cart.php";

                        }, function(dismiss) {
                            if (dismiss === 'cancel') {

                                location.reload();

                            }
                        });

                    }
                    //Tratamos a respuesta según sea el tipo  y la estructura               
                }).fail(function(jqXHR, textStatus) {
                    alert("Falta información para agregar");
                });

            } else {
                swal({
                    title: "¡Error!",
                    text: "Uno de los productos tiene una cantidad no permitida, por favor revisa y corrige.",
                    type: "error",
                });
            }


        }
    </script>

</body>

</html>