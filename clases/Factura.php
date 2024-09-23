<?php
require_once 'Cliente.php';
require_once 'Producto.php';

class Factura {
    private $cliente;
    private $productos = [];

    public function __construct(Cliente $cliente) {
        $this->cliente = $cliente;
    }

    public function agregarProducto(Producto $producto) {
        $this->productos[] = $producto;
    }

    public function calcularTotal() {
        $total = 0;
        foreach ($this->productos as $producto) {
            $total += $producto->getPrecio();
        }
        return $total;
    }

    public function generarFactura() {
        echo $this->cliente->mostrarInformacion() . "\n";
        echo "Productos: \n";
        foreach ($this->productos as $producto) {
            echo "- " . $producto->getNombre() . ": $" . $producto->getPrecio() . "\n";
        }
        echo "Total: $" . $this->calcularTotal() . "\n";
    }
}
