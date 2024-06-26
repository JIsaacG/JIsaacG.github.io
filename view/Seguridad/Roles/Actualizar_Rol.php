<?php
// Iniciar la sesión
session_start();

// Conexión a la base de datos
$conn = new mysqli("localhost", "root", "", "proyectodes");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtener los datos del formulario
    $id_rol = $_POST["id_rol"];
    $rol = $_POST["rol"];
    $descripcion = $_POST["descripcion"];
    
    // Obtener el ID del usuario que está realizando la modificación
    if (isset($_SESSION["ID_USUARIO"])) {
        $id_usuario_modificador = $_SESSION["ID_USUARIO"];
    } else {
        // Manejar el caso en que no se ha iniciado sesión o no se tiene el ID de usuario
        echo "No se ha iniciado sesión o no se encontró el ID del usuario.";
        exit();
    }
    
    // Preparar la consulta SQL
    $sql = "UPDATE tbl_ms_roles SET ROL = ?, DESCRIPCION = ?, FECHA_MODIFICACION = NOW(), MODIFICADO_POR = ? WHERE ID_ROL = ?";
    
    // Preparar la declaración
    $stmt = $conn->prepare($sql);
    
    if ($stmt) {
        // Vincular los parámetros
        $stmt->bind_param("ssii", $rol, $descripcion, $id_usuario_modificador, $id_rol);
        
        // Ejecutar la declaración
        if ($stmt->execute()) {
            // Éxito al actualizar el rol
            header("Location: ../../Seguridad/Roles.php");
            exit();
        } else {
            // Error al ejecutar la declaración SQL
            echo "Error al actualizar el rol: " . $stmt->error;
        }
    } else {
        // Error en la preparación de la declaración SQL
        echo "Error en la preparación de la consulta: " . $conn->error;
    }
    
    // Cerrar la conexión
    $stmt->close();
    $conn->close();
} else {
    // Redireccionar si se intenta acceder directamente a este script sin un POST
    //header("Location: ../../Seguridad/Roles.php");
    exit();
}
?>
