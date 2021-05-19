<?php
$page_title = 'Editar Venta';
require_once('includes/load.php');
// Checkin What level user has permission to view this page
page_require_level(3);
?>
<?php
$sale = find_by_id('sales',(int)$_GET['id']);
$states = find_all('state_sale');

if (!$sale) {
  $session->msg("d", "Error al encontrar el cliente.");
  redirect('sales.php');
}
?>
<?php $products = find_all_sale_products_by_id((int)$_GET['id']);?>
<?php

if (isset($_POST['update_sale'])) {
  $req_fields = array('sp_qty', 'total', 'name_sale', 'cel_phone', 'direction', 'neighborhood', 'type_ubication', 'payment_method', 'state', 'date');
  validate_fields($req_fields);
  if (empty($errors)) {
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
    $sql .= " WHERE id ={$sale['id']}";
    $result = $db->query($sql);

    if ($result && $db->affected_rows() === 1 || $db->affected_rows() === 0) {
      $session->msg('s', "Cliente actualizado");
    } else {
      $session->msg('d', 'Error al actualizar el cliente');
      redirect('sales.php', false);
     
    }


    $sp_id      = $db->escape((int)$_POST['sp_id']);
    $s_qty     = $db->escape((int)$_POST['sp_qty']);
    $s_total   = $db->escape((int)$_POST['total']);


    $sql  = "UPDATE sales_products SET";
    $sql .= " qty={$s_qty},price={$s_total}";
    $sql .= " WHERE id = {$sale['id']} AND product_id = {$sp_id}";

    $result = $db->query($sql);
    if ($result && $db->affected_rows() === 1 || $db->affected_rows() === 0) {
      //update_product_qty($s_qty, $p_id);
      $session->msg('s', "Venta actualizada");
      redirect('edit_sale.php?id=' . $sale['id'], false);
    } else {
      $session->msg('d', 'Falló al actualizar la venta');
      redirect('sales.php', false);
    }
  } else {
    $session->msg("d", $errors);
    redirect('edit_sale.php?id=' . (int)$sale['id'], false);
  }
}

?>
<?php include_once('layouts/header.php'); ?>
<div class="row">
  <div class="col-md-6">
    <?php echo display_msg($msg); ?>
  </div>
</div>
<div class="row">

  <div class="col-md-12">
    <div class="panel">
      <div class="panel-heading clearfix">
        <strong>
          <span class="glyphicon glyphicon-th"></span>
          <span>EDITAR VENTA</span>
        </strong>
        <div class="pull-right">
          <a href="sales.php" class="btn btn-primary">Ver todas las ventas</a>
        </div>
      </div>
      <div class="panel-body">
        <form method="post" action="edit_sale.php?id=<?php echo (int)$sale['id']; ?>">
          <div class="panel-heading">
            <strong>
              <span class="glyphicon glyphicon-th"></span>
              <span>Información del cliente</span>
            </strong>
          </div>
          <div class="form-group">
            <div class="row">
              <div class="col-md-4">
                <input type="text" class="form-control" name="name_sale" placeholder="Nombre" value="<?php echo $sale["name"]; ?>">
              </div>
              <div class="col-md-4">
                <input type="number" class="form-control" name="cel_phone" placeholder="Número celular" value="<?php echo (int)$sale["cel_phone"]; ?>">
              </div>
              <div class="col-md-4">
                <input type="text" class="form-control" name="direction" placeholder="Dirección" value="<?php echo $sale["direction"]; ?>">
              </div>
            </div>
          </div>

          <div class="form-group">
            <div class="row">
              <div class="col-md-4">
                <input type="text" class="form-control" name="neighborhood" placeholder="Barrio" value="<?php echo $sale["neighborhood"]; ?>">
              </div>
              <div class="col-md-4">
                <input type="text" class="form-control" name="type_ubication" placeholder="Apto o Casa" value="<?php echo $sale["type_ubication"]; ?>">
              </div>
              <div class="col-md-4">
                <input type="text" class="form-control" name="payment_method" placeholder="Método de pago" value="<?php echo $sale["payment_method"]; ?>">
              </div>
            </div>
          </div>

          <div class="form-group">
            <div class="row">
              <div class="col-md-4">
                <select class="form-control" name="state" id="state">
                  <option value="">Selecciona el estado de la venta</option>
                  <?php foreach ($states as $state) : ?>
                    <option value="<?php echo (int)$state['id']; ?>" <?php if ($sale['state'] === $state['id']) : echo "selected";
                                                                      endif; ?>>
                      <?php echo remove_junk($state['name']); ?></option>
                  <?php endforeach; ?>
                </select>
              </div>
              <div class="col-md-4">
                <input type="date" class="form-control" value="<?php echo $sale["date"]; ?>" name="date" data-date data-date-format="yyyy-mm-dd">
              </div>
            </div>
          </div>

          <table class="table table-bordered">
            <thead>
              <th style="width: 20%;"> Producto </th>
              <th> Precio </th>
              <th> Cantidad </th>
              <th> Cantidad Disponible </th>
              <th> Total </th>
            </thead>
            <tbody id="product_info">
              <?php foreach ($products as $product) : ?>
                <tr>
                  <td id="sp_name">
                    <?php echo remove_junk($product['name_product']); ?>
                  </td>
                  <input type="hidden" name="sp_id" value="<?php echo remove_junk($product['product_id']); ?>">
                  <td id="p_price">
                    <?php echo $product['sale_price']; ?>
                  </td>
                  <td>
                    <input type="number" class="form-control" name="sp_qty" value="<?php echo remove_junk($product['qty']); ?>">
                  </td>
                  <td id="p_qty">
                    <?php echo remove_junk($product['quantity_available']); ?>
                  </td>
                  <td>
                    <input type="number" class="form-control" name="total" value="<?php echo remove_junk($product['price']); ?>">
                  </td>
                </tr>
              <?php endforeach; ?>
            </tbody>
          </table>
          <button type="submit" name="update_sale" class="btn btn-danger">Actualizar venta</button>
        </form>
      </div>
    </div>
  </div>

</div>

<?php include_once('layouts/footer.php'); ?>