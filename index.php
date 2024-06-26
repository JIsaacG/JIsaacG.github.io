<?php

//Se llama la conexion de la base de datos
require_once("config/conexion.php");               //condicion que se especifica mas abajo
if (isset($_POST["enviar"]) and $_POST["enviar"] == "si") {
    //Llama el archivo del usuario donde se encuentran todas las funciones del usuario
    require_once("models/Usuario.php");
    $usuario = new Usuario();
    //Llama la funcion login
    $usuario->login();
}
?>
<?php

?>


<!doctype html>
<html lang="en" class="no-focus">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
    <title>Codebase - Bootstrap 4 Admin Template & UI Framework</title>
    <meta name="description" content="Codebase - Bootstrap 4 Admin Template & UI Framework created by pixelcave and published on Themeforest">
    <meta name="author" content="pixelcave">
    <meta name="robots" content="noindex, nofollow">
    <!-- Open Graph Meta -->
    <meta property="og:title" content="Codebase - Bootstrap 4 Admin Template & UI Framework">
    <meta property="og:site_name" content="Codebase">
    <meta property="og:description" content="Codebase - Bootstrap 4 Admin Template & UI Framework created by pixelcave and published on Themeforest">
    <meta property="og:type" content="website">
    <meta property="og:url" content="">
    <meta property="og:image" content="">
    <link rel="shortcut icon" href="public/assets/img/favicons/favicon.png">
    <link rel="icon" type="image/png" sizes="192x192" href="public/assets/img/favicons/favicon-192x192.png">
    <link rel="apple-touch-icon" sizes="180x180" href="public/assets/img/favicons/apple-touch-icon-180x180.png">
    <link rel="stylesheet" id="css-main" href="public/assets/css/codebase.min.css">
    <style>
        .subtitle-container {
            text-align: center;
            margin-bottom: 20px;
            /* Espacio entre el subtítulo y el formulario */
        }

        .subtitle-container .h3 {
            margin-top: 10px;
            /* Ajuste el margen superior según sea necesario */
            margin-bottom: 5px;
            /* Espacio entre el subtítulo y el formulario */
        }

        .subtitle-container .h5 {
            margin-bottom: 0;
            /* Eliminar margen inferior del subtítulo */
        }
    </style>
</head>

<body>
    <div id="page-container" class="main-content-boxed">
        <main id="main-container">
            <div class="bg-image" style="background-image: url('public/assets/img/photos/photo34@2x.jpg');">
                <div class="row mx-0 bg-black-op">
                    <div class="hero-static col-md-6 col-xl-8 d-none d-md-flex align-items-md-end"></div>
                    <div class="hero-static col-md-6 col-xl-4 d-flex align-items-center bg-white invisible" data-toggle="appear" data-class="animated fadeInRight">
                        <div class="content content-full">
                            <div class="text-center mb-5">
                                <img src="public/assets/img/Logo/LOGO.png" alt="Logo" style="max-width: 100px;">
                            </div>
                            <div class="text-center mb-20">
                                <a class="link-effect font-w700">
                                    <span class="font-size-xl text-primary-dark">Dirección de Educación Superior</span>
                                </a>
                            </div>
                            <div class="subtitle-container">
                                <h1 class="h3 font-w700">Bienvenido a su panel de control</h1>
                                <h2 class="h5 font-w400 text-muted mb-0">Por favor, inicie sesión</h2>
                            </div>
                            <div class="js-validation-signin px-30" action="be_pages_auth_all.html" method="post">
                                <!-- todo tiene que estar dentro del form ya que de ahi se hace el llamado post-->



                                


                                <!--mensaje que mandar si el usuario esta incorrecto-->
                                <?php
                                if (isset($_GET["m"])) {
                                    switch ($_GET["m"]) {
                                        case "1";
                                ?>
                                            <div class="alert alert-danger" role="alert">
                                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                                <div class="d-flex align-items-center justify-content-start">
                                                    <i class="icon ion-ios-checkmark alert-icon tx-32 mg-t-5 mg-xs-t-0"></i>
                                                    <span> El Usuario y/o Contraseña son incorrectos. </span>
                                                </div>
                                            </div>
                                        <?php
                                            break;

                                        case "2";
                                        ?>
                                            <div class="alert alert-danger" role="alert">
                                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                                <div class="d-flex align-items-center justify-content-start">
                                                    <i class="icon ion-ios-checkmark alert-icon tx-32 mg-t-5 mg-xs-t-0"></i>
                                                    <span> Los campos estan vacios.</span>
                                                </div>
                                            </div>
                                <?php
                                            break;
                                    }
                                }
                                ?>
                                
                                <form action="" method="post" id="loginnum1">
                                    <div class="form-group row">
                                        <div class="col-12">
                                            <div class="form-material floating">
                                                <input type="email" class="form-control" id="correo" name="correo">
                                                <label for="login-username">Correo Electrónico</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-12">
                                            <div class="form-material floating">
                                                <input type="password" class="form-control" id="password" name="password">
                                                <label for="login-password">Contraseña</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-12">
                                            <label class="custom-control custom-checkbox">
                                                <input type="checkbox" class="custom-control-input" id="login-remember-me" name="login-remember-me">
                                                <span class="custom-control-indicator"></span>
                                                <span class="custom-control-description">Recuérdame</span>
                                            </label>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <!-- comando que tiene de nombre enviar y contiene el valor de "si" condicion que pusimos arriba -->
                                        <input type="hidden" name="enviar" class="form-control" value="si">


                                        <button type="submit" class="btn btn-sm btn-hero btn-alt-primary">
                                            <i class="si si-login mr-10"></i> Iniciar sesión
                                        </button>
                                        <div class="mt-30">
                                            <a class="link-effect text-muted mr-10 mb-5 d-inline-block" href="recuperarcontraseña/recuperar.php">
                                                <i class="fa fa-warning mr-5"></i> ¿Olvidaste tu contraseña?
                                            </a>
                                            <?php
                                            /*if (isset($error_msg)) : ?>
                                                <div class="alert alert-danger mt-3" role="alert">
                                                    <?php echo $error_msg; ?>
                                                </div>
                                            <?php endif; */
                                            ?>
                                        </div>
                                    </div>


                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </div>
    <script src="public/assets/js/core/jquery.min.js"></script>
    <script src="public/assets/js/core/popper.min.js"></script>
    <script src="public/assets/js/core/bootstrap.min.js"></script>
    <script src="public/assets/js/core/jquery.slimscroll.min.js"></script>
    <script src="public/assets/js/core/jquery.scrollLock.min.js"></script>
    <script src="public/assets/js/core/jquery.appear.min.js"></script>
    <script src="public/assets/js/core/jquery.countTo.min.js"></script>
    <script src="public/assets/js/core/js.cookie.min.js"></script>
    <script src="public/assets/js/codebase.js"></script>
    <script src="public/assets/js/plugins/jquery-validation/jquery.validate.min.js"></script>
    <script src="validarLogin.js"></script>
</body>

</html>