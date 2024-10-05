<?php
include_once 'publico/plantillas/encabezado_html.inc.php';
include_once 'publico/plantillas/menu_html.inc.php';
include_once 'texto_aleatorio.inc.php';
include_once 'php/modelos/modelo_enlace_transacciones.inc.php';
include_once './php/modelos/modelo_enlace.inc.php';
include_once './php/modelos/modelo_enlace_transacciones.inc.php';
include_once './php/repositorios/repositorio_transacciones.inc.php';
include_once './php/repositorios/repositorio_enlaces.inc.php';

?>

<div class="container-sm my-3">
    <div class="alert alert-danger" role="alert">
        Pruebas
    </div>
    <?php
        $v = false;

        conexion::abrir_conexion();
        $conexion = conexion::obtener_conexion();

        $sql = 'SELECT * FROM usuarios';
        $sentencia = $conexion -> prepare($sql);
        $sentencia -> execute();
        $usuario = $sentencia -> fetch();
        
        $id = 0;
        $max = 0;
        do {
            $id += 1;
            $max += 1;
            $usuarios = repositorio_transacciones::consultar_registros($conexion, $id);
            if (count($usuarios) > 0) break;
            if ($max <= 10) break;
        } while (count($usuarios) < 1);
        
        echo '<div class="bg-info-subtle my-2 flex text-center">';

        if (count($usuarios) > 0) {
            $usuario = $usuarios[0];
            echo '<hr>';
            echo '<p class="mx-3 my-0"><span class="text-primary">$usuario</span> para pruebas <span class="text-success">(id: ' . $usuario -> get_id() . ' / ' . $usuario -> get_usuario() . ')</span> <span class="text-danger">object</span></p>';
            echo '<hr>';
        } else {
            echo '<p class="mx-3 my-0 py-3">No hay registros disponibles</p>';
        }
        echo '</div>';
    ?>
</div>
<?php
include_once 'publico/plantillas/cierre_html.inc.php';
?>