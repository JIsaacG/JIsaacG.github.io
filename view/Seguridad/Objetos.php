<!doctype html>
<html lang="en" class="no-focus">


<head>
    <?php require_once("../MainHead/MainHead.php"); ?>

    <title>Objetos</title>
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
                <div class="sidebar-content">
                    <?php require_once("../MainSidebar/MainSidebar.php"); ?>
                    <?php require_once("../MainMenu/MainMenu.php"); ?>
                </div>
            </div>
        </nav>

        <nav class="text-warning">
            <?php require_once("../MainHeader/MainHeader.php"); ?>
        </nav>

            <div class="content">
                <div class="block">
                    <div class="block-header block-header-default">
                        <h3 class="block-title">Menú Ingreso De Objetos <small></small></h3>
                    </div>
                    <div class="block-content block-content-full">
                        <td class="text-center">
                            <a href="../NuevoIngresoSolicitud/">
                                <button type="button" class="btn btn-sm btn-secondary" data-toggle="tooltip" title="Proceso">
                                    <i class="si si-note"></i>
                                </button>
                            </a>
                            <button type="button" class="btn btn-primary float-right" data-toggle="modal" data-target="#addUserModal">Añadir Objetos</button>
                        </td>
                        <table class="table table-bordered table-striped table-vcenter js-dataTable-full">
                            <thead>
                                <tr>
                                    <th class="text-center">Id Objeto</th>
                                    <th class="d-none d-sm-table-cell">Objeto</th>
                                    <th class="d-none d-sm-table-cell">Tipo Objeto</th>
                                    <th class="d-none d-sm-table-cell" style="width: 15%;">Descripcion</th>
                                    <th>Fecha Creacion</th>
                                    <th class="text-center" style="width: 15%;">Creado Por</th>
                                    <th class="text-center" style="width: 15%;">Fecha Modificacion</th>
                                    <th class="text-center" style="width: 15%;">Modificado Por</th>
                                    <th class="text-center" style="width: 15%;">Editar Objeto</th>
                                    <th class="text-center" style="width: 15%;">Eliminar Objeto</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php
                            // Incluir el archivo de conexión a la base de datos
                            include("../../config/conexion.php");
                            // Consulta a la base de datos
                            $sql = "SELECT id_objeto, objeto, tipo_objeto, descripcion, fecha_creacion, creado_por, fecha_modificacion, modificado_por FROM tbl_ms_objetos";
                            $result = $conn->query($sql);

                            // Verificar si hay resultados
                            if ($result->num_rows > 0) {
                                // Iterar sobre los resultados
                                while($row = $result->fetch_assoc()) {
                                    echo "<tr>";
                                    echo "<td class='text-center'>" . $row["id_objeto"] . "</td>";
                                    echo "<td class='d-none d-sm-table-cell'>" . $row["objeto"] . "</td>";
                                    echo "<td class='d-none d-sm-table-cell'>" . $row["tipo_objeto"] . "</td>";
                                    echo "<td class='d-none d-sm-table-cell'>" . $row["descripcion"] . "</td>";
                                    echo "<td>" . $row["fecha_creacion"] . "</td>";
                                    echo "<td class='text-center'>" . $row["creado_por"] . "</td>";
                                    echo "<td class='text-center'>" . $row["fecha_modificacion"] . "</td>";
                                    echo "<td class='text-center'>" . $row["modificado_por"] . "</td>";
                                    echo "<td class='text-center'> <button type='button' class='btn btn-sm btn-secondary' data-toggle='modal' data-target='#editObjectModal' data-id='" . $row["id_objeto"] . "' data-objeto='" . $row["objeto"] . "' data-tipo_objeto='" . $row["tipo_objeto"] . "' data-descripcion='" . $row["descripcion"] . "' data-creado_por='" . $row["creado_por"] . "'><i class='si si-note'></i></button></td>";
                                    echo "<td class='text-center'> 
                                            <button type='button' class='btn btn-sm btn-danger' data-toggle='modal' data-target='#confirmDeleteModal' 
                                                    data-id='" . $row["id_objeto"] . "'>
                                                <i class='si si-trash'></i>
                                            </button>
                                            </td>";
                                    echo "</tr>";
                                }
                            } else {
                                echo "<tr><td colspan='9' class='text-center'>No hay datos disponibles</td></tr>";
                            }

                            // Cerrar la conexión
                            $conn->close();
                            ?>

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </main>

        <?php require_once("../MainFooter/MainFooter.php"); ?>

        <!-- Modal para agregar objetos -->
        <div class="modal fade" id="addUserModal" tabindex="-1" role="dialog" aria-labelledby="addUserModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="addUserModalLabel">Añadir Objeto</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form id="addObjectForm" method="POST" action="../Seguridad/Objetos/Agregar_Objeto.php">
                            <div class="form-group">
                                <label for="objeto">Objeto</label>
                                <input type="text" class="form-control" id="objeto" name="objeto" required>
                            </div>
                            <div class="form-group">
                                <label for="tipo_objeto">Tipo Objeto</label>
                                <input type="text" class="form-control" id="tipo_objeto" name="tipo_objeto" required>
                            </div>
                            <div class="form-group">
                                <label for="descripcion">Descripcion</label>
                                <input type="text" class="form-control" id="descripcion" name="descripcion" required>
                            </div>
                            <div class="form-group">
                                <label for="creado_por">Creado Por</label>
                                <select class="form-control" id="creado_por" name="creado_por" required>
                                    <option value="0" style="font-weight:bold">Seleccionar Creador</option>
                                    <?php
                                    // Incluir el archivo de conexión a la base de datos
                                    include("../../config/conexion.php");
                                    // Consulta a la base de datos para obtener usuarios con ID_ROL = 1
                                    $sql_creado_por = "SELECT ID_USUARIO, NOMBRE_USUARIO FROM tbl_ms_usuario WHERE ID_ROL = 1";
                                    $result_creado_por = $conn->query($sql_creado_por);

                                    // Verificar si hay resultados
                                    if ($result_creado_por->num_rows > 0) {
                                        // Iterar sobre los resultados
                                        while($row = $result_creado_por->fetch_assoc()) {
                                            echo "<option value='" . $row["ID_USUARIO"] . "'>" . $row["NOMBRE_USUARIO"] . "</option>";
                                        }
                                    }

                                    // Cerrar la conexión
                                    $conn->close();
                                    ?>
                                </select>
                            </div>
                           
                            <button type="submit" class="btn btn-primary">Guardar</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <!-- Modal para editar objetos -->
        <div class="modal fade" id="editObjectModal" tabindex="-1" role="dialog" aria-labelledby="editObjectModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="editObjectModalLabel">Editar Objeto</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form id="editObjectForm" method="POST" action="../Seguridad/Objetos/Editar_Objeto.php">
                            <input type="hidden" id="edit-id_objeto" name="id_objeto">
                            <div class="form-group">
                                <label for="edit-objeto">Objeto</label>
                                <input type="text" class="form-control" id="edit-objeto" name="objeto" required>
                            </div>
                            <div class="form-group">
                                <label for="edit-tipo_objeto">Tipo Objeto</label>
                                <input type="text" class="form-control" id="edit-tipo_objeto" name="tipo_objeto" required>
                            </div>
                            <div class="form-group">
                                <label for="edit-descripcion">Descripcion</label>
                                <input type="text" class="form-control" id="edit-descripcion" name="descripcion" required>
                            </div>
                            <div class="form-group">
                                <label for="edit-creado_por">Creado Por</label>
                                <input type="text" class="form-control" id="edit-creado_por" name="creado_por" readonly>
                            </div>
                            <button type="submit" class="btn btn-primary">Actualizar</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

        <!-- Modal de confirmación para eliminar objeto -->
        <div class="modal fade" id="confirmDeleteModal" tabindex="-1" role="dialog" aria-labelledby="confirmDeleteModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="confirmDeleteModalLabel">Confirmar Eliminación</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <p>¿Estás seguro de que deseas eliminar este objeto?</p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                        <form id="deleteObjectForm" method="POST" action="../Seguridad/Objetos/Eliminar_Objeto.php">
                            <input type="hidden" id="delete_id_objeto" name="id_objeto">
                            <button type="submit" class="btn btn-danger">Eliminar</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    <?php require_once("../MainJs/MainJs.php"); ?>

       
    <script>
            // Pasar datos al modal de edición
            $('#editObjectModal').on('show.bs.modal', function (event) {
                var button = $(event.relatedTarget); // Botón que abrió el modal
                var id_objeto = button.data('id');
                var objeto = button.data('objeto');
                var tipo_objeto = button.data('tipo_objeto');
                var descripcion = button.data('descripcion');
                var creado_por = button.data('creado_por');

                var modal = $(this);
                modal.find('.modal-body #edit-id_objeto').val(id_objeto);
                modal.find('.modal-body #edit-objeto').val(objeto);
                modal.find('.modal-body #edit-tipo_objeto').val(tipo_objeto);
                modal.find('.modal-body #edit-descripcion').val(descripcion);
                modal.find('.modal-body #edit-creado_por').val(creado_por);
            });

            // Pasar datos al modal de confirmación de eliminación
            $('#confirmDeleteModal').on('show.bs.modal', function (event) {
                var button = $(event.relatedTarget); // Botón que abrió el modal
                var id_objeto = button.data('id');

                var modal = $(this);
                modal.find('#delete_id_objeto').val(id_objeto);
            });
        </script>
</body>

</html>
