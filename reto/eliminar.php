<?php

include "config/database.php";

$id = $_REQUEST['id'];

$sql = "DELETE FROM productos WHERE id = $id";

$resultado =$conexion -> query($sql);

if ($resultado) {
    header("Location: Index.php");
} else {
    echo "No se elimino el dato";
}
