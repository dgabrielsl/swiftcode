<?php
class texto_aleatorio {
    function __construct() {}

    public static function generar_string_aleatorio() {
        $caracteres = '0123456789abcdefghijklmnopqrstuvwxyz_';
        $max = strlen($caracteres) - 1;
        $string_aleatorio = '';
        for ($i = 0; $i < 11; $i++) { $string_aleatorio .= $caracteres[rand(0, $max)]; }
        return $string_aleatorio;
    }

    public static function generar_enlace_codificado($longitud, $nombre_usuario) {
        $caracteres = '0123456789abcdefghijklmnopqrstuvwxyz_';
        $max = strlen($caracteres) - 1;
        $string_aleatorio = '';
        for ($i = 0; $i < $longitud; $i++) { $string_aleatorio .= $caracteres[rand(0, $max)]; }
        
        $enlace_secreto = hash('sha256', $string_aleatorio . $nombre_usuario);        
        return $enlace_secreto;
    }
}