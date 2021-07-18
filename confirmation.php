<?php
require_once('includes/load.php');
require_once('sendemail.php');

if (
    isset($_POST["email_buyer"]) &&
    isset($_POST["nickname_buyer"]) &&
    isset($_POST["reference_sale"]) &&
    isset($_POST["state_pol"]) &&
    isset($_POST["value"]) &&
    isset($_POST["extra1"])
) {

    $email = $_POST["email_buyer"];
    $name_sale = $_POST["nickname_buyer"];
    $reference_sale = $_POST["reference_sale"];
    $state_pol = $_POST["state_pol"];
    $value = $_POST["value"];
    $descripcion = $_POST["extra1"];

    $cadena = $reference_sale;
    $separador = "-";
    $separada = explode($separador, $cadena);
    $idSale = $separada[0];
    
    $respuesta = find_by_id_sale($idSale);
    
    if ($state_pol == 4) {

        if ($respuesta['state'] == 2) {

            $sql  = "UPDATE sales SET";
            $sql .= " state= '3'";
            $sql .= " WHERE id ={$idSale}";
            $result = $db->query($sql);

            if ($result && $db->affected_rows() === 1) {

                //Envio de correo elctronico con la compra y la cuenta

                sendEmail($email, 'lyNewBuy.php', 'Compra realizada - Makeup Trend', $descripcion, $value);
                if($value >= 60000){
                    $user = find_by_email_user($email);
                    if (empty($user)) {
                        $name   = $name_sale;
                        $username   = $email;
                        $password   = "makeup@2021";
                        $user_level = 3;
                        $password = sha1($password);
    
                        $query = "INSERT INTO users (";
                        $query .= "name,username,password,user_level,status";
                        $query .= ") VALUES (";
                        $query .= " '{$name}', '{$username}', '{$password}', '{$user_level}','1'";
                        $query .= ")";
    
                        if ($db->query($query)) {
                            sendEmail($email, 'lyNewAccount.php', 'Cuenta de acceso para el curso - Makeup Trend');
                        }
                    }
                }
             
                //Fin del correo con la compra y la cuenta
            }
        }else{
            if ($respuesta['state'] == 4) {

                $d_sale = find_sales_by_id('sales_products', $idSale);
                foreach($d_sale as $result){
                    update_product_qty($result['qty'], $result['product_id']);
                }

                $sql  = "UPDATE sales SET";
                $sql .= " state= '3'";
                $sql .= " WHERE id ={$idSale}";
                $result = $db->query($sql);
    
                if ($result && $db->affected_rows() === 1) {
    
                    //Envio de correo elctronico con la compra y la cuenta
    
                    sendEmail($email, 'lyNewBuy.php', 'Compra realizada - Makeup Trend', $descripcion, $value);
    
                    if($value >= 60000){
                        $user = find_by_email_user($email);
                        if (empty($user)) {
                            $name   = $name_sale;
                            $username   = $email;
                            $password   = "makeup@2021";
                            $user_level = 3;
                            $password = sha1($password);
        
                            $query = "INSERT INTO users (";
                            $query .= "name,username,password,user_level,status";
                            $query .= ") VALUES (";
                            $query .= " '{$name}', '{$username}', '{$password}', '{$user_level}','1'";
                            $query .= ")";
        
                            if ($db->query($query)) {
                                sendEmail($email, 'lyNewAccount.php', 'Cuenta de acceso para el curso - Makeup Trend');
                            }
                        }
                    }
    
                    //Fin del correo con la compra y la cuenta
                }
            } 
        }
    } else {
        if ($state_pol == 6) {
            if ($respuesta['state'] == 2) {

                $d_sale = find_sales_by_id('sales_products', $idSale);
                foreach($d_sale as $result){
                    update_product_base_qty($result['qty'], $result['product_id']);
                }

                $sql  = "UPDATE sales SET";
                $sql .= " state= '4'";
                $sql .= " WHERE id ={$idSale}";
                $result = $db->query($sql);
    
            }
           
        } else {
            if ($state_pol == 5) {
                if ($respuesta['state'] == 2) {

                    $d_sale = find_sales_by_id('sales_products', $idSale);
                    foreach($d_sale as $result){
                        update_product_base_qty($result['qty'], $result['product_id']);
                    }
    
                    $sql  = "UPDATE sales SET";
                    $sql .= " state= '5'";
                    $sql .= " WHERE id ={$idSale}";
                    $result = $db->query($sql);
        
                }
            } 
        }
    }
}

