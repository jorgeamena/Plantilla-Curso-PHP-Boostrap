<?php 

include_once 'app/EscritorEntradas.inc.php';

$busqueda = null;
$resultados = null;

$resultados_multiples = null;

$buscar_titulo = false;
$buscar_contenido = false;
$buscar_tags = false;
$buscar_autor = false;

if(isset($_POST['buscar']) && isset($_POST['termino_buscar']) && !empty($_POST['termino_buscar'])) {
    $busqueda = $_POST['termino_buscar'];
    $resultados_multiples = false;

    Conexion::abrir_conexion();

    $resultados = RepositorioEntrada::buscar_entradas_todos_campos(Conexion::obtener_conexion(), $busqueda);

    Conexion::cerrar_conexion();
}

if(isset($_POST['busqueda_avanzada']) && isset($_POST['campos'])) {

    if(in_array("titulo", $_POST['campos'])) {
        $buscar_titulo = true;
    }
    if(in_array("contenido", $_POST['campos'])) {
        $buscar_contenido = true;
    }
    if(in_array("tags", $_POST['campos'])) {
        $buscar_tags = true;
    }
    if(in_array("autor", $_POST['campos'])) {
        $buscar_autor = true;
    }

    if($_POST['fecha'] == "recientes") {
        $orden = "DESC";
    }

    if($_POST['fecha'] == "antiguas") {
        $orden = "ASC";
    }

    if(isset($_POST['termino_buscar']) && !empty($_POST['termino_buscar'])) {

        $busqueda = $_POST['termino_buscar'];
        $resultados_multiples = true;

        Conexion::abrir_conexion();

        if($buscar_titulo) {
            $entradas_por_titulo = RepositorioEntrada::buscar_entradas_por_titulo(Conexion::obtener_conexion(), $busqueda, $orden);
        }

        if($buscar_contenido) {
            $entradas_por_contenido = RepositorioEntrada::buscar_entradas_por_texto(Conexion::obtener_conexion(), $busqueda, $orden);
        }

        if($buscar_tags) {
        }

        if($buscar_autor) {
            $entradas_por_autor = RepositorioEntrada::buscar_entradas_por_autor(Conexion::obtener_conexion(), $busqueda, $orden);
        }

    }

}

$titulo = "Busqueda";

include_once 'Plantillas/Documento-declaracion.inc.php';
include_once 'Plantillas/Barra-navegacion.inc.php';

?>

<div class="container">
    <div class="row">
        <div class="jumbotron">
            <h1 class="text-center">Resultado de la Búsqueda</h1>
        </div>
    </div>
</div>
<div class="container">
    <div class="row">
        <div class="col-md-4">
            <?php
                include_once 'Plantillas/Menu.inc.php'; 
            ?>
        </div>
        <div class="col-md-8" id="resultados">
            <div class="row">
                <div class="col-md-12">
                    <div class="page-header">
                        <h1>
                            Resultados 
                            <?php 
                                if(isset($_POST['buscar']) && count($resultados)) {
                                    echo " ";
                                    ?>
                                        <small>
                                            <?php
                                                echo count($resultados);
                                            ?>
                                        </small>
                                    <?php
                                } else if(isset($_POST['busqueda_avanzada'])) {
                                    //dfg
                                } else {
                                    echo " ";
                                    ?>
                                        <small>
                                            No se encontraron resultados.
                                        </small>
                                    <?php
                                }
                            ?>
                        </h1>
                    </div>
                </div>
            </div>
            <?php
                if(isset($_POST['buscar'])) {
                    if(count($resultados)) {
                        EscritorEntradas::mostrar_entradas_busqueda($resultados);
                    } else {
                        ?>
                            <h3>
                                Sin coincidencias
                            </h3>
                            <br>
                        <?php
                    }
                } else if(isset($_POST['busqueda_avanzada'])) {
                    if(count($entradas_por_titulo) || count($entradas_por_contenido) || count($entradas_por_autor)) {
                        $parametros = count($_POST['campos']);
                        $ancho_columnas = 12 / $parametros;
                        ?>
                            <div class="row">
                                <?php 
                                    for($i = 0; $i < $parametros; $i++) {
                                        ?>
        
                                            <div class="<?php echo 'col-md-'.$ancho_columnas; ?> text-center">
                                                <h4>
                                                    <?php
                                                        echo 'Coincidencias en '.$_POST['campos'][$i];
                                                    ?>
                                                </h4>
                                                <br>
                                                <?php
                                                    switch($_POST['campos'][$i]) {
                                                        case "titulo":
                                                            EscritorEntradas::mostrar_entradas_busqueda_multiples($entradas_por_titulo);
                                                        break;
                                                        case "contenido":
                                                            EscritorEntradas::mostrar_entradas_busqueda_multiples($entradas_por_contenido);
                                                        break;
                                                        case "tags":
                                                            //codigo
                                                        break;
                                                        case "autor":
                                                            EscritorEntradas::mostrar_entradas_busqueda_multiples($entradas_por_autor);
                                                        break;
                                                    }
                                                ?>
                                            </div>
        
                                        <?php
                                    }
                                ?>
                            </div>
                        <?php
                    } else {
                        ?>
                            <h3>
                                Sin coincidencias
                            </h3>
                            <br>
                        <?php
                    }
                }
            ?>
        </div>
    </div>
</div>

<?php
include_once 'Plantillas/Documento-cierre.inc.php';
?>