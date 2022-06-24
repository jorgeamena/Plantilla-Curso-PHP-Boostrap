<div class="row partes-gestor-entradas">
    <div class="col-md-12">
        <h2>Gestión de comentarios <i class="fa fa-comments-o faa-float animated" aria-hidden="true"></i> <i class="fa fa-pencil faa-shake animated" aria-hidden="true"></i></h2>
        <br>
        <br>
    </div>
</div>
<div class="row partes-gestor-entradas">
    <div class="col-md-12">
    <?php 
        if(count($array_comentarios) > 0) {
    ?>

        <table class="table table-striped">
            <thead>
                <tr>
                    <th class="text-center">Fecha</th>
                    <th class="text-center">Título</th>
                    <th class="text-center">Texto</th>
                    <th class="text-center">Entrada</th>
                    <th class="text-center">Autor</th>
                    <th class="text-center">Acciones</th>
                </tr>
            </thead>
            <tbody>
            <?php
                for($i = 0; $i <count($array_comentarios); $i++) {
                    $comentarios_actual = $array_comentarios[$i][0];
                    $titulo_comentarios_actual = $array_comentarios[$i][1];
                    $nombre_autor_actual = $array_comentarios[$i][2];
                    ?>
                    
                    <tr>
                    <td class="text-center"><?php echo $comentarios_actual -> obtener_fecha(); ?></td>
                    <td class="text-center"><?php echo $comentarios_actual -> obtener_titulo(); ?></td>
                    <td class="text-center"><?php echo $comentarios_actual -> obtener_texto(); ?></td>
                    <td class="text-center"><?php echo $titulo_comentarios_actual; ?></td>
                    <td class="text-center"><?php echo $nombre_autor_actual; ?></td>
                    <td class="text-center">

                    <div class="btn-group dropright" id="Id_GE_BTN">
  <a class="btn btn-primary dropdown-toggle" data-toggle="dropdown">
  <i class="fa fa-cog fa-lg" aria-hidden="true"></i>
  <i class="fa fa-chevron-down fa-sm" aria-hidden="true"></i>
  </a>
  <ul class="dropdown-menu">
    <li><a><form method="post" action="<?php echo RUTA_EDITAR_COMENTARIO; ?>">
                            <input type="hidden" name="id_editar" value="<?php echo $comentarios_actual -> obtener_id(); ?>" />
                            <button name="editar_comentario" type="submit" class="btn btn-primary btn-xs"><i class="fa fa-edit fa-sm" aria-hidden="true"></i> Editar</button>
                        </form></a></li>
    <li><a><form method="post" action="<?php echo RUTA_BORRAR_COMENTARIO; ?>">
                            <input type="hidden" name="id_borrar" value="<?php echo $comentarios_actual -> obtener_id(); ?>" />
                            <button name="borrar_comentario" type="submit" class="btn btn-primary btn-xs"><i class="fa fa-remove fa-sm" aria-hidden="true"></i> Borrar</button>
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

        <h3>Todavia no has escrito ningun comentario</h3>
        <br>
        <br>

    <?php
        }
    ?>
        
    </div>
</div>