<?php
class ProductoManager {
    private $conexion;

    public function __construct($conexion){
        $this->conexion = $conexion;
    }

    public function todosLosProductos(){
        $sql = "CALL consultarTodosLosProductos;";
        $result = $this->conexion->ejecutarConsulta($sql);
        $productos=[];
        if ($result){
            while ($row = $result->fetch_assoc()){
                $producto = $this->helperRowProducto($row);
                $productos[]=$producto;
            }
        }
        return $productos;
    }

    public function buscarProductoPorId($id){
        $sql = "CALL buscarProductoId(".$id.")";
        $result = $this->conexion->ejecutarConsulta($sql);
        if ($result && $result->num_rows > 0) {
            $row = $result->fetch_assoc();
            $producto = $this->helperRowProducto($row);
            return $producto;
        } else {
            return null;
        }
    }

    private function helperRowProducto($row){
        $producto = new Producto();
        $producto->setId($row['id']);
        $producto->setNombre($row['nombre']);
        $producto->setDescripcion($row['descripcion']);
        $producto->setPrecio($row['precio']);
        $producto->setStock($row['stock']);
        return $producto;
    }

    public function guardarNuevoProducto($nombre, $descripcion, $precio, $stock){
        $sql = "CALL registrarNuevoProducto('$nombre', '$descripcion', $precio, $stock)";
        return $this->conexion->ejecutarSql($sql);
    }

    public function actualizarProducto($producto) {
        $id = $producto->getId();
        $nombre = $producto->getNombre();
        $descripcion = $producto->getDescripcion();
        $precio = $producto->getPrecio();
        $stock = $producto->getStock();
        $sql = "CALL actualizarProducto($id, '$nombre', '$descripcion', $precio, $stock)";
        return $this->conexion->ejecutarSql($sql);
    }

    public function agregarProducto($producto) {
        $nombre = $producto->getNombre();
        $descripcion = $producto->getDescripcion();
        $precio = $producto->getPrecio();
        $stock = $producto->getStock();
        $sql = "CALL registrarNuevoProducto('$nombre', '$descripcion', $precio, $stock)";
        return $this->conexion->ejecutarSql($sql);
    }

    public function eliminarProducto($id){
        $sql = "CALL eliminarProducto($id)";
        return $this->conexion->ejecutarSql($sql);
    }
}
?>
