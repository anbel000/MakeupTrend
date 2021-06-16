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
                    <a href="adgird.php?id=<?php echo (int)$categorie['id']; ?>"><i class="lni lni-dinner"></i><?php echo remove_junk($categorie['name']); ?><span><?php echo remove_junk($count_categorie['total']); ?></span></a>
                  </li>
                <?php endforeach; ?>
              </ul>
            </div>


            <div class="single-widget range">
              <h3>Rango de precio</h3>
              <input type="range" class="form-range" name="range" step="1" min="100" max="10000" value="10" onchange="rangePrimary.value=value">
              <div class="range-inner">
                <label>$</label>
                <input type="text" id="rangePrimary" placeholder="100">
              </div>
            </div>


            <div class="single-widget condition">
              <h3>Condición</h3>
              <div class="form-check">
                <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault1">
                <label class="form-check-label" for="flexCheckDefault1">
                  Todas
                </label>
              </div>
              <div class="form-check">
                <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault2">
                <label class="form-check-label" for="flexCheckDefault2">
                  Nuevo
                </label>
              </div>
              <div class="form-check">
                <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault3">
                <label class="form-check-label" for="flexCheckDefault3">
                  Usado
                </label>
              </div>
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
                      <h3 class="title">Showing 1-12 of 21 ads found</h3>
                    </div>
                    <div class="col-lg-6 col-md-6 col-12">
                      <nav>
                        <div class="nav nav-tabs" id="nav-tab" role="tablist">
                          <button class="nav-link active" id="nav-grid-tab" data-bs-toggle="tab" data-bs-target="#nav-grid" type="button" role="tab" aria-controls="nav-grid" aria-selected="true"><i class="lni lni-grid-alt"></i></button>
                          <button class="nav-link" id="nav-list-tab" data-bs-toggle="tab" data-bs-target="#nav-list" type="button" role="tab" aria-controls="nav-list" aria-selected="false"><i class="lni lni-list"></i></button>
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
                                <p class="sale">Agotado</p>
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
                                    <a href="addetails.php?id=<?php echo (int)$product['id']; ?>" class="title" style="text-align: left;" data-abc="true">Unidades disponibles: <?php echo $product['quantity']; ?></a>
                                  </div>
                                  <div class="col-md-12 col-xs-12">
                                    <span class="rated"></span>
                                    <a href="addetails.php?id=<?php echo (int)$product['id']; ?>" class="title" data-abc="true">$<?php echo remove_junk($product['sale_price']); ?></a>
                                  </div>

                                </div>
                              </figcaption>
                            </div>
                          </figure>
                        </div>
                      <?php endforeach; ?>
                    </div>
                    <div class="row" style="padding-bottom: 50px;">
                      <div class="col-12">

                        <div class="pagination left">
                          <ul class="pagination-list">
                            <li><a href="javascript:void(0)">1</a></li>
                            <li class="active"><a href="javascript:void(0)">2</a></li>
                            <li><a href="javascript:void(0)">3</a></li>
                            <li><a href="javascript:void(0)">4</a></li>
                            <li><a href="javascript:void(0)"><i class="lni lni-chevron-right"></i></a></li>
                          </ul>
                        </div>

                      </div>
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
  <!-- End footer -->

  <a href="#" class="scroll-top btn-hover" style="display: none;">
    <i class="lni lni-chevron-up"></i>
  </a>

  <!-- ========================== SCRIPTS HERE =========================-->
  <script src="./assets/js/bootstrap.min.js"></script>
  <script src="./assets/js/wow.min.js"></script>
  <script src="./assets/js/tiny-slider.js"></script>
  <script src="./assets/js/glightbox.min.js"></script>
  <script src="./assets/js/main.js"></script>

</body>

</html>