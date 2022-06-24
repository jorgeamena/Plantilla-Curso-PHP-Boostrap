<input type="hidden" id="id_comentario" name="id_comentario" value="<?php echo $id_comentario; ?>"/>
<div class="form-group">
    <label for="titulo">Título:</label>
    <input type="text" class="form-control" id="titulo" name="titulo" placeholder="Escriba el titulo" 
    value="<?php echo $comentario_recuperado -> obtener_titulo(); ?>"
    autofocus/>
    <input type="hidden" id="titulo_original" name="titulo_original" value="<?php echo $comentario_recuperado -> obtener_titulo(); ?>" />
</div>
<div class="form-group">
    <label for="contenido">Contenido:</label>
    <textarea class="form-control" rows="4" id="texto" name="texto" placeholder="Escriba aqui el contenido"><?php echo $comentario_recuperado -> obtener_texto(); ?></textarea>
    <input type="hidden" id="texto_original" name="texto_original" value="<?php echo $comentario_recuperado -> obtener_texto(); ?>" />
</div>
<br>
<br>
<button type="submit" class="btn btn-primary" name="guardar_recuperado"><i class="fa fa-save faa-rising faa-fast animated-hover fa-lg"></i> Guardar</button>
<button type="reset" class="btn btn-primary"><i class="fa fa-eraser faa-horizontal faa-fast animated-hover fa-lg"></i> Limpiar Formulario</button>