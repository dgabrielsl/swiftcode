<?php
include_once 'php/parametros/configuracion.inc.php';
include_once 'php/parametros/redireccion.inc.php';
include_once 'php/parametros/conexion.inc.php';
include_once 'php/parametros/control_sesion.inc.php';

$titulo = 'Ingresar';
include_once './publico/plantillas/encabezado_html.inc.php';
include_once './publico/plantillas/menu_html.inc.php';

Conexion::abrir_conexion();
?>

<div class="container-sm my-3 ">
  <div class="container text-center">
    <div class="row">
      <figure class="text-center mt-5">
        <blockquote class="blockquote">
          <p>Iniciar sesión</p>
        </blockquote>
        <figcaption class="blockquote-footer">
          <p>Al continuar, aceptas nuestro <a href="#"
              class="link-primary">Acuerdo del usuario</a> y
            confirmas que has entendido la <a href="#"
              class="link-primary">Política de privacidad</a>.</p>
        </figcaption>
      </figure>
    </div>
    <form method="post" action>
      <div class="row">
        <div class="col-1"></div>
        <div class="col-4">
          <div class="form-floating mb-3">
            <input type="email" class="form-control" id="floatingInput"
              placeholder="name@example.com" autofocus>
            <label for="floatingInput">Correo o usuario</label>
          </div>
        </div>
        <div class="col-4">
          <div class="form-floating">
            <input type="password" class="form-control" id="floatingPassword"
              placeholder="Password">
            <label for="floatingPassword">Contraseña</label>
          </div>
        </div>
        <div class="col-2">
          <button type="submit" name="ingresar"
            class="btn btn-primary px-4 py-3">Iniciar sesión</button>
        </div>
        <div class="col-1"></div>
      </div>
      <div class="row">
        <p class="mt-5 mb-0"><a
            class="link-offset-2 link-underline link-underline-opacity-0"
            href="#">¿Has olvidado tu contraseña?</a></p>
        <p>¿Es la primera vez en SwiftCode? <a
            class="link-offset-2 link-underline link-underline-opacity-0"
            href="<?php echo REGISTRARSE; ?>">Regístrate</a></p>
      </div>
    </form>

  </div>

</div>

<?php
Conexion::cerrar_conexion();
include_once './publico/plantillas/cierre_html.inc.php';
?>