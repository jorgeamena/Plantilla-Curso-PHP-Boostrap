<?php

include_once 'app/Conexion.inc.php';
include_once 'app/RepositorioUsuario.inc.php';
include_once 'app/EscritorEntradas.inc.php';

$titulo = 'Pagina de Jorge';

include_once 'Plantillas/Documento-declaracion.inc.php';
include_once 'Plantillas/Barra-navegacion.inc.php';
?>

            <div class="container">
                <div class="row">
                    <div class="jumbotron">
                        <h1>Bienvenidos Usuarios</h1>
                        <p>Página dedicada a la programación y al dessarrollo</p>
                    </div>
                </div>
            </div>
            <div class="container">
                <div class="row">
                    <div class="col-md-4">
                        <?php
                            include_once 'Plantillas/Menu.inc.php'; 
                        ?>
                    </div>
                    <div class="col-md-8">
                        <div class="row">
                            <?php
                                EscritorEntradas::escribir_entradas();
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        

<?php
include_once 'Plantillas/Documento-cierre.inc.php';
?>