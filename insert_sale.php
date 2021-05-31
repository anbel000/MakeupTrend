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
        $p_id      = $db->escape((int)$result['ID']);
        if ((int)$result['Cantidad'] > 0 && (int)$result['Cantidad'] <= (int)$result['Cantidad Disponible']) {
          $disponibilidad = true;
        } else {
          $disponibilidad = false;
          $json = array('error' => true, 'msg' => "El producto con ID " . $p_id . " no se puede registrar por la cantidad de productos");
          $json_data = json_encode($json);
          break;
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

            $sql  = "INSERT INTO sales_products (";
            $sql .= "id,product_id,qty,price";
            $sql .= ") VALUES (";
            $sql .= "'{$id_sale[0]['id']}','{$p_id}','{$s_qty}','{$s_total}'";
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
