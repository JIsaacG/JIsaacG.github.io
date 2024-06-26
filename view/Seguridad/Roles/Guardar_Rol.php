<?php
// Iniciar la sesión
session_start();

// Conexión a la base de datos
$conn = new mysqli("localhost", "root", "", "proyectodes");

// Verificar la conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

    $rol = $_POST["rol"];
    $descripcion = $_POST["descripcion"];
    $creado_por = $_POST["creado_por"];

    // Consulta SQL para insertar el nuevo rol
    $sql = "INSERT INTO tbl_ms_roles (ROL, DESCRIPCION, CREADO_POR) VALUES ('$rol', '$descripcion', '$creado_por')";
   
    if ($conn->query($sql) === TRUE) {
        echo "Usuario agregado exitosamente";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
 


// Cerrar la conexión
$conn->close();

// Redirigir de vuelta a la página principal
header("Location: ../../Seguridad/Roles.php");

exit();
?>