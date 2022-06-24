<form id="form_cambiar_clave" role="form" class="text-center panel-collapse <?php if(!isset($_POST['guardar_cambios'])) { echo "collapse"; } ?>" action="<?php echo RUTA_PERFIL; ?>" method="post">
    <h4>
        <i class="fa fa-lock fa-lg" aria-hidden="true"></i> Clave Actual:
        <input type="password" class="form-control" placeholder="Clave Actual" name="clave_actual" autofocus required />
    </h4>
    <br>
    <h4>
        <i class="fa fa-lock fa-lg" aria-hidden="true"></i> Nueva Clave:
        <input type="password" class="form-control" placeholder="Nueva clave" name="clave1" required />
        <?php 
            if(isset($_POST['guardar_cambios'])) { 
                $validador -> mostrar_error_clave1();
            }
        ?>
    </h4>
    <br>
    <h4>
        <i class="fa fa-check fa-lg" aria-hidden="true"></i><i class="fa fa-lock fa-lg" aria-hidden="true"></i> Confirmar Clave:
        <input type="password" class="form-control" placeholder="Repetir nueva clave" name="clave2" required />
        <?php
            if(isset($_POST['guardar_cambios'])) { 
                $validador -> mostrar_error_clave2();
            }
        ?>
    </h4>
    <br>
    <br>
    <input type="submit" value="Guardar cambios" name="guardar_cambios" class="form-control btn btn-primary" />
</form>