<?php
class Producto {
    private $nombre;
    private $precio;

    public function __construct($nombre, $precio) {
        if ($precio <= 0) {
            throw new Exception("El precio debe ser positivo.");
        }
        $this->nombre = $nombre;
        $this->precio = $precio;
    }

    public function getNombre() {
        return $this->nombre;
    }

    public function getPrecio() {
        return $this->precio;
    }
}
