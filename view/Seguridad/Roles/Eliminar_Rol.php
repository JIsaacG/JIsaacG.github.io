<?php
// Iniciar la sesión
session_start();

// Conexión a la base de datos
$conn = new mysqli("localhost", "root", "", "proyectodes");

// Obtener el ID del rol desde el formulario
$id_rol = $_POST['id_rol'];

// Preparar la consulta SQL para eliminar el rol
$sql = "DELETE FROM tbl_ms_roles WHERE ID_ROL = ?";

if ($stmt = $conn->prepare($sql)) {
    $stmt->bind_param("i", $id_rol);
    
    if ($stmt->execute()) {
        // Redirigir a la página de roles con un mensaje de éxito
        header("Location: ../../Seguridad/Roles.php?mensaje=eliminado");
        //header("Location: ../../Seguridad/Roles.php");

    } else {
        // Redirigir a la página de roles con un mensaje de error
        header("Location: ../../Seguridad/Roles.php?mensaje=error");
    }

    // Cerrar la declaración
    $stmt->close();
}

// Cerrar la conexión
$conn->close();
?>
