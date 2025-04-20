<?php
/// incluir el archivo para usar la definicion de la clase ciudades
require_once 'models/Ciudades.php';
class CiudadesController{
    public function listar(){
        /// crear una instancia de la clase ciudades
        $ciudades = new Ciudades();
        /// y llamar al metodo getCiudades
        echo json_encode($ciudades->getCiudades());
    }
    public function crear(){
        $ciudades = new Ciudades();
        /// leer la solicitud HTTP enviada al servidor y convierte el contenido JSON recibido en array 
        /// almacenar los datos decodificados en variabe data
        $data = json_decode(file_get_contents("php://input"), true);
        /// verificar si los datos son correctos       
        if(isset($data['nombre'])){
            /// y llamar al metodo crearCiudades
            $result = $ciudades-> crearCiudades($data['nombre']);
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
        /// crear una instancia de la clase ciudades
        $ciudades = new Ciudades();
        /// y llamar al metodo actualizarCiudades
        $result = $ciudades->actualizarCiudades($data['id'], $data['nombre']);
        /// devolver mensaje en formato json
        echo json_encode(array("message" => "Servicio actualizado."));
    }
    public function eliminar(){
        /// leer la solicitud HTTP enviada al servidor y convierte el contenido JSON recibido en array 
        /// almacenar los datos decodificados en variabe data
        $data = json_decode(file_get_contents("php://input"), true);
        /// crear una instancia de la clase ciudades
        $ciudades = new Ciudades();
        /// y llamar al metodo eliminarCiudades
        $result = $ciudades->eliminarCiudades($data['id']);
        /// devolver el resultado en formato json
        echo json_encode(['message' => $result]);
    }
}
?>