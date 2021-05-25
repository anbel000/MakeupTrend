<?php

if (session_status() == PHP_SESSION_ACTIVE) {
  
    if (isset($_POST["id"]) && isset($_POST["qty"])) {
        $product = $_POST["id"];
        $qty_product = $_POST["qty"];

        $_SESSION["products_shoppingCart"][$product] = $qty_product;
        $json = array('error' => false, 'msg' => "Producto agregado al carrito");
        $json_data = json_encode($json);
    } else {
        $json = array('error' => true, 'msg' => "El producto no ha sido agregado al carrito");
        $json_data = json_encode($json);
    }
} else {
    session_start();
    
    if (isset($_POST["id"]) && isset($_POST["qty"])) {
        $product = $_POST["id"];
        $qty_product = $_POST["qty"];
        
        $_SESSION["products_shoppingCart"][$product] = $qty_product;
        $json = array('error' => false, 'msg' => "Producto agregado al carrito");
        $json_data = json_encode($json);
    } else {
        $json = array('error' => true, 'msg' => "El producto no ha sido agregado al carrito");
        $json_data = json_encode($json);
    }
}


echo $json_data;





?>