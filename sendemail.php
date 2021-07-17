<?php

use PHPMailer\PHPMailer\PHPMailer;

if (isset($_POST['sendaccount'])) {

    require_once('includes/load.php');
    if (isset($_SESSION["permit_session"]) && $_SESSION["permit_session"] == true) {
      
    } else {
        page_require_level(3);
    }

    $email = $_POST['email'];
    $asunto = $_POST['asunto'];
    $plantilla = $_POST['plantilla'];
    $nombre = $_POST['nombre'];

    $sale = find_sale($email);
    /*date_default_timezone_set('America/Bogota');
        
    $hoy = getdate();
    
    if(mb_strlen($hoy["mon"]) == 1){
        $hoy = $hoy["year"] . "-0" . $hoy["mon"] . "-" . $hoy["mday"];
    }else{
        $hoy = $hoy["year"] . "-" . $hoy["mon"] . "-" . $hoy["mday"];
    }*/
    
    foreach ($sale as $sale1) {
        if ($sale1["state"] == "Completada" || $sale1["state"] == "Pago Exitoso") {
            $flag = true;
        } else {
            $flag = false;
        }
    }
    
    if ($flag == true) {
        $user = find_by_email_user($email);
        if (empty($user)) {
            $name   = $nombre;
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
                $response = sendEmail($email, $plantilla, $asunto);
                if ($response == "1") {
                    $json = array('error' => false, 'msg' => "Envio de cuenta exitoso");
                    $json_data = json_encode($json);
                    echo $json_data;
                } else {

                    $json = array('error' => true, 'msg' => "Falló en el envio de la cuenta");
                    $json_data = json_encode($json);
                    echo $json_data;
                }
            } else {
                $json = array('error' => true, 'msg' => "Falló en el envio de la cuenta");
                $json_data = json_encode($json);
                echo $json_data;
            }
        } else {
            $json = array('error' => "5", 'msg' => "El usuario ya esta creado");
            $json_data = json_encode($json);
            echo $json_data;
        }
    }else{
        $json = array('error' => "5", 'msg' => "El usuario ya esta creado");
            $json_data = json_encode($json);
            echo $json_data;
    }
} 


if (isset($_POST['sendbuy'])) {

    require_once('includes/load.php');
    if (isset($_SESSION["permit_session"]) && $_SESSION["permit_session"] == true) {
      
    } else {
        page_require_level(3);
    }

    $email = $_POST['email'];
    $asunto = $_POST['asunto'];
    $plantilla = $_POST['plantilla'];
    $nombre = $_POST['nombre'];
    $descripcion = $_POST['descripcion'];
    $total = $_POST['total'];

    $sale = find_sale($email);
    
    
    foreach ($sale as $sale1) {
        if ($sale1["state"] == "Completada" || $sale1["state"] == "Pago Exitoso" || $sale1["state"] == "Pago Pendiente") {
            $flag = true;
        } else {
            $flag = false;
        }
    }
    
    if ($flag == true) {
        $response = sendEmail($email, $plantilla, $asunto, $descripcion, $total);
        if($response == "1"){
            $json = array('error' => false, 'msg' => "Envio de compra exitoso");
            $json_data = json_encode($json);
            echo $json_data;
        }else{
            
            $json = array('error' => true, 'msg' => "Falló en el envio de la compra");
            $json_data = json_encode($json);
            echo $json_data;
        }
    }
} 

function sendEmail($email, $plantilla, $asunto, $descripcion = "", $total = 0)
{

    require_once "libs/PHPMailer/PHPMailer.php";
    require_once "libs/PHPMailer/SMTP.php";
    require_once "libs/PHPMailer/Exception.php";


    if ($plantilla == "lyResetPassword.php") {
        $user = find_by_email_user($email);

        if (empty($user)) {
            return "0";
        } else {
            $body = file_get_contents("assets/layaoutsEmail/" . $plantilla);
            $body = str_replace("{{urlPassword}}", "http://localhost:8080/MakeupTrend/resetnewpassword.php?id=" . $user[0]['id'], $body);
        }
    }else{
        if ($plantilla == "lyNewAccount.php") {
            $body = file_get_contents("assets/layaoutsEmail/" . $plantilla);
            $body = str_replace("{{email}}", $email, $body);
            $body = str_replace("{{password}}", "makeup@2021", $body);
        }else{
            if ($plantilla == "lyNewBuy.php") {
                $body = file_get_contents("assets/layaoutsEmail/" . $plantilla);
                $body = str_replace("{{descripcion}}", $descripcion, $body);
                $body = str_replace("{{totalCompra}}", number_format($total, 0, ",", "."), $body);
            }else{
                if ($plantilla == "lyActBuy.php") {
                    $body = file_get_contents("assets/layaoutsEmail/" . $plantilla);
                    $body = str_replace("{{descripcion}}", $descripcion, $body);
                    $body = str_replace("{{totalCompra}}", number_format($total, 0, ",", "."), $body);
                }
            }
        }
    }


   

   

   

    $mail = new PHPMailer();

    try {
        $mail->SMTPDebug = 0;
        $mail->isSMTP();
        $mail->Host       = 'smtp.gmail.com;';
        $mail->SMTPAuth   = true;
        $mail->Username   = 'wwandresbeltran@gmail.com';
        $mail->Password   = '123Andres@Beltran';
        $mail->SMTPSecure = 'ssl';
        $mail->Port       = 465;

        $mail->setFrom('makeuptrendcol@gmail.com', 'Makeup Trend');
        $mail->addAddress($email);


        $mail->isHTML(true);
        $mail->Subject = $asunto;
        $mail->Body    = $body;
        $mail->AltBody = 'Información enviada por Makeup Trend';
        $mail->send();
        return "1";
    } catch (Exception $e) {
        //echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
        return "2";
    }
}
