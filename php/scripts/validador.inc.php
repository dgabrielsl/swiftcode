<?php
include_once './php/repositorios/repositorio_usuarios.inc.php';
include_once './php/scripts/texto_aleatorio.inc.php';

class validador {
    private $correo; private $usuario;
    private $nombre; private $apellido; private $apellido_2;
    private $telefono; private $telefono_2;
    private $empresa; private $correo_empresa;
    private $clave; private $clave_2;

    function __construct($correo = '', $usuario = '', $nombre = '', $apellido = '', $apellido_2 = '', $telefono = '', $telefono_2 = '', $empresa = '', $correo_empresa = '', $clave = '', $clave_2 = '', $consumible = '') {
        $this -> correo = $correo;
        $this -> usuario = $usuario;
        $this -> nombre = $nombre;
        $this -> apellido = $apellido;
        $this -> apellido_2 = $apellido_2;
        $this -> telefono = $telefono;
        $this -> telefono_2 = $telefono_2;
        $this -> empresa = $empresa;
        $this -> correo_empresa = $correo_empresa;
        $this -> clave = $clave;
        $this -> clave_2 = $clave_2;
        $this -> consumible = $consumible;
    }

    public static function variable_iniciada ($consumible) { return isset($consumible) && !empty($consumible); }

    public static function escribir_mensajes ($lista_de_mensajes) {
        $p = '<p class="my-0"><i class="bi bi-pin-angle-fill mx-1 mensaje-error-icono-animado"></i>';
        if (is_array($lista_de_mensajes)) {
            foreach ($lista_de_mensajes as $linea) {
                if (is_array($linea)) {
                    foreach ($linea as $sub_linea) {
                        echo $p . $sub_linea . '</p>';
                    }
                } else {
                    echo $p . $linea . '</p>';
                }
            }
        } else {
            echo $p . $lista_de_mensajes . '</p>';
        }
    }

    public static function validar_correo($conexion, $correo) {
        $mensajes = [];

        if (!self::variable_iniciada($correo)) {
            $mensajes[] = 'Por favor, rellena este campo.';
            return $mensajes;
        }

        if (repositorio_usuarios::correo_existe($conexion, $correo)) {
            $mensajes[] = 'Este correo ya se encuentra registrado.';
            $mensajes[] = 'Prueba <a href="' . INGRESAR . '"> iniciar sesión</a>.';
            return $mensajes;
        }

        if (!filter_var($correo, FILTER_VALIDATE_EMAIL)) {
            $mensajes[] = 'El correo electrónico "' . $correo . '" no es válido.';
        }

        if (strlen($correo) > 50) {
            $mensajes[] = 'Este campo solo acepta 50 caracteres, tu correo tiene ' . strlen($correo) . '.';
        }

        $dominio = substr(strrchr($correo, "@"), 1);
        if (!empty($dominio) && !checkdnsrr($dominio, 'MX')) {
            $mensajes[] = 'El dominio  "' . $dominio . '" no parece válido.';
        }

        $correos_temporales = [
            'tempmail.com', 'guerrillamail.com', 'mailinator.com', '10minutemail.com', 'throwawaymail.com',
            'fakemailgenerator.com', 'temp-mail.org', 'mytemp.email', 'getnada.com', 'maildrop.cc',
            'emailondeck.com', 'yopmail.com', 'smailpro.com', 'e4ward.com', 'fakeinbox.com',
            'mailcatch.com', 'instantemailaddress.com', 'poofy.co', 'dottodot.com', 'spamgourmet.com',
            'dispostable.com', 'temp-mail.io', 'getairmail.com', 'fakemail.com', 'shortmail.com'
        ];

        if (in_array($dominio, $correos_temporales)) {
            $mensajes[] = 'El uso de correos temporales no está permitido.';
        }

        if (preg_match_all('/[^a-zA-Z0-9._@]/', $correo, $caracteres_invalidos)) {
            $caracteres = implode(', ', array_unique($caracteres_invalidos[0]));
            $mensajes[] = 'El correo contiene caracteres no permitidos: "' . $caracteres . '".';
            $mensajes[] = 'Solo se permiten letras, números, punto (.), guión bajo (_) y arroba (@).';
        }

        return $mensajes;
    }

    public static function validar_correo_secundario($conexion, $correo) {
        $mensajes = [];

        if (!self::variable_iniciada($correo)) {
            $mensajes[] = 'Por favor, rellena este campo.';
            return $mensajes;
        }

        if (!filter_var($correo, FILTER_VALIDATE_EMAIL)) {
            $mensajes[] = 'El correo electrónico "' . $correo . '" no es válido.';
        }

        if (strlen($correo) > 50) {
            $mensajes[] = 'Este campo solo acepta 50 caracteres, tu correo tiene ' . strlen($correo) . '.';
        }

        $dominio = substr(strrchr($correo, "@"), 1);
        if (!empty($dominio) && !checkdnsrr($dominio, 'MX')) {
            $mensajes[] = 'El dominio  "' . $dominio . '" no parece válido.';
        }

        $correos_temporales = [
            'tempmail.com', 'guerrillamail.com', 'mailinator.com', '10minutemail.com', 'throwawaymail.com',
            'fakemailgenerator.com', 'temp-mail.org', 'mytemp.email', 'getnada.com', 'maildrop.cc',
            'emailondeck.com', 'yopmail.com', 'smailpro.com', 'e4ward.com', 'fakeinbox.com',
            'mailcatch.com', 'instantemailaddress.com', 'poofy.co', 'dottodot.com', 'spamgourmet.com',
            'dispostable.com', 'temp-mail.io', 'getairmail.com', 'fakemail.com', 'shortmail.com'
        ];

        if (in_array($dominio, $correos_temporales)) {
            $mensajes[] = 'El uso de correos temporales no está permitido.';
        }

        if (preg_match_all('/[^a-zA-Z0-9._@]/', $correo, $caracteres_invalidos)) {
            $caracteres = implode(', ', array_unique($caracteres_invalidos[0]));
            $mensajes[] = 'El correo contiene caracteres no permitidos: "' . $caracteres . '".';
            $mensajes[] = 'Solo se permiten letras, números, punto (.), guión bajo (_) y arroba (@).';
        }

        return $mensajes;
    }
    
    public static function validar_usuario($conexion, $usuario) {
        $mensajes = [];

            if (repositorio_usuarios::usuario_existe($conexion, $usuario)) {
                $mensajes[] = 'Este nombre de usuario ya se encuentra en uso.';
                $mensajes[] = 'Si dejas el campo en blanco generamos uno automáticamente, puedes modificarlo después.';
                return $mensajes;
            }

            if (preg_match_all('/[^a-zA-Z0-9_]/', $usuario, $caracteres_invalidos)) {
                $caracteres = implode(', ', array_unique($caracteres_invalidos[0]));
                $mensajes[] = 'El texto contiene caracteres no permitidos: "' . $caracteres . '".';
                $mensajes[] = 'Solo se permiten letras, números y guión bajo (_).';
            }

            if (strlen($usuario) < 8 || strlen($usuario) > 15) $mensajes[] = 'Debe contener entre 8 y 15 caracteres, actualmente tiene ' . strlen($usuario) . '.';

            if (substr_count($usuario, '_') > 2) $mensajes[] = 'Puedes usar hasta dos guiones bajos (_), actualmente tiene ' . substr_count($usuario, '_');            

            if (count($mensajes) > 0) $mensajes[] = 'Si dejas el campo en blanco generamos uno automáticamente, puedes modificarlo después.';

            return $mensajes;
    }

    public static function validar_texto($conexion, $campo) {
        $mensajes = [];

        if (!self::variable_iniciada($campo)) {
            $mensajes[] = 'Por favor, rellena este campo.';
            return $mensajes;
        }
        
        if (strlen($campo) < 3 || strlen($campo) > 30) $mensajes[] = 'Debe contener entre 3 y 30 caracteres, actualmente tiene ' . strlen($campo) . '.';
        
        if (!preg_match('/^[a-zA-ZáéíóúÁÉÍÓÚñÑ\s\']+$/', $campo)) $mensajes[] = 'Este campo solo acepta letras, espacios y acentos.';
        
        if (preg_match('/ {2,}/', $campo)) $mensajes[] = 'El texto no puede contener dos o más espacios consecutivos.';
        if (preg_match('/^\s/', $campo)) $mensajes[] = 'El campo no puede comenzar con uno más espacios en blanco.';
        if (preg_match('/\s$/', $campo)) $mensajes[] = 'El texto no puede terminar con un o más espacios en blanco.';

        return $mensajes;
    }

    public static function validar_telefono($conexion, $telefono) {
        $mensajes = [];

        if (!self::variable_iniciada($telefono)) {
            $mensajes[] = 'Por favor, rellena este campo.';
            return $mensajes;
        }

        if (!preg_match('/^\d+$/', $telefono)) $mensajes[] = 'Este campo solo puede contener números.';

        if (preg_match('/^0/', $telefono)) $mensajes[] = 'El número "' . $telefono . '" empieza con 0, no parece un número válido.';

        if (strlen($telefono) < 8 || strlen($telefono) > 12) $mensajes[] = 'Debe contener entre 8 y 12 caracteres, actualmente tiene ' . strlen($telefono) . '.';

        return $mensajes;
    }

    public static function validar_texto_extendido($conexion, $campo) {
        $mensajes = [];

        if (strlen($campo) < 3 || strlen($campo) > 100) $mensajes[] = 'Debe contener entre 3 y 100 caracteres, actualmente tiene ' . strlen($campo) . '.';
        
        if (!preg_match('/^[a-zA-ZáéíóúÁÉÍÓÚñÑ0-9\s]+$/', $campo)) $mensajes[] = 'Este campo solo acepta letras, espacios, números y acentos.';

        if (preg_match('/ {2,}/', $campo)) $mensajes[] = 'El texto no puede contener dos o más espacios consecutivos.';
        if (preg_match('/^\s/', $campo)) $mensajes[] = 'El campo no puede comenzar con uno más espacios en blanco.';
        if (preg_match('/\s$/', $campo)) $mensajes[] = 'El texto no puede terminar con un o más espacios en blanco.';

        return $mensajes;
    }

    public static function validar_clave($conexion, $clave) {
        $mensajes = [];
        if (!self::variable_iniciada($clave)) {
            $mensajes[] = 'Por favor, rellena este campo.';
            return $mensajes;
        }

        if (strlen($clave) < 8 || strlen($clave) > 20) $mensajes[] = 'Debe contener entre 8 y 20 caracteres, actualmente tiene ' . strlen($clave) . '.';
        
        if (!preg_match('/[A-Z]/', $clave)) $mensajes[] = "Falta al menos una letra mayúscula.";
        if (!preg_match('/[a-z]/', $clave)) $mensajes[] = "Falta al menos una letra minúscula.";
        if (!preg_match('/[0-9]/', $clave)) $mensajes[] = "Falta al menos un número.";
        if (!preg_match('/[!?@#$%^&*.+-]/', $clave)) $mensajes[] = "Falta al menos un carácter especial (!?@#$%^&*.+-)";
        if (!preg_match('/[!?@#$%^&*()]/', $clave)) $mensajes[] = "La contraseña debe contener al menos un carácter especial: !?@#$%^&*()";
        
        return $mensajes;
    }
}