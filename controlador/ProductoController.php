<?php 
class ProductoController{
    
    private $conexion;
    private $productoManager;

    public function __construct() {
        include_once '../conexion_db/Conexion.php';
        include_once '../modelo/Producto.php';
        include_once '../modelo/ProductoManager.php';
        $this->conexion = new Conexion();
        $this->productoManager = new ProductoManager($this->conexion);
    }

    public function editarProducto() {
        $id = $_POST['id'];
        $nombre = $_POST['nombre'];
        $descripcion = $_POST['descripcion'];
        $precio = $_POST['precio'];
        $stock = $_POST['stock'];
        session_start();
        if ($id && $nombre && $descripcion && $precio >= 0 && $stock >= 0) {
            $producto = new Producto();
            $producto->setId($id);
            $producto->setNombre($nombre);
            $producto->setDescripcion($descripcion);
            $producto->setPrecio($precio);
            $producto->setStock($stock);
            if ($this->productoManager->actualizarProducto($producto)) {
                $_SESSION['mensaje_exito'] = "Actualización exitosa";
            } else {
                $_SESSION['mensaje_error'] = "Hubo un error al intentar actualizar el producto ".$producto->getNombre()." con el id: ".$producto->getId();
            }
        } else {
            $_SESSION['mensaje_error'] = "Datos inválidos o faltantes.";
        }
        header("Location: /");
        exit();
    }

    public function agregarProducto() {
        $nombre = $_POST['nombre'];
        $descripcion = $_POST['descripcion'];
        $precio = $_POST['precio'];
        $stock = $_POST['stock'];
        session_start();
        if ($nombre && $descripcion && $precio >= 0 && $stock >= 0) {
            $producto = new Producto();
            $producto->setNombre($nombre);
            $producto->setDescripcion($descripcion);
            $producto->setPrecio($precio);
            $producto->setStock($stock);
            
            if ($this->productoManager->agregarProducto($producto)) {
                $_SESSION['mensaje_exito'] = "Registro Exitoso";
            } else {
                $_SESSION['mensaje_error'] = "Hubo un error al intentar insertar el producto ".$producto->getNombre();
            }
            header("Location: /");
        } else {
            $_SESSION['mensaje_error'] = "Datos inválidos o faltantes.";
        }
        exit();
    }

    public function eliminarProducto(){
        $id = $_POST['id'];
        $nombre = $_POST['nombre'];
        session_start();
        if($id){
            if ($this->productoManager->eliminarProducto($id)) {
                $_SESSION['mensaje_exito'] = "Eliminación Exitosa";
            } else {
                $_SESSION['mensaje_error'] = "Hubo un error al intentar eliminar el producto ".$nombre." con el id: ".$id;
            }    
        }else{
            $_SESSION['mensaje_error'] = "Hubo un error al intentar eliminar el producto, no hay id Seleccionado";
        }
        header("Location: /");
        exit();
    }

    
    
}
$controller = new ProductoController();
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['accion'])) {
        switch ($_POST['accion']) {
            case 'editar':
                $controller->editarProducto(
                    $_POST['id'],
                    $_POST['nombre'],
                    $_POST['descripcion'],
                    $_POST['precio'],
                    $_POST['stock']
                );
                break;
            case 'agregar':
                $controller->agregarProducto(
                    $_POST['nombre'],
                    $_POST['descripcion'],
                    $_POST['precio'],
                    $_POST['stock']
                );
                break;
            case 'eliminar':
                $controller->eliminarProducto();
                break;
        }
    }
}
?>