<?php
/*session_start();
$descripcion = "";
foreach ($_SESSION['products_sale'] as $result) {
    $descripcion = $descripcion.'Hola '.$result['product_id'];
}
echo $descripcion;
var_dump($_SESSION['products_sale'][2]["product_id"]);
var_dump($_SESSION["tipoEnvio"]);*/
session_start();
session_destroy();
?>






