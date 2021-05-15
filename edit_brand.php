<?php
$page_title = 'Editar marca';
require_once('includes/load.php');
// Checkin What level user has permission to view this page
page_require_level(1);
?>
<?php
//Display all catgories.
$brand = find_by_id('brands', (int)$_GET['id']);
if (!$brand) {
  $session->msg("d", "Missing brand id.");
  redirect('categorie.php');
}
?>

<?php
if (isset($_POST['edit_brand'])) {
  $req_field = array('brand-name');
  validate_fields($req_field);
  $brand_name = remove_junk($db->escape($_POST['brand-name']));
  if (empty($errors)) {
    $sql = "UPDATE brands SET name='{$brand_name}'";
    $sql .= " WHERE id='{$brand['id']}'";
    $result = $db->query($sql);
    if ($result && $db->affected_rows() === 1) {
      $session->msg("s", "Marca actualizada con éxito.");
      redirect('categorie.php', false);
    } else {
      $session->msg("d", "Lo siento, actualización falló.");
      redirect('categorie.php', false);
    }
  } else {
    $session->msg("d", $errors);
    redirect('categorie.php', false);
  }
}
?>
<?php include_once('layouts/header.php'); ?>

<div class="row">
  <div class="col-md-12">
    <?php echo display_msg($msg); ?>
  </div>
  <div class="col-md-5">
    <div class="panel panel-default">
      <div class="panel-heading">
        <strong>
          <span class="glyphicon glyphicon-th"></span>
          <span>Editando <?php echo remove_junk(ucfirst($brand['name'])); ?></span>
        </strong>
      </div>
      <div class="panel-body">
        <form method="post" action="edit_brand.php?id=<?php echo (int)$brand['id']; ?>">
          <div class="form-group">
            <input type="text" class="form-control" name="brand-name" value="<?php echo remove_junk(ucfirst($brand['name'])); ?>">
          </div>
          <button type="submit" name="edit_brand" class="btn btn-primary">Actualizar categoría</button>
        </form>
      </div>
    </div>
  </div>
</div>



<?php include_once('layouts/footer.php'); ?>