<?php
# Mi base de datos.
define('SERVERNAME', 'localhost');
define('DBONAME', 'dgsl_93_swiftcode');
define('USERNAME', 'root');
define('PASSWORD', '');

# Vistas.
define('SERVIDOR', 'http://localhost/swiftcode');
define('NO_DISPONIBLE', SERVIDOR . '/pagina-no-encontrada');
define('INICIO', SERVIDOR);
define('INGRESAR', SERVIDOR . '/ingresar');
define('CUENTA', SERVIDOR . '/mi-cuenta');
define('CLIENTES', SERVIDOR . '/clientes');

define('CONTROL', SERVIDOR . '/panel-de-control');
    define('MAPA', CONTROL . '/mapa-del-sitio');
    define('DESARROLLADOR', CONTROL . '/ambiente-de-pruebas');
    define('ADMINISTRADOR_RESUMEN', CONTROL . '/resumen-restringido');
    define('ADMINISTRADOR_TRANSACCIONES', CONTROL . '/transacciones-restringido');
    define('RESUMEN', CONTROL . '/resumen-informativo');
    define('TRANSACCIONES', CONTROL . '/registro-de-actividades');

define('BLOG', SERVIDOR . '/blog');
define('FAQS', SERVIDOR . '/preguntas-y-respuestas-frecuentes');
define('SERVICIOS', SERVIDOR . '/servicios');
define('PROYECTOS', SERVIDOR . '/portafolio-de-proyectos');
define('REGISTRARSE', SERVIDOR . '/registrarse');
define('SALIR', SERVIDOR . '/salir');
define('CONTACTO', SERVIDOR . '/formulario-de-contacto');
define('REGISTRADO', SERVIDOR . '/registro-correcto');
define('ENVIAR_CORREO', SERVIDOR . '/enviar-correo');
// define('', SERVIDOR . '');

# Controladores/repositorios.
define('CONTROLADOR_REGISTRARSE', SERVIDOR . '/controlador-registrarse');

# Formularios validados.

# Recursos.
define('RECURSOS', INICIO . '/recursos');
define('CSS', INICIO . '/css');
define('JS', INICIO . '/js');