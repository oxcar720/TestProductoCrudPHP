<?php
class Producto {
    private $id;
    private $nombre;
    private $descripcion;
    private $precio;
    private $stock;

    public function getId() { return $this->id; }
    public function setId($id) { $this->id = $id; }
    public function getNombre() { return $this->nombre; }
    public function setNombre($nombre) { $this->nombre = $nombre; }
    public function getDescripcion() { return $this->descripcion; }
    public function setDescripcion($descripcion) { $this->descripcion = $descripcion; }
    public function getPrecio() { return $this->precio; }
    public function setPrecio($precio) { $this->precio = $precio; }
    public function getStock() { return $this->stock; }
    public function setStock($stock) { $this->stock = $stock; }
    public function getTotalInventario(){return ($this->precio*$this->stock);}
    
}
?>
