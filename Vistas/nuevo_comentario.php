<?php

include_once 'app/config.inc.php';
include_once 'app/Conexion.inc.php';
include_once 'app/Comentario.inc.php';
include_once 'app/RepositorioComentario.inc.php';
include_once 'app/ValidadorComentario.inc.php';
include_once 'app/ControlSession.inc.php';
include_once 'app/Redireccion.inc.php';




if(isset($_POST['guardar'])) {
    Conexion::abrir_conexion();

    $validador = new ValidadorComentario($_POST['titulo'], htmlspecialchars($_POST['texto']), Conexion::obtener_conexion());


    if($validador -> comentario_valido()) { 
        if(ControlSession::session_iniciada()) {
            $comentario = new Comentario('', $_SESSION['id_usuario'], $_POST['id_entrada'], $validador -> obtener_titulo(), $validador -> obtener_texto(), '');

            $comentario_insertado = RepositorioComentario::insertar_comentario(Conexion::obtener_conexion(), $comentario);
            if($comentario_insertado) {
                Redireccion::redirigir(RUTA_GESTOR_COMENTARIOS);
            }
        } else {
            Redireccion::redirigir(RUTA_LOGIN);
        }

        Conexion::cerrar_conexion();
    }
}

$titulo = "Nueva comentario del blog";

include_once 'Plantillas/Barra-navegacion.inc.php';
include_once 'Plantillas/Documento-declaracion.inc.php';

?>

<div class="container">
    <div class="jumbotron">
        <h1 class="text-center">Nuevo Comentario</h1>
    </div>
</div>
<div class="container">
    <div class="row">
        <div class="col-md-2"></div>
        <div class="col-md-8">
            <form class="form_nueva_entrada" method="post" action="<?php echo RUTA_COMENTAR_ENTRADA; ?>">
                <?php
                    if(isset($_POST['guardar'])) {
                        include_once 'Plantillas/Form-nuevo-comentario-validado.inc.php';
                    } else {
                        include_once 'Plantillas/Form-nuevo-comentario-vacio.inc.php';
                    }
                ?>
            </form>
        </div>
        <div class="col-md-2"></div>
    </div>
</div>

<?php

include_once 'Plantillas/Documento-cierre.inc.php';

?>