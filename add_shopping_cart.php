<?php

if(!isset($_POST["eliminarSession"])){
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
            $json = array('error' => false, 'msg' => "Producto agregado al carritos");
            $json_data = json_encode($json);
        } else {
            $json = array('error' => true, 'msg' => "El producto no ha sido agregado al carrito");
            $json_data = json_encode($json);
        }
    }
}else{
    if(isset($_POST["eliminarSession"])){
        session_start();
        if (session_status() == PHP_SESSION_ACTIVE) {
            session_destroy();
            $json = array('error' => false, 'msg' => "Los productos han sido eliminados del carrito");
            $json_data = json_encode($json);
        }else{
            $json = array('error' => true, 'msg' => "No existe la sesión");
            $json_data = json_encode($json);
        }
        
    }else{
        $json = array('error' => true, 'msg' => "No llego el parametro para eliminar");
        $json_data = json_encode($json);
    }
}



echo $json_data;





?>