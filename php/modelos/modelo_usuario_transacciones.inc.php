<?php
class modelo_usuario_transacciones {
    private $id;
    private $id_usuario;
    private $nombre_usuario;
    private $nombre_completo;
    private $correo;
    private $telefono;
    private $tipo_evento;
    private $fecha;
    
    public function __construct($id, $id_usuario, $nombre_usuario, $nombre_completo, $correo, $telefono, $tipo_evento, $fecha) {
        $this -> id = $id;
        $this -> id_usuario = $id_usuario;
        $this -> nombre_usuario = $nombre_usuario;
        $this -> nombre_completo = $nombre_completo;
        $this -> correo = $correo;
        $this -> telefono = $telefono;
        $this -> tipo_evento = $tipo_evento;
        $this -> fecha = $fecha;
    }

    // Getters.
    public function get_id() { return $this -> id; }
    public function get_id_usuario() { return $this -> id_usuario; }
    public function get_nombre_usuario() { return $this -> nombre_usuario; }
    public function get_nombre_completo() { return $this -> nombre_completo; }
    public function get_correo() { return $this -> correo; }
    public function get_telefono() { return $this -> telefono; }
    public function get_tipo_evento() { return $this -> tipo_evento; }
    public function get_fecha() { return $this -> fecha; }
}