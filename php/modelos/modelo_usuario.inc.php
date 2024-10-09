<?php
class modelo_usuario {
    private $id; private $correo; private $alias; private $clave;
    private $nombre; private $apellido_1; private $apellido_2;
    private $telefono; private $telefono_empresa;
    private $empresa; private $correo_empresa;
    private $rol; private $estado; private $creado; private $modificado;
    
    public function __construct($id, $correo, $alias, $clave, $nombre, $apellido_1, $apellido_2, $telefono, $telefono_empresa, $empresa, $correo_empresa, $rol, $estado, $creado, $modificado) {
        $this -> id = $id;
        $this -> correo = $correo;
        $this -> alias = $alias;
        $this -> clave = $clave;
        $this -> nombre = $nombre;
        $this -> apellido_1 = $apellido_1;
        $this -> apellido_2 = $apellido_2;
        $this -> telefono = $telefono;
        $this -> telefono_empresa = $telefono_empresa;
        $this -> empresa = $empresa;
        $this -> correo_empresa = $correo_empresa;
        $this -> rol = $rol;
        $this -> estado = $estado;
        $this -> creado = $creado;
        $this -> modificado = $modificado;
    }

    // Getters.
    public function get_id() { return $this -> id; }
    public function get_correo() { return $this -> correo; }
    public function get_alias() { return $this -> alias; }
    public function get_clave() { return $this -> clave; }
    public function get_nombre() { return $this -> nombre; }
    public function get_apellido_1() { return $this -> apellido_1; }
    public function get_apellido_2() { return $this -> apellido_2; }
    public function get_telefono() { return $this -> telefono; }
    public function get_telefono_empresa() { return $this -> telefono_empresa; }
    public function get_empresa() { return $this -> empresa; }
    public function get_correo_empresa() { return $this -> correo_empresa; }
    public function get_rol() { return $this -> rol; }
    public function get_estado() { return $this -> estado; }
    public function get_creado() { return $this -> creado; }
    public function get_modificado() { return $this -> modificado; }
    
    // Setters.
    public function set_id($id) { $this -> id = $id; }
    public function set_correo($correo) { $this -> correo = $correo; }
    public function set_alias($alias) { $this -> alias = $alias; }
    public function set_clave($clave) { $this -> clave = $clave; }
    public function set_nombre($nombre) { $this -> nombre = $nombre; }
    public function set_apellido_1($apellido_1) { $this -> apellido_1 = $apellido_1; }
    public function set_apellido_2($apellido_2) { $this -> apellido_2 = $apellido_2; }
    public function set_telefono($telefono) { $this -> telefono = $telefono; }
    public function set_telefono_empresa($telefono_empresa) { $this -> telefono_empresa = $telefono_empresa; }
    public function set_empresa($empresa) { $this -> empresa = $empresa; }
    public function set_correo_empresa($correo_empresa) { $this -> correo_empresa = $correo_empresa; }
    public function set_rol($rol) { $this -> rol = $rol; }
    public function set_estado($estado) { $this -> estado = $estado; }
}