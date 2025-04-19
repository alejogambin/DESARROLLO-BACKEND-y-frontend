<?php
//habilitar CORS para permitir solicitudes desde otros origenes
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
//obtener la ruta solicitada
$request = $_GET['api'] ?? '' ;


switch ($request) {
    case 'serviciosciudades':
        require_once 'controllers/ServiciosCiudadesControllers.php';
        $Controller = new ServiciosCiudadesController();
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
    case 'servicios':
        require_once 'controllers/ServiciosControllers.php';
        $Controller = new ServiciosController();
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
        require_once 'controllers/NosotrosControllers.php';
        $Controller = new NosotrosController();
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
        require_once 'controllers/CiudadesControllers.php';
        $Controller = new CiudadesController();
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