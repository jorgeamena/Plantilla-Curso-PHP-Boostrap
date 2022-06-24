<?php
    $busqueda = null;

    if(isset($_POST['buscar']) && isset($_POST['termino_buscar']) && !empty($_POST['termino_buscar'])) {
        $busqueda = $_POST['termino_buscar'];
    }
?>


                    <div class="row">
                        <div class="col-md-12">
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                <i class="fa fa-search faa-float faa-fast animated fa-lg" aria-hidden="true"></i> Búsqueda <span class="text-right"><a data-toggle="collapse" href="#avanzada">Avanzada <i class="fa fa-angle-double-right fa-lg" aria-hidden="true"></i></a></span>
                                </div>
                                <div class="panel-body">
                                    <form id="avanzada" class="panel-collapse collapse" role="form" method="post" action="<?php echo RUTA_BUSCAR; ?>">
                                        <div class="input-group margin-bottom-sm">
                                            <span class="input-group-addon"><i class="fa fa-search fa-fw"></i></span>
                                            <input class="form-control" name="termino_buscar" type="text" placeholder="¿Qué buscas?" required
                                            <?php echo "value='".$busqueda."'" ?>>
                                        </div>
                                        <br>
                                        <p>
                                            Buscar en los siguientes campos:
                                        </p>
                                        <label class="checkbox-inline">
                                            <input type="checkbox" name="campos[]" value="titulo" 
                                                <?php
                                                    if(isset($_POST['busqueda_avanzada'])) {
                                                        if($buscar_titulo) {
                                                            echo "checked";
                                                        }
                                                    } else {
                                                        echo "checked";
                                                    }
                                                ?>
                                            />Título
                                        </label>
                                        <label class="checkbox-inline">
                                            <input type="checkbox" name="campos[]" value="contenido" 
                                                <?php
                                                    if(isset($_POST['busqueda_avanzada'])) {
                                                        if($buscar_contenido) {
                                                            echo "checked";
                                                        }
                                                    } else {
                                                        echo "checked";
                                                    }
                                                ?>
                                            />Contenido
                                        </label>
                                        <label class="checkbox-inline">
                                            <input type="checkbox" name="campos[]" value="tags" 
                                                <?php
                                                    if(isset($_POST['busqueda_avanzada'])) {
                                                        if($buscar_tags) {
                                                            echo "checked";
                                                        }
                                                    } else {
                                                        echo "checked";
                                                    }
                                                ?>
                                            />Tags
                                        </label>
                                        <label class="checkbox-inline">
                                            <input type="checkbox" name="campos[]" value="autor" 
                                                <?php
                                                    if(isset($_POST['busqueda_avanzada'])) {
                                                        if($buscar_autor) {
                                                            echo "checked";
                                                        }
                                                    }
                                                ?>
                                            />Autor
                                        </label>
                                        <hr>
                                        <p>Ordenar por:</p>
                                        <label class="radio-inline">
                                            <input type="radio" name="fecha" value="recientes" 
                                                <?php
                                                    if(isset($_POST['busqueda_avanzada']) && isset($orden) && $orden == 'DESC') {
                                                        echo "checked";
                                                    }

                                                    if(!isset($_POST['busqueda_avanzada'])) {
                                                        echo "checked";
                                                    }
                                                ?>
                                            />Las más recientes
                                        </label>
                                        <label class="radio-inline">
                                            <input type="radio" name="fecha" value="antiguas" 
                                                <?php
                                                    if(isset($_POST['busqueda_avanzada']) && isset($orden) && $orden == 'ASC') {
                                                        echo "checked";
                                                    }
                                                ?>
                                            />Las más antiguas
                                        </label>
                                        <hr>
                                        <button type="submit" name="busqueda_avanzada" class="form-control btn btn-primary">
                                            Búsqueda avanzada
                                        </button>
                                        <hr>
                                    </form>
                                    
                                    <form role="form" method="post" action="<?php echo RUTA_BUSCAR; ?>">
                                        <div class="input-group margin-bottom-sm">
                                            <span class="input-group-addon"><i class="fa fa-search fa-fw"></i></span>
                                            <input class="form-control" name="termino_buscar" type="text" placeholder="¿Qué buscas?" autofocus required
                                            <?php echo "value='".$busqueda."'" ?>>
                                        </div>
                                        <br>
                                        <button type="submit" name="buscar" class="form-control btn btn-primary">
                                            Buscar
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                <i class="fa fa-filter fa-lg" aria-hidden="true"></i> Filtro
                                </div>
                                <div class="panel-body">

                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                <i class="fa fa-calendar fa-lg" aria-hidden="true"></i> Archivo
                                </div>
                                <div class="panel-body">
                                    
                                </div>
                            </div>
                        </div>
                    </div>
               