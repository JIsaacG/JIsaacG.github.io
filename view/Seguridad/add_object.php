<?php
// Conexión a la base de datos
$conn = new mysqli("localhost", "root", "", "proyectodes");

// Verificar la conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

// Obtener los datos del formulario
$objeto = $_POST['objeto'];
$tipo_objeto = $_POST['tipo_objeto'];
$descripcion = $_POST['descripcion'];
$creado_por = $_POST['creado_por'];
$fecha_creacion = date('Y-m-d H:i:s'); // Fecha y hora actual

// Insertar los datos en la base de datos
$sql = "INSERT INTO tbl_ms_objetos (objeto, tipo_objeto, descripcion, fecha_creacion, creado_por) VALUES ('$objeto', '$tipo_objeto', '$descripcion', '$fecha_creacion', '$creado_por')";

if ($conn->query($sql) === TRUE) {
    echo "Nuevo objeto añadido correctamente";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

// Cerrar la conexión
$conn->close();

// Redirigir de vuelta a la página principal
header("Location: index.php");

exit();
?>
