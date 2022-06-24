<div class="row">
    <div class="col-md-12">
        <button class="btn btn-primary form-control" data-toggle="collapse" data-target="#Id_Comentarios">
            <?php echo "Ver comentarios (" . count($comentarios) . ")"; ?> <i class="fa fa-commenting" aria-hidden="true"></i>

        </button>
        <br>
        <br>
        <div id="Id_Comentarios" class="collapse">
            <?php
                for($i = 0; $i < count($comentarios); $i++) {
                    $comentario = $comentarios[$i];
            ?>

                <div class="row">
                    <div class="col-md-12">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <?php echo $comentario -> obtener_titulo(); ?>
                            </div>
                            <div class="panel-body">
                                <div class="col-md-2">
                                    <?php echo $comentario -> obtener_autor_id(); ?>
                                </div>
                                <div class="col-md-10">
                                    <p>
                                        <?php echo $comentario -> obtener_fecha(); ?>
                                    </p>
                                    <p>
                                    <?php echo nl2br($comentario -> obtener_texto()); ?>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            <?php
                }
            ?>
        </div>
    </div>
</div>