<?php
require_once 'DB.php';
class Ciudades{
    private $db;
    public function __construct(){
        $this->db = Database::conectar();
    }

    public function getCiudades(){
        $query = "SELECT * FROM ciudades";
        $stmt = $this->db->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    
}
?>