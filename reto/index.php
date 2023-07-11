<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>RETO</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="css/estilo.css">
</head>

<body>
    
    <div class="container">
        <br>
        <center>
            <H1>Productos</H1>
        </center>
        <br>
        <button type="button" class="btn btn-dark" data-bs-toggle="modal" data-bs-target="#exampleModal" data-bs-whatever="@mdo">Agregar producto</button>

        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Nuevo Producto</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form method="POST" action="agregar.php" enctype="multipart/form-data">
                            <div class="mb-3">
                                <label for="nombre" class="col-form-label">Nombre:</label>
                                <input type="text" class="form-control" id="nombre" name="nombre">
                            </div>
                            <div class="mb-3">
                                <label for="precio" class="col-form-label">Precio:</label>
                                <input type="text" class="form-control" id="precio" name="precio">
                            </div>
                            <div class="mb-3">
                                <label for="imagen" class="col-form-label">Imagen:</label>
                                <input type="file" class="form-control" id="imagen" name="imagen">
                            </div>
                            <div class="modal-footer">
                                <button type="submit" class="btn btn-primary">Agregar</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!--Contenido-->
    <main>
        <div class="container">
            <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 row-cols-md-4 g-3">
                <?php
                    include "config/database.php";

                    $sql = "SELECT * FROM productos";
                    $resultado = $conexion->query($sql);        
        
                    while ($fila = $resultado->fetch_assoc()) { ?>   

                    <div class="col">
                        <div class="card shadow-sm">
                            <img src="data:image/jpg;base64,<?php echo base64_encode($fila['imagen']); ?>">
                            <div class="card-body">
                                <h5 class="card-title"><?php echo $fila['nombre']; ?></h5>
                                <p class="card-text">S/ <?php echo number_format($fila['precio'], 2, '.', ','); ?></p>
                                <div class="d-flex justify-content-between align-items-center">
                            
                                    <!-- editar -->
                                    <a href="editar.php?id=<?php echo $fila["id"]?>" class="btn btn-success" id="editar">Editar</a>    
                                    <!-- eliminar -->
                                    <a onclick="return eliminar()" href="eliminar.php?id=<?php echo $fila["id"]?>" class="btn btn-warning" id="eliminar">Eliminar</a>

                                </div>
                            </div>
                        </div>
                    </div>
                <?php } ?>
            </div>
        </div>

    </main>

    <!-- Bootstrap js -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
    </script>
    
    <script>
        function eliminar(){
            var not = confirm("Estas seguro de eliminar?");
            return not;
        }
    </script>
</body>

</html>