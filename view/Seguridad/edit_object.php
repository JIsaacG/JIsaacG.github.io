<?php
// Iniciar la sesión
session_start();

// Conexión a la base de datos
$conn = new mysqli("localhost", "root", "", "proyectodes");

// Verificar la conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

// Obtener datos del formulario
$id_objeto = $_POST['id_objeto'];
$objeto = $_POST['objeto'];
$tipo_objeto = $_POST['tipo_objeto'];
$descripcion = $_POST['descripcion'];
$creado_por = $_POST['creado_por'];

// Obtener el id_usuario de la sesión
$id_usuario = $_SESSION['id_usuario'];

// Actualizar la base de datos
$sql = "UPDATE tbl_ms_objetos SET 
            objeto='$objeto', 
            tipo_objeto='$tipo_objeto', 
            descripcion='$descripcion', 
            creado_por='$creado_por',
            modificado_por='$id_usuario'
        WHERE id_objeto='$id_objeto'";

if ($conn->query($sql) === TRUE) {
    echo "Registro actualizado correctamente";
} else {
    echo "Error al actualizar el registro: " . $conn->error;
}

// Cerrar la conexión
$conn->close();

// Redirigir de vuelta a la página principal
header("Location: objetos.php");
exit();
?>
