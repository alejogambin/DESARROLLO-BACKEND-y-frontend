<?php
///cargar archivo para usar la clase conectar a la base de datos
require_once 'DB.php';
class Servicios{
    /// Base de datos
    private $db;
    /// Constructor de la clase
    public function __construct(){
        /// Conectar a la base de datos
        $this->db = Database::conectar();
    }
    /// Obtener todos los servicios
    public function getServicios(){
        /// Obtener todos los servicios
        $query = "SELECT * FROM servicios";
        /// Ejecutar la consulta
        $stmt = $this->db->prepare($query);
        /// Ejecutar la consulta
        $stmt->execute();
        /// Devolver los resultados
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    /// 
    public function crearServicio($nombre,$costo,$duracion,$tipo){
        /// Crear un nuevo servicio
        $query = "INSERT INTO Servicios (Nombre,Costo,Duracion,Tipo)VALUES(:nombre,:costo,:duracion,:tipo)";
        /// Preparar la consulta
        $stmt = $this->db->prepare($query);
        /// Bindear los parametros
        $stmt->bindParam(':nombre', $nombre);
        $stmt->bindParam(':costo', $costo);
        $stmt->bindParam(':duracion', $duracion);
        $stmt->bindParam(':tipo', $tipo);
        /// Ejecutar la consulta
        return $stmt->execute();
    }
    /// Eliminar un servicio por id
    public function eliminarServicio($id){
        /// Eliminar un servicio por id
        $query = "DELETE FROM Servicios WHERE ID=".$id;
        /// Preparar la consulta
        $stmt = $this->db->prepare($query);
        /// Ejecutar la consulta
        return $stmt->execute();
    }
    /// Actualizar un servicio por id
    public function actualizarServicio($id,$nombre,$costo,$duracion,$tipo){
        /// Actualizar un servicio por id
        $query = "UPDATE Servicios SET Nombre=:nombre,Costo=:costo,Duracion=:duracion,Tipo=:tipo WHERE ID=".$id;
        /// Preparar la consulta
        $stmt = $this->db->prepare($query);
        /// Bindear los parametros
        $stmt->bindParam(':nombre', $nombre);
        $stmt->bindParam(':costo', $costo);
        $stmt->bindParam(':duracion', $duracion);
        $stmt->bindParam(':tipo', $tipo);
        /// Ejecutar la consulta
        return $stmt->execute();
    }
}
?>