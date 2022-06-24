<?php

header("Expires: Tue, 01 Jan 2000 00:00:00 GMT");
header("Last-Modified: ". gmdate("D, d M Y H:i:s") . " GMT");
header("Cache-Control: no-store, no-cache, must-relative, max-age=0");
header("Cache-Control: post-check=0, pre-check=0", false);
header("Pragma: no-cache");

include_once 'app/Conexion.inc.php';
include_once 'app/RepositorioUsuario.inc.php';
include_once 'app/ControlSession.inc.php';
include_once 'app/ValidadorClave.inc.php';
include_once 'app/Redireccion.inc.php';

Conexion::abrir_conexion();

if(!ControlSession::session_iniciada()) {
    Redireccion::redirigir(SERVIDOR);
} else {
    $id = $_SESSION['id_usuario'];
    $usuario = RepositorioUsuario::obtener_usuario_por_id(Conexion::obtener_conexion(), $id);
}

$aviso_inicio = "<br><div class='alert alert-danger' role='alert'>";
$aviso_cierre = "</div>";
$aviso_error = "";
//$tipo_aviso = 0;

if(isset($_POST['guardar_imagen']) && !empty($_FILES['archivo_subido']['tmp_name'])) {
    $directorio = DIRECTORIO_RAIZ."/subidas/";
    $carpeta_objetivo = $directorio.basename($_FILES['archivo_subido']['name']);
    $subida_correcta = 1;
    $tipo_imagen = pathinfo($carpeta_objetivo, PATHINFO_EXTENSION);

    $comprobacion = getimagesize($_FILES['archivo_subido']['tmp_name']);
    if($comprobacion !== false) {
        $subida_correcta = 1;
    } else {
        $subida_correcta = 0;
    }

    if($_FILES['archivo_subido']['size'] > 500000 ) {
        $aviso_error = "El archivo no puede ocupar más de 500kb";
    }

    if($tipo_imagen != "jpg" && $tipo_imagen != "png" && $tipo_imagen != "jpeg" && $tipo_imagen != "gif") {
        $aviso_error = "Solo se admiten los formatos JPG, PNG, JPEG, GIF";
    }

    if($subida_correcta == 0) {
        $aviso_error = "Tu archivo no puede subirse";
    } else {
        if(move_uploaded_file($_FILES['archivo_subido']['tmp_name'], DIRECTORIO_RAIZ."/subidas/".$usuario -> obtener_id())) {
            $aviso_error = "El archivo (".basename($_FILES['archivo_subido']['name']).") ha sido subido correctamente.";
            //$tipo_aviso = 1;
        } else {
            $aviso_error = "Ha ocurrido un error.";
        }
    }
}

if(isset($_POST['guardar_cambios'])) {

    $id_usuario = $_SESSION['id_usuario'];

    $validador = new ValidadorClave($_POST['clave1'], $_POST['clave2'], Conexion :: obtener_conexion());

    //convertir en transaccion

    if ($validador -> clave_valida()) {

    $clave_cifrada = password_hash($_POST['clave1'], PASSWORD_DEFAULT);

    $clave_actualizada = RepositorioUsuario::act_clave(Conexion::obtener_conexion(), $id_usuario, $clave_cifrada);
    
    $nombre_usuario = RepositorioUsuario::obtener_usuario_por_id(Conexion::obtener_conexion(), $id_usuario);

    if ($clave_actualizada) {
        
        Redireccion::redirigir(RUTA_CLAVE_ACTUALIZADA);
        
    } else {
        echo 'ERROR';
    }

    }
}

/*
if($tipo_aviso == 1) {
    $aviso_inicio = "<br><div class='alert alert-danger' role='alert'>";
}
*/

$titulo = "Perfil de Usuario";

include_once 'Plantillas/Documento-declaracion.inc.php';
include_once 'Plantillas/Barra-navegacion.inc.php';

?>

    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="jumbotron">
                    <h1 class="text-center">Información de Usuario</h1>
                </div>
            </div>
        </div>
    </div>
    <div class="container perfil">
        <div class="row">
            <div class="col-md-4">
                <?php
                    if(file_exists(DIRECTORIO_RAIZ."/subidas/".$usuario -> obtener_id())) {
                        ?>
                            <img src="<?php echo SERVIDOR.'/subidas/'.$usuario -> obtener_id(); ?>" class="img-responsive">
                        <?php
                    } else {
                        ?>
                            <img src="img/persona.png" class="img-responsive">
                        <?php
                    }
                ?>
                <br>
                <form role="form" class="text-center" action="<?php echo RUTA_PERFIL; ?>" method="post" enctype="multipart/form-data">
                    <label for="archivo_subido" id="label_archivo">
                        <?php
                            if(!file_exists(DIRECTORIO_RAIZ."/subidas/".$usuario -> obtener_id())) {
                                ?>
                                    Subir imagen de perfil
                                <?php
                            } else {
                                ?>
                                    Cambiar imagen de perfil
                                <?php
                            }
                        ?>
                    </label>
                    <input type="file" name="archivo_subido" id="archivo_subido" class="boton_subir" />
                    <br>
                    <?php
                        if($aviso_error != "") {
                            echo $aviso_inicio . $aviso_error . $aviso_cierre;
                        }
                    ?>
                    <br>
                    <input type="submit" value="Guardar" name="guardar_imagen" class="form-control btn btn-primary" />
                </form>
            </div>
            <div class="col-md-8">
                <div class="row">
                    <div class="col-md-6">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                            <i class="fa fa-info-circle fa-lg" aria-hidden="true"></i> Información Personal:
                            </div>
                            <div class="panel-body">
                                <h4>
                                    <i class="fa fa-user fa-lg" aria-hidden="true"></i> Nombre de Usuario:
                                    <small>
                                        <?php
                                            echo $usuario -> obtener_nombre();
                                        ?>
                                    </small>
                                </h4>
                                <br>
                                <h4>
                                    <i class="fa fa-envelope fa-lg" aria-hidden="true"></i> Rol:
                                    <small>
                                        No implementado
                                    </small>
                                </h4>
                                <br>
                                <h4>
                                    <i class="fa fa-calendar fa-lg" aria-hidden="true"></i> Cargo:
                                    <small>
                                        No implementado
                                    </small>
                                </h4>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                            <i class="fa fa-bookmark-o fa-lg" aria-hidden="true"></i> Información de la Cuenta:
                            </div>
                            <div class="panel-body">
                                <h4>
                                    <i class="fa fa-calendar-check-o fa-lg" aria-hidden="true"></i> Registrado desde:
                                    <small>
                                        <?php
                                            echo $usuario -> obtener_fecha_registro();
                                        ?>
                                    </small>
                                </h4>
                                <br>
                                <h4>
                                    <i class="fa fa-envelope fa-lg" aria-hidden="true"></i> Email:
                                    <small>
                                        <?php
                                            echo $usuario -> obtener_email();
                                        ?>
                                    </small>
                                </h4>
                                <br>
                                <h4>
                                    <i class="fa fa-lock fa-lg" aria-hidden="true"></i> Contraseña:
                                    <small>
                                        <span class="text-right"><a data-toggle="collapse" href="#form_cambiar_clave">Cambiar clave <i class="fa fa-angle-double-down fa-lg" aria-hidden="true"></i></a></span>
                                    </small>
                                </h4>
                                <br>
                                <?php
                                    include_once 'Plantillas/Cambiar_clave.inc.php';
                                ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


<?php
include_once 'Plantillas/Documento-cierre.inc.php';
?>