<?php

include_once 'app/config.inc.php';
include_once 'app/Conexion.inc.php';
include_once 'app/Entrada.inc.php';
include_once 'app/RepositorioEntrada.inc.php';
include_once 'app/ValidadorEntrada.inc.php';
include_once 'app/ControlSession.inc.php';
include_once 'app/Redireccion.inc.php';



$entrada_publica = 0;

if(isset($_POST['guardar'])) {
    Conexion::abrir_conexion();

    $validador = new ValidadorEntrada($_POST['titulo'], $_POST['url'], htmlspecialchars($_POST['texto']), Conexion::obtener_conexion());

    if(isset($_POST['publicar']) && $_POST['publicar'] == 'si') {
        $entrada_publica = 1;
    }

    if($validador -> entrada_valida()) {
        if(ControlSession::session_iniciada()) {
            $entrada = new Entrada('', $_SESSION['id_usuario'], $validador -> obtener_url(), $validador -> obtener_titulo(), $validador -> obtener_texto(), '', $entrada_publica);

            $entrada_insertada = RepositorioEntrada::insertar_entrada(Conexion::obtener_conexion(), $entrada);
            if($entrada_insertada) {
                echo $entrada_publica;
                Redireccion::redirigir(RUTA_GESTOR_ENTRADAS);
            }
        } else {
            Redireccion::redirigir(RUTA_LOGIN);
        }

        Conexion::cerrar_conexion();
    }
}

$titulo = "Nueva entrada del blog";

include_once 'Plantillas/Barra-navegacion.inc.php';
include_once 'Plantillas/Documento-declaracion.inc.php';

?>

<div class="container">
    <div class="jumbotron">
        <h1 class="text-center">Nueva de Entrada</h1>
    </div>
</div>
<div class="container">
    <div class="row">
        <div class="col-md-2"></div>
        <div class="col-md-8">
            <form class="form_nueva_entrada" method="post" action="<?php echo RUTA_NUEVA_ENTRADA; ?>">
                <?php
                    if(isset($_POST['guardar'])) {
                        include_once 'Plantillas/Form-nueva-entrada-validado.inc.php';
                    } else {
                        include_once 'Plantillas/Form-nueva-entrada-vacio.inc.php';
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