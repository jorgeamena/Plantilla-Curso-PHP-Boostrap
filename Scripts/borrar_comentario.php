<?php

include_once 'app/config.inc.php';
include_once 'app/Conexion.inc.php';
include_once 'app/RepositorioComentario.inc.php';
include_once 'app/Redireccion.inc.php';

if(isset($_POST['borrar_comentario'])) {
    $id_comentario = $_POST['id_borrar'];

    Conexion::abrir_conexion();

    RepositorioComentario::eliminar_comentarios(Conexion::obtener_conexion(), $id_comentario);

    Conexion::cerrar_conexion();

    Redireccion::redirigir(RUTA_GESTOR_COMENTARIOS);

}