<?php
$page_title = 'Agregar venta';
require_once('includes/load.php');
// Checkin What level user has permission to view this page
page_require_level(3);
?>
<?php
if(isset($_SESSION["datosTabla"]) == true){
  $_SESSION["datosTabla"] = array();
}
if (isset($_POST['add_sale'])) {
  if (1 <= 100) {
    $req_fields = array('s_id', 'quantity', 'price', 'total', 'date', 'name_sale', 'cel_phone', 'direction', 'neighborhood', 'type_ubication', 'payment_method');
    validate_fields($req_fields);
    if (empty($errors)) {
      $name_sale      = $db->escape($_POST['name_sale']);
      $cel_phone     = $db->escape((int)$_POST['cel_phone']);
      $direction   = $db->escape($_POST['direction']);
      $neighborhood      = $db->escape($_POST['neighborhood']);
      $type_ubication    = $db->escape($_POST['type_ubication']);
      $payment_method      = $db->escape($_POST['payment_method']);

      $sql  = "INSERT INTO sales (";
      $sql .= " name,cel_phone,direction,neighborhood,type_ubication,payment_method";
      $sql .= ") VALUES (";
      $sql .= "'{$name_sale}',{$cel_phone},'{$direction}','{$neighborhood}','{$type_ubication}','{$payment_method}'";
      $sql .= ")";

      if ($db->query($sql)) {
        $session->msg('s', "Cliente creado.");
      } else {
        $session->msg('d', 'Falló en la creación del cliente.');
        redirect('add_sale.php', false);
      }

      $id_sale = get_id_sale_by_name($_POST['name_sale']);
      $p_id      = $db->escape((int)$_POST['s_id']);
      $s_qty     = $db->escape((int)$_POST['quantity']);
      $s_total   = $db->escape($_POST['total']);
      $date      = $db->escape($_POST['date']);
      $s_date    = make_date();


      $sql  = "INSERT INTO sales_products (";
      $sql .= " id,product_id,qty,price,date";
      $sql .= ") VALUES (";
      $sql .= "'{$id_sale[0]['id']}','{$p_id}','{$s_qty}','{$s_total}','{$s_date}'";
      $sql .= ")";

      if ($db->query($sql)) {
        update_product_qty($s_qty, $p_id);
        $session->msg('s', "Venta agregada ");
        redirect('add_sale.php', false);
      } else {
        $session->msg('d', 'Lo siento, registro falló.');
        redirect('add_sale.php', false);
      }
    } else {
      $session->msg("d", $errors);
      redirect('add_sale.php', false);
    }
  } else {
    $session->msg('d', 'Lo siento, la cantidad de productos no esta disponible.');
    
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
                <input type="text" class="form-control" name="neighborhood" placeholder="Barrio">
              </div>
              <div class="col-md-4">
                <input type="text" class="form-control" name="type_ubication" placeholder="Apto o Casa">
              </div>
              <div class="col-md-4">
                <input type="text" class="form-control" name="payment_method" placeholder="Método de pago">
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
              <th> Agregado</th>
              <th> Acciones</th>
            </thead>
            <tbody id="product_info"> </tbody>
          </table>



          <button type="submit" name="add_sale" class="btn btn-danger">Agregar producto</button>
        </form>
      </div>
    </div>
  </div>

</div>

<?php include_once('layouts/footer.php'); ?>