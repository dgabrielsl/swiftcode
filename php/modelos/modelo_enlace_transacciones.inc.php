<?php
class modelo_enlace_transacciones {
    private $id;
    private $id_usuario;
    private $id_enlace;
    private $nombre_usuario;
    private $servicio;
    private $estado;
    private $fecha;

    public function __construct($id, $id_usuario, $id_enlace, $nombre_usuario, $servicio, $estado, $fecha) {
        $this -> id = $id;
        $this -> id_usuario = $id_usuario;
        $this -> id_enlace = $id_enlace;
        $this -> nombre_usuario = $nombre_usuario;
        $this -> servicio = $servicio;
        $this -> estado = $estado;
        $this -> fecha = $fecha;
    }

    // Getters.
    public function get_id() { return $this -> id; }
    public function get_id_usuario() { return $this -> id_usuario; }
    public function get_id_enlace() { return $this -> id_enlace; }
    public function get_nombre_usuario() { return $this -> nombre_usuario; }
    public function get_servicio() { return $this -> servicio; }
    public function get_estado() { return $this -> estado; }
    public function get_fecha() { return $this -> fecha; }
}