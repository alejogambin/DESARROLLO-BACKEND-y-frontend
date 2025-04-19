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
    public function crearServicio($nombre,$costo,$duracion,$tipo){
        $query = "INSERT INTO Servicios (Nombre,Costo,Duracion,Tipo)VALUES(:nombre,:costo,:duracion,:tipo)";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':nombre', $nombre);
        $stmt->bindParam(':costo', $costo);
        $stmt->bindParam(':duracion', $duracion);
        $stmt->bindParam(':tipo', $tipo);
        return $stmt->execute();
    }
    public function eliminarServicio($id){
        $query = "DELETE FROM Servicios WHERE ID=".$id;
        $stmt = $this->db->prepare($query);
        return $stmt->execute();
    }
    public function actualizarServicio($id,$nombre,$costo,$duracion,$tipo){
        $query = "UPDATE Servicios SET Nombre=:nombre,Costo=:costo,Duracion=:duracion,Tipo=:tipo WHERE ID=".$id;
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':nombre', $nombre);
        $stmt->bindParam(':costo', $costo);
        $stmt->bindParam(':duracion', $duracion);
        $stmt->bindParam(':tipo', $tipo);
        return $stmt->execute();
    }
}
?>