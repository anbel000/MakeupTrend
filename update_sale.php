<?php
$page_title = 'Agregar venta';
require_once('includes/load.php');
// Checkin What level user has permission to view this page
page_require_level(3);
?>

<?php

if (isset($_POST['update_sale'])) {
    if (isset($_POST['productos'])) {
        $req_fields = array('id', 'name_sale', 'cel_phone', 'email', 'department', 'city', 'direction', 'neighborhood', 'type_ubication', 'payment_method', 'shipping_type', 'state', 'shipping', 'date');
        validate_fields($req_fields);
        if (empty($errors)) {

            foreach ($_POST["productos"] as $result) {
                $product = product_qty_by_id($result['ID']);

                foreach ($product as $result2) {

                    $s_qty     = $db->escape((int)$result['Cantidad']);
                    $qty_Condition = (int)$result2['quantity'] + (int)$result['Qty'];
                    if ($s_qty > 0 && $s_qty <= $qty_Condition) {
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

                $id      = $db->escape($_POST['id']);
                $name_sale      = $db->escape($_POST['name_sale']);
                $cel_phone     = $db->escape((int)$_POST['cel_phone']);
                $email     = $db->escape($_POST['email']);
                $department     = $db->escape($_POST['department']);
                $city     = $db->escape($_POST['city']);
                $direction   = $db->escape($_POST['direction']);
                $neighborhood      = $db->escape($_POST['neighborhood']);
                $type_ubication    = $db->escape($_POST['type_ubication']);
                $payment_method      = $db->escape($_POST['payment_method']);
                $shipping_type      = $db->escape($_POST['shipping_type']);
                $state      = $db->escape($_POST['state']);
                $shipping      = $db->escape($_POST['shipping']);
                $date      = $db->escape($_POST['date']);

                $sql  = "UPDATE sales SET";
                $sql .= " name= '{$name_sale}',cel_phone= '{$cel_phone}',email= '{$email}',department= '{$department}',city= '{$city}',direction= '{$direction}',neighborhood= '{$neighborhood}',type_ubication= '{$type_ubication}',payment_method= '{$payment_method}',shipping_type= '{$shipping_type}',state= '{$state}',shipping= '{$shipping}',date= '{$date}'";
                $sql .= " WHERE id ={$id}";
                $result = $db->query($sql);

                if ($result && $db->affected_rows() === 1 || $db->affected_rows() === 0) {
                    //$session->msg('s', "Cliente actualizado");

                    foreach ($_POST["productos"] as $result) {

                        $p_id      = $db->escape((int)$result['ID']);
                        $s_qty_base      = $db->escape((int)$result['Qty']);
                        $s_qty_available      = $db->escape((int)$result['Cantidad Disponible']);
                        $s_qty     = $db->escape((int)$result['Cantidad']);
                        $s_total   = $db->escape((int)$result['Total']);

                        $sql  = "UPDATE sales_products SET";
                        $sql .= " qty={$s_qty},price={$s_total}";
                        $sql .= " WHERE id = {$id} AND product_id = {$p_id}";

                        $result = $db->query($sql);
                        if ($result && $db->affected_rows() === 1 || $db->affected_rows() === 0) {
                            update_product_base_qty($s_qty_base, $p_id);
                            update_product_qty($s_qty, $p_id);
                            //$session->msg('s', "Venta actualizada");
                            //redirect('edit_sale.php?id=' . $sale['id'], false);
                            $json = array('error' => false, 'msg' => "Venta actualizada");
                            $json_data = json_encode($json);
                        } else {
                            //$session->msg('d', 'Falló al actualizar la venta');
                            //redirect('sales.php', false);
                            $json = array('error' => true, 'msg' => "Lo siento, la actualización de la venta falló");
                            $json_data = json_encode($json);
                            break;
                        }
                    }
                } else {
                    //$session->msg('d', 'Error al actualizar el cliente');
                    //redirect('sales.php', false);
                    $json = array('error' => true, 'msg' => "Falló en la actualización del cliente");
                    $json_data = json_encode($json);
                }
            }

            echo $json_data;
        } else {
            //$session->msg("d", $errors);
            //redirect('edit_sale.php?id=' . (int)$sale['id'], false);
            echo ($errors);
        }
    }
}

?>
