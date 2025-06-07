<?php
include '../Model/producto.php';

class ProductoController {
    private $model;

    public function __construct() {
        $this->model = new ProductoModel();
    }

    public function listar() {
        $productos = $this->model->listarProductos();
    }

    public function registrar() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $nombre = $_POST['nombre'] ?? '';
            $cantidad = $_POST['cantidad'] ?? 0;
            $precio_unitario = $_POST['precio_unitario'] ?? 0.0;
            
            if ($this->model->registrarProducto($nombre, $cantidad, $precio_unitario)) {
                header('Location: index.php');
                exit;
            } else {
                $error = "Error al registrar el producto";
            }
        }
    }
}
?>