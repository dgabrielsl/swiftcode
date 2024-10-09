<?php
class repositorio_usuarios {
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

    public static function alias_existe($conexion, $alias) {
        if (isset($conexion)) {
            try {
                include_once './php/modelos/modelo_usuario.inc.php';

                $sql = 'SELECT alias FROM usuarios WHERE alias = :alias';
                $sentencia = $conexion -> prepare($sql);
                $sentencia -> bindParam(':alias', $alias, PDO::PARAM_STR);
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
                $sql = 'INSERT INTO usuarios (correo, alias, clave, nombre, apellido_1, apellido_2, telefono, telefono_empresa, empresa, correo_empresa, rol, estado, creado, modificado) VALUES (:correo, :alias, :clave, :nombre, :apellido_1, :apellido_2, :telefono, :telefono_empresa, :empresa, :correo_empresa, :rol, :estado, :creado, :modificado)';

                $sentencia = $conexion -> prepare($sql);

                $correo = $usuario -> get_correo();
                $alias = $usuario -> get_alias();
                $clave = $usuario -> get_clave();
                $nombre = $usuario -> get_nombre();
                $apellido_1 = $usuario -> get_apellido_1();
                $apellido_2 = $usuario -> get_apellido_2();
                $telefono = $usuario -> get_telefono();
                $telefono_empresa = $usuario -> get_telefono_empresa();
                $empresa = $usuario -> get_empresa();
                $correo_empresa = $usuario -> get_correo_empresa();
                $rol = $usuario -> get_rol();
                $estado = $usuario -> get_estado();
                $creado = $usuario -> get_creado();
                $modificado = $usuario -> get_modificado();
                
                $sentencia -> bindParam(':correo', $correo, PDO::PARAM_STR);
                $sentencia -> bindParam(':alias', $alias, PDO::PARAM_STR);
                $sentencia -> bindParam(':clave', $clave, PDO::PARAM_STR);
                $sentencia -> bindParam(':nombre', $nombre, PDO::PARAM_STR);
                $sentencia -> bindParam(':apellido_1', $apellido_1, PDO::PARAM_STR);
                $sentencia -> bindParam(':apellido_2', $apellido_2, PDO::PARAM_STR);
                $sentencia -> bindParam(':telefono', $telefono, PDO::PARAM_STR);
                $sentencia -> bindParam(':telefono_empresa', $telefono_empresa, PDO::PARAM_STR);
                $sentencia -> bindParam(':empresa', $empresa, PDO::PARAM_STR);
                $sentencia -> bindParam(':correo_empresa', $correo_empresa, PDO::PARAM_STR);
                $sentencia -> bindParam(':rol', $rol, PDO::PARAM_INT);
                $sentencia -> bindParam(':estado', $estado, PDO::PARAM_INT);
                $sentencia -> bindParam(':creado', $creado, PDO::PARAM_STR);
                $sentencia -> bindParam(':modificado', $modificado, PDO::PARAM_STR);
                
                $transaccion = $sentencia -> execute();
                $usuario -> set_id($conexion -> lastInsertId());

                include_once './php/modelos/modelo_transaccion.inc.php';
                include_once './php/modelos/modelo_usuario.inc.php';
                
                $id_usuario = (int) $usuario -> get_id();
                $_SESSION['id_usuario'] = $id_usuario;
                


            } catch (PDOException $ex) {
                print 'ERROR: ' . $ex -> getMessage();
            }

            return $transaccion;
        }
    }

    public static function recuperar_usuario_id($conexion, $alias) {
        $usuario = null;

        if (isset($conexion)) {
            $transaccion = false;

            try {
                include_once './php/modelos/modelo_usuario.inc.php';

                $sql = 'SELECT * FROM usuarios WHERE usuario = :alias';
                $sentencia = $conexion -> prepare($sql);
                $sentencia -> bindParam(':alias', $alias, PDO::PARAM_STR);
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