<?php
class conexion {
    private static $mi_conexion;

    public static function abrir_conexion() {
        if (!isset(self::$mi_conexion)) {
            try {
                include_once 'configuracion.inc.php';
                self::$mi_conexion = new PDO('mysql:host=' . SERVERNAME . ';dbname=' . DBONAME, USERNAME, PASSWORD);
                self::$mi_conexion -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                self::$mi_conexion -> exec("SET NAMES utf8");
            } catch (PDOException $ex) {
                print "ERROR: " . $ex -> getMessage();
                error_log("ERROR: " . $ex->getMessage());
                die("Error de conexión a la base de datos");
            }
        }
        return self::$mi_conexion;
    }

    public static function cerrar_conexion() {
        self::$mi_conexion = null;
    }

    public static function obtener_conexion() {
        return self::$mi_conexion;
    }
}