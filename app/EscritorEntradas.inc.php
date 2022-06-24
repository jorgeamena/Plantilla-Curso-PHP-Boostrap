<?php

include_once 'app/RepositorioEntrada.inc.php';
include_once 'app/Entrada.inc.php';
include_once 'app/Conexion.inc.php';

class EscritorEntradas {
    public static function escribir_entradas() {
        $entradas = RepositorioEntrada::obtener_todas_fecha_desc(Conexion::obtener_conexion());

        if(count($entradas)) {
            foreach($entradas as $entrada) {
                self::escribir_entrada($entrada);
            }
        }
    }

    public static function escribir_entrada($entrada) {
        if(!isset($entrada)) {
            return;
        }

        ?>

        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                    <i class="fa fa-user-o fa-lg" aria-hidden="true"></i>
                        <?php
                        echo $entrada -> obtener_titulo();
                        ?>
                    </div>
                    <div class="panel-body">
                        <p>
                            <strong>
                                <?php
                                echo $entrada -> obtener_fecha();
                                ?>
                            </strong>
                        </p>
                        <div class="text-justify">
                        <?php
                        echo nl2br(self::resumir_texto($entrada -> obtener_texto()));
                        ?>
                        </div>
                        <br>
                        <div class="text-right">
                            <a class="btn btn-primary" role="button" href="<?php echo RUTA_ENTRADA . '/' . $entrada -> obtener_url() ?>">Ver Más  <i class="fa fa-arrows-alt faa-shake faa-slow animated" aria-hidden="true"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <?php
    }

    public static function mostrar_entradas_busqueda($entradas) {
        for ($i = 1; $i <= count($entradas); $i++) {
            if($i % 1 == 0) {
                ?>
                
                <div class="row">
                
                <?php
            }

            $entrada = $entradas[$i - 1];

            self::mostrar_entrada_busqueda($entrada);

            if($i % 1 ==0) {
                ?>
                    
                </div>
                
                <?php
            }
        }
    }

    public static function mostrar_entradas_busqueda_multiples($entradas) {
        for ($i = 1; $i < count($entradas); $i++) {
            ?>
            
            <div class="row">
            
            <?php

            $entrada = $entradas[$i];

            self::mostrar_entrada_busqueda($entrada);

            ?>
                
            </div>
            
            <?php
        }
    }

    public static function mostrar_entrada_busqueda($entrada) {
        if(!isset($entrada)) {
            return;
        }

        ?>

        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <i class="fa fa-user-o fa-lg" aria-hidden="true"></i>
                        <?php
                        echo $entrada -> obtener_titulo();
                        ?>
                </div>
                <div class="panel-body">
                    <p>
                        <strong>
                            <?php
                            echo $entrada -> obtener_fecha();
                            ?>
                        </strong>
                    </p>
                    <div class="text-justify">
                        <?php
                            echo nl2br(self::resumir_texto($entrada -> obtener_texto()));
                        ?>
                    </div>
                    <br>
                    <div class="text-right">
                        <a class="btn btn-primary" role="button" href="<?php echo RUTA_ENTRADA . '/' . $entrada -> obtener_url() ?>">Ver Más  <i class="fa fa-arrows-alt faa-shake faa-slow animated" aria-hidden="true"></i></a>
                    </div>
                </div>
            </div>
        </div>

        <?php
    }

    public static function resumir_texto($texto) {
        $longitud_maxima = 400;

        $resultado = '';
        
        if(strlen($texto) >= $longitud_maxima) {

            /*for($i = 0; $i < $longitud_maxima; $i++) {
                $resultado .= substr($texto, $i, 1);
            }*/

            $resultado = substr($texto, 0, $longitud_maxima);
            $resultado .= '...';
        } else {
            $resultado = $texto;
        }

        return $resultado;
    }
}