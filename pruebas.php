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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/6.11.0/sweetalert2.css" />

    <link href="./magiczoomplus-trial/magiczoomplus/magiczoomplus.css" rel="stylesheet" type="text/css" media="screen" />


    <link rel="stylesheet" href="./assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="./assets/css/LineIcons.2.0.css">
    <link rel="stylesheet" href="./assets/css/animate.css">
    <link rel="stylesheet" href="./assets/css/tiny-slider.css">
    <link rel="stylesheet" href="./assets/css/glightbox.min.css">
    <link rel="stylesheet" href="./assets/css/main.css">



    <style type="text/css">
        .cfg-btn {
            background-color: rgb(55, 181, 114);
            color: #fff;
            border: 0;
            box-shadow: 0 0 1px 0px rgba(0, 0, 0, 0.3);
            outline: 0;
            cursor: pointer;
            width: 200px;
            padding: 10px;
            font-size: 1em;
            position: relative;
            display: inline-block;
            margin: 10px auto;
        }

        .cfg-btn:hover:not([disabled]) {
            background-color: rgb(37, 215, 120);
        }

        .mobile-magic .cfg-btn:hover:not([disabled]) {
            background: rgb(55, 181, 114);
        }

        .cfg-btn[disabled] {
            opacity: .5;
            color: #808080;
            background: #ddd;
        }

        .cfg-btn.btn-preview,
        .cfg-btn.btn-preview:active,
        .cfg-btn.btn-preview:focus {
            font-size: 1em;
            position: relative;
            display: block;
            margin: 10px auto;
        }

        .cfg-btn,
        .preview,
        .app-figure,
        .api-controls,
        .wizard-settings,
        .wizard-settings .inner,
        .wizard-settings .footer,
        .wizard-settings input,
        .wizard-settings select {
            -webkit-box-sizing: border-box;
            -moz-box-sizing: border-box;
            box-sizing: border-box;
        }

        .preview,
        .wizard-settings {
            padding: 10px;
            border: 0;
            min-height: 1px;
        }

        .preview {
            position: relative;
        }

        .api-controls {
            text-align: center;
        }

        .api-controls button,
        .api-controls button:active,
        .api-controls button:focus {
            width: 80px;
            font-size: .7em;
            white-space: nowrap;
        }

        .app-figure {
            width: 70% !important;
            margin: 0px auto;
            border: 0px solid red;
            /*padding: 20px;*/
            position: relative;
            text-align: center;
        }

        .selectors {
            margin-top: 10px;
        }

        .selectors .mz-thumb img {
            max-width: 56px;
        }

        .app-code-sample {
            max-width: 80%;
            margin: 30px auto 0;
            text-align: center;
            position: relative;
        }

        .app-code-sample input[type="radio"] {
            display: none;
        }

        .app-code-sample label {
            display: inline-block;
            padding: 2px 12px;
            margin: 0;
            font-size: .8em;
            text-decoration: none;
            cursor: pointer;
            color: #666;
            border: 1px solid rgba(136, 136, 136, 0.5);
            background-color: transparent;
        }

        .app-code-sample label:hover {
            color: #fff;
            background-color: rgb(253, 154, 30);
            border-color: rgb(253, 154, 30);
        }

        .app-code-sample input[type="radio"]:checked+label {
            color: #fff;
            background-color: rgb(110, 110, 110) !important;
            border-color: rgba(110, 110, 110, 0.7) !important;
        }

        .app-code-sample label:first-of-type {
            border-radius: 4px 0 0 4px;
            border-right-color: transparent;
        }

        .app-code-sample label:last-of-type {
            border-radius: 0 4px 4px 0;
            border-left-color: transparent;
        }

        .app-code-sample .app-code-holder {
            padding: 0;
            position: relative;
            border: 1px solid #eee;
            border-radius: 0px;
            background-color: #fafafa;
            margin: 15px 0;
        }

        .app-code-sample .app-code-holder>div {
            display: none;
        }

        .app-code-sample .app-code-holder pre {
            text-align: left;
            white-space: pre-line;
            border: 0px solid #eee;
            border-radius: 0px;
            background-color: transparent;
            padding: 25px 50px 25px 25px;
            margin: 0;
            min-height: 25px;
        }

        .app-code-sample input[type="radio"]:nth-of-type(1):checked~.app-code-holder>div:nth-of-type(1) {
            display: block;
        }

        .app-code-sample input[type="radio"]:nth-of-type(2):checked~.app-code-holder>div:nth-of-type(2) {
            display: block;
        }

        .app-code-sample .app-code-holder .cfg-btn-copy {
            display: none;
            z-index: -1;
            position: absolute;
            top: 10px;
            right: 10px;
            width: 44px;
            font-size: .65em;
            white-space: nowrap;
            margin: 0;
            padding: 4px;
        }

        .copy-msg {
            font: normal 11px/1.2em 'Helvetica Neue', Helvetica, 'Lucida Grande', 'Lucida Sans Unicode', Verdana, Arial, sans-serif;
            color: #2a4d14;
            border: 1px solid #2a4d14;
            border-radius: 4px;
            position: absolute;
            top: 8px;
            left: 0;
            right: 0;
            width: 200px;
            max-width: 70%;
            padding: 4px;
            margin: 0px auto;
            text-align: center;
        }

        .copy-msg-failed {
            color: #b80c09;
            border-color: #b80c09;
            width: 430px;
        }

        .mobile-magic .app-code-sample .cfg-btn-copy {
            display: none;
        }

        #code-to-copy {
            position: absolute;
            width: 0;
            height: 0;
            top: -10000px;
        }

        .lt-ie9-magic .app-code-sample {
            display: none;
        }

        .wizard-settings {
            background-color: #4f4f4f;
            color: #a5a5a5;
            position: absolute;
            right: 0;
            width: 340px;
        }

        .wizard-settings .inner {
            width: 100%;
            margin-bottom: 30px;
        }

        .wizard-settings .footer {
            color: #c7d59f;
            font-size: .75em;
            width: 100%;
            position: relative;
            vertical-align: bottom;
            text-align: center;
            padding: 6px;
            margin-top: 10px;
        }

        .wizard-settings .footer a {
            color: inherit;
            text-decoration: none;
        }

        .wizard-settings .footer a:hover {
            text-decoration: underline;
        }

        .wizard-settings a {
            color: #cc9933;
        }

        .wizard-settings a:hover {
            color: #dfb363;
        }

        .wizard-settings table>tbody>tr>td {
            vertical-align: top;
        }

        .wizard-settings table {
            min-width: 300px;
            max-width: 100%;
            font-size: .8em;
            margin: 0 auto;
        }

        .wizard-settings table caption {
            font-size: 1.5em;
            padding: 16px 8px;
        }

        .wizard-settings table td {
            padding: 4px 8px;
        }

        .wizard-settings table td:first-child {
            white-space: nowrap;
        }

        .wizard-settings table td:nth-child(2) {
            text-align: left;
        }

        .wizard-settings table td .values {
            color: #a08794;
            font-size: 0.8em;
            line-height: 1.3em;
            display: block;
            max-width: 126px;
        }

        .wizard-settings table td .values:before {
            content: '';
            display: block;
        }

        .wizard-settings input,
        .wizard-settings select {
            width: 126px;
        }

        .wizard-settings input {
            padding: 0px 4px;
        }

        .wizard-settings input[disabled] {
            color: #808080;
            background: #a7a7a7;
            border: 1px solid #a7a7a7;
        }

        .preview {
            width: 70%;
            float: left;
        }

        @media (min-width: 0px) {
            .preview {
                width: 100%;
                float: none;
            }
        }

        @media (min-width: 1024px) {
            .preview {
                width: calc(100% - 340px);
            }

            .wizard-settings {
                top: 0;
                min-height: 100%;
            }

            .wizard-settings .inner {
                margin-top: 60px;
            }

            .wizard-settings .footer {
                position: absolute;
                bottom: 0;
                left: 0;
            }

            .wizard-settings .settings-controls {
                position: fixed;
                top: 0;
                right: 0;
                width: 340px;
                padding: 10px 0 0;
                text-align: center;
                background-color: inherit;
            }
        }

        @media screen and (max-width: 1024px) {

            .api-controls button,
            .api-controls button:active,
            .api-controls button:focus {
                width: 70px;
            }
        }

        @media screen and (max-width: 1023px) {
            .app-figure {
                width: 98% !important;
                margin: 50px auto;
                padding: 0;
            }

            .app-code-sample {
                display: none;
            }

            .wizard-settings {
                width: 100%;
            }
        }

        @media screen and (max-width: 600px) {
            .mz-thumb img {
                max-width: 39px;
            }
        }

        @media screen and (max-width: 560px) {
            .api-controls .sep {
                content: '';
                display: table;
            }
        }

        @media screen and (min-width: 1600px) {
            .preview {
                padding: 10px 160px;
            }
        }
    </style>

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


                    <div class="preview col">


                        <div class="app-figure" id="zoom-fig">
                            <!--<a id="Zoom-1" class="MagicZoom" title="Show your product in stunning detail with Magic Zoom Plus." href="http://localhost:8080/MakeupTrend/assets/images/products/Polvos/1.jpg" data-zoom-image-2x="http://localhost:8080/MakeupTrend/assets/images/products/Polvos/1.jpg" data-image-2x="http://localhost:8080/MakeupTrend/assets/images/products/Polvos/1.jpg">
                                <img src="http://localhost:8080/MakeupTrend/assets/images/products/Polvos/1.jpg" srcset="http://localhost:8080/MakeupTrend/assets/images/products/Polvos/1.jpg 2x" alt="" />
                            </a>
                            <div class="selectors">
                                <a data-zoom-id="Zoom-1" href="http://localhost:8080/MakeupTrend/assets/images/products/Polvos/1.jpg0
                                " data-image="http://localhost:8080/MakeupTrend/assets/images/products/Polvos/1.jpg" data-zoom-image-2x="http://localhost:8080/MakeupTrend/assets/images/products/Polvos/1.jpg" data-image-2x="http://localhost:8080/MakeupTrend/assets/images/products/Polvos/1.jpg">
                                    <img srcset="http://localhost:8080/MakeupTrend/assets/images/products/Polvos/1.jpg" src="http://localhost:8080/MakeupTrend/assets/images/products/Polvos/1.jpg"/>
                                </a>
                                <a data-zoom-id="Zoom-1" href="https://magictoolbox.sirv.com/images/magiczoomplus/colorful-colors-2.jpg?h=1400" data-image="https://magictoolbox.sirv.com/images/magiczoomplus/colorful-colors-2.jpg?h=400" data-zoom-image-2x="https://magictoolbox.sirv.com/images/magiczoomplus/colorful-colors-2.jpg?h=2800" data-image-2x="https://magictoolbox.sirv.com/images/magiczoomplus/colorful-colors-2.jpg?h=800">
                                    <img srcset="https://magictoolbox.sirv.com/images/magiczoomplus/colorful-colors-2.jpg?h=120 2x" src="https://magictoolbox.sirv.com/images/magiczoomplus/colorful-colors-2.jpg?h=60" />
                                </a>
                                <a data-zoom-id="Zoom-1" href="https://magictoolbox.sirv.com/images/magiczoomplus/colorful-colors-3.jpg?h=1400" data-image="https://magictoolbox.sirv.com/images/magiczoomplus/colorful-colors-3.jpg?h=400" data-zoom-image-2x="https://magictoolbox.sirv.com/images/magiczoomplus/colorful-colors-3.jpg?h=2800" data-image-2x="https://magictoolbox.sirv.com/images/magiczoomplus/colorful-colors-3.jpg?h=800">
                                    <img srcset="https://magictoolbox.sirv.com/images/magiczoomplus/colorful-colors-3.jpg?h=120 2x" src="https://magictoolbox.sirv.com/images/magiczoomplus/colorful-colors-3.jpg?h=60" />
                                </a>
                                
                            </div>-->
                            <!--<a href="http://localhost:8080/MakeupTrend/assets/images/products/Polvos/1.jpg" class="MagicZoom" data-options="zoomWidth:400px; zoomHeight:400px">
                                <img src="http://localhost:8080/MakeupTrend/assets/images/products/Polvos/1.jpg" />
                            </a>-->

                            <div class="MagicScroll">
                                <a data-zoom-id="shoes" href="http://localhost:8080/MakeupTrend/assets/images/products/Polvos/1.jpg" data-image="http://localhost:8080/MakeupTrend/assets/images/products/Polvos/1.jpg"><img src="http://localhost:8080/MakeupTrend/assets/images/products/Polvos/1.jpgg" /></a>
                                <a data-zoom-id="shoes" href="shttp://localhost:8080/MakeupTrend/assets/images/products/Polvos/1.jpg" data-image="http://localhost:8080/MakeupTrend/assets/images/products/Polvos/1.jpg"><img src="http://localhost:8080/MakeupTrend/assets/images/products/Polvos/1.jpg" /></a>
                            </div>
                            <a class="MagicZoomPlus" id="shoes" href="shoe-1-big.jpg"><img src="http://localhost:8080/MakeupTrend/assets/images/products/Polvos/1.jpg" /></a>


                        </div>


                    </div>


                    <!-- <div class="col-lg-5 col-md-12 col-12" -->
                    <?php foreach ($products as $product) : ?>


                        <!--</div>-->

                        <div class="col-lg-6 col-md-12 col-12">
                            <div class="product-info">
                                <input id="id" type="number" hidden value="<?php echo remove_junk($product['id']); ?>">
                                <?php $id_product = $product['id']; ?>
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
                                    <BR></BR>
                                    <ul>
                                        <li>Cantidad</li>
                                        <li><input type="number" style="width:80px;text-align: center;" id="qty" class="form-control" value="1" min="1" /></li>
                                    </ul>
                                </div>
                            <?php endforeach; ?>
                            <div class="contact-info">
                                <?php if (validation_product_session($id_product)) { ?>
                                    <a href="shopping_cart.php"><button type="button" class="btn btn-primary" style="background: rgb(223,3,152);
                                                background: linear-gradient(90deg, rgba(223,3,152,1) 0%, rgba(132,0,255,1) 78%);">Ver carrito</button></a>
                                    <?php } else {
                                    if ($product['quantity'] > 0) {
                                    ?>
                                        <button type="button" class="btn btn-primary" style="background: rgb(223,3,152);
                                                background: linear-gradient(90deg, rgba(223,3,152,1) 0%, rgba(132,0,255,1) 78%);" onclick="agregarCarrito(); return false;">Añadir al carrito</button>
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
    <script src="./magiczoomplus-trial/magiczoomplus/magiczoomplus.js" type="text/javascript"></script>

    <script src="https://cdn.jsdelivr.net/npm/table-to-json@1.0.0/lib/jquery.tabletojson.min.js" integrity="sha256-H8xrCe0tZFi/C2CgxkmiGksqVaxhW0PFcUKZJZo1yNU=" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/6.11.0/sweetalert2.js"></script>

    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/prettify/r298/prettify.min.css">
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/prettify/188.0.0/prettify.min.js"></script>
    <script>
        try {
            prettyPrint();
        } catch (e) {}
    </script>


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


    <script type="text/javascript">
        function agregarCarrito() {

            var formData = {
                'id': document.getElementById("id").value,
                'qty': document.getElementById("qty").value
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


        }
    </script>

</body>
<div class="product-images">
    <main id="gallery">
        <?php
        $path = "./assets/images/products/{$product['image']}";
        $dir = opendir($path);
        // Leo todos los ficheros de la carpeta
        $flag = 0;
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

        <div class="main-img">

            <img class="img-fluid" src="./assets/images/products/<?php echo remove_junk($product['image']); ?>/<?php echo $images[1] ?>" id="current" style="height: 400px;" alt="#">

        </div>


        <div class="images">
            <img src="./assets/images/products/<?php echo remove_junk($product['image']); ?>/<?php echo $images[1] ?>" class="img" style="height: 80px;" alt="#">
            <img src="./assets/images/products/<?php echo remove_junk($product['image']); ?>/<?php echo $images[2] ?>" class="img" style="height: 80px;" alt="#">
            <img src="./assets/images/products/<?php echo remove_junk($product['image']); ?>/<?php echo $images[3] ?>" class="img" style="height: 80px;" alt="#">
        </div>
    </main>
</div>

</html>