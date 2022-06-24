<input type="hidden" id="id_entrada" name="id_entrada" value="<?php echo $id_entrada; ?>" />
<div class="form-group">
    <label for="titulo">Título:</label>
    <input type="text" class="form-control" id="titulo" name="titulo" placeholder="Escriba el titulo" 
    value="<?php echo $validador -> obtener_titulo(); ?>"
    />
    <input type="hidden" id="titulo_original" name="titulo_original" value="<?php echo $entrada_recuperada -> obtener_titulo(); ?>" />
    <?php
        $validador -> mostrar_error_titulo();
    ?>
</div>
<div class="form-group">
    <label for="url">URL:</label>
    <input type="text" class="form-control" id="url" name="url" placeholder="Dirección única sin espacios para la entrada"
    value="<?php echo $validador -> obtener_url(); ?>"
    autofocus/>
    <input type="hidden" id="url_original" name="url_original" value="<?php echo $entrada_recuperada -> obtener_url(); ?>" />
    <?php
        $validador -> mostrar_error_url();
    ?>
</div>
<div class="form-group">
    <label for="contenido">Contenido:</label>
    <textarea class="form-control" rows="4" id="texto" name="texto" placeholder="Escriba aqui el contenido"><?php echo $validador -> obtener_texto(); ?></textarea>
    <input type="hidden" id="texto_original" name="texto_original" value="<?php echo $entrada_recuperada -> obtener_texto(); ?>" />
    <?php
        $validador -> mostrar_error_texto();
    ?>
</div>
<br>
<div class="checkbox">
    <label><input type="checkbox" name="publicar" value="si" <?php if ($validador -> obtener_checkbox()) echo 'checked'; ?> /><i class="fa fa-globe faa-pulse animated-hover fa-lg" style="color:royalblue"></i> Marca para hacer pública.</label>
    <input type="hidden" id="publicar_original" name="publicar_original" value="<?php echo $entrada_recuperada -> obtener_activa(); ?>" />
</div>
<br>
<button type="submit" class="btn btn-primary" name="guardar_recuperada"><i class="fa fa-save faa-rising faa-fast animated-hover fa-lg"></i> Guardar</button>
<button type="reset" class="btn btn-primary"><i class="fa fa-eraser faa-horizontal faa-fast animated-hover fa-lg"></i> Limpiar Formulario</button>