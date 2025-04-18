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
}
?>