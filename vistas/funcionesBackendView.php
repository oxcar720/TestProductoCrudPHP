
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://getbootstrap.com/docs/5.3/assets/css/docs.css" rel="stylesheet">
    <link rel="stylesheet" href="/vistas/css/styles_general.css">
    <link rel="stylesheet" href="/vistas/css/styles_backendFuncion.css">
    <title>Funciones BackEnd</title>
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
        ?>
        <div class="container mt-5">
            <h1 class="text-center mb-4">Conbinaciones de Productos por valor</h1>
        </div>

        <form method="post" action="<?php echo $_SERVER['REQUEST_URI']; ?>">
            <div class="container text-center">
                <div class="row">
                    <div class="col">
                        <input type='hidden' name='accion' value='ejecutar_funcion'> 
                        <input type="number" class="form-control" id="input_valor" name="valor" required>
                    </div>
                    <div class="col">
                        <button id="btn-ejecutar-funcion" class="btn btn-primary">Ejecutar Funcion</button>
                    </div>
                    <div class="col">
                        <a id="btn-agregar" class="btn btn-success px-3" onclick="window.location.href = `/funcionBackendOrdenamiento`;">Recargar</a>
                    </div>
                    <div class="col">
                        <a id="btn-agregar" class="btn btn-success px-3" onclick="window.location.href = `/`;">Volver al Crud</a>
                    </div>
                </div>
            </div>
        </form>
        <?php if(isset($productos)){?>
            <table class="table table-primary table-striped table-hover table-bordered">
                <thead>
                    <tr>
                        <th>id</th>
                        <th>Nombre</th>
                        <th>Descripción</th>
                        <th>Precio</th>
                        <th>Stock</th>
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
                                    <td>'.$pro->getPrecio().'</td>
                                    <td>'.$pro->getStock().'</td>
                                </tr>
                            ';
                        }
                    ?>
                </tbody>
            </table>
        <?php }else{?>
            <div class="divisor">
                <div class="seccion1">
                    <div class="container mt-5">
                        <h4 class="text-center mb-4">Vista BackEnd</h4>
                    </div>
                    <div class="consola">
                        <?php if (!empty($lista_convinaciones)): ?>
                            <?php $texto="";
                            foreach ($lista_convinaciones as $combinacion){
                                $texto=$texto."[".implode(", ", $combinacion)."],<br>";
                            }
                            ?>

                            <p>Combinaciones de productos:<br>[<br><?php echo $texto;?>]</p>
                            
                        <?php else: ?>
                            <p>No se encontraron combinaciones.</p>
                        <?php endif; ?>
                    </div>
                </div>
                

                <div class="seccion3">
                    <div class="container mt-5">
                        <h4 class="text-center mb-4">Vista FrontEnd</h4>
                    </div>
                    <table class="table-combinaciones">
                        <thead>
                            <tr>
                                <th>Producto 1</th>
                                <th>Producto 2</th>
                                <th>Producto 3</th>
                                <th>Total</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach($lista_convinaciones as $combinacion): ?>
                                <tr>
                                    <td><?php echo $combinacion[0]; ?></td>
                                    <td><?php echo $combinacion[1]; ?></td>
                                    <td><?php echo count($combinacion) == 3 ? $combinacion[2] : ''; ?></td>
                                    <td><?php echo $combinacion[count($combinacion) - 1]; ?></td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        <?php }?>
        
    </div>
</div>
<script src="/vistas/js/mensajesServidor.js"></script>
<?php require "controlador/piePaginaController.php"; ?>
</body>
</html>
