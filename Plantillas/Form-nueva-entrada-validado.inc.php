<div class="form-group">
    <label for="titulo">Título:</label>
    <input type="text" class="form-control" id="titulo" name="titulo" placeholder="Escriba el titulo"
        <?php
            $validador -> mostrar_titulo();
        ?>
    autofocus/>
    <?php
        $validador -> mostrar_error_titulo();
    ?>
</div>
<div class="form-group">
    <label for="url">URL:</label>
    <input type="text" class="form-control" id="url" name="url" placeholder="Dirección única sin espacios para la entrada"
        <?php
            $validador -> mostrar_url();
        ?>
    />
    <?php
        $validador -> mostrar_error_url();
    ?>
</div>
<div class="form-group">
    <label for="contenido">Contenido:</label>
    <textarea class="form-control" rows="4" id="texto" name="texto" placeholder="Escriba aqui el contenido"><?php $validador -> mostrar_texto(); ?></textarea>
    <?php
        $validador -> mostrar_error_texto();
    ?>
</div>
<br>
<div class="checkbox">
    <label><input type="checkbox" name="publicar" value="si" <?php if($entrada_publica) echo 'checked'; ?> /><i class="fa fa-globe faa-pulse animated-hover fa-lg" style="color:royalblue"></i> Marca para hacer pública.</label>
</div>
<br>
<button type="submit" class="btn btn-primary" name="guardar"><i class="fa fa-save faa-rising faa-fast animated-hover fa-lg"></i> Guardar</button>
<button type="reset" class="btn btn-primary"><i class="fa fa-eraser faa-horizontal faa-fast animated-hover fa-lg"></i> Limpiar Formulario</button>