<?php

include_once 'app/config.inc.php';
include_once 'app/Conexion.inc.php';
include_once 'app/RepositorioUsuario.inc.php';
include_once 'app/ValidadorLogin.inc.php';
include_once 'app/ControlSession.inc.php';
include_once 'app/Redireccion.inc.php';

if (ControlSession::session_iniciada()) { 
    Redireccion::redirigir(SERVIDOR);
}

if(isset($_POST['login'])) { 
    Conexion::abrir_conexion();

    $validador = new ValidadorLogin($_POST['email'], $_POST['clave'], Conexion::obtener_conexion());

    if($validador -> obtener_error() === '' && !is_null($validador -> obtener_usuario())) {
        ControlSession::iniciar_session($validador -> obtener_usuario() -> obtener_id(),
                                        $validador -> obtener_usuario() -> obtener_nombre());
        Redireccion::redirigir(SERVIDOR);
    }



    Conexion::cerrar_conexion();

}

$titulo = 'Login';

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
                    <h4><i class="fa fa-sign-in fa-lg"></i> Iniciar Sessión</h4>
                </div>
                <div class="panel-body">
                    <form role="form" method="post" action="<?php echo RUTA_LOGIN ?>">
                        <h2>Introduce tus datos</h2>
                        <br>
                        <div class="input-group margin-bottom-sm">
                            <span class="input-group-addon"><i class="fa fa-envelope-o faa-shake faa-slow animated fa-lg"></i></span>
                            <input name="email" id="email" class="form-control" type="text" placeholder="Email address" <?php
                            if (isset($_POST['login']) && isset($_POST['email']) && !empty($_POST['email'])) {
                                echo 'value="' .  $_POST['email'] . '"';
                            }
                            ?> 
                            required autofocus/>
                        </div>
                        <br>
                        <div class="input-group">
                            <span class="input-group-addon"><i class="fa fa-key faa-passing faa-fast animated fa-lg"></i><i class="fa fa-lock faa-ring faa-fast animated fa-lg"></i></span>
                            <input name="clave" id="clave" class="form-control" type="password" placeholder="Password" required />
                        </div>
                        <?php
                            if (isset($_POST['login'])) {
                                $validador -> mostrar_error();
                            }
                        ?>
                        <br>
                        <br>
                        <button type="submit" name="login" class="btn btn-lg btn-primary btn-block"><i class="fa fa-send faa-passing faa-fast animated-hover fa-lg"></i> Iniciar Sesión</button>
                    </form>
                    <br>
                    <br>
                    <div class="text-center">
                    <a href="<?php echo RUTA_RECUPERAR_CLAVE; ?>">¿Olvidaste tu contraseña?</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php
include_once 'Plantillas/Documento-cierre.inc.php';
?>