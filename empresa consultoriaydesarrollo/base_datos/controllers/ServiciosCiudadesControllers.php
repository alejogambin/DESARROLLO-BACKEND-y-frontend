<?php
/// incluir el archivo para usar la definicion de la clase ServiciosCiudades
require_once 'models/ServiciosCiudades.php';
class ServiciosCiudadesController{
    public function listar(){
        /// crear una instancia de la clase ServiciosCiudades
        $serviciosciudades = new ServiciosCiudades();
        /// y llamar al metodo getServiciosCiudades
        /// y devolver el resultado en formato json
        echo json_encode($serviciosciudades->getServiciosCiudades());
    }
    public function crear(){
        /// crear una instancia de la clase ServiciosCiudades
        $serviciosciudades = new ServiciosCiudades();
        /// leer la solicitud HTTP enviada al servidor y convierte el contenido JSON recibido en array 
        /// almacenar los datos decodificados en variabe data
        $data = json_decode(file_get_contents("php://input"), true);
        /// verificar si los datos son correctos
        if(isset($data['idServicios'], $data['idciudades'])){
            /// y llamar al metodo crearServicioCiudades
            /// y devolver el resultado en formato json
            $result = $serviciosciudades-> crearServicioCiudades($data['idServicios'], $data['idciudades']);
            /// devolver el resultado en formato json
            echo json_encode(['message' => $result]);
        }else{
            /// si no son correctos devolver un mensaje de error
            echo json_encode(array("error" => "datos incompletos."));
        }   
    }
    public function actualizar(){
        /// leer la solicitud HTTP enviada al servidor y convierte el contenido JSON recibido en array 
        /// almacenar los datos decodificados en variabe data
        $data = json_decode(file_get_contents("php://input"), true);
        /// crear una instancia de la clase ServiciosCiudades
        $serviciosciudades = new ServiciosCiudades();
        /// y llamar al metodo actualizarServicioCiudades
        /// y devolver el resultado en formato json
        $result = $serviciosciudades->actualizarServicioCiudades($data['id'],$data['idServicios'], $data['idciudades']);
        /// devolver mensaje en formato json
        echo json_encode(array("message" => "Servicio actualizado."));
    }
    public function eliminar(){
        /// leer la solicitud HTTP enviada al servidor y convierte el contenido JSON recibido en array 
        /// almacenar los datos decodificados en variabe data
        $data = json_decode(file_get_contents("php://input"), true);
        /// crear una instancia de la clase ServiciosCiudades
        $serviciosciudades = new ServiciosCiudades();
        /// y llamar al metodo eliminarServicioCiudades
        $result = $servicios->eliminarServicioCiudades($data['id']);
        /// devolver el resultado en formato json
        echo json_encode(['message' => $result]);
    }
}
?>