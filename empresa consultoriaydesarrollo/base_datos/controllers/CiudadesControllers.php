<?php
require_once 'models/Ciudades.php';
class CiudadesController{
    public function listar(){
        $ciudades = new Ciudades();
        echo json_encode($ciudades->getCiudades());
    }
    public function crear(){
        $ciudades = new Ciudades();
        $data = json_decode(file_get_contents("php://input"), true);       
        if(isset($data['nombre'])){
            $result = $ciudades-> crearCiudades($data['nombre']);
            echo json_encode(['message' => $result]);
        }else{
            echo json_encode(array("error" => "datos incompletos."));
        }   
    }
    public function actualizar(){
        $data = json_decode(file_get_contents("php://input"), true);
        $ciudades = new Ciudades();
        $result = $ciudades->actualizarCiudades($data['id'], $data['nombre']);
        echo json_encode(array("message" => "Servicio actualizado."));
    }
    public function eliminar(){
        $data = json_decode(file_get_contents("php://input"), true);
        $ciudades = new Ciudades();
        $result = $ciudades->eliminarCiudades($data['id']);
        echo json_encode(['message' => $result]);
    }
}
?>