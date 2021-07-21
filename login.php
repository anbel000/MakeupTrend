
<?php
require_once('includes/load.php');

$errorSesion = false;
if (isset($_SESSION["loginUser"]) && $_SESSION["loginUser"] == true) {
  $errorSesion = false;
  redirect("viewcourse.php", false);
} else {
  if (isset($_POST["login"])) {

    $email = $_POST["email"];
    $password = $_POST["password"];
    $user_id = authenticateCourse($email, $password);
    if ($user_id) {
      $errorSesion = false;
      $_SESSION["loginUser"] = true;
      redirect("viewcourse.php", false);
    } else {
      $errorSesion = true;
    }
  }
}


?>

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

<link rel="apple-touch-icon" sizes="57x57" href="9324c10bb96c639ec6140724f5bb097a/apple-icon-57x57.png">
<link rel="apple-touch-icon" sizes="60x60" href="9324c10bb96c639ec6140724f5bb097a/apple-icon-60x60.png">
<link rel="apple-touch-icon" sizes="72x72" href="9324c10bb96c639ec6140724f5bb097a/apple-icon-72x72.png">
<link rel="apple-touch-icon" sizes="76x76" href="9324c10bb96c639ec6140724f5bb097a/apple-icon-76x76.png">
<link rel="apple-touch-icon" sizes="114x114" href="9324c10bb96c639ec6140724f5bb097a/apple-icon-114x114.png">
<link rel="apple-touch-icon" sizes="120x120" href="9324c10bb96c639ec6140724f5bb097a/apple-icon-120x120.png">
<link rel="apple-touch-icon" sizes="144x144" href="9324c10bb96c639ec6140724f5bb097a/apple-icon-144x144.png">
<link rel="apple-touch-icon" sizes="152x152" href="9324c10bb96c639ec6140724f5bb097a/apple-icon-152x152.png">
<link rel="apple-touch-icon" sizes="180x180" href="9324c10bb96c639ec6140724f5bb097a/apple-icon-180x180.png">
<link rel="icon" type="image/png" sizes="192x192"  href="9324c10bb96c639ec6140724f5bb097a/android-icon-192x192.png">
<link rel="icon" type="image/png" sizes="32x32" href="9324c10bb96c639ec6140724f5bb097a/favicon-32x32.png">
<link rel="icon" type="image/png" sizes="96x96" href="9324c10bb96c639ec6140724f5bb097a/favicon-96x96.png">
<link rel="icon" type="image/png" sizes="16x16" href="9324c10bb96c639ec6140724f5bb097a/favicon-16x16.png">
<link rel="manifest" href="9324c10bb96c639ec6140724f5bb097a/manifest.json">
<meta name="msapplication-TileColor" content="#ffffff">
<meta name="msapplication-TileImage" content="9324c10bb96c639ec6140724f5bb097a/ms-icon-144x144.png">
<meta name="theme-color" content="#ffffff">

<body>
  <main class="d-flex align-items-center min-vh-100 py-3 py-md-0">
    <div class="container">
      <div class="card login-card">
        <div class="row no-gutters">
          <div class="col-md-5">
            <img src="assets/images/login.jpg" alt="login" class="login-card-img">
          </div>
          <div class="col-md-7">
            <div class="card-body">
              <div class="brand-wrapper">
                <img src="assets/images/logo/logo.svg" alt="logo" class="logo">
              </div>
              <p class="login-card-description">Ingresa para visualizar el contenido</p>
              <form action="login.php" method="POST">
                <div class="form-group">
                  <label for="email" class="sr-only">Email</label>
                  <input type="email" name="email" id="email" required class="form-control" placeholder="Correo Electronico">
                </div>
                <div class="form-group mb-4">
                  <label for="password" class="sr-only">Password</label>
                  <input type="password" name="password" id="password" required class="form-control" placeholder="***********">
                </div>
                <input name="login" id="login" class="btn btn-block login-btn mb-4" type="submit" value="Iniciar Sesión">
              </form>
              <a href="resetpassword.php" class="forgot-password-link">Olvidó su contraseña?</a>
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
if($errorSesion == true){
  echo '
  <script type="text/javascript">

  $(document).ready(function(){
    swal({
        title: "Inicio de sesión fallido",
        text: "Por favor vuelve a ingresar tus datos y verifica que esten bien.",
        type: "error",
    }).then(function() {
      
    });
  })

  </script>
  ';
}


?>
</html>