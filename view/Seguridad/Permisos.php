<?php
require_once("../../config/conexion.php");
if (isset($_SESSION["ID_USUARIO"])) {

?>

<!doctype html>
<html lang="en" class="no-focus">


<head>
    <?php require_once("../MainHead/MainHead.php"); ?>

    <title>Permisos</title>

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
                            <a class="align-middle link-effect text-primary-dark font-w600" href="be_pages_generic_profile.html"><!-- llamada del usuario   -->
                            <span><?php echo $_SESSION["USUARIO"] ?> <?php echo $_SESSION["NOMBRE_USUARIO"] ?></span></a>
                        </div>

                    </div>
                </div>



            </div>

        </aside>


        <nav id="sidebar" class="text-warning">

            <div id="sidebar-scroll">

                <div class="sidebar-content ">


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
                        <h3 class="block-title">Permisos <small></small></h3>
                    </div>
                    <div class="block-content block-content-full">
                        <td class="text-center">
                            <a href="../NuevoIngresoSolicitud/">
                                <button type="button" class="btn btn-sm btn-secondary" data-toggle="tooltip" title="Proceso">
                                    <i class="si si-note"></i>
                                </button>
                            </a>
                            <button type="button" class="btn btn-primary float-right" data-toggle="modal" data-target="#addUserModal">Añadir Usuario</button>
                        </td>
                        <!-- DataTables init on table by adding .js-dataTable-full class, functionality initialized in js/pages/be_tables_datatables.js -->
                        <table class="table table-bordered table-striped table-vcenter js-dataTable-full">
                            <thead>
                                <tr>
                                    <th class="text-center">Codigo de Tramite</th>
                                    <th>Carrera</th>
                                    <th class="d-none d-sm-table-cell">Categoria</th>
                                    <th class="d-none d-sm-table-cell">Grado Aacdemico</th>
                                    <th class="d-none d-sm-table-cell" style="width: 15%;">Estado</th>
                                    <th class="text-center" style="width: 15%;">Proceso</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td class="text-center">01814_0814_01001</td>
                                    <td class="font-w600">Ingenieria en Mecatronica</td>
                                    <td class="d-none d-sm-table-cell">Reforma</td>
                                    <td class="d-none d-sm-table-cell">Licenciatura</td>
                                    <td class="d-none d-sm-table-cell">
                                        <span class="badge badge-danger">Requiere Subsanacion</span>
                                    </td>
                                    <td class="text-center">
                                        <a href="../NuevoIngresoSolicitud/">
                                            <button type="button" class="btn btn-sm btn-secondary" data-toggle="tooltip" title="Proceso">
                                                <i class="si si-note"></i>
                                            </button>
                                        </a>
                                    </td>
                                </tr>

                                <tr>
                                    <td class="text-center">01815_0814_01001</td>
                                    <td class="font-w600">Ingenieria en Mecatronica</td>
                                    <td class="d-none d-sm-table-cell">Reforma</td>
                                    <td class="d-none d-sm-table-cell">Licenciatura</td>
                                    <td class="d-none d-sm-table-cell">
                                        <span class="badge badge-success">Agendado para el CES</span>
                                    </td>
                                    <td class="text-center">
                                        <a href="../NuevoIngresoSolicitud/">
                                            <button type="button" class="btn btn-sm btn-secondary" data-toggle="tooltip" title="Proceso">
                                                <i class="si si-note"></i>
                                            </button>
                                        </a>
                                    </td>
                                </tr>

                                <tr>
                                    <td class="text-center">01815_0814_01001</td>
                                    <td class="font-w600">Ingenieria en Mecatronica</td>
                                    <td class="d-none d-sm-table-cell">Reforma</td>
                                    <td class="d-none d-sm-table-cell">Licenciatura</td>
                                    <td class="d-none d-sm-table-cell">
                                        <span class="badge badge-success">Agendado para el CES</span>
                                    </td>
                                    <td class="text-center">
                                        <a href="../NuevoIngresoSolicitud/">
                                            <button type="button" class="btn btn-sm btn-secondary" data-toggle="tooltip" title="Proceso">
                                                <i class="si si-note"></i>
                                            </button>
                                        </a>
                                    </td>
                                </tr>

                                <tr>
                                    <td class="text-center">01815_0814_01001</td>
                                    <td class="font-w600">Ingenieria en Mecatronica</td>
                                    <td class="d-none d-sm-table-cell">Reforma</td>
                                    <td class="d-none d-sm-table-cell">Licenciatura</td>
                                    <td class="d-none d-sm-table-cell">
                                        <span class="badge badge-success">Agendado para el CES</span>
                                    </td>
                                    <td class="text-center">
                                        <a href="../NuevoIngresoSolicitud/">
                                            <button type="button" class="btn btn-sm btn-secondary" data-toggle="tooltip" title="Proceso">
                                                <i class="si si-note"></i>
                                            </button>
                                        </a>
                                    </td>
                                </tr>

                                <tr>
                                    <td class="text-center">01815_0814_01001</td>
                                    <td class="font-w600">Ingenieria en Mecatronica</td>
                                    <td class="d-none d-sm-table-cell">Reforma</td>
                                    <td class="d-none d-sm-table-cell">Licenciatura</td>
                                    <td class="d-none d-sm-table-cell">
                                        <span class="badge badge-success">Agendado para el CES</span>
                                    </td>
                                    <td class="text-center">
                                        <a href="../NuevoIngresoSolicitud/">
                                            <button type="button" class="btn btn-sm btn-secondary" data-toggle="tooltip" title="Proceso">
                                                <i class="si si-note"></i>
                                            </button>
                                        </a>
                                    </td>
                                </tr>


                                <tr>
                                    <td class="text-center">01815_0814_01001</td>
                                    <td class="font-w600">Ingenieria en Mecatronica</td>
                                    <td class="d-none d-sm-table-cell">Reforma</td>
                                    <td class="d-none d-sm-table-cell">Licenciatura</td>
                                    <td class="d-none d-sm-table-cell">
                                        <span class="badge badge-success">Agendado para el CES</span>
                                    </td>
                                    <td class="text-center">
                                        <a href="../NuevoIngresoSolicitud/">
                                            <button type="button" class="btn btn-sm btn-secondary" data-toggle="tooltip" title="Proceso">
                                                <i class="si si-note"></i>
                                            </button>
                                        </a>
                                    </td>
                                </tr>

                                <tr>
                                    <td class="text-center">01815_0814_01001</td>
                                    <td class="font-w600">Ingenieria en Mecatronica</td>
                                    <td class="d-none d-sm-table-cell">Reforma</td>
                                    <td class="d-none d-sm-table-cell">Licenciatura</td>
                                    <td class="d-none d-sm-table-cell">
                                        <span class="badge badge-success">Agendado para el CES</span>
                                    </td>
                                    <td class="text-center">
                                        <a href="../NuevoIngresoSolicitud/">
                                            <button type="button" class="btn btn-sm btn-secondary" data-toggle="tooltip" title="Proceso">
                                                <i class="si si-note"></i>
                                            </button>
                                        </a>
                                    </td>
                                </tr>

                                <tr>
                                    <td class="text-center">01815_0814_01001</td>
                                    <td class="font-w600">Ingenieria en Mecatronica</td>
                                    <td class="d-none d-sm-table-cell">Reforma</td>
                                    <td class="d-none d-sm-table-cell">Licenciatura</td>
                                    <td class="d-none d-sm-table-cell">
                                        <span class="badge badge-success">Agendado para el CES</span>
                                    </td>
                                    <td class="text-center">
                                        <a href="../NuevoIngresoSolicitud/">
                                            <button type="button" class="btn btn-sm btn-secondary" data-toggle="tooltip" title="Proceso">
                                                <i class="si si-note"></i>
                                            </button>
                                        </a>
                                    </td>
                                </tr>

                                <tr>
                                    <td class="text-center">01815_0814_01001</td>
                                    <td class="font-w600">Ingenieria en Mecatronica</td>
                                    <td class="d-none d-sm-table-cell">Reforma</td>
                                    <td class="d-none d-sm-table-cell">Licenciatura</td>
                                    <td class="d-none d-sm-table-cell">
                                        <span class="badge badge-success">Agendado para el CES</span>
                                    </td>
                                    <td class="text-center">
                                        <a href="../NuevoIngresoSolicitud/">
                                            <button type="button" class="btn btn-sm btn-secondary" data-toggle="tooltip" title="Proceso">
                                                <i class="si si-note"></i>
                                            </button>
                                        </a>
                                    </td>
                                </tr>

                                <tr>
                                    <td class="text-center">01815_0814_01001</td>
                                    <td class="font-w600">Ingenieria en Mecatronica</td>
                                    <td class="d-none d-sm-table-cell">Reforma</td>
                                    <td class="d-none d-sm-table-cell">Licenciatura</td>
                                    <td class="d-none d-sm-table-cell">
                                        <span class="badge badge-success">Agendado para el CES</span>
                                    </td>
                                    <td class="text-center">
                                        <a href="../NuevoIngresoSolicitud/">
                                            <button type="button" class="btn btn-sm btn-secondary" data-toggle="tooltip" title="Proceso">
                                                <i class="si si-note"></i>
                                            </button>
                                        </a>
                                    </td>
                                </tr>

                                <tr>
                                    <td class="text-center">01815_0814_01001</td>
                                    <td class="font-w600">Ingenieria en Mecatronica</td>
                                    <td class="d-none d-sm-table-cell">Reforma</td>
                                    <td class="d-none d-sm-table-cell">Licenciatura</td>
                                    <td class="d-none d-sm-table-cell">
                                        <span class="badge badge-success">Agendado para el CES</span>
                                    </td>
                                    <td class="text-center">
                                        <a href="../NuevoIngresoSolicitud/">
                                            <button type="button" class="btn btn-sm btn-secondary" data-toggle="tooltip" title="Proceso">
                                                <i class="si si-note"></i>
                                            </button>
                                        </a>
                                    </td>
                                </tr>

                                <tr>
                                    <td class="text-center">01815_0814_01001</td>
                                    <td class="font-w600">Ingenieria en Mecatronica</td>
                                    <td class="d-none d-sm-table-cell">Reforma</td>
                                    <td class="d-none d-sm-table-cell">Licenciatura</td>
                                    <td class="d-none d-sm-table-cell">
                                        <span class="badge badge-success">Agendado para el CES</span>
                                    </td>
                                    <td class="text-center">
                                        <a href="../NuevoIngresoSolicitud/">
                                            <button type="button" class="btn btn-sm btn-secondary" data-toggle="tooltip" title="Proceso">
                                                <i class="si si-note"></i>
                                            </button>
                                        </a>
                                    </td>
                                </tr>

                                <tr>
                                    <td class="text-center">01815_0814_01001</td>
                                    <td class="font-w600">Ingenieria en Mecatronica</td>
                                    <td class="d-none d-sm-table-cell">Reforma</td>
                                    <td class="d-none d-sm-table-cell">Licenciatura</td>
                                    <td class="d-none d-sm-table-cell">
                                        <span class="badge badge-success">Agendado para el CES</span>
                                    </td>
                                    <td class="text-center">
                                        <a href="../NuevoIngresoSolicitud/">
                                            <button type="button" class="btn btn-sm btn-secondary" data-toggle="tooltip" title="Proceso">
                                                <i class="si si-note"></i>
                                            </button>
                                        </a>
                                    </td>
                                </tr>

                                <tr>
                                    <td class="text-center">01815_0814_01001</td>
                                    <td class="font-w600">Ingenieria en Mecatronica</td>
                                    <td class="d-none d-sm-table-cell">Reforma</td>
                                    <td class="d-none d-sm-table-cell">Licenciatura</td>
                                    <td class="d-none d-sm-table-cell">
                                        <span class="badge badge-success">Agendado para el CES</span>
                                    </td>
                                    <td class="text-center">
                                        <a href="../NuevoIngresoSolicitud/">
                                            <button type="button" class="btn btn-sm btn-secondary" data-toggle="tooltip" title="Proceso">
                                                <i class="si si-note"></i>
                                            </button>
                                        </a>
                                    </td>
                                </tr>



                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

        </main>


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