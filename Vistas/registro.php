<?php

include_once 'app/config.inc.php';
include_once 'app/Conexion.inc.php';
include_once 'app/Usuario.inc.php';
include_once 'app/RepositorioUsuario.inc.php';
include_once 'app/ValidadorRegistro.inc.php';
include_once 'app/Redireccion.inc.php';

if (isset($_POST['enviar'])) {
    Conexion :: abrir_conexion();

    $validador = new ValidadorRegistro($_POST['nombre'], $_POST['email'], $_POST['clave1'], $_POST['clave2'], Conexion :: obtener_conexion());

    if ($validador -> registro_valido()) {
        $usuario = new Usuario('', $validador -> obtener_nombre(),
                                   $validador -> obtener_email(),
                                   password_hash($validador -> obtener_clave(), PASSWORD_DEFAULT),
                                    '', '');
        $usuario_insertado = RepositorioUsuario :: insertar_usuario(Conexion :: obtener_conexion(), $usuario);

        if ($usuario_insertado) {
            Redireccion::redirigir(RUTA_REGISTRO_CORRECTO . '/' . $usuario -> obtener_nombre());
        }
    }

    Conexion :: cerrar_conexion();
}

$titulo = 'Registro';

include_once 'Plantillas/Documento-declaracion.inc.php';
include_once 'Plantillas/Barra-navegacion.inc.php';
?>

<div class="container">
    <div class="jumbotron">
        <h1 class="text-center">Formulario de Registro</h1>
    </div>
</div>

<div class="container">
    <div class="row">
        <div class="col-md-6 text-center">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">
                        Instrucciones
                    </h3>
                </div>
                <div class="panel-body">
                    <br>
                    <p class="text-justify">
                    Una consideración importante directamente relacionada con el texto
                     de las páginas HTML es la codificación de los caracteres y la inserción
                      de caracteres especiales. Algunos de los caracteres que se utilizan
                      habitualmente en los textos no se pueden incluir directamente en las páginas web:
                    </p>
                    <br>
                    <br>
                    <a href="#">¿Ya tienes cuenta?</a>
                    <br>
                    <br>
                    <a href="#">¿Olvidaste tu contraseña?</a>
                    <br>
                    <br>
                </div>
            </div>
        </div>
        <div class="col-md-6 text-center">
        <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">
                        Introduce tus Datos
                    </h3>
                </div>
                <div class="panel-body">
                  <form role="form" method="post" action="<?php echo RUTA_REGISTRO ?>">
                        <?php
                        if (isset($_POST['enviar'])) {
                            include_once 'Plantillas/Registro_validado.inc.php';
                        } else {
                            include_once 'Plantillas/Registro_vacio.inc.php';
                        }
                        ?>
                  </form>
                </div>
            </div>
        </div>
    </div>
</div>

<?php
include_once 'Plantillas/Documento-cierre.inc.php';
?>