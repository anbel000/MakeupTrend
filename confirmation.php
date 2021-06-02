<?php
require_once('includes/load.php');


/*if (isset($_POST["email_buyer"]) && isset($_POST["nickname_buyer"])) {
    $email = $_POST["email_buyer"];
    $name_sale = $_POST["nickname_buyer"];

    $sql  = "INSERT INTO sales (";
    $sql .= "name,cel_phone,email,department,city,direction,neighborhood,type_ubication,payment_method,shipping_type,state,date";
    $sql .= ") VALUES (";
    $sql .= "'{$name_sale}','Prueba','{$email}','Prueba','Prueba','Prueba','Prueba','Prueba','Prueba','Prueba','2','Prueba'";
    $sql .= ")";

    $response = $db->query($sql);
    
}else{
    $sql  = "INSERT INTO sales (";
    $sql .= "name,cel_phone,email,department,city,direction,neighborhood,type_ubication,payment_method,shipping_type,state,date";
    $sql .= ") VALUES (";
    $sql .= "'Prueba','Prueba','Prueba','Prueba','Prueba','Prueba','Prueba','Prueba','Prueba','Prueba','2','Prueba'";
    $sql .= ")";

    $response = $db->query($sql);
    
}*/

$sql  = "INSERT INTO sales (";
    $sql .= "name,cel_phone,email,department,city,direction,neighborhood,type_ubication,payment_method,shipping_type,state,date";
    $sql .= ") VALUES (";
    $sql .= "'Prueba','Prueba','Prueba','Prueba','Prueba','Prueba','Prueba','Prueba','Prueba','Prueba','2','Prueba'";
    $sql .= ")";

    $response = $db->query($sql);