<?php

include_once 'app/ControlSession.inc.php';
include_once 'app/config.inc.php';

Conexion :: abrir_conexion();

$total_usuarios = RepositorioUsuario :: obtener_numero_usuarios(Conexion::obtener_conexion());

?>

<nav class="navbar navbar-default navbar-static-top" id="Id_Barra_Navegacion">
           <div class="container">
               <div class="navbar-header">
                   <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                       <span class="sr-only">Boton</span>
                       <span class="icon-bar"></span>
                       <span class="icon-bar"></span>
                       <span class="icon-bar"></span>
                   </button>
                   <a class="navbar-brand" href="<?php echo SERVIDOR ?>"><i class="fa fa-home faa-tada faa-slow animated-hover fa-lg" aria-hidden="true"></i> Inicio</a>
                </div>
                <div id="navbar" class="navbar-collapse collapse">
                    <ul class="nav navbar-nav">
                        <li><a href="<?php echo RUTA_AUTOR ?>"><i class="fa fa-user-secret faa-tada faa-slow animated-hover fa-lg" aria-hidden="true"></i> Autor</a></li>
                        <li><a href="<?php echo RUTA_CONTACTO ?>"><i class="fa fa-address-card-o faa-tada faa-slow animated-hover fa-lg" aria-hidden="true"></i> Contácto</a></li>

                        
                        <li><a href="<?php echo RUTA_VISOR_ENTRADAS ?>"><i class="fa fa-tasks faa-tada faa-slow animated-hover fa-lg" aria-hidden="true"></i> Entradas</a></li>
                        <li><a href="<?php echo RUTA_FAVORITOS ?>"><i class="fa fa-star-half-o faa-tada faa-slow animated-hover fa-lg" aria-hidden="true"></i> Favoritos</a></li>
                        
                    </ul>
                    

                    
                    
               </div>
           </div>
       </nav>