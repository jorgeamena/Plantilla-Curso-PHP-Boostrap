<?php

    include_once 'app/Conexion.inc.php';
    include_once 'app/RepositorioUsuario.inc.php';
    include_once 'app/EscritorEntradas.inc.php';
    include_once 'app/ControlSession.inc.php';

    $titulo = 'Contacto';

    include_once 'Plantillas/Documento-declaracion.inc.php';
    include_once 'Plantillas/Barra-navegacion.inc.php';

?>
    
    <div class="container">
    <div class="jumbotron">
        <h1 class="text-center">Formulario de Contácto</h1>
        <h4 class="text-center">"En este formulario usted podrá contactar a los administradores y desarrolladores del sistema para plantear sugerencias o fallos en el funcionamiento del mismo."</h4>
    </div>
</div>

<div class="container">
    <div class="row">
        <?php 
            if(ControlSession::session_iniciada()) {
                $usuario_por_id = RepositorioUsuario::obtener_usuario_por_id(Conexion::obtener_conexion(), $_SESSION['id_usuario']);
        ?>

        <div class="col-md-12 text-center">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">
                        Introduce tus Datos
                    </h3>
                </div>
                <div class="panel-body">
                    <form role="form" method="post" action="<?php echo RUTA_CONTACTO ?>">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Datos del Usuario</label>
                            </div>
                            <div class="form-group">
                                <label><i class="fa fa-user fa-lg" style="color: deepskyblue;"></i> Nombre de Usuario:</label>
                                <label>"<?php echo $usuario_por_id -> obtener_nombre(); ?>"</label>
                            <br>
                            <br>
                                <label><i class="fa fa-envelope fa-lg" style="color: deepskyblue;"></i> Dirección de Correo:</label>
                                <label>"<?php echo $usuario_por_id -> obtener_email(); ?>"</label>
                            </div>
                            <div class="form-group">
                                <label><i class="fa fa-phone-square fa-lg" style="color: deepskyblue;"></i> Teléfono del Trabajo</label>
                                <input type="number" class="form-control" name="telefono" placeholder="Introduzca el teléfono de su oficina o alguno al que se le pueda contáctar."/>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="contenido">Contenido:</label>
                                <textarea class="form-control" rows="7" id="texto" name="texto" placeholder="Escriba aqui el contenido." required></textarea>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <br>
                            <button type="reset" class="btn btn-default btn-primary"><i class="fa fa-eraser faa-horizontal faa-fast animated-hover fa-lg"></i> Limpiar Formulario</button>
                            <button type="summit" class="btn btn-default btn-primary" name="enviar"><i class="fa fa-paper-plane-o faa-passing faa-fast animated-hover fa-lg"></i> Enviar Datos</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <?php
            } else {
        ?>

        <div class="col-md-3 text-center">
        </div>
        <div class="col-md-6 text-center">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">
                        Introduce tus Datos
                    </h3>
                </div>
                <div class="panel-body">
                    <form role="form" method="post" action="<?php echo RUTA_CONTACTO ?>">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="contenido">Contenido:</label>
                                <textarea class="form-control" rows="8" id="texto" name="texto" placeholder="Escriba aqui el contenido." required autofocus></textarea>
                            </div>
                        </div>
                        
                        <div class="col-md-12">
                            <br>
                            <button type="reset" class="btn btn-default btn-primary"><i class="fa fa-eraser faa-horizontal faa-fast animated-hover fa-lg"></i> Limpiar Formulario</button>
                            <button type="summit" class="btn btn-default btn-primary" name="enviar"><i class="fa fa-paper-plane-o faa-passing faa-fast animated-hover fa-lg"></i> Enviar Datos</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-md-3 text-center">
        </div>

        <?php
            }
        ?>
        
        
    </div>
</div>

<?php
    include_once 'Plantillas/Documento-cierre.inc.php';
?>