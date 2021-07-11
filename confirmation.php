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

    $y = strlen($reference_sale);
    $v = ($y + 2) - $y;
    $idSale = substr($reference_sale, 0, $v);

    if ($state_pol == 4) {


        $sql  = "UPDATE sales SET";
        $sql .= " state= '2'";
        $sql .= " WHERE id ={$idSale}";
        $result = $db->query($sql);

        if ($result && $db->affected_rows() === 1) {

            //Envio de correo elctronico con la compra y la cuenta
            
                sendEmail($email, 'lyNewBuy.php', 'Compra realizada - Makeup Trend', $descripcion, $value);

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
            
            //Fin del correo con la compra y la cuenta
            
        }
    } else {
        if ($state_pol == 6) {

        } else {
            if ($state_pol == 104) {
            } else {
                if ($state_pol == 7) {
                }
            }
        }
    }
}
