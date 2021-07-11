<?php
require_once('includes/load.php');

if ($_POST['infoCart'] == 'true' && isset($_POST['productos']) && isset($_POST['departamento']) && isset($_POST['ciudad']) && isset($_POST['tipoEnvio']) && isset($_POST['tipoPago'])) {

    $productos = $_POST['productos'];
    $departamento = $_POST['departamento'];
    $ciudad = $_POST['ciudad'];
    $tipoEnvio = $_POST['tipoEnvio'];
    $tipoPago = $_POST['tipoPago'];


    foreach ($productos as $result) {
        if (isset($_SESSION["products_shoppingCart"][$result['ID']])) {
            $_SESSION["products_shoppingCart"][$result['ID']] = $result['Cantidad'];
            $flag = true;
        } else {
            $flag = false;
            $json = array('error' => 1, 'msg' => "Alteración del producto");
            $json_data = json_encode($json);
            echo $json_data;
            break;
        }
    }


    if ($flag == true) {
        
        $total_compra = 0;
        foreach ($_SESSION["products_shoppingCart"] as $indice => $qty) {
            $product = product_shopping_by_id($indice);
            foreach ($product as $result){

                $precio_producto = $result['sale_price'];
                $precio_descuento = $result['offer'];
                if($precio_descuento > 0){
                    $total = $precio_descuento * $qty;
                    $total_compra = $total_compra + $total;
                    $miArray = array("product_id"=>$indice, "qty"=>$qty, "price"=>$total, "price_product"=>$precio_descuento);
                    $_SESSION['products_sale'][$indice] = $miArray;
                }else{
                    $total = $precio_producto * $qty;
                    $total_compra = $total_compra + $total;
                    $miArray = array("product_id"=>$indice, "qty"=>$qty, "price"=>$total, "price_product"=>$precio_producto);
                    $_SESSION['products_sale'][$indice] = $miArray;
                }
            }
        }

        $_SESSION["departamento"] = $departamento;
        $_SESSION["ciudad"] = $ciudad;
        $_SESSION["tipoEnvio"] = $tipoEnvio;
        $_SESSION["tipoPago"] = $tipoPago;
        if($tipoEnvio == "Inter Rapidisimo"){
            $_SESSION["totalCompra"] = $total_compra;
            $_SESSION["subTotalCompra"] = $total_compra;
        }else{
            if($total_compra >= 100000){
                $_SESSION["totalCompra"] = $total_compra;
                $_SESSION["subTotalCompra"] = $total_compra;
            }else{
                $_SESSION["totalCompra"] = $total_compra + 7000;
                $_SESSION["subTotalCompra"] = $total_compra;
            }
        }
        
        $json = array('error' => false, 'msg' => 'Exitoso');
        $json_data = json_encode($json);
        echo $json_data;
    }
}
