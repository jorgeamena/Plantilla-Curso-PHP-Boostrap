<div class="form-group">
    <label for="titulo">Título:</label>
    <input type="text" class="form-control" id="titulo" name="titulo" placeholder="Escriba el titulo" autofocus/>
</div>
<div class="form-group">
    <label for="contenido">Contenido:</label>
    <textarea class="form-control" rows="4" id="texto" name="texto" placeholder="Escriba aqui el contenido"></textarea>
</div>
<input type="hidden" name="id_entrada" value="<?php echo $_POST['id_entrada']; ?>" />
<input type="hidden" name="id_autor" value="<?php echo $_POST['id_autor']; ?>" />
<br>
<br>
<button type="submit" class="btn btn-primary" name="guardar"><i class="fa fa-save faa-rising faa-fast animated-hover fa-lg"></i> Guardar</button>
<button type="reset" class="btn btn-primary"><i class="fa fa-eraser faa-horizontal faa-fast animated-hover fa-lg"></i> Limpiar Formulario</button>