<?php
$page_title = 'Agregar venta';
require_once('includes/load.php');
// Checkin What level user has permission to view this page
page_require_level(3);
?>
<?php

$states = find_all('state_sale');

if (isset($_POST['add_sale']) == false) {
  if (isset($_SESSION["datosTabla"]) == true) {
    $_SESSION["datosTabla"] = array();
  }
}

?>
<?php include_once('layouts/header.php'); ?>
<div class="row">
  <div class="col-md-6">
    <?php echo display_msg($msg); ?>
    <form method="post" action="ajax.php" autocomplete="off" id="sug-form">
      <div class="form-group">
        <div class="input-group">
          <span class="input-group-btn">
            <button type="submit" class="btn btn-primary">Búsqueda</button>
          </span>
          <input type="text" id="sug_input" class="form-control" name="title" placeholder="Buscar por el nombre del producto">
        </div>
        <div id="result" class="list-group"></div>
      </div>
    </form>
  </div>
  <div class="col-md-6">
  <div class="pull-right">
          <a href="sales.php" class="btn btn-primary">Ver todas las ventas</a>
        </div>
  </div>
</div>
<div class="row">

  <div class="col-md-12">
    <div class="panel panel-default">
      <div class="panel-heading clearfix">
        <strong>
          <span class="glyphicon glyphicon-th"></span>
          <span>Crear venta</span>
        </strong>
      </div>
      <div class="panel-body">
        <form method="post" action="add_sale.php">

          <div class="panel-heading">
            <strong>
              <span class="glyphicon glyphicon-th"></span>
              <span>Información del cliente</span>
            </strong>
          </div>
          <div class="form-group">
            <div class="row">
              <div class="col-md-4">
                <input type="text" class="form-control" name="name_sale" placeholder="Nombre">
              </div>
              <div class="col-md-4">
                <input type="number" class="form-control" name="cel_phone" placeholder="Celular">
              </div>
              <div class="col-md-4">
                <input type="text" class="form-control" name="direction" placeholder="Dirección">
              </div>
            </div>
          </div>

          <div class="form-group">
            <div class="row">
              <div class="col-md-4">
                <input type="text" class="form-control" name="departamento" placeholder="Departamento">
              </div>
              <div class="col-md-4">
                <input type="text" class="form-control" name="ciudad" placeholder="Ciudad">
              </div>
              <div class="col-md-4">
                <select class="form-control" name="tipo_envio" id="tipo_envio">
                    <option value="">Selecciona el tipo de envío</option>
                    <option value="A Domicilio">A Domicilio</option>
                    <option value="Inter Rapidisimo">Inter Rapidisimo</option>
                </select>
              </div>
            </div>
          </div>

          <div class="form-group">
            <div class="row">
              <div class="col-md-4">
                <input type="text" class="form-control" name="neighborhood" placeholder="Barrio">
              </div>
              <div class="col-md-4">
                <input type="text" class="form-control" name="type_ubication" placeholder="Apto o Casa">
              </div>
              <div class="col-md-4">
                <select class="form-control" name="payment_method" id="payment_method">
                    <option value="">Selecciona el método de pago</option>
                    <option value="Efecty">Efecty</option>
                    <option value="Daviplata">Daviplata</option>
                    <option value="Nequi">Nequi</option>
                    <option value="Bancolombia">Bancolombia</option>
                    <option value="Contra Entrega">Contra Entrega</option>
                </select>
              </div>
            </div>
          </div>

          <div class="form-group">
            <div class="row">
              <div class="col-md-4">
                <input type="text" class="form-control" name="email" placeholder="Correo Electronico">
              </div>
              <div class="col-md-4">
                <select class="form-control" name="state" id="state">
                  <option value="">Selecciona el estado de la venta</option>
                  <?php foreach ($states as $state) : ?>
                    <option value="<?php echo (int)$state['id'] ?>"><?php echo $state['name'] ?></option>
                  <?php endforeach; ?>
                </select>
              </div>
              <div class="col-md-4">
                <input type="date" class="form-control" datePicker name="date" data-date data-date-format="yyyy-mm-dd">
              </div>
            </div>
          </div>
          
          <div class="form-group">
            <div class="row">
              <div class="col-md-4">
                <select class="form-control" name="shipping" id="shipping">
                    <option value="">Selecciona si ya fue enviado</option>
                    <option value="Si">Si</option>
                    <option value="No">No</option>
                </select>
              </div>
            </div>
          </div>

          <table class="table table-bordered" id="tablaProductos">
            <thead>
              <th style="width: 5%;"> ID </th>
              <th style="width: 20%;"> Producto </th>
              <th> Precio </th>
              <th> Cantidad </th>
              <th> Cantidad Disponible </th>
              <th> Total </th>
              <th> Acciones</th>
            </thead>
            <tbody id="product_info"> </tbody>
          </table>



          <button name="add_sale" class="btn btn-danger" onclick="registrarVenta(); return false;">Agregar venta</button>
        </form>
      </div>
    </div>
  </div>

</div>

<?php include_once('layouts/footer.php'); ?>