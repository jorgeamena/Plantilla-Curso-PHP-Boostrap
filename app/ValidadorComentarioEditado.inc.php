<?php

include_once 'RepositorioComentario.inc.php';
include_once 'Validador.inc.php';

class ValidadorComentarioEditado extends Validador {

    private $cambios_realizados;

    private $titulo_original;
    private $texto_original;

    public function __construct($titulo, $titulo_original, $texto, $texto_original, $conexion) {

        $this -> titulo = $this -> devolver_variable_si_iniciada($titulo);
        $this -> texto = $this -> devolver_variable_si_iniciada($texto);


        $this -> titulo_original = $this -> devolver_variable_si_iniciada($titulo_original);
        $this -> texto_original = $this -> devolver_variable_si_iniciada($texto_original);

        if($this -> titulo == $this -> titulo_original && 
           $this -> texto == $this -> texto_original) {

            $this -> cambios_realizados = false;
           } else {
            $this -> cambios_realizados = true;
           }

           if($this -> cambios_realizados) {
                echo 'Hay cambios';

                $this -> aviso_inicio = "<br><div class='alert alert-danger' role='alert'>";
                $this -> aviso_cierre = "</div>";

                if($this -> titulo !== $this -> titulo_original) {
                    $this -> error_titulo = $this -> validar_titulo($conexion, $this -> titulo);
                } else {
                    $this -> error_titulo = "";
                }

                if($this -> texto !== $this -> texto_original) {
                    $this -> error_texto = $this -> validar_texto($conexion, $this -> texto);
                } else {
                    $this -> error_texto = "";
                }


           } else {
               echo 'No hay cambios';
           }

    }

    private function devolver_variable_si_iniciada($variable) {
        if($this -> variable_iniciada($variable)) {
            return $variable;
        } else {
            return "";
        }
    }

    public function hay_cambios() {
        return $this -> cambios_realizados;
    }

    public function obtener_titulo_original() {
        return $this -> titulo_original;
    }

    public function obtener_texto_original() {
        return $this -> texto_original;
    }

}