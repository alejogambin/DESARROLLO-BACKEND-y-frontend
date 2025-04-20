<?php
require_once 'models/ServiciosCiudades.php';
class ServiciosCiudadesController{
    public function listar(){
        $serviciosciudades = new ServiciosCiudades();
        echo json_encode($serviciosciudades->getServiciosCiudades());
    }
    public function crear(){
        $serviciosciudades = new ServiciosCiudades();
        $data = json_decode(file_get_contents("php://input"), true);
        if(isset($data['idServicios'], $data['idciudades'])){
            $result = $serviciosciudades-> crearServicioCiudades($data['idServicios'], $data['idciudades']);
            echo json_encode(['message' => $result]);
        }else{
            echo json_encode(array("error" => "datos incompletos."));
        }   
    }
    public function actualizar(){
        $data = json_decode(file_get_contents("php://input"), true);
        $serviciosciudades = new ServiciosCiudades();
        $result = $serviciosciudades->actualizarServicioCiudades($data['id'],$data['idServicios'], $data['idciudades']);
        echo json_encode(array("message" => "Servicio actualizado."));
    }
    public function eliminar(){
        $data = json_decode(file_get_contents("php://input"), true);
        $serviciosciudades = new ServiciosCiudades();
        $result = $servicios->eliminarServicioCiudades($data['id']);
        echo json_encode(['message' => $result]);
    }
}
?>