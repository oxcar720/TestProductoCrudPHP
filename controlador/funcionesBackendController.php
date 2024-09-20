<?php
class FuncionesBackend{
    public function obtenerTodosLosProductos(){
        include_once __DIR__ . '/../conexion_db/Conexion.php';
        include_once __DIR__ . '/../modelo/Producto.php';
        include_once __DIR__ . '/../modelo/ProductoManager.php';
        $conexion = new Conexion();
        $productoManager = new ProductoManager($conexion);
        $lista_productos  = $productoManager->todosLosProductos();
        return $lista_productos;
    }
    function obtenerConbinacionesPorValor($valor){
        $combinaciones=[];
        $lista_productos = $this->obtenerTodosLosProductos();
        $productos_usables=[];
        foreach ($lista_productos as $pro){
            if($pro->getPrecio()<$valor){
                $productos_usables[]= $pro;
            }
        }
        for ($i = 0; $i<count($productos_usables); $i++){
            for ($j = $i + 1; $j<count($productos_usables); $j++){
                $suma2 = $productos_usables[$i]->getPrecio() + $productos_usables[$j]->getPrecio();
                if($suma2<=$valor){
                    $combinaciones[] = [$productos_usables[$i]->getNombre(), $productos_usables[$j]->getNombre(), $suma2];
                }
                for ($k = $j + 1; $k < count($productos_usables); $k++){
                    $suma3 = $productos_usables[$i]->getPrecio() + $productos_usables[$j]->getPrecio() + $productos_usables[$k]->getPrecio();
                    if ($suma3 <= $valor){
                        $combinaciones[] = [$productos_usables[$i]->getNombre(), $productos_usables[$j]->getNombre(), $productos_usables[$k]->getNombre(), $suma3];
                    }
                }
            }
        }
        return $combinaciones;
    }
}
$fun_back = new FuncionesBackend();
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['accion']) && $_POST['accion']=="ejecutar_funcion" && isset($_POST['valor'])) {
        $lista_convinaciones=$fun_back->obtenerConbinacionesPorValor($_POST['valor']);
    }
}else{
    $productos = $fun_back->obtenerTodosLosProductos();
}

require __DIR__ . '/../vistas/funcionesBackendView.php';
?>