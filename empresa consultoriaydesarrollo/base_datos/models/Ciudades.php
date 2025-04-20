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
    public function crearCiudades($nombre){
        $query = "INSERT INTO Ciudades (nombre)VALUES(:nombre)";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':nombre', $nombre);
        return $stmt->execute();
    }
    public function eliminarCiudades($id){
        $query = "DELETE FROM Ciudades WHERE ID=".$id;
        $stmt = $this->db->prepare($query);
        return $stmt->execute();
    }
    public function actualizarCiudades($id,$nombre){
        $query = "UPDATE Ciudades SET nombre=:nombre WHERE ID=".$id;
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':nombre', $nombre);
        return $stmt->execute();
    }
    
}
?>