<?php
require_once 'models/Servicios.php';
class ServiciosController{
    

    public function listar(){
        $servicios = new Servicios();
        echo json_encode($servicios->getServicios());
    }
    public function crear(){
        $servicios = new Servicios();
        $data = json_decode(file_get_contents("php://input"), true);
       
        if(isset($data['Nombre'], $data['Costo'], $data['Duracion'], $data['Tipo'])){
            $result = $servicios-> crearServicio($data['Nombre'], $data['Costo'], $data['Duracion'], $data['Tipo']);
            echo json_encode(['message' => $result]);
        }else{
            echo json_encode(array("error" => "datos incompletos."));
        }   
    }
    public function actualizar(){
        $data = json_decode(file_get_contents("php://input"), true);
        $servicios = new Servicios();
        $result = $servicios->actualizarServicio($data['id'], $data['Nombre'], $data['Costo'], $data['Duracion'], $data['Tipo']);
        echo json_encode(array("message" => "Servicio actualizado."));
    }
    public function eliminar(){
        $data = json_decode(file_get_contents("php://input"), true);
        $servicios = new Servicios();
        $result = $servicios->eliminarServicio($data['id']);
        echo json_encode(['message' => $result]);
    }
}
?>