<?php

//FALTA CREAR LA VARIABLE DE SESION Y QUE ME TRAIGA EL ID DEL USUARIO QUE ESTA LOGEADO//


$servername = "localhost"; // Cambiar según tu configuración
$username = "root";        // Cambiar según tu configuración
$password = "";            // Cambiar según tu configuración
$dbname = "proyectodes";   // Cambiar según tu configuración

// Crear conexión
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

$sql = "SELECT id_usuario FROM tbl_ms_usuario WHERE id_usuario = 1"; // Cambia la consulta según tu necesidad

/* $sql ="SELECT u.ID_USUARIO, o.ID_OBJETO
FROM tbl_ms_usuario u
JOIN tbl_ms_objetos o ON u.ID_USUARIO = o.ID_OBJETO
WHERE u.ID_USUARIO = 1;"; */


$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    echo json_encode($row);
} else {
    echo json_encode(["error" => "Usuario no encontrado"]);
}

$conn->close();
?>
