<?php
require_once 'DB.php';
class Servicios{
    private $db;
    public function __construct(){
        $this->db = Database::conectar();
    }

    public function getServicios(){
        $query = "SELECT * FROM servicios";
        $stmt = $this->db->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
?>