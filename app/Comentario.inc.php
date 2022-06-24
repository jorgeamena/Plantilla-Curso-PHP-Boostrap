<?php

class Comentario {

    private $id;
    private $autor_id;
    private $entradas_id;
    private $titulo;
    private $texto;
    private $fecha;
    

    public function __construct($id, $autor_id, $entradas_id, $titulo, $texto, $fecha) {
        $this -> id = $id;
        $this -> autor_id = $autor_id;
        $this -> entradas_id = $entradas_id;
        $this -> titulo = $titulo;
        $this -> texto = $texto;
        $this -> fecha = $fecha;
        
    }

    public function obtener_id() {
        return $this -> id;
    }

    public function obtener_autor_id() {
        return $this -> autor_id;
    }

    public function obtener_entradas_id() {
        return $this -> entradas_id;
    }

    public function obtener_titulo() {
        return $this -> titulo;
    }

    public function obtener_texto() {
        return $this -> texto;
    }

    public function obtener_fecha() {
        return $this -> fecha;
    }

        

    public function cambiar_titulo($titulo) {
        $this -> titulo = $titulo;
    }

    public function cambiar_texto($texto) {
        $this -> texto = $texto;
    }
}