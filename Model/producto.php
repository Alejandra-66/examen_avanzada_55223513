<?php
include '../App/Model/conexDB/ConexDB.php';

class Productos {
    private $db;
    private $table = 'productos';

    public function __construct() {
        $this->db = new App\Model\conexDB\ConexDB();
    }

    public function listarProductos() {
        $sql = "SELECT * FROM " . $this->table;
        $result = $this->db->exeSQL($sql);
        
        $productos = array();
        while ($row = $result->fetch_assoc()) {
            $productos[] = $row;
        }
        
        return $productos;
    }

    public function registrarProducto($nombre, $cantidad, $precio_unitario) {
        $sql = "INSERT INTO " . $this->table . " (nombre, cantidad, precio_unitario) VALUES (?, ?, ?)";
        $resultsql = $this->db->prepare($sql);
        
        if (!$resultsql) {
            throw new Exception("Error no se pudo realizar la consulta la consulta: " . $this->db->getConex()->error);
        }
        
        $resultsql->bind_param("sid", $nombre, $cantidad, $precio_unitario);
        $result = $resultsql->execute();
        $resultsql->close();
        
        return $result;
    }

    public function __destruct() {
        if ($this->db) {
            $this->db->closeDB();
        }
    }
}
?>