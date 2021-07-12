<?php
$page_title = 'Editar Venta';
require_once('includes/load.php');
// Checkin What level user has permission to view this page
page_require_level(3);
?>
<?php
$sale = find_by_id('sales', (int)$_GET['id']);
$states = find_all('state_sale');

if (!$sale) {
  $session->msg("d", "Error al encontrar el cliente.");
  redirect('sales.php');
}
?>
<?php $products = find_all_sale_products_by_id((int)$_GET['id']); ?>

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
              <input type="number" hidden name="id" value="<?php echo (int)$sale['id']; ?>">
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
                <input type="text" class="form-control" name="departamento" placeholder="Departamento" value="<?php echo $sale["department"]; ?>">
              </div>
              <div class="col-md-4">
                <input type="text" class="form-control" name="ciudad" placeholder="Ciudad" value="<?php echo $sale["city"]; ?>">
              </div>
              <div class="col-md-4">
                <select class="form-control" name="tipo_envio" id="tipo_envio">
                  <option value="<?php echo $sale["shipping_type"]; ?>" selected><?php echo $sale["shipping_type"]; ?></option>
                  <?php
                  if ($sale["shipping_type"] == "A Domicilio") { ?>
                    <option value="Inter Rapidisimo">Inter Rapidisimo</option>
                  <?php } else { ?>
                    <option value="A Domicilio">A Domicilio</option>
                  <?php } ?>
                </select>
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
                <select class="form-control" name="payment_method" id="payment_method">
                  <option value="<?php echo $sale["payment_method"]; ?>" selected><?php echo $sale["payment_method"]; ?></option>
                  <?php if ($sale["payment_method"] == "Efecty") { ?>
                    <option value="Daviplata">Daviplata</option>
                    <option value="Nequi">Nequi</option>
                    <option value="Bancolombia">Bancolombia</option>
                    <option value="PayU">PayU</option>
                    <option value="Contra Entrega">Contra Entrega</option>
                    <?php } else {
                    if ($sale["payment_method"] == "Daviplata") { ?>
                      <option value="Efecty">Efecty</option>
                      <option value="Nequi">Nequi</option>
                      <option value="Bancolombia">Bancolombia</option>
                      <option value="PayU">PayU</option>
                      <option value="Contra Entrega">Contra Entrega</option>
                      <?php } else {
                      if ($sale["payment_method"] == "Nequi") { ?>
                        <option value="Efecty">Efecty</option>
                        <option value="Daviplata">Daviplata</option>
                        <option value="Bancolombia">Bancolombia</option>
                        <option value="PayU">PayU</option>
                        <option value="Contra Entrega">Contra Entrega</option>
                        <?php } else {
                        if ($sale["payment_method"] == "Bancolombia") { ?>
                          <option value="Efecty">Efecty</option>
                          <option value="Daviplata">Daviplata</option>
                          <option value="Nequi">Nequi</option>
                          <option value="PayU">PayU</option>
                          <option value="Contra Entrega">Contra Entrega</option>
                          <?php } else {
                          if ($sale["payment_method"] == "PayU") { ?>
                            <option value="Efecty">Efecty</option>
                            <option value="Daviplata">Daviplata</option>
                            <option value="Nequi">Nequi</option>
                            <option value="Bancolombia">Bancolombia</option>
                            <option value="Contra Entrega">Contra Entrega</option>
                          <?php } else { ?>
                            <option value="Efecty">Efecty</option>
                            <option value="Daviplata">Daviplata</option>
                            <option value="Nequi">Nequi</option>
                            <option value="Bancolombia">Bancolombia</option>
                            <option value="PayU">PayU</option>
                  <?php  }
                        }
                      }
                    }
                  } ?>
                </select>
              </div>
            </div>
          </div>

          <div class="form-group">
            <div class="row">
              <div class="col-md-4">
                <input type="text" class="form-control" name="email" placeholder="Correo Electronico" value="<?php echo $sale["email"]; ?>">
              </div>
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

          <div class="form-group">
            <div class="row">
              <div class="col-md-4">
                <select class="form-control" name="shipping" id="shipping">
                  <option value="<?php echo $sale["shipping"]; ?>" selected><?php echo $sale["shipping"]; ?></option>
                  <?php
                  if ($sale["shipping"] == "Si") { ?>
                    <option value="No">No</option>
                  <?php } else { ?>
                    <option value="Si">Si</option>
                  <?php } ?>
                </select>
              </div>
            </div>
          </div>

          <table class="table table-bordered" id="tablaProductos">
            <thead>
              <th style="width: 5%;"> ID </th>
              <th style="width: 5%;"> Qty </th>
              <th style="width: 20%;"> Producto </th>
              <th> Precio </th>
              <th> Cantidad </th>
              <th> Cantidad Disponible </th>
              <th> Total </th>
            </thead>
            <tbody id="product_info">
              <?php $indice = 0; ?>
              <?php foreach ($products as $product) : ?>
                <tr>
                  <td><?php echo remove_junk($product['product_id']); ?></td>
                  <td><?php echo remove_junk($product['qty']); ?></td>
                  <td id="s_name"><?php echo remove_junk($product['name_product']); ?></td>
                  <td>
                    <input type="text" disabled class="form-control" name="price" tipo="price<?php echo $indice; ?>" value="<?php echo remove_junk($product['price_product']); ?>">
                  </td>
                  <td id="s_qty">
                    <input type="number" class="form-control" name="quantity" tipo="quantity<?php echo $indice; ?>" value="<?php echo remove_junk($product['qty']); ?>">
                  </td>
                  <td id="quantity_available"><?php echo remove_junk($product['quantity_available']); ?></td>
                  <td>
                    <input type="text" disabled class="form-control" name="total" tipo="total<?php echo $indice; ?>" value="<?php echo remove_junk($product['price']); ?>">
                  </td>
                </tr>
                <?php $indice = $indice + 1; ?>
              <?php endforeach; ?>

            </tbody>
          </table>
          <button type="submit" name="update_sale" class="btn btn-danger" onclick="actualizarVenta(); return false;">Actualizar venta</button>
        </form>
      </div>
    </div>
  </div>

</div>

<?php include_once('layouts/footer.php'); ?>