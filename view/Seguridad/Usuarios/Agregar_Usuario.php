<?php
// Iniciar la sesión
session_start();

// Conexión a la base de datos
$conn = new mysqli("localhost", "root", "", "proyectodes");

// Verificar la conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}
// Obtener los datos del formulario
$num_identidad = $_POST['num_identidad'];
$direccion_1 = $_POST['direccion_1'];
$usuario = $_POST['usuario'];
$correo_electronico = $_POST['correo_electronico'];
$nombre_usuario = $_POST['nombre_usuario'];
$estado_usuario = $_POST['estado_usuario'];
$contrasena = $_POST['contrasena'];
$id_rol = $_POST['id_rol'];
$creado_por = $_POST['creado_por'];

// Hashear la contraseña
$hashed_password = password_hash($contrasena, PASSWORD_DEFAULT);

// Insertar los datos en la base de datos
$sql = "INSERT INTO tbl_ms_usuario (NUM_IDENTIDAD, DIRECCION_1, USUARIO, CORREO_ELECTRONICO, NOMBRE_USUARIO, ESTADO_USUARIO, CONTRASENA, ID_ROL, CREADO_POR) VALUES ('$num_identidad', '$direccion_1', '$usuario', '$correo_electronico','$nombre_usuario', '$estado_usuario', '$hashed_password', '$id_rol', '$creado_por')";

if ($conn->query($sql) === TRUE) {
    echo "Usuario agregado exitosamente";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}


// Cerrar la conexión
$conn->close();

// Redirigir de vuelta a la página principal
header("Location: ../../Seguridad/Usuarios.php");

exit();
?>
