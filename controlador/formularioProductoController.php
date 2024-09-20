<?php 
$editar=isset($_GET['id']);
if ($editar){
    include_once 'conexion_db/Conexion.php';
    include_once 'modelo/Producto.php';
    include_once 'modelo/ProductoManager.php';
    $conexion = new Conexion();
    $productoManager = new ProductoManager($conexion);
    $producto = $productoManager->buscarProductoPorId($_GET['id']);
}

require "vistas/formularioProductoView.php";
?>