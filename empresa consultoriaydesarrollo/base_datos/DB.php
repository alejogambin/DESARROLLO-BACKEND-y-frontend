<?php
class Database{
    private static $connection =null;
    /// Conectar a la base de datos
    /// y crear la base de datos
    public static function conectar(){
        /// Verificar si la conexion es nula
        IF(SELF::$connection === null){
            try{
                /// Crear la conexion a la base de datos
                $host = 'localhost';
                $dbname = 'consultoraig';
                $username = 'root';
                $password = '';
                /// Crear la conexion a la base de datos
                /// y establecer el charset a utf8
                self::$connection = new PDO("mysql:host=$host;dbname=$dbname; charset=utf8", $username, $password);
                /// Establecer el modo de error de PDO a excepción
                /// Esto significa que si hay un error en la consulta, se lanzará una excepción
                /// y se podrá manejar con un bloque try-catch
                self::$connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            }catch(PDOException $e){
                /// Si hay un error en la conexion, se lanzará una excepción
                /// y se podrá manejar con un bloque try-catch
                /// y se mostrará el mensaje de error
                die("Error de conexión: ". $e->getMessage());
            }
        }
        /// Devolver la conexion a la base de datos
        /// Esto significa que si la conexion es nula, se creará una nueva conexion
        return self::$connection;
    }
}

?>