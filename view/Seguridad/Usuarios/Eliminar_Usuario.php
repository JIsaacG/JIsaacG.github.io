<?php
// Iniciar la sesión
session_start();

// Conexión a la base de datos
$conn = new mysqli("localhost", "root", "", "proyectodes");

// Obtener el ID del rol desde el formulario
$id_usuario = $_POST['id_usuario'];

// Preparar la consulta SQL para eliminar el rol
$sql = "DELETE FROM tbl_ms_usuario WHERE id_usuario = ?";

if ($stmt = $conn->prepare($sql)) {
    $stmt->bind_param("i", $id_usuario);
    
    if ($stmt->execute()) {
        // Redirigir a la página de roles con un mensaje de éxito
        header("Location: ../../Seguridad/Usuarios.php?mensaje=eliminado");
        //header("Location: ../../Seguridad/Roles.php");

    } else {
        // Redirigir a la página de roles con un mensaje de error
        header("Location: ../../Seguridad/Usuarios.php?mensaje=error");
    }

    // Cerrar la declaración
    $stmt->close();
}

// Cerrar la conexión
$conn->close();
?>
