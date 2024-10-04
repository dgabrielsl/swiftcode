<?php
class modelo_usuario {
    private $id; private $correo; private $usuario; private $clave;
    private $nombre; private $apellido; private $apellido_2;
    private $telefono; private $telefono_secundario;
    private $empresa; private $correo_empresa;
    private $cuenta; private $estado; private $creado;
    
    public function __construct($id, $correo, $usuario, $clave, $nombre, $apellido, $apellido_2, $telefono, $telefono_secundario, $empresa, $correo_empresa, $cuenta, $estado, $creado) {
        $this -> id = $id;
        $this -> correo = $correo;
        $this -> usuario = $usuario;
        $this -> clave = $clave;
        $this -> nombre = $nombre;
        $this -> apellido = $apellido;
        $this -> apellido_2 = $apellido_2;
        $this -> telefono = $telefono;
        $this -> telefono_secundario = $telefono_secundario;
        $this -> empresa = $empresa;
        $this -> correo_empresa = $correo_empresa;
        $this -> cuenta = $cuenta;
        $this -> estado = $estado;
        $this -> creado = $creado;
    }

    // Getters.
    public function get_id() { return $this -> id; }
    public function get_correo() { return $this -> correo; }
    public function get_usuario() { return $this -> usuario; }
    public function get_clave() { return $this -> clave; }
    public function get_nombre() { return $this -> nombre; }
    public function get_apellido() { return $this -> apellido; }
    public function get_apellido_2() { return $this -> apellido_2; }
    public function get_telefono() { return $this -> telefono; }
    public function get_telefono_secundario() { return $this -> telefono_secundario; }
    public function get_empresa() { return $this -> empresa; }
    public function get_correo_empresa() { return $this -> correo_empresa; }
    public function get_cuenta() { return $this -> cuenta; }
    public function get_estado() { return $this -> estado; }
    public function get_creado() { return $this -> creado; }
    
    // Setters.
    public function set_correo($correo) { $this -> correo = $correo; }
    public function set_usuario($usuario) { $this -> usuario = $usuario; }
    public function set_clave($clave) { $this -> clave = $clave; }
    public function set_nombre($nombre) { $this -> nombre = $nombre; }
    public function set_apellido($apellido) { $this -> apellido = $apellido; }
    public function set_apellido_2($apellido_2) { $this -> apellido_2 = $apellido_2; }
    public function set_telefono($telefono) { $this -> telefono = $telefono; }
    public function set_telefono_secundario($telefono_secundario) { $this -> telefono_secundario = $telefono_secundario; }
    public function set_empresa($empresa) { $this -> empresa = $empresa; }
    public function set_correo_empresa($correo_empresa) { $this -> correo_empresa = $correo_empresa; }
    public function set_cuenta($cuenta) { $this -> cuenta = $cuenta; }
    public function set_estado($estado) { $this -> estado = $estado; }
    public function set_creado($creado) { $this -> creado = $creado; }
}