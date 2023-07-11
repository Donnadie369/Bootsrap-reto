<?php
    include "config/database.php";
    $producto = $_POST["nombre"];
    $precio = $_POST["precio"];
    $imagen = addslashes(file_get_contents($_FILES['imagen']['tmp_name']));

    $sql = "INSERT INTO `productos` (nombre, precio, imagen) VALUES ('$producto','$precio','$imagen')"; 

    $resultado = $conexion -> query($sql);

    if ($resultado) {
        header('Location: index.php');
    } else {
        echo "No se insertaron los datos";
    }
