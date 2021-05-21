<?php
$page_title = 'Agregar venta';
require_once('includes/load.php');
// Checkin What level user has permission to view this page
page_require_level(3);
?>

<?php

if (isset($_POST['update_sale'])) {
    if (isset($_POST['productos'])) {
        $req_fields = array('id', 'name_sale', 'cel_phone', 'direction', 'neighborhood', 'type_ubication', 'payment_method', 'state', 'date');
        validate_fields($req_fields);
        if (empty($errors)) {
            $id      = $db->escape($_POST['id']);
            $name_sale      = $db->escape($_POST['name_sale']);
            $cel_phone     = $db->escape((int)$_POST['cel_phone']);
            $direction   = $db->escape($_POST['direction']);
            $neighborhood      = $db->escape($_POST['neighborhood']);
            $type_ubication    = $db->escape($_POST['type_ubication']);
            $payment_method      = $db->escape($_POST['payment_method']);
            $state      = $db->escape($_POST['state']);
            $date      = $db->escape($_POST['date']);

            $sql  = "UPDATE sales SET";
            $sql .= " name= '{$name_sale}',cel_phone= '{$cel_phone}',direction= '{$direction}',neighborhood= '{$neighborhood}',type_ubication= '{$type_ubication}',payment_method= '{$payment_method}',state= '{$state}',date= '{$date}'";
            $sql .= " WHERE id ={$id}";
            $result = $db->query($sql);

            if ($result && $db->affected_rows() === 1 || $db->affected_rows() === 0) {
                //$session->msg('s', "Cliente actualizado");
            } else {
                //$session->msg('d', 'Error al actualizar el cliente');
                //redirect('sales.php', false);
                echo json_encode("Falló en la actualización del cliente");
            }

            foreach ($_POST["productos"] as $result) {

                $p_id      = $db->escape((int)$result['ID']);
                $s_qty_base      = $db->escape((int)$result['Qty']);
                $s_qty_available      = $db->escape((int)$result['Cantidad Disponible']);
                $s_qty     = $db->escape((int)$result['Cantidad']);
                $s_total   = $db->escape((int)$result['Total']);
                if ($s_qty > 0 && $s_qty <= $s_qty_available) {
                    $sql  = "UPDATE sales_products SET";
                    $sql .= " qty={$s_qty},price={$s_total}";
                    $sql .= " WHERE id = {$id} AND product_id = {$p_id}";

                    $result = $db->query($sql);
                    if ($result && $db->affected_rows() === 1 || $db->affected_rows() === 0) {
                        update_product_base_qty($s_qty_base, $p_id);
                        update_product_qty($s_qty, $p_id);
                        //$session->msg('s', "Venta actualizada");
                        //redirect('edit_sale.php?id=' . $sale['id'], false);
                        $response = json_encode("Venta actualizada");
                    } else {
                        //$session->msg('d', 'Falló al actualizar la venta');
                        //redirect('sales.php', false);
                        $response = json_encode("Lo siento, la actualización de la venta falló");
                    }
                }else{
                    $response = json_encode("El producto con ID "+ $p_id+" no se puedo actualizar por la cantidad de productos");
                    break;
                }
            }
            echo $response;
        } else {
            //$session->msg("d", $errors);
            //redirect('edit_sale.php?id=' . (int)$sale['id'], false);
            echo ($errors);
        }
    }
}

?>
