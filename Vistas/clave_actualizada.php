<?php

include_once 'app/config.inc.php';
include_once 'app/Conexion.inc.php';
include_once 'app/RepositorioUsuario.inc.php';
include_once 'app/Redireccion.inc.php';

$titulo = '¡Registro correcto!';

include_once 'Plantillas/Documento-declaracion.inc.php';
include_once 'Plantillas/Barra-navegacion.inc.php';



$nombre = str_replace('%C3%81', 'Á', $nombre);
$nombre = str_replace('%C3%89', 'É', $nombre);
$nombre = str_replace('%C3%8D', 'Í', $nombre);
$nombre = str_replace('%C3%93', 'Ó', $nombre);
$nombre = str_replace('%C3%9A', 'Ú', $nombre);
$nombre = str_replace('%C3%A1', 'á', $nombre);
$nombre = str_replace('%C3%A9', 'é', $nombre);
$nombre = str_replace('%C3%AD', 'í', $nombre);
$nombre = str_replace('%C3%B3', 'ó', $nombre);
$nombre = str_replace('%C3%BA', 'ú', $nombre);
$nombre = str_replace('%C3%B1', 'ñ', $nombre);
$nombre = str_replace('%C3%91', 'Ñ', $nombre);


?>

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <span class="glyphicon glyphicon-ok-circle" aria-hidden="true"></span> ¡Clave Actualizada!
                </div>
                <?php
                    if(!ControlSession::session_iniciada()) {
                        ?>
                            <div class="panel-body text-center">
                                <p>¡Clave actualizada con éxito <b><?php echo $nombre; ?></b>!</p>
                                <br>
                                <p><a href="<?php echo RUTA_LOGIN ?>">Inicia sesión</a> para comenzar a usar tu cuenta.</p>
                            </div>
                        <?php
                    } else {

                        Conexion::abrir_conexion();
                        
                        $nombre_usuario = RepositorioUsuario::obtener_usuario_por_id(Conexion::obtener_conexion(), $_SESSION['id_usuario']);
                        ?>
                            <div class="panel-body text-center">
                                <p>¡Clave actualizada con éxito <b><?php echo $nombre_usuario -> obtener_nombre(); ?></b>!</p>
                                <br>
                                <a href="<?php echo RUTA_PERFIL ?>">Volver al perfil</a>
                            </div>
                        <?php
                        Conexion::cerrar_conexion();
                    }
                ?>
            </div>
        </div>
    </div>
</div>

<?php
include_once 'Plantillas/Documento-cierre.inc.php';
?>