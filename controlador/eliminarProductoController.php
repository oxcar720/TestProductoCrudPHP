<?php 
$borrar=isset($_GET['id']);
if ($borrar){
    include_once 'conexion_db/Conexion.php';
    include_once 'modelo/Producto.php';
    include_once 'modelo/ProductoManager.php';
    $conexion = new Conexion();
    $productoManager = new ProductoManager($conexion);
    $producto = $productoManager->buscarProductoPorId($_GET['id']);
    require 'vistas/borrarProductoView.php';
}else{
    require 'vistas/inicioListaProductosView.php';
}
?>