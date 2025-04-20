<?php
require_once 'models/Nosotros.php';
class NosotrosController{
    public function listar(){
        $nosotros = new Nosotros();
        echo json_encode($nosotros->getNosotros());
    }
    public function crear(){
        $nosotros = new Nosotros();
        $data = json_decode(file_get_contents("php://input"), true);       
        if(isset($data['Mision'], $data['Vision'])){
            $result = $nosotros-> crearNosotros($data['Mision'], $data['Vision']);
            echo json_encode(['message' => $result]);
        }else{
            echo json_encode(array("error" => "datos incompletos."));
        }   
    }
    public function actualizar(){
        $data = json_decode(file_get_contents("php://input"), true);
        $nosotros = new Nosotros();
        $result = $nosotros->actualizarNosotros($data['id'], $data['Mision'], $data['Vision']);
        echo json_encode(array("message" => "Servicio actualizado."));
    }
    public function eliminar(){
        $data = json_decode(file_get_contents("php://input"), true);
        $nosotros = new Nosotros();
        $result = $nosotros->eliminarNosotros($data['id']);
        echo json_encode(['message' => $result]);
    }
}
?>