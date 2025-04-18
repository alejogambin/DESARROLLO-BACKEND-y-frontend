<?php
require_once 'models/ServiciosCiudades.php';
class ServiciosCiudadesController{
    public function listar(){
        $servicios = new ServiciosCiudades();
        echo json_encode($servicios->getServiciosCiudades());
    }
}
?>