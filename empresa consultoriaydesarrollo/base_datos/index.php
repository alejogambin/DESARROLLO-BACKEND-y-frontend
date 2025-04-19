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
        $Controller->listar();
        break;
    case 'servicios':
        require_once 'controllers/ServiciosControllers.php';
        $Controller = new ServiciosController();
        $Controller->listar();
        break;
    case 'nosotros':
        require_once 'controllers/NosotrosControllers.php';
        $Controller = new NosotrosController();
        $Controller->listar();
        break;
    case 'ciudades':
        require_once 'controllers/CiudadesControllers.php';
        $Controller = new CiudadesController();
        $Controller->listar();
        break;
        default:
        echo json_encode(array("message" => "Ruta no encontrada."));
        break;
}
?>