<?php

include_once 'app/config.inc.php';
include_once 'app/Conexion.inc.php';
include_once 'app/Entrada.inc.php';
include_once 'app/RepositorioEntrada.inc.php';
include_once 'app/ValidadorEntradaEditada.inc.php';
include_once 'app/ControlSession.inc.php';
include_once 'app/Redireccion.inc.php';


Conexion::abrir_conexion();

if(isset($_POST['guardar_recuperada'])) {
    $entrada_publica_nueva = 0;

    if(isset($_POST['publicar']) && $_POST['publicar'] == "si") {
        $entrada_publica_nueva = 1;
    }

    $validador = new ValidadorEntradaEditada($_POST['titulo'], 
                                             $_POST['titulo_original'], 
                                             $_POST['url'], 
                                             $_POST['url_original'], 
                                             htmlspecialchars($_POST['texto']), 
                                             $_POST['texto_original'], 
                                             $entrada_publica_nueva, 
                                             $_POST['publicar_original'], 
                                             Conexion::obtener_conexion());

    if(!$validador -> hay_cambios()) {
        
        Redireccion::redirigir(RUTA_GESTOR_ENTRADAS);

    } else {
        if($validador -> entrada_valida()) {
            $cambio_efectuado = RepositorioEntrada::actualizar_entrada(Conexion::obtener_conexion(), 
                                                                       $_POST['id_entrada'], 
                                                                       $validador -> obtener_titulo(), 
                                                                       $validador -> obtener_url(), 
                                                                       $validador -> obtener_texto(), 
                                                                       $validador -> obtener_checkbox());

            if($cambio_efectuado) {

                Redireccion::redirigir(RUTA_GESTOR_ENTRADAS);

            }
        }
    }
}

$titulo = "Editar entrada";

include_once 'Plantillas/Barra-navegacion.inc.php';
include_once 'Plantillas/Documento-declaracion.inc.php';

?>

<div class="container">
    <div class="jumbotron">
        <h1 class="text-center">Editar Entrada</h1>
    </div>
</div>
<div class="container">
    <div class="row">
        <div class="col-md-2"></div>
        <div class="col-md-8">
            <form class="form_nueva_entrada" method="post" action="<?php echo RUTA_EDITAR_ENTRADA; ?>">
                <?php
                    if(isset($_POST['editar_entrada'])) {
                        $id_entrada = $_POST['id_editar'];

                        $entrada_recuperada = RepositorioEntrada::obtener_entrada_id(Conexion::obtener_conexion(), $id_entrada);

                        include_once 'Plantillas/Form-entrada-recuperada.inc.php';

                        Conexion::cerrar_conexion();
                    } else if(isset($_POST['guardar_recuperada'])) {

                        $id_entrada = $_POST['id_entrada'];

                        $entrada_recuperada = RepositorioEntrada::obtener_entrada_id(Conexion::obtener_conexion(), $id_entrada);

                        include_once 'Plantillas/Form-entrada-recuperada-validada.inc.php';
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