<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Borrar Producto</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h1 class="text-center">¿Seguro que deseas eliminar este producto?</h1>
        <p class="text-center">El producto será eliminado permanentemente.</p>

        <div class="position-relative" style="width: 500px; right: -350px;">
            <?php 
                if (isset($producto)){
                    echo '<p>Nombre: '.$producto->getNombre().'</p>';
                    echo '<p>Descripción: '.$producto->getDescripcion().'</p>';
                    echo '<p>Precio: '.$producto->getPrecio().'</p>';
                    echo '<p>Stock: '.$producto->getStock().'</p>';
                }
            ?>
        </div>
        
        <div class="text-center">
            <form method="POST" action="/controlador/ProductoController.php">
                <input type='hidden' name='accion' value='eliminar'>
                <input type="hidden" name="id" value="<?php echo $producto->getId(); ?>">
                <input type="hidden" name="nombre" value = "<?php echo $producto->getNombre(); ?>";>
                <button type="submit" class="btn btn-danger">Eliminar Producto</button>
                <a href="/" class="btn btn-primary">Cancelar</a>
            </form>
        </div>
    </div>

    <script src="/vistas/js/borrarProducto.js"></script>
</body>
</html>
