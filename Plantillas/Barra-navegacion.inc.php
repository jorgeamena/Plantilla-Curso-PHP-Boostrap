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

                        <?php 
                            if(!ControlSession::session_iniciada()) {
                        ?>
                        <li><a href="<?php echo RUTA_VISOR_ENTRADAS ?>"><i class="fa fa-tasks faa-tada faa-slow animated-hover fa-lg" aria-hidden="true"></i> Entradas</a></li>
                        <li><a href="<?php echo RUTA_BUSCAR ?>"><i class="fa fa-search-plus faa-tada faa-slow animated-hover fa-lg" aria-hidden="true"></i> Buscador</a></li>
                        <?php 
                        }
                        ?>
                    </ul>
                    

                    <ul class="nav navbar-nav navbar-right">
                    <?php 
                        if(ControlSession::session_iniciada()) {
                    ?>
                    
                                     
                        <li>
                            <a href="<?php echo RUTA_PERFIL; ?>">
                                <i class="fa fa-user-o faa-tada faa-slow animated-hover fa-lg" aria-hidden="true"></i>
                                <?php echo ' ' . $_SESSION['nombre_usuario']; ?>
                            </a>
                        </li>
                        <li>
                            <a href="<?php echo RUTA_GESTOR ?>">
                                <i class="fa fa-cog fa-spin faa-tada faa-slow animated-hover fa-lg" aria-hidden="true"></i> Gestor
                            </a>
                        </li>    
                    
                        <li>
                            <a href="<?php echo RUTA_LOGOUT ?>"><i class="fa fa-sign-out faa-tada faa-slow animated-hover fa-lg" aria-hidden="true"></i> Cerrar Sessión
                            </a>
                        </li>

                    <?php
                        } else {
                    ?>
                        <li>
                            <a href="#"><i class="fa fa-users faa-pulse animated fa-lg" aria-hidden="true"></i>
                                <?php
                                    echo $total_usuarios;
                                ?>
                            </a>
                        </li>
                        <li><a href="<?php echo RUTA_LOGIN ?>"><i class="fa fa-sign-in faa-tada faa-slow animated-hover fa-lg" aria-hidden="true"></i> Iniciar Sessión</a></li>
                        <li><a href="<?php echo RUTA_REGISTRO ?>"><i class="fa fa-user-plus faa-tada faa-slow animated-hover fa-lg" aria-hidden="true"></i> Registros</a></li>
                    
                    <?php 
                        }
                    ?>
                    </ul>
                    
               </div>
           </div>
       </nav>