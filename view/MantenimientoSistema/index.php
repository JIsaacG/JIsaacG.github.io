<?php
require_once ("../../config/conexion.php");
if (isset($_SESSION["NUM_IDENTIDAD"])) {

    ?>

    <!doctype html>
    <html lang="en" class="no-focus">


    <head>
        <?php require_once ("../MainHead/MainHead.php"); ?>

        <title>Mantenimiento Usuario</title>

    </head>

    <body>

        <div id="page-container" class="sidebar-o side-scroll page-header-modern main-content-boxed">

            <aside id="side-overlay">

                <div id="side-overlay-scroll">

                    <div class="content-header content-header-fullrow">
                        <div class="content-header-section align-parent">
                            <button type="button" class="btn btn-circle btn-dual-secondary align-v-r" data-toggle="layout"
                                data-action="side_overlay_close">
                                <i class="fa fa-times text-danger"></i>
                            </button>

                            <div class="content-header-item">
                                <a class="img-link mr-5" href="be_pages_generic_profile.html">
                                    <img class="img-avatar img-avatar32" src="../../public/assets/img/avatars/avatar15.jpg"
                                        alt="">
                                </a>
                                <a class="align-middle link-effect text-primary-dark font-w600"
                                    href="be_pages_generic_profile.html"><!-- llamada del usuario   -->
                                    <span><?php echo $_SESSION["USUARIO"] ?>
                                        <?php echo $_SESSION["NOMBRE_USUARIO"] ?></span></a>
                            </div>

                        </div>
                    </div>



                </div>

            </aside>


            <nav id="sidebar" class="text-warning">

                <div id="sidebar-scroll">

                    <div class="sidebar-content ">


                        <?php require_once ("../MainSidebar/MainSidebar.php"); ?>


                        <?php require_once ("../MainMenu/MainMenu.php"); ?>

                    </div>

                </div>

            </nav>

            <nav class="text-warning">

                <?php require_once ("../MainHeader/MainHeader.php"); ?>

            </nav>



            <main id="main-container">

                <div class="content">

                    <div class="block">
                        <div class="block-header block-header-default">
                            <h3 class="block-title">Mantenimiento <small>Usuarios</small></h3>
                        </div>
                        <div class="block-content block-content-full">
                            <button type="button" id="btnnuevo" class="btn btn-inline btn-primary">Nuevo Registro</button>
                            <table id="usuario_data" class="table table-bordered table-striped table-vcenter js-dataTable-full">
                                <thead>
                                    <tr>
                                        <th style="width: 10%;">Usuario</th>
                                        <th style="width: 10%;">Nomre de Usuario</th>
                                        <th class="d-none d-sm-table-cell" style="width: 40%;">Correo</th>
                                        <th class="d-none d-sm-table-cell" style="width: 5%;">Contraseña</th>
                                        <th class="d-none d-sm-table-cell" style="width: 5%;">Rol</th>
                                        <th class="text-center" style="width: 5%;"></th>
                                        <th class="text-center" style="width: 5%;"></th>
                                    </tr>
                                </thead>
                                <tbody>
                                   
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

            </main>


            <?php require_once ("../MainFooter/MainFooter.php"); ?>


        </div>

        <?php require_once("modalmantenimiento.php");?>
        <?php require_once ("../MainJs/MainJs.php"); ?>
        <script type="text/javascript" src="mntusuario.js"></script>

    </body>

    </html>
    <?php
} else {
    header("Location:" . Conectar::ruta() . "index.php");
}
?>