<?php
class repositorio_usuario {
    public static function consultar_registros_general($conexion) {
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
                        $usuarios[] = new modelo_usuario($row['id'], $row['correo'], $row['usuario'], $row['clave'], $row['nombre'], $row['apellido'], $row['apellido_2'], $row['telefono'], $row['telefono_2'], $row['empresa'], $row['correo_empresa'], $row['cuenta'], $row['estado'], $row['creado']);
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

    public static function insertar_registro($conexion, $usuario) {
        if (isset($conexion)) {
            $transaccion = false;

            try {
                $sql = 'INSERT INTO usuarios (correo, usuario, clave, nombre, apellido, apellido_2, telefono, telefono_2, empresa, correo_empresa, cuenta, estado, creado) VALUES (:correo, :usuario, :clave, :nombre, :apellido, :apellido_2, :telefono, :telefono_2, :empresa, :correo_empresa, :cuenta, :estado, :creado)';

                $sentencia = $conexion -> prepare($sql);

                $correo = $usuario -> get_correo();
                $usuario_recuperado = $usuario -> get_usuario();
                $nombre = $usuario -> get_nombre();
                $apellido = $usuario -> get_apellido();
                $apellido_2 = $usuario -> get_apellido_2();
                $telefono = $usuario -> get_telefono();
                $telefono_2 = $usuario -> get_telefono_2();
                $empresa = $usuario -> get_empresa();
                $correo_empresa = $usuario -> get_correo_empresa();
                $clave = $usuario -> get_clave();
                $cuenta = $usuario -> get_cuenta();
                $estado = $usuario -> get_estado();
                $creado = $usuario -> get_creado();

                $sentencia -> bindParam(':correo', $correo, PDO::PARAM_STR);
                $sentencia -> bindParam(':usuario', $usuario_recuperado, PDO::PARAM_STR);
                $sentencia -> bindParam(':clave', $clave, PDO::PARAM_STR);
                $sentencia -> bindParam(':nombre', $nombre, PDO::PARAM_STR);
                $sentencia -> bindParam(':apellido', $apellido, PDO::PARAM_STR);
                $sentencia -> bindParam(':apellido_2', $apellido_2, PDO::PARAM_STR);
                $sentencia -> bindParam(':telefono', $telefono, PDO::PARAM_STR);
                $sentencia -> bindParam(':telefono_2', $telefono_2, PDO::PARAM_STR);
                $sentencia -> bindParam(':empresa', $empresa, PDO::PARAM_STR);
                $sentencia -> bindParam(':correo_empresa', $correo_empresa, PDO::PARAM_STR);
                $sentencia -> bindParam(':cuenta', $cuenta, PDO::PARAM_INT);
                $sentencia -> bindParam(':estado', $estado, PDO::PARAM_INT);
                $sentencia -> bindParam(':creado', $creado, PDO::PARAM_STR);
                
                $transaccion = $sentencia -> execute();
                
            } catch (PDOException $ex) {
                print 'ERROR: ' . $ex -> getMessage();
            }

            return $transaccion;
        }
    }

    public static function recuperar_usuario_id($conexion, $nombre_usuario) {
        $usuario = null;

        if (isset($conexion)) {
            $transaccion = false;

            try {
                include_once './php/modelos/modelo_usuario.inc.php';

                $sql = 'SELECT * FROM usuarios WHERE usuario = :nombre_usuario';
                $sentencia = $conexion -> prepare($sql);
                $sentencia -> bindParam(':nombre_usuario', $nombre_usuario, PDO::PARAM_STR);
                $sentencia -> execute();
                $transaccion = $sentencia -> fetchOne();

                if (!empty($transaccion)) {
                    $usuario = new Usuario(
                        $transaccion['id']
                    );
                }
                
            } catch (PDOException $ex) {
                print 'ERROR: ' . $ex -> getMessage();
            }

            return $usuario;
        }
    }
}