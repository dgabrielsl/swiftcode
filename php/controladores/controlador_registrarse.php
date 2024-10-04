<?php
$titulo = 'Procesando 🪄';

include_once './php/parametros/configuracion.inc.php';
include_once './php/parametros/conexion.inc.php';
include_once './php/repositorios/repositorio_usuario.inc.php';
include_once './php/parametros/redireccion.inc.php';

include_once './php/scripts/validador.inc.php';

session_start();
conexion::abrir_conexion();

$_SESSION['campos'] = [
    $correo = $_POST['correo'],
    $usuario = $_POST['usuario'],
    $nombre = $_POST['nombre'],
    $apellido = $_POST['apellido'],
    $apellido_2 = $_POST['apellido_2'],
    $telefono = $_POST['telefono'],
    $telefono_secundario = $_POST['telefono_secundario'],
    $empresa = $_POST['empresa'],
    $correo_empresa = $_POST['correo_empresa'],
    $clave = $_POST['clave'],
    $clave_2 = $_POST['clave_2'],
];

$correcciones_correo = validador::validar_correo(conexion::obtener_conexion(), $correo);

if (!empty($usuario)) {
    $correcciones_usuario = validador::validar_usuario(conexion::obtener_conexion(), $usuario);
    $usuario_autorizado = $usuario;
    $_SESSION['usuario_autorizado'] = $usuario_autorizado;
} else {
    do {
        $usuario_de_sistema = usuario_aleatorio::generar_string_aleatorio();
        $correcciones_usuario = validador::validar_usuario(conexion::obtener_conexion(), $usuario_de_sistema);
    } while (count($correcciones_usuario));
    $usuario_autorizado = $usuario_de_sistema;
    $_SESSION['usuario_autorizado'] = $usuario_autorizado;
}

$correcciones_nombre = validador::validar_texto(conexion::obtener_conexion(), $nombre , 0);
$correcciones_apellido = validador::validar_texto(conexion::obtener_conexion(), $apellido);
$correcciones_apellido_2 = validador::validar_texto(conexion::obtener_conexion(), $apellido_2);
$correcciones_telefono = validador::validar_telefono(conexion::obtener_conexion(), $telefono);

$mensaje_adicional = 'También puedes dejar el campo en blanco.';

$correcciones_telefono_2 = [];
if (validador::variable_iniciada($telefono_secundario)) {
    $correcciones_telefono_2 = validador::validar_telefono(conexion::obtener_conexion(), $telefono_secundario);
    if (count($correcciones_telefono_2)) $correcciones_telefono_2[] = $mensaje_adicional;
}

$correcciones_empresa = [];
if (validador::variable_iniciada($empresa)) {
    $correcciones_empresa = validador::validar_texto_extendido(conexion::obtener_conexion(), $empresa);
    if (count($correcciones_empresa)) $correcciones_empresa[] = $mensaje_adicional;
}

$correcciones_correo_empresa = [];
if (validador::variable_iniciada($correo_empresa)) {
    $correcciones_correo_empresa = validador::validar_correo_secundario(conexion::obtener_conexion(), $correo_empresa);
    if (count($correcciones_correo_empresa)) $correcciones_correo_empresa[] = $mensaje_adicional;
}

$correcciones_clave = validador::validar_clave(conexion::obtener_conexion(), $clave);

$correcciones_confirmar_clave = [];

if (empty($clave_2)) {
    $correcciones_confirmar_clave[] = 'Por favor, rellena este campo.';
} else {
    if ($clave != $clave_2) {
        $correcciones_clave[] = 'Las contraseñas no coinciden.';
        $correcciones_confirmar_clave[] = 'Las contraseñas no coinciden.';
    } else if (!count($correcciones_confirmar_clave)) {
        $correcciones_confirmar_clave = $correcciones_clave;
    }
}

if (!count($correcciones_correo) && !count($correcciones_usuario) && !count($correcciones_nombre) && !count($correcciones_apellido) && !count($correcciones_apellido_2) && !count($correcciones_telefono) && !count($correcciones_telefono_2) && !count($correcciones_empresa) && !count($correcciones_correo_empresa) && !count($correcciones_clave) && !count($correcciones_confirmar_clave)) {
    session_destroy();
    session_start();
    $_SESSION['registro_correcto'] = 1;
    $_SESSION['datos'] = [$nombre, $usuario_autorizado, $correo];
    redireccion::redirigir(REGISTRADO);

    include_once './php/scripts/enviar_email.inc.php';
    
    enviar_correo::enviar();

}

$_SESSION['correcciones_correo'] = $correcciones_correo;
$_SESSION['correcciones_usuario'] = $correcciones_usuario;
$_SESSION['correcciones_nombre'] = $correcciones_nombre;
$_SESSION['correcciones_apellido'] = $correcciones_apellido;
$_SESSION['correcciones_apellido_2'] = $correcciones_apellido_2;
$_SESSION['correcciones_telefono'] = $correcciones_telefono;
$_SESSION['correcciones_telefono_2'] = $correcciones_telefono_2;
$_SESSION['correcciones_empresa'] = $correcciones_empresa;
$_SESSION['correcciones_correo_empresa'] = $correcciones_correo_empresa;
$_SESSION['correcciones_clave'] = $correcciones_clave;
$_SESSION['correcciones_confirmar_clave'] = $correcciones_confirmar_clave;

redireccion::redirigir(REGISTRARSE);
conexion::cerrar_conexion();