<?php
$page_title = 'Agregar venta';
require_once('includes/load.php');
// Checkin What level user has permission to view this page
page_require_level(3);
?>

<?php


if (isset($_POST['add_sale'])) {
  if (isset($_POST['productos'])) {
    $req_fields = array('name_sale', 'cel_phone', 'direction', 'neighborhood', 'type_ubication', 'payment_method', 'state', 'date');
    validate_fields($req_fields);
    if (empty($errors)) {
      $name_sale      = $db->escape($_POST['name_sale']);
      $cel_phone     = $db->escape((int)$_POST['cel_phone']);
      $direction   = $db->escape($_POST['direction']);
      $neighborhood      = $db->escape($_POST['neighborhood']);
      $type_ubication    = $db->escape($_POST['type_ubication']);
      $payment_method      = $db->escape($_POST['payment_method']);
      $state      = $db->escape($_POST['state']);
      $date    = $db->escape($_POST['date']);


      $sql  = "INSERT INTO sales (";
      $sql .= " name,cel_phone,direction,neighborhood,type_ubication,payment_method,state,date";
      $sql .= ") VALUES (";
      $sql .= "'{$name_sale}',{$cel_phone},'{$direction}','{$neighborhood}','{$type_ubication}','{$payment_method}','{$state}','{$date}'";
      $sql .= ")";

      if ($db->query($sql)) {
        //$session->msg('s', "Cliente creado.");
        //echo("Cliente creado.");
      } else {
        echo json_encode("Falló en la creación del cliente");
        //redirect('add_sale.php', false);
      }

      $flag = false;
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
          $response = json_encode("Venta Agregada");
          update_product_qty($s_qty, $p_id);
          //redirect('add_sale.php', false);
        } else {
          $response = json_encode("Lo siento, el registro de la venta falló");
          //redirect('add_sale.php', false);
        }
        
        $flag = true;
      }
      
      echo $response;

     
    } else {
      echo($errors);
      //redirect('add_sale.php', false);
    }
  }
   
 
}

