<?php



include "config/database.php";

$id = $_REQUEST['idEdit'];

$nombre = $_POST['nombre'];
$precio = $_POST['precio'];

// Verificar si el archivo se ha subido correctamente
if ($_FILES['imagen']['error'] === UPLOAD_ERR_OK) {
    $imagen = addslashes(file_get_contents($_FILES['imagen']['tmp_name']));
} else {
    // Manejar el error de carga del archivo
    echo "Error al cargar el archivo de imagen.";
    exit;
}

$sql = "UPDATE productos SET
nombre = '$nombre',
precio = '$precio',
imagen = '$imagen' WHERE id = $id";

$resultado = $conexion-> query($sql);

if ($resultado) {
    header('Location: index.php');
} else {
    echo "No se editó el dato";
}
