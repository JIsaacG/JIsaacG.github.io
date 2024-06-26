<!DOCTYPE html>
<html lang="en" class="no-focus">
<head>
    <?php require_once("../MainHead/MainHead.php"); ?>
    <title>Roles</title>
</head>
<body>
    <div id="page-container" class="sidebar-o side-scroll page-header-modern main-content-boxed">
        <!-- Barra lateral -->
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
                            <a class="align-middle link-effect text-primary-dark font-w600" href="be_pages_generic_profile.html">
                                <span><?php echo $_SESSION["USUARIO"] ?> <?php echo $_SESSION["NOMBRE_USUARIO"] ?></span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </aside>
        
        <!-- Barra lateral principal -->
        <nav id="sidebar" class="text-warning">
            <div id="sidebar-scroll">
                <div class="sidebar-content">
                    <?php require_once("../MainSidebar/MainSidebar.php"); ?>
                    <?php require_once("../MainMenu/MainMenu.php"); ?>
                </div>
            </div>
        </nav>

        <!-- Barra de navegación principal -->
        <nav class="text-warning">
            <?php require_once("../MainHeader/MainHeader.php"); ?>
        </nav>

        <!-- Contenido principal -->
        <main id="main-container">
            <div class="content">
                <div class="block">
                    <div class="block-header block-header-default">
                        <h3 class="block-title">Menú Ingreso De Roles</h3>
                    </div>
                    <div class="block-content block-content-full">
                        <div class="text-center mb-2">
                            <button type="button" class="btn btn-primary float-right" data-toggle="modal" data-target="#addRoleModal">Añadir Rol</button>
                        </div>
                        
                        <br>
                        <br>
                        <table class="table table-bordered table-striped table-vcenter js-dataTable-full">
                            <thead>
                                <tr>
                                    <th class="text-center">Id Rol</th>
                                    <th>Rol</th>
                                    <th>Descripción</th>
                                    <th>Fecha Creación</th>
                                    <th>Creado Por</th>
                                    <th>Fecha Modificación</th>
                                    <th>Modificado Por</th>
                                    <th class="text-center">Editar</th>
                                    <th class="text-center">Eliminar</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                // Incluir el archivo de conexión a la base de datos
                                include("../../config/conexion.php");

                                // Consulta a la base de datos para obtener roles con el nombre del creador
                                $sql = "SELECT r.ID_ROL, rol.nombre_rol AS ROL, r.DESCRIPCION, r.FECHA_CREACION, u.NOMBRE_USUARIO AS CREADO_POR, r.FECHA_MODIFICACION, r.MODIFICADO_POR FROM tbl_ms_roles r INNER JOIN tbl_ms_usuario u ON r.CREADO_POR = u.ID_USUARIO INNER JOIN tbl_rol rol ON r.ROL = rol.id_rol";
                                $result = $conn->query($sql);

                                // Verificar si hay resultados
                                if ($result->num_rows > 0) {
                                    // Iterar sobre los resultados
                                    while($row = $result->fetch_assoc()) {
                                        echo "<tr>";
                                        echo "<td class='text-center'>" . $row["ID_ROL"] . "</td>";
                                        echo "<td>" . $row["ROL"] . "</td>";
                                        echo "<td>" . $row["DESCRIPCION"] . "</td>";
                                        echo "<td>" . $row["FECHA_CREACION"] . "</td>";
                                        echo "<td>" . $row["CREADO_POR"] . "</td>";
                                        echo "<td>" . $row["FECHA_MODIFICACION"] . "</td>";
                                        echo "<td>" . $row["MODIFICADO_POR"] . "</td>";
                                        echo "<td class='text-center'>
                                                <button type='button' class='btn btn-sm btn-secondary' data-toggle='modal' data-target='#editRoleModal' 
                                                        data-id='" . $row["ID_ROL"] . "' 
                                                        data-rol='" . $row["ROL"] . "' 
                                                        data-descripcion='" . $row["DESCRIPCION"] . "'>
                                                    <i class='si si-note'></i>
                                                </button>
                                            </td>";
                                        echo "<td class='text-center'>    <button type='button' class='btn btn-sm btn-danger' data-toggle='modal' data-target='#confirmDeleteModal' 
                                            data-id='" . $row["ID_ROL"] . "'>
                                        <i class='si si-trash'></i>
                                    </button> </button>
                                            </td>";
                                        echo "</tr>";
                                    }
                                } else {
                                    echo "<tr><td colspan='8' class='text-center'>No hay datos disponibles</td></tr>";
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


    <!-- Modal de confirmación para eliminar -->
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
                    <p>¿Estás seguro de eliminar este rol?</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                    <form action="../Seguridad/Roles/Eliminar_Rol.php" method="POST">
                        <input type="hidden" name="id_rol" id="delete-rol-id" value="">
                        <button type="submit" class="btn btn-danger">Eliminar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>


        <!-- Modal para agregar roles -->
        <div class="modal fade" id="addRoleModal" tabindex="-1" role="dialog" aria-labelledby="addRoleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="addRoleModalLabel">Añadir Rol</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form id="addRoleForm" method="POST" action="../Seguridad/Roles/Guardar_Rol.php">
                            <input type="hidden" id="creado_por" name="creado_por" value="<?php echo $_SESSION['NOMBRE_USUARIO']; ?>">
                            <div class="form-group">
                                <label for="rol">Seleccionar Rol</label>
                                <select class="form-control" id="rol" name="rol">
                                    <option value="0" style="font-weight:bold">Seleccionar Rol</option>
                                    <?php
                                    // Incluir el archivo de conexión a la base de datos
                                    include("../../config/conexion.php");
                                    // Consulta a la base de datos para obtener roles
                                    $sql_roles = "SELECT id_rol, nombre_rol FROM tbl_rol";
                                    $result_roles = $conn->query($sql_roles);
                                    // Verificar si hay resultados
                                    if ($result_roles->num_rows > 0) {
                                        // Iterar sobre los resultados
                                        while($row = $result_roles->fetch_assoc()) {
                                            echo "<option value='" . $row["id_rol"] . "'>" . $row["nombre_rol"] . "</option>";
                                        }
                                    }
                                    // Cerrar la conexión
                                    $conn->close();
                                    ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="descripcion">Descripción</label>
                                <input type="text" class="form-control" id="descripcion" name="descripcion" placeholder="Descripción del Rol">
                            </div>
                            <div class="form-group">
                                <label for="creado_por">Creado Por</label>
                                <select class="form-control" id="creado_por" name="creado_por" required>
                                    <option value="0" style="font-weight:bold">Seleccionar Creador</option>
                                    <?php
                                    // Incluir el archivo de conexión a la base de datos
                                    include("../../config/conexion.php");
                                    // Consulta a la base de datos para obtener usuarios con ID_ROL = 1
                                    $sql_creado_por = "SELECT ID_USUARIO, NOMBRE_USUARIO FROM tbl_ms_usuario WHERE ID_ROL = ID_USUARIO";
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
                            <div class="form-group">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                                <button type="submit" class="btn btn-primary" id="btnAddRole">Guardar Rol</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <!-- Modal para editar roles -->
        <div class="modal fade" id="editRoleModal" tabindex="-1" role="dialog" aria-labelledby="editRoleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="editRoleModalLabel">Editar Rol</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form id="editRoleForm" method="POST" action="../Seguridad/Roles/Actualizar_Rol.php">
                            <input type="hidden" id="edit-id_rol" name="id_rol">
                            <div class="form-group">
                                <label for="edit-rol">Rol </label>
                                <input type="text" class="form-control" id="edit-rol" name="rol" readonly>
                            </div>
                            <div class="form-group">
                                <label for="edit-rol">Seleccionar Nuevo Rol</label>
                                <select class="form-control" id="edit-rol" name="rol" required>
                                <option value="0" style="font-weight:bold">Seleccionar Rol</option>
                                <?php
                                    // Incluir el archivo de conexión a la base de datos
                                    include("../../config/conexion.php");
                                    // Consulta a la base de datos para obtener roles
                                    $sql_roles = "SELECT id_rol, nombre_rol FROM tbl_rol";
                                    $result_roles = $conn->query($sql_roles);
                                    // Verificar si hay resultados
                                    if ($result_roles->num_rows > 0) {
                                        // Iterar sobre los resultados
                                        while($row = $result_roles->fetch_assoc()) {
                                            echo "<option value='" . $row["id_rol"] . "'>" . $row["nombre_rol"] . "</option>";
                                        }
                                    }
                                    // Cerrar la conexión
                                    $conn->close();
                                    ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="edit-descripcion">Descripción</label>
                                <input type="text" class="form-control" id="edit-descripcion" name="descripcion" placeholder="Descripción del Rol">
                            </div>
                            <div class="form-group">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                                <button type="submit" class="btn btn-primary" id="btnEditRole">Actualizar Rol</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <!-- Modal de confirmación de eliminación -->
<div id="confirmDeleteModal" class="modal fade" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Confirmar Eliminación</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="deleteRoleForm">
                    <input type="hidden" id="delete-rol-id" name="id_rol">
                    <!-- Otros campos del formulario -->
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                <button type="button" class="btn btn-primary" onclick="eliminarRol()">Eliminar</button>
            </div>
        </div>
    </div>
</div>

<!-- Modal de edición de rol -->
<div id="editRoleModal" class="modal fade" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Editar Rol</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="editRoleForm">
                    <input type="hidden" id="edit-rol-id" name="id_rol">
                    <!-- Otros campos del formulario -->
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                <button type="button" class="btn btn-primary" onclick="actualizarRol()">Guardar Cambios</button>
            </div>
        </div>
    </div>
</div>


    </div>

    <!-- Scripts -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js"></script>
    <script>
        $(document).ready(function() {
            // Mostrar datos en el modal de editar rol
            $('#editRoleModal').on('show.bs.modal', function (event) {
                var button = $(event.relatedTarget);
                var id_rol = button.data('id');
                var rol = button.data('rol');
                var descripcion = button.data('descripcion');
                var modal = $(this);
                modal.find('#edit-id_rol').val(id_rol);
                modal.find('#edit-rol').val(rol);
                modal.find('#edit-descripcion').val(descripcion);
            });

            // Validar formulario de agregar rol
            $('#addRoleForm').validate({
                rules: {
                    rol: {
                        required: true,
                        minlength: 3,
                        maxlength: 50
                    }
                },
                messages: {
                    rol: {
                        required: "Por favor ingrese el nombre del rol",
                        minlength: "El nombre del rol debe tener al menos 3 caracteres",
                        maxlength: "El nombre del rol no debe exceder los 50 caracteres"
                    }
                }
            });

            // Validar formulario de editar rol
            $('#editRoleForm').validate({
                rules: {
                    rol: {
                        required: true,
                        minlength: 3,
                        maxlength: 50
                    }
                },
                messages: {
                    rol: {
                        required: "Por favor ingrese el nombre del rol",
                        minlength: "El nombre del rol debe tener al menos 3 caracteres",
                        maxlength: "El nombre del rol no debe exceder los 50 caracteres"
                    }
                }
            });
        });
    </script>

<head>
    <!-- Incluir jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <!-- Incluir Bootstrap JS (si no lo has hecho ya) -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</head>

<!-- SCRIPT PARA ELIMINAR ROL -->

<!-- Scripts -->
<script>
    $(document).ready(function() {
        // Capturar el ID del rol a eliminar y asignarlo al formulario de eliminación
        $('#confirmDeleteModal').on('show.bs.modal', function (event) {
            var button = $(event.relatedTarget);
            var id_rol = button.data('id');
            var modal = $(this);
            modal.find('#delete-rol-id').val(id_rol);
        });

        // Actualizar 'Modificado Por' al abrir el modal de editar
        $('#editRoleModal').on('show.bs.modal', function (event) {
            var button = $(event.relatedTarget);
            var id_rol = button.data('id');
            // Asegúrate de que la función actualizarModificadoPor está definida y es accesible
            if (typeof actualizarModificadoPor === 'function') {
                actualizarModificadoPor(id_rol);
            } else {
                console.error('La función actualizarModificadoPor no está definida.');
            }
            // Resto del código para mostrar datos en el modal de editar
            // ...
        });
    });
</script>

</body>
</html>
