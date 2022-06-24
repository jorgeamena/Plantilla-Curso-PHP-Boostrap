<?php

include_once 'app/EscritorEntradas.inc.php';

?>


<div class="row">
    <div class="col-md-12">
        <hr>
        <h3><a href="#" onclick="location.refresh()"><i class="fa fa-random fa-lg" aria-hidden="true"></i></a> Otras entradas interesantes</h3>
    </div>

    <?php
    for($i = 0; $i < count($entradas_azar); $i++) {
        $entrada_actual = $entradas_azar[$i];
    
    ?>
    <div class="col-md-4">
        <div class="panel panel-default">
            <div class="panel-heading">
                <?php echo $entrada_actual -> obtener_titulo(); ?>
            </div>
            <div class="panel-body">
                <p>
                <?php echo EscritorEntradas::resumir_texto(nl2br($entrada_actual -> obtener_texto())); ?>
                </p>
                <div class="text-right">
                            <a class="btn btn-primary" role="button" href="<?php echo RUTA_ENTRADA . '/' . $entrada -> obtener_url() ?>">Ver Más  <i class="fa fa-arrows-alt faa-shake faa-slow animated" aria-hidden="true"></i></a>
                </div>
            </div>
            
        </div>
    </div>
    <?php
    }
    ?>
    <div class="col-md-12">
        <hr>
    </div>

</div>