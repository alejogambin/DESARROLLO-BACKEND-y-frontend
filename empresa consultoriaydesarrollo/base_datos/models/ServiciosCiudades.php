<?php
require_once 'DB.php';
class ServiciosCiudades{
    private $db;
    public function __construct(){
        $this->db = Database::conectar();
    }

    public function getServiciosCiudades(){
        $query = "SELECT Ciudades.nombre AS ciudad, Servicios.Nombre AS servicio FROM 
        ServiciosCiudades INNER JOIN Servicios ON ServiciosCiudades.idServicio = Servicios.id INNER JOIN 
        Ciudades ON ServiciosCiudades.idCiudad = Ciudades.id;";
        $stmt = $this->db->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    public function crearServicioCiudades($idServicio,$idCiudad){
        $query = "INSERT INTO ServiciosCiudades (idServicio, idCiudad)VALUES(:idServicio,:idCiudad)";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':idServicio', $idServicio);
        $stmt->bindParam(':idCiudad', $idCiudad);
        return $stmt->execute();
    }
    public function eliminarServicioCiudades($id){
        $query = "DELETE FROM ServiciosCiudades WHERE ID=".$id;
        $stmt = $this->db->prepare($query);
        return $stmt->execute();
    }
    public function actualizarServicioCiudades($id,$idServicio,$idCiudad){
        $query = "UPDATE Servicios SET idServico=:idServicio,idCiudad=:idCiudad WHERE ID=".$id;
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':idServicio', $idServicio);
        $stmt->bindParam(':idCiudad', $idCiudad);
        return $stmt->execute();
    }
}
?>