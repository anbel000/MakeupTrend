<?php
use PHPMailer\PHPMailer\PHPMailer;

if(isset($_POST['sendaccount'])){
    
 $response = sendEmail($_POST['email'],$_POST['plantilla'], $_POST['asunto']);
 if($response == "1"){
    $json = array('error' => false, 'msg' => "Envio de cuenta exitoso");
    $json_data = json_encode($json);
    echo $json_data;
 }else{
    $json = array('error' => true, 'msg' => "Falló en el envio de la cuenta");
    $json_data = json_encode($json);
    echo $json_data;
 }
}
function sendEmail($email, $plantilla, $asunto){

    
    require_once "libs/PHPMailer/PHPMailer.php";
    require_once "libs/PHPMailer/SMTP.php";
    require_once "libs/PHPMailer/Exception.php";
    
    
    if($plantilla == "lyResetPassword.php"){
        $user = find_by_email_user($email);

        if(empty($user)){
            return "0";
        }else{
            $body = file_get_contents("assets/layaoutsEmail/".$plantilla);
            $body = str_replace("{{urlPassword}}","http://localhost:8080/MakeupTrend/resetnewpassword.php?id=".$user[0]['id'],$body);
        }
    }

    if($plantilla == "lyNewAccount.php"){
        $body = "Que haces?";
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
