<?php

session_start();


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

var_dump($_SESSION);
echo $json_data;

$_SESSION["carrito"]["1"] = "Daniela";
$_SESSION["carrito"]["3"] = "Andres";
$_SESSION["carrito"]["2"] = "Cristina";
/*
foreach($_SESSION["carrito"] as $indice =>$result){
    var_dump($indice);
    var_dump($result);
}*/



?>