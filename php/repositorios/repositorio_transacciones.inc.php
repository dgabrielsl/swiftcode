<?php
class repositorio_transacciones {
    public static function insertar_registro_usuario($conexion, $transaccion) {
        if (isset($conexion)) {
            $resultado_transaccion = false;

            try {
                $sql = 'INSERT INTO transacciones_usuario (id_usuario, tipo_evento, fecha) VALUES (:id_usuario, :tipo_evento, :fecha)';
                $sentencia = $conexion -> prepare($sql);

                $id_usuario = $transaccion -> get_id_usuario();
                $tipo_evento = $transaccion -> get_evento();
                $fecha = $transaccion -> get_fecha();

                $sentencia -> bindParam(':id_usuario', $id_usuario, PDO::PARAM_STR);
                $sentencia -> bindParam(':tipo_evento', $tipo_evento, PDO::PARAM_INT);
                $sentencia -> bindParam(':fecha', $fecha, PDO::PARAM_STR);

                $resultado_transaccion = $sentencia -> execute();

            } catch (PDOException $ex) {
                print 'ERROR: ' . $ex -> getMessage();
            }
            
            return $resultado_transaccion;
        }
    }
}