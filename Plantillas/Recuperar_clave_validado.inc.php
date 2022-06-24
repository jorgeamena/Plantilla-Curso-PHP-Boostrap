<div class="form-group">
    <label for="clave">Nueva contraseña:</label>
    <input type="password" name="clave1" id="clave1" class="form-control" placeholder="Minimo 6 caracteres" autofocus required />
    <?php 
        $validador -> mostrar_error_clave1();
    ?>
</div>
<div class="form-group">
    <label for="clave">Confirma contraseña:</label>
    <input type="password" name="clave2" id="clave2" class="form-control" placeholder="Deben coincidir" required />
    <?php 
        $validador -> mostrar_error_clave2();
    ?>
</div>
<button type="submit" name="guardar_clave" class="btn btn-lg btn-primary btn-block">
    Guardar contraseña
</button>