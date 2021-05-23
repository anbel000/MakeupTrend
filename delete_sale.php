<?php
  require_once('includes/load.php');
  // Checkin What level user has permission to view this page
  page_require_level(3);
?>
<?php
  $d_sale = find_sales_by_id('sales_products',(int)$_GET['id']);
  if(!$d_sale){
    $session->msg("d","ID no disponible.");
    redirect('sales.php');
  }
?>
<?php
  $delete_products_id = delete_sales_by_id('sales_products',(int)$_GET['id']);
  if($delete_products_id){
    $delete_sale = delete_by_id('sales',(int)$_GET['id']);
    if ($delete_sale) {
      foreach($d_sale as $result){
        update_product_base_qty($result['qty'], $result['product_id']);
      }
      $session->msg("s","Venta eliminada");
      redirect('sales.php');
    }
  } else {
      $session->msg("d","Falló la eliminación de los productos");
      redirect('sales.php');
  }


?>
