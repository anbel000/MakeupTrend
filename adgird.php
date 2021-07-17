<!DOCTYPE html>
<!-- saved from url=(0073)https://demo.graygrids.com/themes/classigrids-demo/item-listing-grid.html -->
<html class="no-js" lang="zxx">

<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <title>Ad Listing Grid - ClassiGrids Classified Ads and Listing Website Template</title>
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
  // Checkin What level user has permission to view this page
  //page_require_level(2);
  if (empty($_GET['id'])) {
    redirect('404.php');
  }
  $products = join_product_table_by_id_category((int)$_GET['id']);
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

  <!-- Start Header -->
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
  <!-- End Header -->

  <!-- Start indicative posisition page -->
  <div class="breadcrumbs">
    <div class="container">
      <div class="row align-items-center">
        <div class="col-lg-6 col-md-6 col-12">
          <div class="breadcrumbs-content">
            <h1 class="page-title">Productos</h1>
          </div>
        </div>
        <div class="col-lg-6 col-md-6 col-12">
          <ul class="breadcrumb-nav">
            <li><a href="./index.php">Inicio</a></li>
            <li>Productos</li>
          </ul>
        </div>
      </div>
    </div>
  </div>
  <!-- End indicative posisition page -->

  <!-- Start list products page -->
  <section class="category-page section">
    <div class="container">
      <div class="row">
        <div class="col-lg-3 col-md-4 col-12">
          <div class="category-sidebar">

            <div class="single-widget search">
              <h3>Buscar</h3>
              <form method="get" action="search.php">
                <input type="text" name="keyword" placeholder="Busque aquí..">
                <button type="submit"><i class="lni lni-search-alt"></i></button>
              </form>
            </div>


            <div class="single-widget">
              <h3>Todas las categorias</h3>
              <ul class="list">
                <?php foreach ($categories as $categorie) :
                  $count_categorie = join_count_by_id("products", $categorie['id']); ?>
                  <li>
                    <a href="adgird.php?id=<?php echo (int)$categorie['id']; ?>"><i class="lni lni-radio-button"></i><?php echo remove_junk($categorie['name']); ?><span><?php echo remove_junk($count_categorie['total']); ?></span></a>
                  </li>
                <?php endforeach; ?>
              </ul>
            </div>
          </div>
        </div>
        <div class="col-lg-9 col-md-8 col-12">
          <div class="category-grid-list">
            <div class="row">
              <div class="col-12">
                <div class="category-grid-topbar">
                  <div class="row align-items-center">
                    <div class="col-lg-6 col-md-6 col-12">
                      <h3 class="title">
                        <?php
                        $cantidadResultados = join_count_by_id("products", $_GET['id']);
                        echo "Mostrando " . $cantidadResultados["total"] . " productos encontrados";
                        ?>
                      </h3>
                    </div>
                    <div class="col-lg-6 col-md-6 col-12">
                      <nav>
                        <div class="nav nav-tabs" id="nav-tab" role="tablist">
                          <button class="nav-link active" id="nav-grid-tab" data-bs-toggle="tab" data-bs-target="#nav-grid" type="button" role="tab" aria-controls="nav-grid" aria-selected="true"><i class="lni lni-grid-alt"></i></button>
                        </div>
                      </nav>
                    </div>
                  </div>
                </div>
                <div class="tab-content" id="nav-tabContent">
                  <div class="tab-pane fade show active" id="nav-grid" role="tabpanel" aria-labelledby="nav-grid-tab">
                    <div class="row">
                      <?php foreach ($products as $product) : ?>
                        <div class="col-lg-4 col-md-6">
                          <figure class="card2 card2-product-grid card2-lg" style="margin-top: 28px;">
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
                                      <a href="addetails.php?id=<?php echo (int)$product['id']; ?>" style="text-align: center; font-size:20px; padding-bottom:4px" class="title" data-abc="true">$<?php echo number_format($product['sale_price'], 0, ",", "."); ?></a>
                                    <?php
                                    } else {
                                    ?>
                                      <a href="addetails.php?id=<?php echo (int)$product['id']; ?>" class="title" style="text-align: center; font-size:20px; padding-bottom:4px" data-abc="true">$<s><?php echo number_format($product['sale_price'], 0, ",", "."); ?></s> - $<?php echo number_format($product['offer'], 0, ",", "."); ?></a>
                                    <?php
                                    }
                                    ?>
                                  </div>

                                </div>
                              </figcaption>
                            </div>
                          </figure>
                        </div>
                      <?php endforeach; ?>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- End list products page -->

  <!-- Start footer -->
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
  <!-- End footer -->

  <!-- ========================== SCRIPTS HERE =========================-->

  <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
  <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>

  <script src="./assets/js/bootstrap.min.js"></script>
  <script src="./assets/js/wow.min.js"></script>
  <script src="./assets/js/tiny-slider.js"></script>
  <script src="./assets/js/glightbox.min.js"></script>
  <script src="./assets/js/main.js"></script>

</body>

</html>