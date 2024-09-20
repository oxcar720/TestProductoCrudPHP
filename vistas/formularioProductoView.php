<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://getbootstrap.com/docs/5.3/assets/css/docs.css" rel="stylesheet">
    
    <title><?php echo (isset($producto) && $producto)? 'Editar Producto': 'Agregar Producto'; ?></title>
</head>
<body>
    <div class="container mt-5">
        <h1 class="text-center mb-4"><?php echo (isset($producto) && $producto)? 'Editar Producto': 'Agregar Producto'; ?></h1>
    </div>
    <div class="position-absolute top-50 start-50 translate-middle" style="width: 400px;">
        <form method="POST" action="/controlador/ProductoController.php" enctype="multipart/form-data" autocomplete="off"> 
            <?php
                if(isset($producto) && $producto){
                    echo "<input type='hidden' name='accion' value='editar'>"; 
                    echo "<input type='hidden' name='id' value='".$producto->getId()."'>"; 
                }else{
                    echo "<input type='hidden' name='accion' value='agregar'>"; 
                }
            ?>
            
            <div class="mb-3">
                <label for="nombre" class="form-label">Nombre</label>
                <input type="text" class="form-control" id="nombre" name="nombre" required 
                    <?php if(isset($producto) && $producto) echo "value=".$producto->getNombre(); ?>
                >
            </div>
            <div class="mb-3">
                <label for="descripcion" class="form-label">Descripción</label>
                <textarea class="form-control" id="descripcion" name="descripcion" rows="3" required><?php if(isset($producto) && $producto) echo $producto->getDescripcion(); ?></textarea>
            </div>
            <div class="mb-3">
                <label for="precio" class="form-label">Precio</label>
                <input type="number" class="form-control" id="precio" name="precio" step="0.01" required
                    <?php if(isset($producto) && $producto) echo "value=".$producto->getPrecio(); ?>
                >
            </div>
            <div class="mb-3">
                <label for="stock" class="form-label">Stock</label>
                <input type="number" class="form-control" id="stock" name="stock" required 
                    <?php if(isset($producto) && $producto) echo "value=".$producto->getStock(); ?>
                >
            </div>
            <div class="d-flex justify-content-between">
                <?php 
                    if ($editar)
                        echo "<button type='submit' class='btn btn-primary'>Actualizar Producto</button>";
                    else
                        echo "<button type='submit' class='btn btn-primary'>Agregar Producto</button>";  
                ?>
                <a href="javascript:window.history.back();" class="btn btn-secondary">Cancelar</a>
            </div>
        </form>
    </div>
    
</body>
</html>
