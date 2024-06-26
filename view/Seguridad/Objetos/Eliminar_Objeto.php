<?php
session_start();
$conn = new mysqli("localhost", "root", "", "proyectodes");

if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

$id_objeto = $_POST['id_objeto'];

$sql = "DELETE FROM tbl_ms_objetos WHERE id_objeto = ?";

if ($stmt = $conn->prepare($sql)) {
    $stmt->bind_param("i", $id_objeto);

    if ($stmt->execute()) {
        header("Location: ../../Seguridad/Objetos.php?mensaje=eliminado");
    } else {
        header("Location: ../../Seguridad/Objetos.php?mensaje=error");
    }

    $stmt->close();
}

$conn->close();
?>
