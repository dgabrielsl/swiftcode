<?php
class repositorio_transacciones {
    public static function registrar_transaccion_usuario($conexion, $registro) {
        if (isset($conexion)) {
            try {
                $sql = 'INSERT INTO transacciones_usuarios (id_usuario, nombre_usuario, nombre_completo, correo, telefono, tipo_evento, fecha) VALUES (:id_usuario, :nombre_usuario, :nombre_completo, :correo, :telefono, :tipo_evento, :fecha)';
                
                $id_usuario = $registro -> get_id_usuario();
                $nombre_usuario = $registro -> get_nombre_usuario();
                $nombre_completo = $registro -> get_nombre_completo();
                $correo = $registro -> get_correo();
                $telefono = $registro -> get_telefono();
                $tipo_evento = $registro -> get_tipo_evento();
                $fecha = $registro -> get_fecha();

                $sentencia = $conexion -> prepare($sql);
                $sentencia -> bindParam(':id_usuario', $id_usuario, PDO::PARAM_STR);
                $sentencia -> bindParam(':nombre_usuario', $nombre_usuario, PDO::PARAM_STR);
                $sentencia -> bindParam(':nombre_completo', $nombre_completo, PDO::PARAM_STR);
                $sentencia -> bindParam(':correo', $correo, PDO::PARAM_STR);
                $sentencia -> bindParam(':telefono', $telefono, PDO::PARAM_STR);
                $sentencia -> bindParam(':tipo_evento', $tipo_evento, PDO::PARAM_INT);
                $sentencia -> bindParam(':fecha', $fecha, PDO::PARAM_STR);

                $resultado = $sentencia -> execute();

            } catch (PDOException $ex) {
                print 'ERROR: ' . $ex -> getMessage();
            }
        }

        return $resultado;
    }

    public static function registrar_transaccion_enlace($conexion, $registro) {
        if (isset($conexion)) {
            try {
                $sql = 'INSERT INTO transacciones_enlaces (id_usuario, id_enlace, nombre_usuario, servicio, estado, fecha) VALUES (:id_usuario, :id_enlace, :nombre_usuario, :servicio, :estado, :fecha)';
                
                $id_usuario = $registro -> get_id_usuario();
                $id_enlace = $registro -> get_id_enlace();
                $nombre_usuario = $registro -> get_nombre_usuario();
                $servicio = $registro -> get_servicio();
                $estado = $registro -> get_estado();
                $fecha = $registro -> get_fecha();

                $sentencia = $conexion -> prepare($sql);
                $sentencia -> bindParam(':id_usuario', $id_usuario, PDO::PARAM_INT);
                $sentencia -> bindParam(':id_enlace', $id_enlace, PDO::PARAM_INT);
                $sentencia -> bindParam(':nombre_usuario', $nombre_usuario, PDO::PARAM_STR);
                $sentencia -> bindParam(':servicio', $servicio, PDO::PARAM_INT);
                $sentencia -> bindParam(':estado', $estado, PDO::PARAM_INT);
                $sentencia -> bindParam(':fecha', $fecha, PDO::PARAM_STR);
                $resultado = $sentencia -> execute();

            } catch (PDOException $ex) {
                print 'ERROR: ' . $ex -> getMessage();
            }
        }

        return $resultado;
    }
}