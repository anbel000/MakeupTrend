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

    <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js'></script>
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

    session_start();


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
    <div class="card contenedor_body">
        <div class="row">
            <div class="col-md-8 cart">
                <div class="title">
                    <div class="row">
                        <div class="col">
                            <h4>Carrito de compras</h4>
                        </div>
                    </div>
                </div>
                <?php
                $count = 0;
                if (isset($_SESSION["products_shoppingCart"]) && !empty($_SESSION["products_shoppingCart"])) {
                    foreach ($_SESSION["products_shoppingCart"] as $indice => $qty) {
                        $product = join_product_table_by_id($indice);
                        foreach ($product as $result) {
                            $count = $count + 1;
                ?>
                            <div class="row border-top">
                                <div class="row main align-items-center">
                                    <div class="col-md-2 col-2"><img class="img-fluid" src="https://i.imgur.com/1GrakTl.jpg"></div>
                                    <div class="col-md-4 col">
                                        <div class="row text-muted"><?php echo $result["categorie"] ?></div>
                                        <div class="row"><?php echo $result["name"] ?></div>
                                    </div>
                                    <div class="col">
                                        <input type="number" onchange="calculo()" style="width:50px;text-align: center;margin-bottom:0vh;" id="qty<?php echo $count; ?>" class="form-control" value="<?php echo $qty ?>" min="1" />
                                    </div>
                                    <div class="col" id="price<?php echo $count; ?>">$ <?php echo $result["sale_price"] ?></div>
                                    <div class="col">
                                        <span class="close"><a href="javascript:quitarProducto(<?php echo $result["id"] ?>);">&#10005;</a></span>
                                    </div>
                                </div>
                            </div>
                    <?php
                        }
                    }
                } else {
                    ?>
                    <div class="row">
                        <div class="col-12">
                            <p>NO EXISTEN PRODUCTOS AGREGADOS AL CARRITO</p>
                        </div>
                    </div>

                <?php
                }
                ?>
                <div class="back-to-shop"><a href="index.php">&leftarrow;<span class="text-muted"> Regresar a la tienda</span></a></div>
            </div>
            <div class="col-md-4 summary">
                <div>
                    <h5>Resumen</h5>
                </div>
                <hr>
                <div class="row">
                    <div class="col" style="padding-left:0;"><?php echo $count; ?> Productos</div>
                    <div class="col text-right" id="subTotal">$ 0</div>
                </div>


                <form>
                    <p>Ciudad de envío</p>
                    <select class="form-select form-select-sm" id="areas">
                        <option class="text-muted" value="0">Seleccione una ciudad</option>
                    </select>
                    <p>Tipo de envio</p>
                    <select class="form-select form-select-sm" onchange="calculo()" id="categorias">
                        <option class="text-muted" value="0">Seleccione una ciudad</option>
                       
                    </select>
                    <p><strong>Información de envío</strong></p>
                    <p id="info">Hola</p>
                </form>
                <div class="row" style="border-top: 1px solid rgba(0,0,0,.1); padding: 2vh 0;">
                    <div class="col">TOTAL</div>
                    <div class="col text-right" id="total">$ 0</div>
                </div>
                <div class="row">
                    <a href="buy_cart.php">
                        <button class="btn">SIGUIENTE</button>
                    </a>
                </div>

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
    <script src="assets/js/bootstrap.min.js"></script>
    <script src="assets/js/wow.min.js"></script>
    <script src="assets/js/tiny-slider.js"></script>
    <script src="assets/js/glightbox.min.js"></script>
    <script src="assets/js/main.js"></script>

    <script type="text/javascript">
        function quitarProducto(id) {
            var formData = {
                'id': id,
                'remove_product': "remove_product"
            };
            // process the form
            $.ajax({
                type: 'POST',
                url: 'controller_shopping_cart.php',
                data: formData,
                dataType: 'json',
                encode: true
            }).done(function(respuesta) {
                location.reload();
            })
        }
    </script>

    <script type="text/javascript">
        const formatterPeso = new Intl.NumberFormat('es-CO', {
            style: 'currency',
            currency: 'COP',
            minimumFractionDigits: 0
        })

        type_send.oninput = function() {

            if (document.getElementById("type_send").value == 0) {
                info.innerHTML = "Información interrapidisimo";
            } else {
                info.innerHTML = "El producto sera enviado ";
            }
        };

        calculo();

        function calculo() {
            subTotal = 0;
            total = 0;
            for (x = 1; x <= <?php echo $count; ?>; x++) {
                valorProducto = document.getElementById("qty" + x).value * document.getElementById("price" + x).textContent.substr(2, );
                subTotal = parseInt(subTotal) + parseInt(valorProducto);
            }
            document.getElementById("subTotal").innerHTML = formatterPeso.format(subTotal);
            total = parseInt(subTotal) + parseInt(document.getElementById("type_send").value);
            document.getElementById("total").innerHTML = formatterPeso.format(total);
        }
    </script>


    <script type="text/javascript">
        
        var categorias = [
            {id:1,name:"categoria1",idArea:1},
            {id:2,name:"categoria2",idArea:1},
            {id:3,name:"categoria3",idArea:1},
            {id:4,name:"categoria4",idArea:2},
            {id:5,name:"categoria5",idArea:2},
            {id:6,name:"categoria6",idArea:2},
            {id:7,name:"categoria7",idArea:3},
            {id:8,name:"categoria8",idArea:3},
            {id:9,name:"categoria9",idArea:3},
        ]

        var areas = [
            {id:1,name:"area1"},
            {id:2,name:"area2"},
            {id:3,name:"area3"}
        ]

        var areasSelect = document.getElementById('areas');
        var categoriasSelect = document.getElementById('categorias');
        
        areasSelect.addEventListener("change", cargarCategorias);
        
        areas.forEach(function(area){
        let opcion = document.createElement('option')
        opcion.value = area.id
        opcion.text = area.name
        areasSelect.add(opcion)
        })

        function cargarCategorias(){
        categoriasSelect.options.length = 1;
        subCategoriasSelect.options.length = 1;
        categorias
        .filter(function (categoria){
            return categoria.idArea == this;
        }, areasSelect.value)
        .forEach(function(categoria){
            let opcion = document.createElement('option')
            opcion.value = categoria.id
            opcion.text = categoria.name
            categoriasSelect.add(opcion);
        });
        }
    </script>

</body>

</html>