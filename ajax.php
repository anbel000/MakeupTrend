<?php
require_once('includes/load.php');
if (!$session->isUserLoggedIn(true)) {
  redirect('index.php', false);
}
?>

<?php
// Auto suggetion
$html = '';
if (isset($_POST['product_name']) && strlen($_POST['product_name'])) {
  $products = find_product_by_title($_POST['product_name']);
  if ($products) {
    foreach ($products as $product) :
      $html .= "<li class=\"list-group-item\">";
      $html .= $product['name'];
      $html .= "</li>";
    endforeach;
  } else {

    $html .= '<li onClick=\"fill(\'' . addslashes() . '\')\" class=\"list-group-item\">';
    $html .= 'No encontrado';
    $html .= "</li>";
  }

  echo json_encode($html);
}
?>
 <?php

  // find all product
  if (isset($_POST['p_name']) && strlen($_POST['p_name'])) {
    $product_title = remove_junk($db->escape($_POST['p_name']));


    if ($results = find_all_product_info_by_title($product_title)) {



      if (isset($_SESSION["datosTabla"]) == false) {
        $temporal = array();
        array_push($temporal, $results[0]);
        $_SESSION["datosTabla"] = $temporal;
      } else {

        $flag = false;
        if (isset($_SESSION["datosTabla"]) == false) {
          $temporal = array();
          $_SESSION["datosTabla"] = $temporal;
        }

        foreach ($_SESSION["datosTabla"] as $datos) {
          $info = $results[0];
          if ($datos['name'] == $info['name']) {
            $flag = true;
          }
        }
        if ($flag == false) {

          $temporal = $_SESSION["datosTabla"];
          array_push($temporal, $results[0]);
          $_SESSION["datosTabla"] = $temporal;
        }
      }
      $indice = 0;
      foreach ($_SESSION["datosTabla"] as $result) {
        $html .= "<tr>";
        $html .= "<td>" . $result['id'] . "</td>";
        $html .= "<td id=\"s_name\">" . $result['name'] . "</td>";
        $html  .= "<td>";
        $html  .= "<input type=\"text\" class=\"form-control\" name=\"price\" tipo=\"price".$indice."\" value=\"{$result['sale_price']}\">";
        $html  .= "</td>";
        $html .= "<td id=\"s_qty\">";
        $html .= "<input type=\"text\" class=\"form-control\" name=\"quantity\" tipo=\"quantity".$indice."\" value=\"1\">";
        $html  .= "</td>";
        $html .= "<td id=\"quantity_available\">" . $result['quantity'] . "</td>";
        $html  .= "<td>";
        $html  .= "<input type=\"text\" class=\"form-control\" name=\"total\" tipo=\"total".$indice."\" value=\"{$result['sale_price']}\">";
        $html  .= "</td>";
        $html  .= "<td>";
        $html  .= "<button  name=\"remove_product\" class=\"btn btn-primary\" onClick=\"quitar(" . $result['id'] . "); return false;\">Quitar</button>";
        $html  .= "</td>";
        $html  .= "</tr>";
        $indice = $indice + 1;
      }
    } else {
      $html = '<tr><td>El producto no se encuentra registrado en la base de datos</td></tr>';
    }

    echo json_encode($html);
  }
  ?>

<?php

// find all product
if (isset($_POST['p_id'])) {
  $arryTemp = array();
  foreach ($_SESSION["datosTabla"] as $result) {
    if ($result['id'] != $_POST['p_id']) {
      array_push($arryTemp, $result);
    }
  }
  $_SESSION["datosTabla"] = $arryTemp;

  $indice = 0;
  foreach ($_SESSION["datosTabla"] as $result) {
    $html .= "<tr>";
    $html .= "<td>" . $result['id'] . "</td>";
    $html .= "<td id=\"s_name\">" . $result['name'] . "</td>";
    $html  .= "<td>";
    $html  .= "<input type=\"text\" class=\"form-control\" name=\"price\" tipo=\"price".$indice."\" value=\"{$result['sale_price']}\">";
    $html  .= "</td>";
    $html .= "<td id=\"s_qty\">";
    $html .= "<input type=\"text\" class=\"form-control\" name=\"quantity\" tipo=\"quantity".$indice."\" value=\"1\">";
    $html  .= "</td>";
    $html .= "<td id=\"quantity_available\">" . $result['quantity'] . "</td>";
    $html  .= "<td>";
    $html  .= "<input type=\"text\" class=\"form-control\" name=\"total\" tipo=\"total".$indice."\" value=\"{$result['sale_price']}\">";
    $html  .= "</td>";
    $html  .= "<td>";
    $html  .= "<button  name=\"remove_product\" class=\"btn btn-primary\" onClick=\"quitar(" . $result['id'] . "); return false;\">Quitar</button>";
    $html  .= "</td>";
    $html  .= "</tr>";
    $indice = $indice + 1;
  }

  echo json_encode($html);
}
?>