<?php
require_once("../../config/conexion.php");
if (isset($_SESSION["ID_USUARIO"])) {

?>
<!doctype html>
<html lang="en" class="no-focus">

<head>
    <?php require_once("../MainHead/MainHead.php"); ?>


    <title>Nuevo ingreso de Solicitud </title>

</head>

<body>

    <div id="page-container" class="sidebar-o side-scroll page-header-modern main-content-boxed">

        <aside id="side-overlay">

            <div id="side-overlay-scroll">

                <div class="content-header content-header-fullrow">
                    <div class="content-header-section align-parent">
                        <button type="button" class="btn btn-circle btn-dual-secondary align-v-r" data-toggle="layout" data-action="side_overlay_close">
                            <i class="fa fa-times text-danger"></i>
                        </button>

                        <div class="content-header-item">
                            <a class="img-link mr-5" href="be_pages_generic_profile.html">
                                <img class="img-avatar img-avatar32" src="../../public/assets/img/avatars/avatar15.jpg" alt="">
                            </a>
                            <a class="align-middle link-effect text-primary-dark font-w600" href="be_pages_generic_profile.html"><?php echo $_SESSION["NOMBRE_USUARIO"] ?></a>
                        </div>

                    </div>
                </div>
                
            </div>

        </aside>


        <nav id="sidebar" class="text-warning">

            <div id="sidebar-scroll">

                <div class="sidebar-content">


                    <?php require_once("../MainSidebar/MainSidebar.php"); ?>


                    <?php require_once("../MainMenu/MainMenu.php"); ?>

                </div>

            </div>

        </nav>

        <nav class="text-warning">

            <?php require_once("../MainHeader/MainHeader.php"); ?>

        </nav>


        <main id="main-container">


            <div class="content">

                <div class="block">
                    <div class="block-header block-header-default">
                        <h3 class="block-title">Nuevo Ingreso de Solicitud <small>Direccion de Educacion Superior</small></h3>
                    </div>
                    <div class="block-content block-content-full">


                        <!-- Datos de Remitente    background-color="#0965ae"  -->
                        <div class="block">
                            <div class="block-header block-header-default">
                                <h3 class="block-title">Datos del Remitente</h3>
                                <div class="block-options">
                                    <button type="button" class="btn-block-option">
                                        <i class="si si-user"></i>
                                    </button>
                                </div>
                            </div>
                            <div class="block-content">
                                <form action="be_forms_elements_bootstrap.html" method="post" enctype="multipart/form-data" onsubmit="return false;">

                                    <div class="row">
                                        <div class="form-group row col-xl-4">
                                            <label class="col-12" for="example-text-input">Nombre Completo</label>
                                            <div class="col-md-9">
                                                <input type="text" class="form-control" id="example-text-input" name="example-text-input" placeholder="Coord. Curricular de la Carrera" required>
                                            </div>
                                        </div>

                                        <div class="form-group row col-xl-4">
                                            <label class="col-12" for="example-text-input">Telefono</label>
                                            <div class="col-md-9">
                                                <input type="text" class="form-control" id="example-text-input" name="example-text-input" placeholder="9595-3334" required>
                                            </div>
                                        </div>

                                        <div class="form-group row col-xl-4">
                                            <label class="col-12" for="example-email-input">Correo Electronico</label>
                                            <div class="col-md-9">
                                                <input type="email" class="form-control" id="example-email-input" name="example-email-input" placeholder="correoinstitucional@unitec.com" required>
                                            </div>
                                        </div>

                                        <div class="col-md-9">
                                            <div class="form-control-plaintext">Nota: Al correo previamente escrito se le estará enviando las notificaciones de cambio de estados con respecto a la solicitud presentada.</div>
                                        </div>
                                    </div>
                            </div>
                        </div>
                    </div>




                    <!-- Datos del Documento -->
                    <div class="block">
                        <div class="block-content block-content-full">
                            <!-- Datos del Documento -->
                            <div class="block">
                                <div class="block-header block-header-default">
                                    <h3 class="block-title">Datos del Documento</h3>
                                    <div class="block-options">
                                        <button type="button" class="btn-block-option">
                                            <i class="si si-doc"></i>
                                        </button>
                                    </div>
                                </div>
                                <div class="block-content">
                                    <form action="be_forms_elements_bootstrap.html" method="post" enctype="multipart/form-data" onsubmit="return false;">

                                        <div class="row">
                                            <div class="form-group row col-xl-4">
                                                <label class="col-12" for="example-select">Tipo de Solicitud</label>
                                                <div class="col-md-9">
                                                    <select class="form-control" id="example-select" name="example-select" required>
                                                        <option value="0">Seleccione Una</option>
                                                        <option value="1">Academica 1</option>
                                                        <option value="2">Academica 2</option>
                                                        <option value="3">Academica 3</option>
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="form-group row col-xl-4">
                                                <label class="col-12" for="example-select">Categoria de Solicitud</label>
                                                <div class="col-md-9">
                                                    <select class="form-control" id="example-select" name="example-select" required>
                                                        <option value="0">Seleccione Una</option>
                                                        <option value="1">Reforma 1</option>
                                                        <option value="2">Reforma 2</option>
                                                        <option value="3">Reforma 3</option>
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="form-group row col-xl-4">
                                                <label class="col-12" for="example-text-input">Codigo de Pago</label>
                                                <div class="col-md-9">
                                                    <input type="text" class="form-control" id="example-text-input" name="example-text-input" placeholder="830" required>
                                                </div>
                                            </div>

                                            <div class="form-group row col-xl-4">
                                                <label class="col-12" for="example-text-input">Codigo de Referencia</label>
                                                <div class="col-md-9">
                                                    <input type="text" class="form-control" id="example-text-input" name="example-text-input" placeholder="73352" required>
                                                </div>
                                            </div>

                                            <div class="form-group row col-xl-4">
                                                <label class="col-12" for="example-select">Categoria de Especiales</label>
                                                <div class="col-md-9">
                                                    <select class="form-control" id="example-select" name="example-select" required>
                                                        <option value="0">Seleccione Una</option>
                                                        <option value="1">Categoria Especial 1</option>
                                                        <option value="2">Categoria Especial 2</option>
                                                        <option value="3">Categoria Especial 3</option>
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="form-group row col-xl-4">
                                                <label class="col-12" for="example-text-input">Nombre de la Carrera</label>
                                                <div class="col-md-9">
                                                    <input type="text" class="form-control" id="example-text-input" name="example-text-input" placeholder="Ingeniero en Mecatronica" required>
                                                </div>
                                            </div>

                                            <div class="form-group row col-xl-4">
                                                <label class="col-12" for="example-text-input">Grado Academico</label>
                                                <div class="col-md-9">
                                                    <input type="text" class="form-control" id="example-text-input" name="example-text-input" placeholder="Licenciatura" required>
                                                </div>
                                            </div>

                                            <div class="form-group row col-xl-4">
                                                <label class="col-12" for="example-select">Modalidad</label>
                                                <div class="col-md-9">
                                                    <select class="form-control" id="example-select" name="example-select" required>
                                                        <option value="0">Seleccione Una</option>
                                                        <option value="1">Presencial</option>
                                                        <option value="2">Linea</option>
                                                        <option value="3">N/A</option>
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="form-group row col-xl-4">
                                                <label class="col-12" for="example-select">Universidad/Centro/Institución</label>
                                                <div class="col-md-9">
                                                    <select class="form-control" id="example-select" name="example-select" required>
                                                        <option value="0">Seleccione Una</option>
                                                        <option value="1">UNITEC</option>
                                                        <option value="2">UTH</option>
                                                        <option value="3">UNAH</option>
                                                    </select>
                                                </div>
                                            </div>


                                            <div class="form-group row col-xl-4">
                                                <label class="col-12" for="example-select">Departamento 1</label>
                                                <div class="col-md-9">
                                                    <select class="form-control" id="example-select" name="example-select" required>
                                                        <option value="0">Seleccione Una</option>
                                                        <option value="1">Francisco Morazan</option>
                                                        <option value="2">Cortes</option>
                                                        <option value="3">Atlantidad</option>
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="form-group row col-xl-4">
                                                <label class="col-12" for="example-select">Municipio 1</label>
                                                <div class="col-md-9">
                                                    <select class="form-control" id="example-select" name="example-select" required>
                                                        <option value="0">Seleccione Una</option>
                                                        <option value="1">Comayagua</option>
                                                        <option value="2">La Ceiba</option>
                                                        <option value="3">Omoa</option>
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="form-group row col-xl-4">
                                                <label class="col-12" for="example-select">Departamento 2</label>
                                                <div class="col-md-9">
                                                    <select class="form-control" id="example-select" name="example-select" required>
                                                        <option value="0">Seleccione Una</option>
                                                        <option value="1">Francisco Morazan</option>
                                                        <option value="2">Cortes</option>
                                                        <option value="3">Atlantidad</option>
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="form-group row col-xl-4">
                                                <label class="col-12" for="example-select">Municipio 2</label>
                                                <div class="col-md-9">
                                                    <select class="form-control" id="example-select" name="example-select" required>
                                                        <option value="0">Seleccione Una</option>
                                                        <option value="1">Comayagua</option>
                                                        <option value="2">La Ceiba</option>
                                                        <option value="3">Omoa</option>
                                                    </select>
                                                </div>
                                            </div>

                                        </div>

                                        <div class="form-group row ">
                                            <label class="col-12" for="example-textarea-input">Descripcion de la Solicitud</label>
                                            <div class="col-12">
                                                <textarea class="form-control" id="example-textarea-input" name="example-textarea-input" rows="6" placeholder="PRESENTACIÓN DE SOLICITUD DE REFORMA AL PLAN DE ESTUDIOS DE LA CARRERA DE INGENIERIA EN MECATRONICA, EN EL GRADO DE LICENCIATURA DE LA UNIVERSIDAD TECNOLOGICA CENTROAMERICANA, UNITEC." required></textarea>
                                            </div>
                                        </div>


                                    </form>

                                </div>
                            </div>
                            <!-- END Default Elements -->

                            <div class="block">

                                <div class="block-content block-content-full">

                                    <div class="block">
                                        <div class="block-header block-header-default">
                                            <h3 class="block-title">Adjuntos del Documento</h3>
                                            <div class="block-options">
                                                <button type="button" class="btn-block-option">
                                                    <i class="fa fa-file-pdf-o"></i>
                                                </button>
                                            </div>
                                        </div>

                                        <div class="block-content">

                                            <form action="be_forms_elements_bootstrap.html" method="post" enctype="multipart/form-data" onsubmit="return false;">

                                                <div class="row">

                                                    <div class="form-group row col-md-6 justify-content-center">
                                                        <label class="col-12" for="example-file-input">Solicitud</label>
                                                        <div class="col-12">
                                                            <input type="file" id="example-file-input" name="example-file-input">
                                                        </div>
                                                    </div>

                                                    <div class="form-group row col-md-6 justify-content-center">
                                                        <label class="col-12" for="example-file-input">Plan de Estudios</label>
                                                        <div class="col-12">
                                                            <input type="file" id="example-file-input" name="example-file-input">
                                                        </div>
                                                    </div>

                                                    <div class="form-group row col-md-6 justify-content-center">
                                                        <label class="col-12" for="example-file-input">Planta Docente</label>
                                                        <div class="col-12">
                                                            <input type="file" id="example-file-input" name="example-file-input">
                                                        </div>
                                                    </div>

                                                    <div class="form-group row col-md-6 justify-content-center">
                                                        <label class="col-12" for="example-file-input">Diagnostico</label>
                                                        <div class="col-12">
                                                            <input type="file" id="example-file-input" name="example-file-input">
                                                        </div>
                                                    </div>
                                                </div>



                                                <div class="block-content block-content-sm block-content-full bg-body-light">
                                                    <div class="row">
                                                        <div class="col-6">

                                                        </div>
                                                        <div class="col-6 text-right">
                                                            <button type="submit" class="btn btn-alt-primary" data-wizard="finish">
                                                            <i class="fa fa-save ml-5"></i> Guardar
                                                            </button>

                                                            <button type="submit" class="btn btn-alt-primary d-none" data-wizard="finish">
                                                                <i class="fa fa-save ml-5"></i> Guardar
                                                            </button>

                                                        </div>


                                                    </div>
                                                </div>


                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>


                    <?php require_once("../MainFooter/MainFooter.php"); ?>


                </div>

                <?php require_once("../MainJs/MainJs.php"); ?>

</body>

</html>
<?php
    //validacion de segurida de inicio de sesion
    //si no hay una cuenta logueada no lo dejara entrar al sitio cambiadole la direccion
} else {
    header("Location:" . Conectar::ruta() . "index.php");
}
?>