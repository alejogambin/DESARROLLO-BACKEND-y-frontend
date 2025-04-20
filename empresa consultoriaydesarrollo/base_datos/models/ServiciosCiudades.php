<?php
///cargar archivo para usar la clase conectar a la base de datos
require_once 'DB.php';
class ServiciosCiudades{
    /// Base de datos
    private $db;
    /// Constructor de la clase
    public function __construct(){
        /// Conectar a la base de datos
        /// y crear la base de datos
        $this->db = Database::conectar();
    }
    /// Obtener todos los serviciosciudades 
    public function getServiciosCiudades(){
        /// Obtener todos los servicios y ciudades y unir las tablas Servicios y Ciudades
        $query = "SELECT Ciudades.nombre AS ciudad, Servicios.Nombre AS servicio FROM 
        ServiciosCiudades INNER JOIN Servicios ON ServiciosCiudades.idServicio = Servicios.id INNER JOIN 
        Ciudades ON ServiciosCiudades.idCiudad = Ciudades.id;";
        /// Ejecutar la consulta y devolver los resultados
        $stmt = $this->db->prepare($query);
        /// Ejecutar la consulta
        $stmt->execute();
        /// Devolver los resultados
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    /// crear un nuevo serviciosCiudades
    public function crearServicioCiudades($idServicio,$idCiudad){
        /// Crear un nuevo serviciosciudades
        $query = "INSERT INTO ServiciosCiudades (idServicio, idCiudad)VALUES(:idServicio,:idCiudad)";
        /// Preparar la consulta
        $stmt = $this->db->prepare($query);
        /// Bindear los parametros
        $stmt->bindParam(':idServicio', $idServicio);
        $stmt->bindParam(':idCiudad', $idCiudad);
        /// Ejecutar la consulta
        return $stmt->execute();
    }
    /// Eliminar un serviciosciudades por id
    public function eliminarServicioCiudades($id){
        /// Eliminar un servicio y ciudad por id
        $query = "DELETE FROM ServiciosCiudades WHERE ID=".$id;
        /// Preparar la consulta
        $stmt = $this->db->prepare($query);
        /// Ejecutar la consulta
        return $stmt->execute();
    }
    /// Actualizar un serviciosciudades por id
    public function actualizarServicioCiudades($id,$idServicio,$idCiudad){
        /// Actualizar un servicio y ciudad por id
        $query = "UPDATE Servicios SET idServico=:idServicio,idCiudad=:idCiudad WHERE ID=".$id;
        /// Preparar la consulta
        $stmt = $this->db->prepare($query);
        /// Bindear los parametros
        $stmt->bindParam(':idServicio', $idServicio);
        $stmt->bindParam(':idCiudad', $idCiudad);
        /// Ejecutar la consulta
        return $stmt->execute();
    }
}
?>