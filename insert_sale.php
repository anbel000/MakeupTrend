<?php
$page_title = 'Agregar venta';
require_once('includes/load.php');
// Checkin What level user has permission to view this page

if(isset($_SESSION["permit_session"]) && $_SESSION["permit_session"] == true){

}else{
  page_require_level(3);
}

?>

<?php

if (isset($_POST['add_sale'])) {
  if (isset($_POST['productos'])) {
    $req_fields = array('name_sale', 'cel_phone', 'email', 'department', 'city', 'direction', 'neighborhood', 'type_ubication', 'payment_method', 'shipping_type', 'state', 'date');
    validate_fields($req_fields);
    if (empty($errors)) {

      foreach ($_POST["productos"] as $result) {
        
        $product = product_qty_by_id($result['ID']);
        foreach($product as $result2){
          if ((int)$result['Cantidad'] > 0 && (int)$result['Cantidad'] <= (int)$result2['quantity']) {
            $disponibilidad = true;
          } else {
            $disponibilidad = false;
            $json = array('error' => true, 'msg' => "El producto " . $result2['name'] . " no se puede registrar por la cantidad de productos");
            $json_data = json_encode($json);
            break;
          }
        }
      }

      if ($disponibilidad == true) {
        $name_sale      = $db->escape($_POST['name_sale']);
        $cel_phone     = $db->escape($_POST['cel_phone']);
        $email     = $db->escape($_POST['email']);
        $department     = $db->escape($_POST['department']);
        $city     = $db->escape($_POST['city']);
        $direction   = $db->escape($_POST['direction']);
        $neighborhood      = $db->escape($_POST['neighborhood']);
        $type_ubication    = $db->escape($_POST['type_ubication']);
        $payment_method      = $db->escape($_POST['payment_method']);
        $shipping_type      = $db->escape($_POST['shipping_type']);
        $state      = $db->escape($_POST['state']);
        $date    = $db->escape($_POST['date']);


        $sql  = "INSERT INTO sales (";
        $sql .= "name,cel_phone,email,department,city,direction,neighborhood,type_ubication,payment_method,shipping_type,state,date";
        $sql .= ") VALUES (";
        $sql .= "'{$name_sale}','{$cel_phone}','{$email}','{$department}','{$city}','{$direction}','{$neighborhood}','{$type_ubication}','{$payment_method}','{$shipping_type}','{$state}','{$date}'";
        $sql .= ")";

        if ($db->query($sql)) {

          foreach ($_POST["productos"] as $result) {
            $id_sale = get_id_sale_by_name($_POST['name_sale']);
            $p_id      = $db->escape((int)$result['ID']);
            $s_qty     = $db->escape((int)$result['Cantidad']);
            $s_total   = $db->escape((int)$result['Total']);
            $s_precio   = $db->escape((int)$result['Precio']);

            $sql  = "INSERT INTO sales_products (";
            $sql .= "id,product_id,qty,price,price_product";
            $sql .= ") VALUES (";
            $sql .= "'{$id_sale[0]['id']}','{$p_id}','{$s_qty}','{$s_total}','{$s_precio}'";
            $sql .= ");";

            if ($db->query($sql)) {
              $json = array('error' => false, 'msg' => "Venta Agregada");
              $json_data = json_encode($json);
              update_product_qty($s_qty, $p_id);
              //redirect('add_sale.php', false);
            } else {
              $json = array('error' => true, 'msg' => "Lo siento, el registro de la venta falló");
              $json_data = json_encode($json);
              //redirect('add_sale.php', false);
            }
          }
        } else {
          $json = array('error' => true, 'msg' => "Falló en la creación del cliente");
          $json_data = json_encode($json);
          //redirect('add_sale.php', false);
        }
      }


      echo $json_data;
    } else {
      echo ($errors);
      //redirect('add_sale.php', false);
    }
  }
}


if (isset($_POST['add_sale_online'])) {
  if (isset($_SESSION['products_sale'])) {
    $req_fields = array('name_sale', 'cel_phone', 'email', 'direction', 'neighborhood', 'type_ubication', 'date');
    validate_fields($req_fields);
    if (empty($errors)) {
      $descripcion = "";
      foreach ($_SESSION['products_sale'] as $result) {
        $product = product_qty_by_id($result['product_id']);
        foreach($product as $result2){
          if ((int)$result['qty'] > 0 && (int)$result['qty'] <= (int)$result2['quantity']) {
            $disponibilidad = true;
            $descripcion = $descripcion . $result['qty'] . ' ' . $result2['name'] . ' + ';
          } else {
            $disponibilidad = false;
            $json = array('error' => true, 'msg' => "El producto " . $result2['name'] . " no se puede registrar por la cantidad de productos");
            $json_data = json_encode($json);
            break;
          }
        }
      }

      if ($disponibilidad == true) {

        if($_SESSION["tipoPago"] == "PayU"){
          $state = 3;
        }else{
          if($_SESSION["tipoPago"] == "Contra Entrega"){
            $state = 2;
          }
        }
       
        
        $name_sale      = $db->escape($_POST['name_sale']);
        $cel_phone     = $db->escape($_POST['cel_phone']);
        $email     = $db->escape($_POST['email']);
        $department     = $_SESSION["departamento"];
        $city     = $_SESSION["ciudad"];
        $direction   = $db->escape($_POST['direction']);
        $neighborhood      = $db->escape($_POST['neighborhood']);
        $type_ubication    = $db->escape($_POST['type_ubication']);
        $payment_method      = $_SESSION["tipoPago"];
        $shipping_type      = $_SESSION["tipoEnvio"];
        $date    = $db->escape($_POST['date']);


        $sql  = "INSERT INTO sales (";
        $sql .= "name,cel_phone,email,department,city,direction,neighborhood,type_ubication,payment_method,shipping_type,state,date";
        $sql .= ") VALUES (";
        $sql .= "'{$name_sale}','{$cel_phone}','{$email}','{$department}','{$city}','{$direction}','{$neighborhood}','{$type_ubication}','{$payment_method}','{$shipping_type}','{$state}','{$date}'";
        $sql .= ")";

        if ($db->query($sql)) {
          $id_sale = get_id_sale_by_name($name_sale);
          foreach ($_SESSION['products_sale'] as $result) {
            $p_id      = $result['product_id'];
            $s_qty     = $result['qty'];
            $s_total   = $result['price'];
            $s_precio  = $result['price_product'];

            $sql  = "INSERT INTO sales_products (";
            $sql .= "id,product_id,qty,price,price_product";
            $sql .= ") VALUES (";
            $sql .= "'{$id_sale[0]['id']}','{$p_id}','{$s_qty}','{$s_total}','{$s_precio}'";
            $sql .= ");";

            if ($db->query($sql)) {
              $json = array('error' => false, 'msg' => "Venta Agregada", 'descripcion' => $descripcion, 'valor' => $_SESSION["totalCompra"], 'subvalor' => $_SESSION["subTotalCompra"], 'tpPago' => $payment_method, 'idSale' => $id_sale[0]['id']);
              $json_data = json_encode($json);
              update_product_qty($s_qty, $p_id);
              //redirect('add_sale.php', false);
            } else {
              $json = array('error' => true, 'msg' => "Lo siento, el registro de la venta falló");
              $json_data = json_encode($json);
              //redirect('add_sale.php', false);
            }
          }
        } else {
          $json = array('error' => true, 'msg' => "Falló en la creación del cliente");
          $json_data = json_encode($json);
          //redirect('add_sale.php', false);
        }
      }


      echo $json_data;
    } else {
      echo ($errors);
      //redirect('add_sale.php', false);
    }
  }
}
