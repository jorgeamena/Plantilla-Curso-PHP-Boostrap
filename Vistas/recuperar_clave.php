<?php

$titulo = 'Recuperación de Contraseña';

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
                    <h4><i class="fa fa-retweet fa-lg"></i> Recuperar Contraseña</h4>
                </div>
                <div class="panel-body">
                    <form role="form" method="post" action="<?php echo RUTA_GENERAR_URL_SECRETA ?>">
                        <h2>Introduce tu Correo</h2>
                        <br>
                        <p>
                            Escribe la direción de correo electrónico con la que te registraste y te enviaremos un email con el que podrás restablecer tu contraseña.
                        </p>
                        <br>
                        <div class="input-group margin-bottom-sm">
                            <span class="input-group-addon"><i class="fa fa-envelope-o faa-shake faa-slow animated fa-lg"></i></span>
                            <input name="email" id="email" class="form-control" type="text" placeholder="Email address" required autofocus/>
                        </div>
                        <br>
                        
                        <br>
                        <br>
                        <button type="submit" name="enviar_email" class="btn btn-lg btn-primary btn-block"><i class="fa fa-send faa-passing faa-fast animated-hover fa-lg"></i> Enviar</button>
                    </form>
                    <br>
                    
                </div>
            </div>
        </div>
    </div>
</div>

<?php
include_once 'Plantillas/Documento-cierre.inc.php';
?>