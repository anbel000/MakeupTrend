<?php


session_start();

foreach($_SESSION["carrito"] as $indice =>$result){
    var_dump($indice);
    var_dump($result);
}
echo "<br>";
var_dump($_SESSION);


?>