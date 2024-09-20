<?php
include_once 'conexion_db/Conexion.php';
include_once 'modelo/Producto.php';
include_once 'modelo/ProductoManager.php';
include_once 'controlador/apiController.php';

try{
    $conexion = new Conexion();
    $productoManager = new ProductoManager($conexion);
    $productos = $productoManager->todosLosProductos();
    $mensaje_exito = isset($_SESSION['mensaje_exito']) ? $_SESSION['mensaje_exito'] : null;
    $mensaje_error = isset($_SESSION['mensaje_error']) ? $_SESSION['mensaje_error'] : null;
}catch(Exception $exception){
    $mensaje_error = $exception->getMessage();
}

unset($_SESSION['mensaje_exito'], $_SESSION['mensaje_error']);

$apiController = new ApiController();

if($mensaje_exito == null && $mensaje_error == null){    
    $mensaje_api1 = $apiController->meowfacts();
    $mensaje_api2 = $apiController->meowfacts();
}

require 'vistas/inicioListaProductosView.php';

?>