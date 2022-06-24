<div class="row partes-gestor-entradas">
    <div class="col-md-12">
        <h2>Gestión de entradas <i class="fa fa-newspaper-o faa-horizontal faa-slow animated" aria-hidden="true"></i> <i class="fa fa-pencil faa-shake animated" aria-hidden="true"></i></h2>
        <br>
        <a href="<?php echo RUTA_NUEVA_ENTRADA; ?>" id="GE_BTN_CE" class="btn btn-lg btn-primary" role="button">Crear entrada</a>
        <br>
        <br>
    </div>
</div>
<div class="row partes-gestor-entradas">
    <div class="col-md-12">
    <?php 
        if(count($array_entradas) > 0) {
    ?>

        <table class="table table-striped">
            <thead>
                <tr>
                    <th class="text-center">Fecha</th>
                    <th class="text-center">Título</th>
                    <th class="text-center">Estado</th>
                    <th class="text-center">Comentarios</th>
                    <th class="text-center">Acciones</th>
                </tr>
            </thead>
            <tbody>
            <?php
                for($i = 0; $i <count($array_entradas); $i++) {
                    $entrada_actual = $array_entradas[$i][0];
                    $comentarios_entrada_actual = $array_entradas[$i][1];
                    ?>
                    
                    <tr>
                    <td class="text-center"><?php echo $entrada_actual -> obtener_fecha(); ?></td>
                    <td class="text-center"><?php echo $entrada_actual -> obtener_titulo(); ?></td>
                    <td class="text-center"><?php echo $entrada_actual -> obtener_activa(); ?></td>
                    <td class="text-center"><?php echo $comentarios_entrada_actual; ?></td>
                    <td class="text-center">

                    <div class="btn-group dropright" id="Id_GE_BTN">
  <a class="btn btn-primary dropdown-toggle" data-toggle="dropdown">
  <i class="fa fa-cog fa-lg" aria-hidden="true"></i>
  <i class="fa fa-chevron-down fa-sm" aria-hidden="true"></i>
  </a>
  <ul class="dropdown-menu">
    <li><a><form method="post" action="<?php echo RUTA_EDITAR_ENTRADA; ?>">
                            <input type="hidden" name="id_editar" value="<?php echo $entrada_actual -> obtener_id(); ?>" />
                            <button name="editar_entrada" type="submit" class="btn btn-primary btn-xs"><i class="fa fa-edit fa-sm" aria-hidden="true"></i> Editar</button>
                        </form></a></li>
    <li><a><form method="post" action="<?php echo RUTA_COMENTAR_ENTRADA; ?>">
                            <input type="hidden" name="id_entrada" value="<?php echo $entrada_actual -> obtener_id(); ?>" />
                            <input type="hidden" name="id_autor" value="<?php echo $entrada_actual -> obtener_autor_id(); ?>" />
                            <button name="comentar_entrada" type="submit" class="btn btn-primary btn-xs"><i class="fa fa-comment fa-sm" aria-hidden="true"></i> Comentar</button>
                        </form></a></li>
    <li><a><form method="post" action="<?php echo RUTA_BORRAR_ENTRADA; ?>">
                            <input type="hidden" name="id_borrar" value="<?php echo $entrada_actual -> obtener_id(); ?>" />
                            <button name="borrar_entrada" type="submit" class="btn btn-primary btn-xs"><i class="fa fa-remove fa-sm" aria-hidden="true"></i> Borrar</button>
                        </form></a></li>
  </ul>
</div>

                        
                    
                        
                    </td>
                </tr>
                    
                    <?php
                }
            ?>
                
            </tbody>
        </table>

    <?php
        } else {
    ?>

        <h3>Todavia no has escrito ninguna entrada</h3>
        <br>
        <br>

    <?php
        }
    ?>
        
    </div>
</div>