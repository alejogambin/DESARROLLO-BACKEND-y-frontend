<?php   
    echo "<h1>Base de datos</h1>";
    echo "<h2>Conexión a la base de datos</h2>";
    $conexion = null;
    $conexion = new PDO('mysql:host=localhost;dbname=consultoraig', 'root', '');
    $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    ECHO "<h2>Conexión exitosa</h2>";
?>