<link rel="stylesheet" href="assets/css/bootstrap.min.css" />

<div class="row">
    


        <div class="col-lg-3">
            <figure class="card2 card2-product-grid card2-lg"> <a href="#" class="img-wrap" data-abc="true"> <img src="./assets/images/products/Polvos/0.jpg"> </a>
                <figcaption class="info-wrap">
                    <div class="row">
                        <div class="col-md-9 col-xs-9">
                            <span class="rated">Laptops</span>
                            <a href="#" class="title" data-abc="true">Dell Xtreme 270</a>
                        </div>
                    </div>
                </figcaption>
                <div class="bottom-wrap-payment">
                    <figcaption class="info-wrap">
                        <div class="row">
                            <div class="col-md-9 col-xs-9">
                                <span class="rated">Precio</span>
                                <a href="#" class="title" data-abc="true">$3,999</a>
                            </div>
                            <div class="col-md-3 col-xs-3">
                                <div class="rating text-right">
                                    #### 8787
                                </div>
                            </div>
                        </div>
                    </figcaption>
                </div>
                <div class="bottom-wrap">
                    <a href="#" class="btn btn-primary float-right" data-abc="true"> Buy now </a>
                </div>
            </figure>
        </div>



    
</div>




<style>
    body {
        background-color: #EEEEEE;
        font-family: jost, sans-serif;
        font-weight: 400;
        font-style: normal;
        /*color: #888;*/
        background-image: url(./assets/images/25077201.jpg);
        overflow-x: hidden;
        font-size: 15px
    }


    .card2-product-list,
    .card2-product-grid {
        margin-bottom: 0
    }

    .card2 {
        /*width: 500px;*/
        position: relative;
        display: -webkit-box;
        display: -ms-flexbox;
        display: flex;
        -webkit-box-orient: vertical;
        -webkit-box-direction: normal;
        -ms-flex-direction: column;
        flex-direction: column;
        min-width: 0;
        word-wrap: break-word;
        background-color: #fff;
        background-clip: border-box;
        border: 1px solid rgba(0, 0, 0, 0.1);
        border-radius: 23px;
        margin-top: 50px
    }

    .card2-product-grid:hover {
        -webkit-box-shadow: 0 4px 15px rgba(153, 153, 153, 0.3);
        box-shadow: 0 4px 15px rgba(153, 153, 153, 0.3);
        -webkit-transition: .3s;
        transition: .3s
    }

    .card2-product-grid .img-wrap {
        border-radius: 0.2rem 0.2rem 0 0;
        height: 220px
    }

    .card2 .img-wrap {
        overflow: hidden
    }

    .card2-lg .img-wrap {
        height: 280px
    }

    .card2-product-grid .img-wrap {
        border-radius: 0.2rem 0.2rem 0 0;
        height: 275px;
        padding: 16px
    }

    [class*='card2-product'] .img-wrap img {
        height: 100%;
        max-width: 100%;
        width: auto;
        display: inline-block;
        -o-object-fit: cover;
        object-fit: cover
    }

    .img-wrap {
        text-align: center;
        display: block
    }

    .card2-product-grid .info-wrap {
        overflow: hidden;
        padding: 18px 20px
    }

    [class*='card2-product'] a.title {
        color: #212529;
        display: block
    }



    .card2-product-grid .bottom-wrap {
        padding: 18px;
        border-top: 1px solid #e4e4e4
    }

    .bottom-wrap-payment {
        padding: 0px;
        border-top: 1px solid #e4e4e4
    }

    .rated {
        font-size: 10px;
        color: #b3b4b6
    }

    .btn {
        display: block;
        font-weight: 600;
        color: #343a40;
        text-align: center;
        vertical-align: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        -ms-user-select: none;
        user-select: none;
        background-color: transparent;
        border: 1px solid transparent;
        padding: 0.45rem 0.85rem;
        font-size: 1rem;
        line-height: 1.5;
        border-radius: 0.2rem
    }

    .btn-primary {
        color: #fff;
        background-color: #3167eb;
        border-color: #3167eb
    }
</style>






<div class="col-lg-3 col-md-3 col-8">
                            <!-- Start Single Grid -->
                            <div class="single-grid wow fadeInUp" data-wow-delay=".2s">
                                <div class="image" style="width: 356px;height: 244px;">
                                    <a href="addetails.php?id=<?php echo (int)$product['id']; ?>" class="thumbnail">
                                        <!--<img src="assets/images/items-grid/img1.jpg" alt="#">-->
                                        <img src="assets/images/products/Polvos/0.jpg" alt="#" style="width: 324px;height: 244px;">
                                    </a>
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