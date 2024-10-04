<?php
class usuario_aleatorio {
    function __construct() {}

    public static function generar_string_aleatorio() {
        $caracteres = '0123456789abcdefghijklmnopqrstuvwxyz_';
        $max = strlen($caracteres) - 1;
        $string_aleatorio = '';
        for ($i = 0; $i < 11; $i++) { $string_aleatorio .= $caracteres[rand(0, $max)]; }
        return $string_aleatorio;
    }
}