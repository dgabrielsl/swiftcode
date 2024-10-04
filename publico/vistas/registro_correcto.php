<?php
session_start();

include_once './php/parametros/configuracion.inc.php';
include_once './php/parametros/redireccion.inc.php';

if (isset($_SESSION['registro_correcto'])) {
    $datos = $_SESSION['datos'];
    session_destroy();
} else {
    redireccion::redirigir(INICIO);
}

$titulo = 'Inicio';
include_once './publico/plantillas/encabezado_html.inc.php';
include_once './publico/plantillas/menu_html.inc.php';
?>

<div class="container-sm my-3">
    <div class="alert alert-info bg-light" role="alert">
        <h5><i class="bi bi-check-circle-fill mx-2"></i>Registro correcto!</h5>
        <hr>
        <h2>Hola <?php echo $datos[0] . ' / ' . $datos[1] . ' / ' . $datos[2]; ?>.</h2>
        <p class="my-3">¡Gracias por unirte a SwiftCode! Estamos encantados de tenerte con nosotros.</p>
        <h5 class="pb-2">Aquí tienes algunas cosas que puedes hacer para empezar:</h5>
        <div class="accordion" id="accordionExample">
            <div class="accordion-item">
                <h2 class="accordion-header">
                    <button class="accordion-button bg-info-subtle" type="button" data-bs-toggle="collapse"
                    data-bs-target="#collapseOne" aria-expanded="true"
                    aria-controls="collapseOne">
                    <i class="bi bi-moon-stars-fill pe-2"></i>Verifica tu cuenta
                    </button>
                </h2>
                <div id="collapseOne" class="accordion-collapse collapse show"
                    data-bs-parent="#accordionExample">
                    <div class="accordion-body">
                    <strong>This is the first item's accordion body.</strong> It is shown by
                    default, until the collapse plugin adds the appropriate classes that we
                    use to style each element. These classes control the overall appearance,
                    as well as the showing and hiding via CSS transitions. You can modify
                    any of this with custom CSS or overriding our default variables. It's
                    also worth noting that just about any HTML can go within the
                    <code>.accordion-body</code>, though the transition does limit overflow.
                    </div>
                </div>
            </div>
            <div class="accordion-item">
                <h2 class="accordion-header">
                    <button class="accordion-button bg-info-subtle collapsed" type="button"
                    data-bs-toggle="collapse" data-bs-target="#collapseTwo"
                    aria-expanded="false" aria-controls="collapseTwo">
                    <i class="bi bi-palette-fill pe-2"></i>Visita nuestro blog
                    </button>
                </h2>
                <div id="collapseTwo" class="accordion-collapse collapse"
                    data-bs-parent="#accordionExample">
                    <div class="accordion-body">
                    <strong>This is the second item's accordion body.</strong> It is hidden
                    by default, until the collapse plugin adds the appropriate classes that
                    we use to style each element. These classes control the overall
                    appearance, as well as the showing and hiding via CSS transitions. You
                    can modify any of this with custom CSS or overriding our default
                    variables. It's also worth noting that just about any HTML can go within
                    the <code>.accordion-body</code>, though the transition does limit
                    overflow.
                    </div>
                </div>
            </div>
            <div class="accordion-item">
                <h2 class="accordion-header">
                    <button class="accordion-button bg-info-subtle collapsed" type="button"
                    data-bs-toggle="collapse" data-bs-target="#collapseThree"
                    aria-expanded="false" aria-controls="collapseThree">
                    <i class="bi bi-pencil-fill pe-2"></i>Conoce más sobre nosotros
                    </button>
                </h2>
                <div id="collapseThree" class="accordion-collapse collapse"
                    data-bs-parent="#accordionExample">
                    <div class="accordion-body">
                    <strong>This is the third item's accordion body.</strong> It is hidden
                    by default, until the collapse plugin adds the appropriate classes that
                    we use to style each element. These classes control the overall
                    appearance, as well as the showing and hiding via CSS transitions. You
                    can modify any of this with custom CSS or overriding our default
                    variables. It's also worth noting that just about any HTML can go within
                    the <code>.accordion-body</code>, though the transition does limit
                    overflow.
                    </div>
                </div>
            </div>
        </div>
        <div>
            <p class="mx-2 py-0 mt-4">Estamos aquí para ayudarte a sacar el máximo provecho de tu experiencia en SwiftCode.</p>
            <p class="mx-2 py-0">¡Bienvenido/a de nuevo, y esperamos que disfrutes de tu tiempo con nosotros!</p>
            <p class="mx-2 py-0">Atentamente,</p>
            <p class="mx-2 py-0">El equipo de [Nombre del Servicio/Plataforma]</p>
            <p class="mx-2 py-0">[Enlace a la web] | [Redes sociales]</p>
        </div>
    </div>
</div>


<?php
include_once './publico/plantillas/cierre_html.inc.php';
?>