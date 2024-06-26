<?php
// Iniciar la sesión
session_start();

// Conexión a la base de datos
$conn = new mysqli("localhost", "root", "", "proyectodes");

// Verificar la conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

// Obtener otros datos del formulario
$num_identidad = $_POST['num_identidad'];
$direccion_1 = $_POST['direccion_1'];
$usuario = $_POST['usuario'];
$correo_electronico = $_POST['correo_electronico'];
$nombre_usuario = $_POST['nombre_usuario'];
$estado_usuario = $_POST['estado_usuario'];
$id_rol = $_POST['id_rol'];

// Obtener el id_usuario de la sesión
$id_usuario = $_SESSION['id_usuario'];

// Actualizar la base de datos
$sql = "UPDATE tbl_ms_usuario SET 
NUM_IDENTIDAD='$num_identidad', 
DIRECCION_1='$direccion_1', 
USUARIO='$usuario', 
CORREO_ELECTRONICO='$correo_electronico', 
NOMBRE_USUARIO='$nombre_usuario',
ESTADO_USUARIO='$estado_usuario',
ID_ROL='$id_rol'
WHERE ID_USUARIO='$id_usuario'";

if ($conn->query($sql) === TRUE) {
    echo "Usuario actualizado correctamente";
} else {
    echo "Error al actualizar el usuario: " . $conn->error;
}

// Cerrar la conexión
$conn->close();

// Redirigir de vuelta a la página principal
header("Location: ../../Seguridad/Usuarios.php");
exit();
?>