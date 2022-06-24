<div class="form-group">
    <label><i class="fa fa-odnoklassniki fa-lg"></i> Nombre de Usuario</label>
    <input type="text" class="form-control" name="nombre" placeholder="Nombre y Apellidos" <?php $validador -> mostrar_nombre() ?> autofocus/>
    <?php 
    $validador -> mostrar_error_nombre();
    ?>
</div>
<div class="form-group">
    <label><i class="fa fa-envelope-o fa-lg"></i> Email</label>
    <input type="email" class="form-control" name="email" placeholder="user@mail.com" <?php $validador -> mostrar_email() ?>/>
    <?php 
    $validador -> mostrar_error_email();
    ?>
</div>
<div class="form-group">
    <label><i class="fa fa-key fa-lg"></i> Contraseña</label>
    <input type="password" class="form-control" name="clave1" placeholder="clave1*"/>
    <?php 
    $validador -> mostrar_error_clave1();
    ?>
</div>
<div class="form-group">
    <label><i class="fa fa-key fa-lg"></i> Confirmar Contraseña</label>
    <input type="password" class="form-control" name="clave2" placeholder="clave1*"/>
    <?php 
    $validador -> mostrar_error_clave2();
    ?>
</div>
<br>
<button type="reset" class="btn btn-default btn-primary"><i class="fa fa-eraser faa-horizontal faa-fast animated-hover fa-lg"></i> Limpiar Formulario</button>
<button type="summit" class="btn btn-default btn-primary" name="enviar"><i class="fa fa-paper-plane-o faa-passing faa-fast animated-hover fa-lg"></i> Enviar Datos</button>