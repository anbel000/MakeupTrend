<?php

function validation_product_session($id_product){

    $id = $id_product;
    
    if (isset($_SESSION["products_shoppingCart"][$id])) {
        return true;
    }else{
        return false;
    }

}

if(isset($_POST["remove_product"]) && isset($_POST["id"])){
    remove_product_session($_POST["id"]);
    echo true;
}

function remove_product_session($id_product){
    session_start();
    $id = $id_product;
    unset ($_SESSION["products_shoppingCart"][$id]);

}




?>