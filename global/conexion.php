<?php
class Conexion{

    private static $conexion = NULL;
    public function conectar() {

        $pdo_options[PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION;
        $usuario = 'id13675168_tiendaangel';
        $contraseña = '=dV8+)F?#_e<6hS';
        $dbname = 'mysql:host=localhost;dbname=id13675168_tiendainformatica';
        self::$conexion = new PDO( $dbname, $usuario, $contraseña, $pdo_options );
        return self::$conexion;

    }
}

?>