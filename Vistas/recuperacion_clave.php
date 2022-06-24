<?php

include_once 'app/RepositorioRecuperacionClave.inc.php';
include_once 'app/ValidadorClave.inc.php';
include_once 'app/Redireccion.inc.php';

include_once 'app/config.inc.php';
include_once 'app/Conexion.inc.php';
include_once 'app/Usuario.inc.php';
include_once 'app/RepositorioUsuario.inc.php';

Conexion::abrir_conexion();

if(RepositorioRecuperacionClave::url_secreta_existe(Conexion::obtener_conexion(), $url_personal)) {
  
    $id_usuario = RepositorioRecuperacionClave::obtener_id_usuario_mediante_url_secreta(Conexion::obtener_conexion(), $url_personal);

} else {
    echo '404';
}

if(isset($_POST['guardar_clave'])) {

    $validador = new ValidadorClave($_POST['clave1'], $_POST['clave2'], Conexion :: obtener_conexion());

    if ($validador -> clave_valida()) {

    $clave_cifrada = password_hash($_POST['clave1'], PASSWORD_DEFAULT);

    $clave_actualizada = RepositorioUsuario::act_clave(Conexion::obtener_conexion(), $id_usuario, $clave_cifrada);
    
    $nombre_usuario = RepositorioUsuario::obtener_usuario_por_id(Conexion::obtener_conexion(), $id_usuario);

    if ($clave_actualizada) {

        RepositorioUsuario::borrar_solicitud(Conexion::obtener_conexion(), $url_personal);

        Redireccion::redirigir(RUTA_CLAVE_ACTUALIZADA."/".$nombre_usuario -> obtener_nombre());
        
    } else {
        echo 'ERROR';
    }

    }

    

}

Conexion::cerrar_conexion();

$titulo = 'Recuperacion de contraseña';

include_once 'Plantillas/Documento-declaracion.inc.php';
include_once 'Plantillas/Barra-navegacion.inc.php';
?>

<div class="container">
    <div class="row">
        <div class="col-md-3">

        </div>
        <div class="col-md-6">
            <div class="panel panel-default">
                <div class="panel-heading text-center">
                    <h4>Crea una nueva contraseña</h4>
                </div>
                <div class="panel-body">
                    <form role="form" method="post" action="<?php echo RUTA_RECUPERACION_CLAVE."/".$url_personal; ?>">
                    <?php
                        if (isset($_POST['guardar_clave'])) {
                            include_once 'Plantillas/Recuperar_clave_validado.inc.php';
                        } else {
                            include_once 'Plantillas/Recuperar_clave_vacio.inc.php';
                        }
                    ?>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            
        </div>
    </div>
</div>

<?php
include_once 'Plantillas/Documento-cierre.inc.php';
?>