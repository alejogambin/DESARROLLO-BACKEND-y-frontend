<?php
///cargar archivo para usar la clase conectar a la base de datos
require_once 'DB.php';
class Ciudades{
    private $db;
    /// Constructor de la clase
    public function __construct(){
        /// Conectar a la base de datos
        $this->db = Database::conectar();
    }
    /// Obtener todas las ciudades
    public function getCiudades(){
        /// Obtener todas las ciudades
        $query = "SELECT * FROM ciudades";
        /// Ejecutar la consulta y devolver los resultados
        $stmt = $this->db->prepare($query);
        /// Ejecutar la consulta
        $stmt->execute();
        /// Devolver los resultados
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    /// Crear una nueva ciudad
    public function crearCiudades($nombre){
        /// Crear una nueva ciudad
        $query = "INSERT INTO Ciudades (nombre)VALUES(:nombre)";
        /// Preparar la consulta
        $stmt = $this->db->prepare($query);
        /// Bindear los parametros
        $stmt->bindParam(':nombre', $nombre);
        /// Ejecutar la consulta
        return $stmt->execute();
    }
    /// Eliminar una ciudad por id
    public function eliminarCiudades($id){
        /// Eliminar una ciudad por id
        $query = "DELETE FROM Ciudades WHERE ID=".$id;
        /// Preparar la consulta
        $stmt = $this->db->prepare($query);
        /// Ejecutar la consulta
        return $stmt->execute();
    }
    /// Actualizar una ciudad por id
    public function actualizarCiudades($id,$nombre){
        /// Actualizar una ciudad por id
        $query = "UPDATE Ciudades SET nombre=:nombre WHERE ID=".$id;
        /// Preparar la consulta
        $stmt = $this->db->prepare($query);
        /// Bindear los parametros
        $stmt->bindParam(':nombre', $nombre);
        /// Ejecutar la consulta
        /// y devolver el resultado
        return $stmt->execute();
    }
    
}
?>