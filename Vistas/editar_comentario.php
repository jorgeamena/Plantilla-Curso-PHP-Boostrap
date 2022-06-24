<?php

include_once 'app/config.inc.php';
include_once 'app/Conexion.inc.php';
include_once 'app/Comentario.inc.php';
include_once 'app/RepositorioComentario.inc.php';
include_once 'app/ValidadorComentarioEditado.inc.php';
include_once 'app/ControlSession.inc.php';
include_once 'app/Redireccion.inc.php';


Conexion::abrir_conexion();

if(isset($_POST['guardar_recuperado'])) {
    
    $validador = new ValidadorComentarioEditado($_POST['titulo'], 
                                             $_POST['titulo_original'],
                                             htmlspecialchars($_POST['texto']), 
                                             $_POST['texto_original'],
                                             Conexion::obtener_conexion());

    if(!$validador -> hay_cambios()) {
        
        Redireccion::redirigir(RUTA_GESTOR_COMENTARIOS);

    } else {
        if($validador -> comentario_valido()) {
            $cambio_efectuado = RepositorioComentario::actualizar_comentario(Conexion::obtener_conexion(), 
                                                                       $_POST['id_comentario'], 
                                                                       $validador -> obtener_titulo(), 
                                                                       $validador -> obtener_texto());

            if($cambio_efectuado) {

                Redireccion::redirigir(RUTA_GESTOR_COMENTARIOS);

            }
        }
    }
}

$titulo = "Editar Comentario";

include_once 'Plantillas/Barra-navegacion.inc.php';
include_once 'Plantillas/Documento-declaracion.inc.php';

?>

<div class="container">
    <div class="jumbotron">
        <h1 class="text-center">Editar Comentario</h1>
    </div>
</div>
<div class="container">
    <div class="row">
        <div class="col-md-2"></div>
        <div class="col-md-8">
            <form class="form_nueva_entrada" method="post" action="<?php echo RUTA_EDITAR_COMENTARIO; ?>">
                <?php
                    if(isset($_POST['editar_comentario'])) {
                        $id_comentario = $_POST['id_editar'];
                        
                        $comentario_recuperado = RepositorioComentario::obtener_comentario_id(Conexion::obtener_conexion(), $id_comentario);

                        include_once 'Plantillas/Form-comentario-recuperado.inc.php';

                        Conexion::cerrar_conexion();
                    } else if(isset($_POST['guardar_recuperado'])) {

                        $id_comentario = $_POST['id_comentario'];

                        $comentario_recuperado = RepositorioComentario::obtener_comentario_id(Conexion::obtener_conexion(), $id_comentario);

                        include_once 'Plantillas/Form-comentario-recuperado-validado.inc.php';
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