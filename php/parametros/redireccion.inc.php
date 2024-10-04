<?php
class redireccion {
    public static function redirigir($url) {
        header("Location: " . $url, true, 301);
        // $url es el parámetro a pasar al método de la clase.
        // true/false: indica si queremos que se reescriba la dirección (barra de direcciones).
        // 301: indica redirección.
        
        exit();
        // También se puede usar die(); en vez de exit();
    }
}