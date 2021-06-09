
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Makeup Trend</title>
  <link href="https://fonts.googleapis.com/css?family=Karla:400,700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdn.materialdesignicons.com/4.8.95/css/materialdesignicons.min.css">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/6.11.0/sweetalert2.css" />
  <link rel="stylesheet" href="assets/css/login.css">


</head>

<body>
  <main class="d-flex align-items-center min-vh-100 py-3 py-md-0">
    <div class="container">
      <div class="card login-card">
        <div class="row no-gutters">
          <div class="col-md-5">
            <img src="https://image.freepik.com/foto-gratis/maquilladora-trabajando-tiro-medio_23-2148328757.jpg" alt="login" class="login-card-img">
          </div>
          <div class="col-md-7">
            <div class="card-body">
              <div class="brand-wrapper">
                <img src="assets/images/logo.svg" alt="logo" class="logo">
              </div>
              <p class="login-card-description">Ingresa tu correo electronico para restablecer la contraseña</p>
              <form action="login.php" method="POST">
                <input hidden type="text" value="verificarLogin">
                <div class="form-group">
                  <label for="email" class="sr-only">Email</label>
                  <input type="email" name="email" id="email" required class="form-control" placeholder="Correo Electronico">
                </div>
                <input name="resetpass" id="resetpass" class="btn btn-block login-btn mb-4" type="submit" value="Restablecer">
              </form>
              <p class="login-card-footer-text"></p>
              <nav class="login-card-footer-nav">
                <a href="index.php">Regresar a la tienda</a>
              </nav>
            </div>
          </div>
        </div>
      </div>
    </div>
    
  </main>


  <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/6.11.0/sweetalert2.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>

</body>

<?php
use PHPMailer\PHPMailer\PHPMailer;
  
require_once "libs/PHPMailer/PHPMailer.php";
require_once "libs/PHPMailer/SMTP.php";
require_once "libs/PHPMailer/Exception.php";
$body = file_get_contents('Nueva plantilla.html');
  
$mail = new PHPMailer();
  
try {
    $mail->SMTPDebug = 2;                                       
    $mail->isSMTP();                                            
    $mail->Host       = 'smtp.gmail.com;';                    
    $mail->SMTPAuth   = true;                             
    $mail->Username   = 'wwandresbeltran@gmail.com';                 
    $mail->Password   = '123Andres@Beltran';                        
    $mail->SMTPSecure = 'ssl';                              
    $mail->Port       = 465;  
  
    $mail->setFrom('makeuptrendcol@gmail.com', 'Makeup Trend');           
    $mail->addAddress('msartasarta@gmail.com');
    
       
    $mail->isHTML(true);                                  
    $mail->Subject = 'Restablecimiento de contraseña - Makeup Trend';
    $mail->Body    = $body;
    $mail->AltBody = 'Body in plain text for non-HTML mail clients';
    $mail->send();
    echo "Mail has been sent successfully!";
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}
  
?>
</html>