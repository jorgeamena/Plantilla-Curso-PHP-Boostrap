<?php

include_once 'RepositorioComentario.inc.php';
include_once 'Validador.inc.php';

class ValidadorComentario extends Validador {

    public function __construct($titulo, $texto, $conexion) {

        $this -> aviso_inicio = "<br><div class='alert alert-danger' role='alert'>";
        $this -> aviso_cierre = "</div>";

        $this -> titulo = "";
        $this -> texto = "";

        $this -> error_titulo = $this -> validar_titulo($conexion, $titulo);
        $this -> error_texto = $this -> validar_texto($conexion, $texto);

    }

}