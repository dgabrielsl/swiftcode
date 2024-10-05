<?php
session_start();

include_once './php/parametros/configuracion.inc.php';
include_once './php/parametros/conexion.inc.php';
include_once './php/parametros/control_sesion.inc.php';

include_once './php/scripts/validador.inc.php';
include_once './php/modelos/modelo_usuario.inc.php';
include_once './php/repositorios/repositorio_usuarios.inc.php';

$titulo = 'Registrarse';
include_once './publico/plantillas/encabezado_html.inc.php';
include_once './publico/plantillas/menu_html.inc.php';

$datos = false;
$correcciones = '';
$campos = [];

conexion::abrir_conexion();

if (isset($_SESSION['campos']) && isset($_SESSION['campos'])) {
    $datos = true;
    $campos = $_SESSION['campos'];
    $correcciones_correo = $_SESSION['correcciones_correo'];
    $correcciones_usuario = $_SESSION['correcciones_usuario'];
    $correcciones_nombre = $_SESSION['correcciones_nombre'];
    $correcciones_nombre = $_SESSION['correcciones_nombre'];
    $correcciones_apellido = $_SESSION['correcciones_apellido'];
    $correcciones_apellido_2 = $_SESSION['correcciones_apellido_2'];
    $correcciones_telefono = $_SESSION['correcciones_telefono'];
    $correcciones_telefono_2 = $_SESSION['correcciones_telefono_2'];
    $correcciones_empresa = $_SESSION['correcciones_empresa'];
    $correcciones_correo_empresa = $_SESSION['correcciones_correo_empresa'];
    $correcciones_clave = $_SESSION['correcciones_clave'];
    $correcciones_confirmar_clave = $_SESSION['correcciones_confirmar_clave'];
    $usuario_autorizado = $_SESSION['usuario_autorizado'];
}

session_destroy();
?>

<div class="container-sm my-3 ">
    <div class="container text-center">
        <div class="row">
            <figure class="text-center mt-5">
                <blockquote class="blockquote">
                    <p>Registrarse</p>
                </blockquote>
                <figcaption class="blockquote-footer">
                    <p>Al continuar, aceptas nuestro <a href="#"
                            class="link-primary">Acuerdo del usuario</a> y
                        confirmas que has entendido la <a href="#"
                            class="link-primary">Política de privacidad</a>.</p>
                </figcaption>
            </figure>
            <form method="post" action="<?php echo CONTROLADOR_REGISTRARSE; ?>">
                <div class="row mb-3">
                    <div class="col">
                        <div class="form-floating has-validation">
                            <input type="text" name="correo" id="correo" placeholder="Correo" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Introduce un correo electrónico válido."
                                class="form-control <?php if ($datos && count($correcciones_correo)) echo 'is-invalid'; ?>"
                                value="<?php if ($datos) echo $campos[0]; ?>" <?php if (!$datos) echo 'autofocus'; ?>>
                            <label for="correo">Correo</label>
                            <div class="invalid-feedback">
                                <?php if ($datos) echo validador::escribir_mensajes($correcciones_correo); ?>
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="input-group has-validation">
                            <span class="input-group-text">@</span>
                            <div class="form-floating <?php if ($datos && count($correcciones_usuario)) echo 'is-invalid'; ?>">
                                <input type="text" name="usuario" id="floatingInputGroup1" placeholder="Usuario" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Elige un nombre de usuario único (puedes usar letras, números y guión bajo) o deja el campo en blanco y te generamos uno automáticamente."
                                    class="form-control <?php if ($datos && count($correcciones_usuario)) echo 'is-invalid'; ?>"
                                    <?php
                                        if ($datos && $usuario_autorizado != '') {
                                            echo 'value="' . $usuario_autorizado . '"';
                                        } else if ($datos) {
                                            echo 'value="'. $campos[1] . '"';
                                        }
                                    ?>>
                            <label for="floatingInputGroup1">Usuario <span class="text-secondary">(opcional)</span></label>
                            </div>
                            <div class="invalid-feedback">
                                <?php if ($datos) echo validador::escribir_mensajes($correcciones_usuario); ?>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col">
                        <div class="form-floating has-validation">
                            <input type="text" name="nombre" id="nombre" placeholder="Nombre" data-bs-toggle="tooltip" data-bs-placement="bottom"title="Introduce tu nombre."
                                class="form-control <?php if ($datos && count($correcciones_nombre)) echo 'is-invalid'; ?>"
                                value="<?php if ($datos) echo ucwords(mb_strtolower($campos[2], 'UTF-8')); ?>">
                            <label for="nombre">Nombre</label>
                            <div class="invalid-feedback">
                                <?php if ($datos) echo validador::escribir_mensajes($correcciones_nombre); ?>
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-floating has-validation">
                            <input type="text" name="apellido" id="apellido1" placeholder="Apellido 1" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Introduce tu primer apellido."
                                class="form-control <?php if ($datos && count($correcciones_apellido)) echo 'is-invalid'; ?>"
                                value="<?php if ($datos) echo ucwords(mb_strtolower($campos[3], 'UTF-8')); ?>">
                            <label for="apellido1">Apellido 1</label>
                            <div class="invalid-feedback">
                                <?php if ($datos) echo validador::escribir_mensajes($correcciones_apellido); ?>
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-floating has-validation">
                            <input type="text" name="apellido_2" id="apellido2" placeholder="Apellido 2" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Introduce tu segundo apellido."
                                class="form-control <?php if ($datos && count($correcciones_apellido_2)) echo 'is-invalid'; ?>"
                                value="<?php if ($datos) echo ucwords(mb_strtolower($campos[4], 'UTF-8')); ?>">
                            <label for="apellido2">Apellido 2</span></label>
                            <div class="invalid-feedback">
                                <?php if ($datos) echo validador::escribir_mensajes($correcciones_apellido_2); ?>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col">
                        <div class="form-floating has-validation">
                            <input type="number" name="telefono" id="telefono1" placeholder="Teléfono 1" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Proporciona un número de teléfono principal."
                                class="form-control <?php if ($datos && count($correcciones_telefono)) echo 'is-invalid'; ?>"
                                value="<?php if ($datos) echo $campos[5]; ?>">
                            <label for="telefono1">Teléfono principal</label>
                            <div class="invalid-feedback">
                                <?php if ($datos) echo validador::escribir_mensajes($correcciones_telefono); ?>
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-floating has-validation">
                            <input type="number" name="telefono_secundario" id="telefono2" placeholder="Teléfono 2" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Proporciona un segundo número de teléfono."
                                class="form-control <?php if ($datos && count($correcciones_telefono_2)) echo 'is-invalid'; ?>"
                                value="<?php if ($datos) echo $campos[6]; ?>">
                            <label for="telefono2">Teléfono secundario <span class="text-secondary">(opcional)</span></label>
                            <div class="invalid-feedback">
                                <?php if ($datos) echo validador::escribir_mensajes($correcciones_telefono_2); ?>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col">
                        <div class="form-floating has-validation">
                            <input type="text" name="empresa" id="empresa" placeholder="Empresa" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Introduce el nombre de tu empresa."
                                class="form-control <?php if ($datos && count($correcciones_empresa)) echo 'is-invalid'; ?>"
                                value="<?php if ($datos) echo $campos[7]; ?>">
                            <label for="empresa">Empresa <span class="text-secondary">(opcional)</span></label>
                            <div class="invalid-feedback">
                                <?php if ($datos) echo validador::escribir_mensajes($correcciones_empresa); ?>
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-floating has-validation">
                            <input type="text" name="correo_empresa" id="correoSecundario" placeholder="Correo Secundario" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Introduce un correo electrónico secundario."
                                class="form-control <?php if ($datos && count($correcciones_correo_empresa)) echo 'is-invalid'; ?>"
                                value="<?php if ($datos) echo $campos[8]; ?>">
                            <label for="correoSecundario">Correo secundario <span class="text-secondary">(opcional)</span></label>
                            <div class="invalid-feedback">
                                <?php if ($datos) echo validador::escribir_mensajes($correcciones_correo_empresa); ?>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col">
                        <div class="form-floating has-validation">
                            <input type="password" name="clave" id="clave" placeholder="Clave" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Tu clave debe contener al menos 8 caracteres, incluir una mayúscula, un número y un caracter especial."
                                class="form-control <?php if ($datos && count($correcciones_clave)) echo 'is-invalid'; ?> private-text-view"
                                value="<?php if ($datos) echo $campos[9]; ?>">
                            <label for="clave">Contraseña</label>
                            <div class="invalid-feedback">
                                <?php if ($datos) echo validador::escribir_mensajes($correcciones_clave); ?>
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="input-group has-validation">
                            <div class="form-floating flex-grow-1">
                                <input type="password" name="clave_2" id="confirmarClave" placeholder="Confirmar clave" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Confirma tu contraseña."
                                    class="form-control <?php if ($datos && count($correcciones_confirmar_clave)) echo 'is-invalid'; ?> private-text-view"
                                    value="<?php if ($datos) echo $campos[10]; ?>">
                                <label for="confirmarClave">Confirmar contraseña</label>
                                <div class="invalid-feedback">
                                    <?php if ($datos) echo validador::escribir_mensajes($correcciones_confirmar_clave); ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="d-flex justify-content-center mb-3">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="mostrarClave" name="mostrar_claves">
                        <label class="form-check-label" for="mostrarClave">Mostrar contraseñas</label>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <button type="reset" class="btn btn-secondary mx-1 my-1 px-5 py-2">Limpiar</button>
                        <button type="submit" class="btn btn-primary mx-1 my-1 px-5 py-2">Enviar</button>
                    </div>
                </div>
            </form>
            <div class="row">
                <p class="mt-5 mb-0">Ya tengo cuenta. Volver para <a class="link-offset-2 link-underline link-underline-opacity-0" href="<?php echo INGRESAR; ?>">iniciar sesión</a>.</p>
            </div>
        </div>
    </div>
</div>
<script>
    var checkbox = document.getElementById('mostrarClave');
    var privateTextFields = document.querySelectorAll('.private-text-view');

    checkbox.addEventListener('change', function() {
        privateTextFields.forEach(function(input) {
            if (checkbox.checked) {
                input.setAttribute('type', 'text');
            } else {
                input.setAttribute('type', 'password');
            }
        });
    });

    document.querySelector('button[type="reset"]').addEventListener('click', function() {
        var inputs = document.querySelectorAll('input');
        inputs.forEach(function(input) {
            input.value = '';
            input.defaultValue = '';
        });
        document.getElementById('correo').focus();
    });
</script>
<?php
include_once './publico/plantillas/cierre_html.inc.php';
?>