<?php
echo "hola";
session_start();

if(!empty($_SESSION["products_shoppingCart"])){
    echo "ENTRO";
}else{
    echo "NO ENTRO";
}




?>