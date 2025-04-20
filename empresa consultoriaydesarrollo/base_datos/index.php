<?php
//habilitar CORS para permitir solicitudes desde otros origenes
header("Access-Control-Allow-Origin: *");
////establecer los métodos permitidos
header("Content-Type: application/json; charset=UTF-8");
//obtener la ruta solicitada
////almacenar en la variable $request el valor de la variable $_GET['api'] o una cadena vacía si no existe
$request = $_GET['api'] ?? '' ;

switch ($request) {
    case 'serviciosciudades':
        /// Cargar el controlador de ServiciosCiudades
        require_once 'controllers/ServiciosCiudadesControllers.php';
        /// y crear una instancia del controlador
        $Controller = new ServiciosCiudadesController();
        /// Verificar el método de la solicitud
        if($_SERVER['REQUEST_METHOD']== 'POST'){
            $Controller->crear();
        }elseif ($_SERVER['REQUEST_METHOD']== 'PUT'){
            $Controller->actualizar();
        }elseif ($_SERVER['REQUEST_METHOD']== 'DELETE'){
            $Controller->eliminar();
        }elseif ($_SERVER['REQUEST_METHOD']== 'GET'){
        $Controller->listar();
        }else{
            /// Si el método no es permitido, devolver un mensaje de error
            echo json_encode(array("message" => "Método no permitido."));
        }
        break;
    case 'servicios':
        /// Cargar el controlador de Servicios
        require_once 'controllers/ServiciosControllers.php';
        /// y crear una instancia del controlador
        $Controller = new ServiciosController();
        /// Verificar el método de la solicitud
        if($_SERVER['REQUEST_METHOD']== 'POST'){
            $Controller->crear();
            
        }elseif ($_SERVER['REQUEST_METHOD']== 'PUT'){
            $Controller->actualizar();
            
        }elseif ($_SERVER['REQUEST_METHOD']== 'DELETE'){
            $Controller->eliminar();
            
        }elseif ($_SERVER['REQUEST_METHOD']== 'GET'){
            $Controller->listar();
        }else{
                echo json_encode(array("message" => "Método no permitido."));
            }
        break;
    case 'nosotros':
        /// Cargar el controlador de Nosotros
        require_once 'controllers/NosotrosControllers.php';
        /// y crear una instancia del controlador
        $Controller = new NosotrosController();
        /// Verificar el método de la solicitud
        if($_SERVER['REQUEST_METHOD']== 'POST'){
            $Controller->crear();
        }elseif( $_SERVER['REQUEST_METHOD']== 'PUT'){
            $Controller->actualizar();
        }elseif ($_SERVER['REQUEST_METHOD']== 'DELETE'){
            $Controller->eliminar();
        }elseif ($_SERVER['REQUEST_METHOD']== 'GET'){
            $Controller->listar();
        }else{
            echo json_encode(array("message" => "Método no permitido."));
        }
        break;
    case 'ciudades':
        /// Cargar el controlador de Ciudades
        require_once 'controllers/CiudadesControllers.php';
        /// y crear una instancia del controlador
        $Controller = new CiudadesController();
        /// Verificar el método de la solicitud
        if($_SERVER['REQUEST_METHOD']== 'POST'){
            $Controller->crear();
        }elseif ($_SERVER['REQUEST_METHOD']== 'PUT'){
            $Controller->actualizar();
        }elseif ($_SERVER['REQUEST_METHOD']== 'DELETE'){
            $Controller->eliminar();
        }elseif ($_SERVER['REQUEST_METHOD']== 'GET'){
        $Controller->listar();
        }else{
            echo json_encode(array("message" => "Método no permitido."));
        }
        break;
        default:
        echo json_encode(array("message" => "Ruta no encontrada."));
        break;
}
?>