<?php
class modelo_usuario_transacciones {
    private $id;
    private $id_usuario;
    private $evento;
    private $fecha;
    
    public function __construct($id, $id_usuario, $evento, $fecha) {
        $this -> id = $id;
        $this -> id_usuario = $id_usuario;
        $this -> evento = $evento;
        $this -> fecha = $fecha;
    }

    // Getters.
    public function get_id() { return $this -> id; }
    public function get_id_usuario() { return $this -> id_usuario; }
    public function get_evento() { return $this -> evento; }
    public function get_fecha() { return $this -> fecha; }
}