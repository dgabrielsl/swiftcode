<?php
class modelo_transaccion {
    private $id;
    private $id_referencia;
    private $tabla;
    private $alias;
    private $evento;
    private $titulo;
    private $contenido;
    private $estado;
    private $fecha;
    
    public function __construct($id, $id_referencia, $tabla, $alias, $evento, $titulo, $contenido, $estado, $fecha) {
        $this -> id = $id;
        $this -> id_referencia = $id_referencia;
        $this -> tabla = $tabla;
        $this -> alias = $alias;
        $this -> evento = $evento;
        $this -> titulo = $titulo;
        $this -> contenido = $contenido;
        $this -> estado = $estado;
        $this -> fecha = $fecha;
    }

    // Getters.
    public function get_id() { return $this -> id; }
    public function get_id_referencia() { return $this -> id_referencia; }
    public function get_tabla() { return $this -> tabla; }
    public function get_alias() { return $this -> alias; }
    public function get_evento() { return $this -> evento; }
    public function get_titulo() { return $this -> titulo; }
    public function get_contenido() { return $this -> contenido; }
    public function get_estado() { return $this -> estado; }
    public function get_fecha() { return $this -> fecha; }

    // Setters.
    public function set_id($id) { $this -> id = $id; }
}