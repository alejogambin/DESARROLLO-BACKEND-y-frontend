<?php
require_once 'models/Nosotros.php';
class NosotrosController{
    public function listar(){
        $nosotros = new Nosotros();
        echo json_encode($nosotros->getNosotros());
    }
}
?>