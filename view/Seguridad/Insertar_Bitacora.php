<?php
$servername = "localhost"; // Cambiar según tu configuración
$username = "root";        // Cambiar según tu configuración
$password = "";            // Cambiar según tu configuración
$dbname = "proyectodes"; // Cambiar según tu configuración

// Crear conexión
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id_usuario = $_POST['id_usuario'];
    $accion = $_POST['accion'];
    $descripcion = $_POST['descripcion'];
    $fecha_hora = date('Y-m-d H:i:s');

    $sql = "INSERT INTO tbl_ms_bitacora (id_usuario, fecha_hora, accion, descripcion) VALUES (?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    
    if (!$stmt) {
        die("Error al preparar la consulta: " . $conn->error);
    }
    
    $stmt->bind_param("ssss", $id_usuario, $fecha_hora, $accion, $descripcion);
    
    if ($stmt->execute()) {
        echo "Datos insertados en la bitácora.";
    } else {
        echo "Error al ejecutar la consulta: " . $stmt->error;
    }

    
    $stmt->close();
}

$conn->close();
?>
