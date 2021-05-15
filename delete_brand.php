<?php
  require_once('includes/load.php');
  // Checkin What level user has permission to view this page
  page_require_level(1);
?>
<?php
  $brand = find_by_id('brands',(int)$_GET['id']);
  if(!$brand){
    $session->msg("d","ID de la marca falta.");
    redirect('categorie.php');
  }
?>
<?php
  $delete_id = delete_by_id('brands',(int)$brand['id']);
  if($delete_id){
      $session->msg("s","Marca eliminada");
      redirect('categorie.php');
  } else {
      $session->msg("d","Eliminación falló");
      redirect('categorie.php');
  }
?>
