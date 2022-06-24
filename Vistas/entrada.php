<?php

include_once 'app/config.inc.php';
include_once 'app/Conexion.inc.php';

include_once 'app/Usuario.inc.php';
include_once 'app/Entrada.inc.php';
include_once 'app/Comentario.inc.php';

include_once 'app/RepositorioUsuario.inc.php';
include_once 'app/RepositorioEntrada.inc.php';
include_once 'app/RepositorioComentario.inc.php';

$titulo = $entrada -> obtener_titulo();

include_once 'Plantillas/Documento-declaracion.inc.php';
include_once 'Plantillas/Barra-navegacion.inc.php';

?>

<div class="container contenido-articulo">
    <div class="row">
        <div class="col-md-12">
            <h1>
                <?php echo $entrada -> obtener_titulo(); ?>
            </h1>
        </div>
    </div>
    <br>
    <div class="row">
        <div class="col-md-12">
            <p>
            Por
            <a href="#">
            <i class="fa fa-user fa-lg"></i>
<span class="sr-only">Loading...</span> <?php echo $autor -> obtener_nombre(); ?>
            </a>
            el
            <?php echo $entrada -> obtener_fecha(); ?>
            </p>
        </div>
    </div>
    <br>
    <div class="row">
        <div class="col-md-12">
            <article class="text-justify">
                <?php echo nl2br($entrada -> obtener_texto()); ?>
            </article>
        </div>
    </div>
    <?php include_once 'Plantillas/Entradas_azar.inc.php'; ?>
    <br>
    <?php
    if(count($comentarios) > 0) {
        include_once 'Plantillas/Comentarios_entradas.inc.php';
    } else {
        echo '<p>¡Todavía no hay comentarios!</p>';
    }
    ?>
</div

<?php

include_once 'Plantillas/Documento-cierre.inc.php';

?>