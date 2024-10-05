<?php
class modelo_enlace {
    private $id;
    private $id_usuario;
    private $nombre_usuario;
    private $servicio;
    private $enlace_codificado;
    private $consumido;
    private $fecha;

    public function __construct($id, $id_usuario, $nombre_usuario, $servicio, $enlace_codificado, $consumido, $fecha) {
        $this -> id = $id;
        $this -> id_usuario = $id_usuario;
        $this -> nombre_usuario = $nombre_usuario;
        $this -> servicio = $servicio;
        $this -> enlace_codificado = $enlace_codificado;
        $this -> consumido = $consumido;
        $this -> fecha = $fecha;
    }

    // Getters.
    public function get_id() { return $this -> id; }
    public function get_id_usuario() { return $this -> id_usuario; }
    public function get_nombre_usuario() { return $this -> nombre_usuario; }
    public function get_servicio() { return $this -> servicio; }
    public function get_enlace_codificado() { return $this -> enlace_codificado; }
    public function get_consumido() { return $this -> consumido; }
    public function get_fecha() { return $this -> fecha; }

    // Setter
    public function set_id($id) { $this -> id = $id; }
    public function set_consumido($consumido) { $this -> consumido = $consumido; }
}