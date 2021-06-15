


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
require_once('includes/load.php');


if ($_SESSION["loginUser"] == true) {
  redirect("viewcourse.php", false);
} else {
  if (isset($_POST["login"])) {

    $email = $_POST["email"];
    $password = $_POST["password"];
    $user_id = authenticate($email, $password);
    if ($user_id) {

      $_SESSION["loginUser"] = true;
      redirect("viewcourse.php", false);
    } else {

      echo '
            <script type="text/javascript">

            $(document).ready(function(){
              swal({
                  title: "Inicio de sesión fallido",
                  text: "Por favor vuelve a ingresar tus datos y verifica que esten bien.",
                  type: "error",
              }).then(function() {
                window.location.href = "login.php";
              });
            })

            </script>
            ';
    }
  }
}


?>
</html>