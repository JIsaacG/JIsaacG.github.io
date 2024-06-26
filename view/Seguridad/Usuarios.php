<?php

require_once("../../config/conexion.php");

if(isset($_SESSION['ID_USUARIO'])){
?>
<!doctype html>
<html lang="en" class="no-focus">
<head>
    <?php require_once("../MainHead/MainHead.php"); ?>
    <title>Usuarios</title>
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
                            <a class="align-middle link-effect text-primary-dark font-w600" href="be_pages_generic_profile.html">
<!--                             <span><?php echo $_SESSION["USUARIO"] ?> <?php echo $_SESSION["NOMBRE_USUARIO"] ?></span></a>
 -->                        </div>
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
            <h3 class="block-title">Menú Ingreso De Usuario <small></small></h3>
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
            <br>
            <br>
            <table class="table table-bordered table-striped table-vcenter">
                <thead>
                    <tr>
                        <th class="text-center">Id Usuario</th>
                        <th class="d-none d-sm-table-cell"># Identidad</th>
                        <th class="d-none d-sm-table-cell">Dirección</th>
                        <th class="d-none d-sm-table-cell">Usuario</th>
                        <th class="d-none d-sm-table-cell">Correo</th>
                        <th class="d-none d-sm-table-cell">Nombre Usuario</th>
                        <th class="d-none d-sm-table-cell">Estado Usuario</th>
                        <th class="d-none d-sm-table-cell">Id Rol</th>
                        <th class="d-none d-sm-table-cell">Fecha Creación</th>
                        <th class="d-none d-sm-table-cell">Creado Por</th>
                        <th class="text-center" style="width: 15%;">Editar Usuario</th>
                        <th class="text-center" style="width: 15%;">Eliminar Usuario</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    // Incluir el archivo de conexión
                    require_once("../../config/conexion.php");

                    // Crear una instancia de la clase Conectar
                    $conexion = new Conectar();

                    // Obtener la conexión PDO
                    $conn = $conexion->Conexion();

                    // Consulta a la base de datos 
                    $sql = "SELECT u.ID_USUARIO, 
                                   u.NUM_IDENTIDAD, 
                                   u.DIRECCION_1, 
                                   u.USUARIO, 
                                   u.CORREO_ELECTRONICO, 
                                   u.NOMBRE_USUARIO, 
                                   e.NOM_ESTADO AS ESTADO_USUARIO,  
                                   r.NOMBRE_ROL AS NOMBRE_ROL,          
                                   u.FECHA_CREACION, 
                                   c.NOMBRE_USUARIO AS CREADO_POR 
                            FROM tbl_ms_usuario u
                            INNER JOIN tbl_estado_usuario e ON u.ESTADO_USUARIO = e.ID_ESTADO
                            INNER JOIN tbl_rol r ON u.ID_ROL = r.ID_ROL
                            INNER JOIN tbl_ms_usuario c ON u.CREADO_POR = c.ID_USUARIO";

                    $result = $conn->query($sql);

                    // Verificar si hay resultados
                    if ($result !== false && $result->rowCount() > 0) {
                        // Iterar sobre los resultados
                        while($row = $result->fetch(PDO::FETCH_ASSOC)) {
                            echo "<tr>";
                            echo "<td>{$row['ID_USUARIO']}</td>";
                            echo "<td>{$row['NUM_IDENTIDAD']}</td>";
                            echo "<td>{$row['DIRECCION_1']}</td>";
                            echo "<td>{$row['USUARIO']}</td>";
                            echo "<td>{$row['CORREO_ELECTRONICO']}</td>";
                            echo "<td>{$row['NOMBRE_USUARIO']}</td>";
                            echo "<td>{$row['ESTADO_USUARIO']}</td>";
                            echo "<td>{$row['NOMBRE_ROL']}</td>";
                            echo "<td>{$row['FECHA_CREACION']}</td>";
                            echo "<td>{$row['CREADO_POR']}</td>";
                            echo "<td class='text-center'>
                                    <button type='button' class='btn btn-sm btn-secondary' data-toggle='tooltip' title='Editar Usuario'>
                                        <i class='fa fa-pencil'></i>
                                    </button>
                                  </td>";
                            echo "<td class='text-center'>
                                    <button type='button' class='btn btn-sm btn-danger' data-toggle='tooltip' title='Eliminar Usuario'>
                                        <i class='fa fa-trash'></i>
                                    </button>
                                  </td>";
                            echo "</tr>";
                        }
                    } else {
                        echo "<tr><td colspan='12' class='text-center'>No hay datos disponibles</td></tr>";
                    }

                    // Cerrar la conexión
                    $conn = null; // Cerrar la conexión PDO
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

        </main>

        <?php require_once("../MainFooter/MainFooter.php"); ?>

        <!-- Modal para agregar usuarios -->
        <div class="modal fade" id="addUserModal" tabindex="-1" role="dialog" aria-labelledby="addUserModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="addUserModalLabel">Añadir Usuario</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form id="addUserForm" method="POST" action="../Seguridad/Usuarios/Agregar_Usuario.php">
                            <div class="form-group">
                                <label for="num_identidad">Número de Identidad</label>
                                <input type="text" class="form-control" id="num_identidad" name="num_identidad" placeholder="0801199923672" required>
                            </div>
                            <div class="form-group">
                                <label for="direccion_1">Dirección</label>
                                <input type="text" class="form-control" id="direccion_1" name="direccion_1" required>
                            </div>
                            <div class="form-group">
                                <label for="usuario">Usuario</label>
                                <input type="text" class="form-control" id="usuario" name="usuario" required>
                            </div>
                            <div class="form-group">
                                <label for="correo_electronico">Correo</label>
                                <input type="email" class="form-control" id="correo_electronico" name="correo_electronico" required>
                                <div id="emailError" style="color:red; display:none;">Por favor, ingrese un correo electrónico válido.</div>
                            </div>
                            <div class="form-group">
                                <label for="nombre_usuario">Nombre Usuario</label>
                                <input type="text" class="form-control" id="nombre_usuario" name="nombre_usuario" required>
                            </div>
                            <input type="hidden" id="estado_usuario" name="estado_usuario" value="1">
                            <div class="form-group">
                                <label for="contrasena">Contraseña</label>
                                <input type="password" class="form-control" id="contrasena" name="contrasena" required>
                                <div id="passwordError" style="color:red; display:none;">La contraseña debe tener al menos 8 caracteres, incluyendo una letra mayúscula, una letra minúscula y un número.</div>
                            </div>
                            <div class="form-group">
                                <label for="id_rol">ID Rol</label>
                                <select class="form-control" id="id_rol" name="id_rol" required>
                                    <option value="0" style="font-weight:bold">Seleccionar Rol</option>
                                    <option value="1">Administrador</option>
                                    <option value="2">Secretaria</option>
                                    <option value="3">Auxiliar De Control Documental</option>
                                    <option value="4">Encargado Del CES</option>
                                    <option value="5">Encargado Del CTC</option>
                                    <option value="6">Analista Curricular</option>
                                    <option value="7">Jefes Departamento</option>
                                    <option value="8">Encargado De Digitalización</option>
                                    <option value="9">Instituto De Educacion Superior</option>
                                    <option value="10">Consejales</option>
                                </select>
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
                            <button type="submit" class="btn btn-primary">Añadir</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
     
        <!-- Modal para editar usuarios -->
        <div class="modal fade" id="editUserModal" tabindex="-1" role="dialog" aria-labelledby="editUserModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editUserModalLabel">Editar Usuario</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="editUserForm" method="POST" action="../Seguridad/Usuarios/Editar_Usuario.php">
                    <input type="hidden" id="edit_id_usuario" name="id_usuario">
                    <input type="hidden" id="edit_id_rol" name="id_rol">

                    <div class="form-group">
                        <label for="edit_num_identidad">Número de Identidad</label>
                        <input type="text" class="form-control" id="edit_num_identidad" name="num_identidad" required>
                    </div>
                    <div class="form-group">
                        <label for="edit_direccion_1">Dirección</label>
                        <input type="text" class="form-control" id="edit_direccion_1" name="direccion_1" required>
                    </div>
                    <div class="form-group">
                        <label for="edit_usuario">Usuario</label>
                        <input type="text" class="form-control" id="edit_usuario" name="usuario" required>
                    </div>
                    <div class="form-group">
                        <label for="edit_correo_electronico">Correo Electrónico</label>
                        <input type="email" class="form-control" id="edit_correo_electronico" name="correo_electronico" required>
                    </div>
                    <div class="form-group">
                        <label for="edit_nombre_usuario">Nombre Usuario</label>
                        <input type="text" class="form-control" id="edit_nombre_usuario" name="nombre_usuario" required>
                    </div>
                    <div class="form-group">
                            <label for="edit_estado_usuario">Estado Usuario</label>
                            <input type="text" class="form-control" id="edit_estado_usuario_select" name="estado_usuario" readonly>
                            </div>
                    <div class="form-group">
                        <label for="edit_estado_usuario">Seleccionar Nuevo Estado</label>
                        <select class="form-control" id="edit-edit_estado_usuario" name="estado_usuario" required>
                            <option value="0" style="font-weight:bold">Seleccionar Estado</option>
                            <?php
                            // Incluir el archivo de conexión a la base de datos
                            include("../../config/conexion.php");
                            // Consulta a la base de datos para obtener roles
                            $sql_roles = "SELECT id_estado, nom_estado FROM tbl_estado_usuario";
                            $result_roles = $conn->query($sql_roles);
                            // Verificar si hay resultados
                            if ($result_roles->num_rows > 0) {
                                // Iterar sobre los resultados
                                while ($row = $result_roles->fetch_assoc()) {
                                    echo "<option value='" . $row["id_estado"] . "'>" . $row["nom_estado"] . "</option>";
                                }
                            }
                            // Cerrar la conexión
                            $conn->close();
                            ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="edit_id_rol">Rol</label>
                        <input type="text" class="form-control" id="edit_id_rol_view" name="id_rol" readonly>
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
                                while ($row = $result_roles->fetch_assoc()) {
                                    echo "<option value='" . $row["id_rol"] . "'>" . $row["nombre_rol"] . "</option>";
                                }
                            }
                            // Cerrar la conexión
                            $conn->close();
                            ?>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary">Guardar Cambios</button>
                </form>
            </div>
        </div>
    </div>
</div>

        <!-- Modal de confirmación para eliminar usuario -->
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
                        <p>¿Estás seguro de que deseas eliminar este usuario?</p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                        <form id="deleteUserForm" method="POST" action="../Seguridad/Usuarios/Eliminar_Usuario.php">
                            <input type="hidden" id="delete_id_usuario" name="id_usuario">
                            <button type="submit" class="btn btn-danger">Eliminar</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php require_once("../MainJs/MainJs.php"); ?>
    <script>
        $('#editUserModal').on('show.bs.modal', function (event) {
            var button = $(event.relatedTarget);
            var id = button.data('edit_id_usuario');
            var num_identidad = button.data('num_identidad');
            var direccion_1 = button.data('direccion_1');
            var usuario = button.data('usuario');
            var correo_electronico = button.data('correo_electronico');
            var nombre_usuario = button.data('nombre_usuario');
            var estado_usuario = button.data('estado_usuario');
            var id_rol = button.data('id_rol');
            var creado_por = button.data('creado_por');
            var modal = $(this);
            modal.find('#edit_id_usuario').val(id);
            modal.find('#edit_num_identidad').val(num_identidad);
            modal.find('#edit_direccion_1').val(direccion_1);
            modal.find('#edit_usuario').val(usuario);
            modal.find('#edit_correo_electronico').val(correo_electronico);
            modal.find('#edit_nombre_usuario').val(nombre_usuario);
            modal.find('#edit_estado_usuario').val(estado_usuario);
            modal.find('#edit_id_rol').val(id_rol);
            modal.find('#edit_creado_por').val(creado_por);
            modal.find('#edit_id_rol_view').val(id_rol);
            modal.find('#edit_id_rol_view').val(id_rol);
            modal.find('#edit_estado_usuario_select').val(estado_usuario);
        });

        $('#confirmDeleteModal').on('show.bs.modal', function (event) {
            var button = $(event.relatedTarget);
            var id = button.data('id');

            var modal = $(this);
            modal.find('#delete_id_usuario').val(id);
        });
    </script>
</body>
</html>
<?php
}else{
    header("Location: " . Conectar::ruta() . "index.php");

}
?>