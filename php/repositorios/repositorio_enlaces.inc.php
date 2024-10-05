<?php
class repositorio_enlaces {
    public static function insertar_registro($conexion, $registro) {
        if (isset($conexion)) {
            $transaccion = false;

            try {
                $sql = 'INSERT INTO enlaces (id_usuario, nombre_usuario, servicio, enlace_codificado, consumido, fecha) VALUES (:id_usuario, :nombre_usuario, :servicio, :enlace_codificado, :consumido, :fecha)';

                $id_usuario = $registro -> get_id_usuario();
                $nombre_usuario = $registro -> get_nombre_usuario();
                $servicio = $registro -> get_servicio();
                $enlace_codificado = $registro -> get_enlace_codificado();
                $consumido = $registro -> get_consumido();
                $fecha = $registro -> get_fecha();
                
                $sentencia = $conexion -> prepare($sql);
                $sentencia -> bindParam(':id_usuario', $id_usuario, PDO::PARAM_INT);
                $sentencia -> bindParam(':nombre_usuario', $nombre_usuario, PDO::PARAM_STR);
                $sentencia -> bindParam(':servicio', $servicio, PDO::PARAM_INT);
                $sentencia -> bindParam(':enlace_codificado', $enlace_codificado, PDO::PARAM_STR);
                $sentencia -> bindParam(':consumido', $consumido, PDO::PARAM_INT);
                $sentencia -> bindParam(':fecha', $fecha, PDO::PARAM_INT);

                $transaccion = $sentencia -> execute();
            } catch (PDOException $ex) {
                print 'ERROR: ' . $ex -> getMessage();
            }

            return $transaccion;
        }
    }
}