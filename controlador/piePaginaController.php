<?php 
include_once 'controlador/apiController.php';
$apiController = new ApiController();
$datoInutil = $apiController->datoInutilDelDia();
require 'vistas/piePagina.php';
?>