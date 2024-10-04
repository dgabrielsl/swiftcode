<?php
include_once './php/scripts/validador.inc.php';

class repositorio_usuario {
    public static function consultar_todos($conexion) {
        $usuarios = [];
        if (isset($conexion)) {
            try {
                include_once './php/modelos/modelo_usuario.inc.php';

                $sql = 'SELECT * FROM usuarios';
                $sentencia = $conexion -> prepare($sql);
                $sentencia -> execute();
                $respuesta = $sentencia -> fetchAll();
                
                if (count($respuesta)) {
                    foreach ($respuesta as $row) {
                        $usuarios[] = new modelo_usuario($row['id'], $row['correo'], $row['usuario'], $row['clave'], $row['nombre'], $row['apellido'], $row['apellido_2'], $row['telefono'], $row['telefono_secundario'], $row['empresa'], $row['correo_empresa'], $row['cuenta'], $row['estado'], $row['creado']);
                    }
                }
            } catch (PDOException $ex) {
                print 'ERROR: ' . $ex -> getMessage();
            }
        }
        return $usuarios;
    }

    public static function correo_existe($conexion, $correo) {
        if (isset($conexion)) {
            try {
                include_once './php/modelos/modelo_usuario.inc.php';

                $sql = 'SELECT correo, estado FROM usuarios WHERE correo = :correo';
                $sentencia = $conexion -> prepare($sql);
                $sentencia -> bindParam(':correo', $correo, PDO::PARAM_STR);
                $sentencia -> execute();
                $respuesta = $sentencia -> fetch(); 

                return $respuesta;
                
            } catch (PDOException $ex) {
                print 'ERROR: ' . $ex -> getMessage();
            }
        }
    }

    public static function usuario_existe($conexion, $usuario) {
        if (isset($conexion)) {
            try {
                include_once './php/modelos/modelo_usuario.inc.php';

                $sql = 'SELECT usuario FROM usuarios WHERE usuario = :usuario';
                $sentencia = $conexion -> prepare($sql);
                $sentencia -> bindParam(':usuario', $usuario, PDO::PARAM_STR);
                $sentencia -> execute();
                $respuesta = $sentencia -> fetch(); 

                return $respuesta;
                
            } catch (PDOException $ex) {
                print 'ERROR: ' . $ex -> getMessage();
            }
        }
    }
}