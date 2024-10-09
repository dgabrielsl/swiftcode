<?php
include_once 'php/parametros/configuracion.inc.php';
include_once 'php/parametros/conexion.inc.php';

// $componentes_url = parse_url($_SERVER['SERVER_NAME'] . $_SERVER['REQUEST_URI']);
$componentes_url = parse_url($_SERVER['REQUEST_URI']);

$ruta = $componentes_url['path'];
$secciones = explode('/', $ruta);
$secciones = array_filter($secciones);
$secciones = array_slice($secciones, 0);

$vista_de_usuario = 'publico/vistas/404.php';

// if ($secciones[0] == 'swiftcodepages.x10.mx') {
if ($secciones[0] == 'swiftcode') {
    if (count($secciones) == 1) {
        $vista_de_usuario = 'publico/vistas/inicio.php';
    } else if (count($secciones) == 2) {
        switch ($secciones[1]) {
            case 'pruebas':
                $vista_de_usuario = 'php/scripts/pruebas.php';
                break;
            case 'guia-de-usuario':
                $vista_de_usuario = 'publico/vistas/guia_de_usuario.php';
                break;
            case 'ingresar':
                $vista_de_usuario = 'publico/vistas/ingresar.php';
                break;
            case 'registrarse':
                $vista_de_usuario = 'publico/vistas/registrarse.php';
                break;
            case 'salir':
                $vista_de_usuario = 'publico/vistas/salir.php';
                break;
            case 'clientes':
                $vista_de_usuario = 'publico/vistas/clientes.php';
                break;
            case 'panel-de-control':
                $vista_de_usuario = 'publico/vistas/panel_de_control.php';
                break;
            case 'servicios':
                $vista_de_usuario = 'publico/vistas/servicios.php';
                break;
            case 'portafolio-de-proyectos':
                $vista_de_usuario = 'publico/vistas/proyectos.php';
                break;
            case 'blog':
                $vista_de_usuario = 'publico/vistas/blog.php';
                break;
            case 'preguntas-y-respuestas-frecuentes':
                $vista_de_usuario = 'publico/vistas/faqs.php';
                break;
            case 'mi-cuenta':
                $vista_de_usuario = 'publico/vistas/cuenta.php';
                break;
            case 'formulario-de-contacto':
                $vista_de_usuario = 'publico/vistas/contacto.php';
                break;
            case 'controlador-registrarse':
                $vista_de_usuario = 'php/controladores/controlador_registrarse.php';
                break;
            case 'registro-correcto':
                $vista_de_usuario = 'publico/vistas/registro_correcto.php';
                break;
            case 'enviar-correo':
                $vista_de_usuario = 'php/scripts/enviar_correo.php';
                break;
        }
    }
} else {
    $vista_de_usuario = 'publico/vistas/404.php';
}

include_once $vista_de_usuario;