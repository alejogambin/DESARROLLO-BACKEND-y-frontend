<?php
/// incluir el archivo para usar la definicion de la clase Servicios 
require_once 'models/Servicios.php';
class ServiciosController{
    /// consultar todos los servicios
    public function listar(){
        /// crear una instancia de la clase Servicios
        $servicios = new Servicios();
        /// y llamar al metodo getServicios
        /// y devolver el resultado en formato json
        echo json_encode($servicios->getServicios());
    }
    /// crear un nuevo servicio
    public function crear(){
        /// crear una instancia de la clase Servicios
        $servicios = new Servicios();
        /// leer la solicitud HTTP enviada al servidor y convierte el contenido JSON recibido en array 
        /// almacenar los datos decodificados en variabe data
        $data = json_decode(file_get_contents("php://input"), true);
        /// verificar si los datos son correctos
        /// y llamar al metodo crearServicio
        /// y devolver el resultado en formato json
        if(isset($data['Nombre'], $data['Costo'], $data['Duracion'], $data['Tipo'])){
            $result = $servicios-> crearServicio($data['Nombre'], $data['Costo'], $data['Duracion'], $data['Tipo']);
            echo json_encode(['message' => $result]);
        }else{
            /// si no son correctos devolver un mensaje de error
            /// en formato json
            echo json_encode(array("error" => "datos incompletos."));
        }   
    }
    /// actualizar un servicio
    public function actualizar(){
        /// leer la solicitud HTTP enviada al servidor y convierte el contenido JSON recibido en array 
        /// almacenar los datos decodificados en variabe data
        $data = json_decode(file_get_contents("php://input"), true);
        /// crear una instancia de la clase Servicios
        $servicios = new Servicios();
        /// y llamar al metodo actualizarServicio
        $result = $servicios->actualizarServicio($data['id'], $data['Nombre'], $data['Costo'], $data['Duracion'], $data['Tipo']);
        /// devolver mensaje en formato json
        echo json_encode(array("message" => "Servicio actualizado."));
    }
    /// eliminar un servicio
    public function eliminar(){
        /// leer la solicitud HTTP enviada al servidor y convierte el contenido JSON recibido en array 
        /// almacenar los datos decodificados en variabe data
        $data = json_decode(file_get_contents("php://input"), true);
        /// crear una instancia de la clase Servicios
        $servicios = new Servicios();
        $result = $servicios->eliminarServicio($data['id']);
        echo json_encode(['message' => $result]);
    }
}
?>