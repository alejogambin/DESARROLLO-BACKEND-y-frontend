<?php
///cargar archivo para usar la clase conectar a la base de datos
require_once 'DB.php';
/// crear la clase Nosotros
/// y conectar a la base de datos
class Nosotros{
    /// Base de datos
    private $db;
    /// Constructor de la clase
    public function __construct(){
        /// Conectar a la base de datos
        $this->db = Database::conectar();
    }
    /// Obtener todos los nosotros
    public function getNosotros(){
        /// Obtener todos los nosotros
        $query = "SELECT * FROM nosotros";
        /// Ejecutar la consulta y devolver los resultados
        $stmt = $this->db->prepare($query);
        /// Ejecutar la consulta
        $stmt->execute();
        /// Devolver los resultados
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    /// Crear un nuevo nosotros
    public function crearNosotros($Mision,$Vision){
        /// Crear un nuevo nosotros
        $query = "INSERT INTO nosotros (Mision,Vision)VALUES(:Mision,:Vision)";
        /// Preparar la consulta
        $stmt = $this->db->prepare($query);
        /// Bindear los parametros
        $stmt->bindParam(':Mision', $Mision);
        $stmt->bindParam(':Vision', $Vision);
        /// Ejecutar la consulta
        return $stmt->execute();
    }
    /// Eliminar un nosotros por id
    public function eliminarNosotros($id){
        /// Eliminar un nosotros por id
        $query = "DELETE FROM nosotros WHERE ID=".$id;
        /// Preparar la consulta
        $stmt = $this->db->prepare($query);
        /// Ejecutar la consulta
        return $stmt->execute();
    }
    /// Actualizar un nosotros por id
    public function actualizarNosotros($id,$Mision,$Vision){
        /// Actualizar un nosotros por id
        $query = "UPDATE nosotros SET Mision=:Mision,Vision=:Vision WHERE ID=".$id;
        /// Preparar la consulta
        $stmt = $this->db->prepare($query);
        /// Bindear los parametros
        $stmt->bindParam(':Mision', $Mision);
        $stmt->bindParam(':Vision', $Vision);
        /// Ejecutar la consulta
        return $stmt->execute();
    }
}
?>