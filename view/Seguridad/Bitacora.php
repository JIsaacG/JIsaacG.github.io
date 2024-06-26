<!doctype html>
<html lang="en" class="no-focus">
<head>
    <?php require_once("../MainHead/MainHead.php"); ?>
    <title>Bitacora</title>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
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
                        <h3 class="block-title">Usuarios <small></small></h3>
                    </div>
                    <div class="block-content block-content-full">
                        <td class="text-center">
                            <a href="../NuevoIngresoSolicitud/">
                                <button type="button" class="btn btn-sm btn-secondary" data-toggle="tooltip" title="Proceso">
                                    <i class="si si-note"></i>
                                </button>
                            </a>
                            <button type="button" class="btn btn-primary float-right" id="addUserButton" data-toggle="modal" data-target="#addUserModal">Añadir Usuario</button>
                        </td>

                        <script>
                            $(document).ready(function() {
    $('#addUserButton').on('click', function() {
        // Obtener datos del usuario desde la base de datos
        $.ajax({
            url: 'obtener_usuario.php',
            type: 'GET',
            dataType: 'json',
            success: function(response) {
                if (response.error) {
                    alert('Error: ' + response.error);
                } else {
                    const id_usuario = response.id_usuario;
                    const accion = "Añadir Usuario";
                    const descripcion = "Descripcion del usuario añadido";

                    // Enviar datos a insertar_bitacora.php
                    $.ajax({
                        url: 'insertar_bitacora.php',
                        type: 'POST',
                        data: {
                            id_usuario: id_usuario,
                            accion: accion,
                            descripcion: descripcion
                        },
                        success: function(response) {
                            alert('Datos insertados en la bitácora.');
                        },
                        error: function(xhr, status, error) {
                            alert('Ocurrió un error al insertar en la bitácora.');
                        }
                    });
                }
            },
            error: function(xhr, status, error) {
                alert('Ocurrió un error al obtener los datos del usuario.');
            }
        });
    });
});

                        </script>
                        <!-- DataTables init on table by adding .js-dataTable-full class, functionality initialized in js/pages/be_tables_datatables.js -->
                        <table class="table table-bordered table-striped table-vcenter js-dataTable-full">
                            <thead>
                                <tr>
                                    <th class="text-center">Codigo de Tramite</th>
                                    <th>Carrera</th>
                                    <th class="d-none d-sm-table-cell">Categoria</th>
                                    <th class="d-none d-sm-table-cell">Grado Academico</th>
                                    <th class="d-none d-sm-table-cell" style="width: 15%;">Estado</th>
                                    <th class="text-center" style="width: 15%;">Proceso</th>
                                </tr>
                            </thead>
                            <tbody>
                                <!-- Aquí va tu contenido de la tabla -->
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
