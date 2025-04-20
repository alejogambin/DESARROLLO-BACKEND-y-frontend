<?php
/// incluir el archivo para usar la definicion de la clase Nosotros
require_once 'models/Nosotros.php';
class NosotrosController{
    public function listar(){
        /// crear una instancia de la clase Nosotros
        $nosotros = new Nosotros();
        /// y llamar al metodo getNosotros
        /// y devolver el resultado en formato json
        echo json_encode($nosotros->getNosotros());
    }
    public function crear(){
        $nosotros = new Nosotros();
        /// leer la solicitud HTTP enviada al servidor y convierte el contenido JSON recibido en array 
        /// almacenar los datos decodificados en variabe data
        $data = json_decode(file_get_contents("php://input"), true);
        /// verificar si los datos son correctos       
        if(isset($data['Mision'], $data['Vision'])){
            /// y llamar al metodo crearNosotros
            $result = $nosotros-> crearNosotros($data['Mision'], $data['Vision']);
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
        /// crear una instancia de la clase Nosotros
        $nosotros = new Nosotros();
        /// y llamar al metodo actualizarNosotros
        $result = $nosotros->actualizarNosotros($data['id'], $data['Mision'], $data['Vision']);
        /// devolver mensaje en formato json
        echo json_encode(array("message" => "Servicio actualizado."));
    }
    public function eliminar(){
        /// leer la solicitud HTTP enviada al servidor y convierte el contenido JSON recibido en array 
        /// almacenar los datos decodificados en variabe data
        $data = json_decode(file_get_contents("php://input"), true);
        /// crear una instancia de la clase Nosotros
        $nosotros = new Nosotros();
        /// y llamar al metodo eliminarNosotros
        $result = $nosotros->eliminarNosotros($data['id']);
        /// devolver el resultado en formato json
        echo json_encode(['message' => $result]);
    }
}
?>