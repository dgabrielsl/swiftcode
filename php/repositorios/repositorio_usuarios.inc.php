<?php
class repositorio_usuarios {
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
                $usuario -> set_id($conexion -> lastInsertId());

                include_once './php/modelos/modelo_usuario.inc.php';
                include_once './php/modelos/modelo_usuario_transacciones.inc.php';
                
                include_once './php/modelos/modelo_enlace.inc.php';
                include_once './php/modelos/modelo_enlace_transacciones.inc.php';

                include_once 'repositorio_transacciones.inc.php';
                include_once 'repositorio_enlaces.inc.php';
                
                $id_usuario = (int) $usuario -> get_id();
                $nombre_completo = $nombre . ' ' . $apellido . ' ' . $apellido_2;
                $tipo_evento = 1;
                $registro_1 = new modelo_usuario_transacciones('', $id_usuario, $usuario_recuperado, $nombre_completo, $correo, $telefono, $tipo_evento, $creado);
                repositorio_transacciones::registrar_transaccion_usuario($conexion, $registro_1);

                $servicio = 1;
                $enlace_codificado = texto_aleatorio::generar_enlace_codificado(100, $usuario_recuperado);
                $consumido = false;
                $registro_2 = new modelo_enlace('', $id_usuario, $usuario_recuperado, $servicio, $enlace_codificado, $consumido, $creado);
                repositorio_enlaces::insertar_registro($conexion, $registro_2);
                $registro_2 -> set_id($conexion -> lastInsertId());
                $id_enlace = (int) $registro_2 -> get_id();

                $servicio = 1;
                $estado = 1;
                $registro_3 = new modelo_enlace_transacciones('', $id_usuario, $id_enlace, $usuario_recuperado, $servicio, $estado, $creado);
                var_dump($registro_3);
                repositorio_transacciones::registrar_transaccion_enlace($conexion, $registro_3);

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