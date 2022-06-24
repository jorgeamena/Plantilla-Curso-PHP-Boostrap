<?php

include_once 'app/config.inc.php';
include_once 'app/Conexion.inc.php';

include_once 'app/Usuario.inc.php';
include_once 'app/Entrada.inc.php';
include_once 'app/Comentario.inc.php';

include_once 'app/RepositorioUsuario.inc.php';
include_once 'app/RepositorioEntrada.inc.php';
include_once 'app/RepositorioComentario.inc.php';

$titulo = "Visor de entradas";

include_once 'Plantillas/Documento-declaracion.inc.php';
include_once 'Plantillas/Barra-navegacion.inc.php';

include_once 'app/VisorEntradas.inc.php';

?>
<div class="container">
               <div class="jumbotron text-center">
                <h1>Visor Entradas</h1>
               </div>
</div>
<div class="container">
    <div class="row">
        <div class="col-md-12">

<?php

VisorEntradas::escribir_entradas();

?>
        </div>
    </div>
</div>


<?php
include_once 'Plantillas/Documento-declaracion.inc.php';
?>
