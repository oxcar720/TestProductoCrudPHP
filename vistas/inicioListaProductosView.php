
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://getbootstrap.com/docs/5.3/assets/css/docs.css" rel="stylesheet">
    <link rel="stylesheet" href="/vistas/css/styles_general.css">
    
    <title>Lista Productos</title>
</head>
<body>
<div class="container">
    <div class="row">
        <?php
            if(isset($mensaje_exito)){
                echo "<div class='mensaje mensaje-exito'>$mensaje_exito</div>";
            }
            if(isset($mensaje_error)){
                echo "<div class='mensaje mensaje-error'>$mensaje_error</div>";
            }
            echo "<div class='contenedor_mensajes'>";
            if(isset($mensaje_api1)){
                echo "<div class='mensaje_api mensaje-api'>$mensaje_api1</div>";
            }
            if(isset($mensaje_api2)){
                echo "<div class='mensaje_api mensaje-api'>$mensaje_api2</div>";
            }
            echo '</div>';
        ?>
        <div class="container mt-5">
            <h1 class="text-center mb-4">Productos Crud</h1>
        </div>
        <div class="container text-center">
            <div class="row">
                <div class="col">
                    <button id="btn-actualizar" class="btn btn-primary" onclick="window.location.reload();">Actualizar lista</button>
                </div>
                <div class="col">
                    <button id="btn-editar" class="btn btn-primary" disabled>Editar</button>
                </div>
                <div class="col">
                    <button id="btn-borrar" class="btn btn-primary" disabled>Borrar Producto</button>
                </div>
                <div class="col">
                    <button id="btn-agregar" class="btn btn-primary" onclick="window.location.href = `/agregar`;">Agregar Producto</button>
                </div>
                <div class="col">
                    <button id="btn-agregar" class="btn btn-success px-3" onclick="window.location.href = `/funcionBackendOrdenamiento`;">Funcion backend</button>
                </div>
            </div>
        </div>
        
        <table class="table table-primary table-striped table-hover table-bordered">
            <thead>
                <tr>
                    <th>id</th>
                    <th>Nombre</th>
                    <th>Descripción</th>
                    <th>Precio</th>
                    <th>Stock</th>
                    <th>Valor total del inventario</th>
                </tr>
            </thead>
            <tbody id="product-table-body">
                <?php 
                    foreach ($productos as $pro){
                        echo '
                            <tr class="selectable" data-id="'.$pro->getId().'">
                                <td>'.$pro->getId().'</td>
                                <td>'.$pro->getNombre().'</td>
                                <td>'.$pro->getDescripcion().'</td>
                                <td>$'.$pro->getPrecio().'</td>
                                <td>'.$pro->getStock().'</td>
                                <td class="total_inventario">$'.($pro->getTotalInventario()).'</td>
                            </tr>
                        ';
                    }
                ?>
            </tbody>
        </table>
    </div>
</div>
    <script src="/vistas/js/productos.js"></script>
    <script src="/vistas/js/mensajesServidor.js"></script>
    <?php require "controlador/piePaginaController.php"; ?>
</body>
</html>
