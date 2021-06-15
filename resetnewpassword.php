<?php
if (isset($_GET["id"]) && !empty($_GET["id"])) {

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
                                <p class="login-card-description">Ingresa la nueva contraseña que deseas tener</p>
                                <form action="resetnewpassword.php?id=<?php echo $_GET["id"]; ?>" method="POST">
                                    <div class="form-group">
                                        <label for="password" class="sr-only">Password</label>
                                        <input type="password" name="password1" id="password1" required class="form-control" placeholder="Nueva contraseña">
                                        <label for="password" class="sr-only">Password</label>
                                        <input type="password" name="password2" id="password2" required class="form-control" placeholder="Confirmar contraseña">
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

    if (isset($_POST["resetpass"])) {
        require_once('includes/load.php');
        if ($_POST['password1'] == $_POST['password2']) {
            $password = $_POST['password1'];
            if (updatePassword($_GET["id"], sha1($password))) {

                echo '
                    <script type="text/javascript">
                
                    $(document).ready(function(){
                    swal({
                        title: "Contraseña restablecida",
                        text: "Su contraseña ha sido restablecida, por favor oprima aceptar para finalizar el proceso.",
                        type: "success",
                    }).then(function() {
                        window.location.href = "login.php";
                    });
                    })
                
                    </script>
                    ';
            } else {
                echo '
                    <script type="text/javascript">

                    $(document).ready(function(){
                    swal({
                        title: "Ha ocurrido un error",
                        text: "Por favor vuelva a intentar dentro de unos segundos.",
                        type: "error",
                    });
                    })

                    </script>
                    ';
            }
        } else {
            echo '
                <script type="text/javascript">

                $(document).ready(function(){
                swal({
                    title: "Las contraseñas no coinciden",
                    text: "Por favor vuelva a ingresar la contraseña y asegurese que sea igual en ambos campos.",
                    type: "error",
                });
                })

                </script>
                ';
        }
    }
    ?>

    </html>
<?php
} else {
    header("Location: index.php");
    die();
}
?>