<?php
require_once 'DB.php';
class Nosotros{
    private $db;
    public function __construct(){
        $this->db = Database::conectar();
    }

    public function getNosotros(){
        $query = "SELECT * FROM nosotros";
        $stmt = $this->db->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    public function crearNosotros($Mision,$Vision){
        $query = "INSERT INTO nosotros (Mision,Vision)VALUES(:Mision,:Vision)";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':Mision', $Mision);
        $stmt->bindParam(':Vision', $Vision);
        return $stmt->execute();
    }
    public function eliminarNosotros($id){
        $query = "DELETE FROM nosotros WHERE ID=".$id;
        $stmt = $this->db->prepare($query);
        return $stmt->execute();
    }
    public function actualizarNosotros($id,$Mision,$Vision){
        $query = "UPDATE nosotros SET Mision=:Mision,Vision=:Vision WHERE ID=".$id;
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':Mision', $Mision);
        $stmt->bindParam(':Vision', $Vision);
        return $stmt->execute();
    }
}
?>