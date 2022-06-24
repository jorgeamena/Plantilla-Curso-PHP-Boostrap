<?php

include_once 'Plantillas/Documento-declaracion.inc.php';
include_once 'Plantillas/Barra-navegacion.inc.php';
include_once 'Plantillas/Panel-control-declaracion.inc.php';

switch($gestor_actual) {
    case '';

    $cantidad_entradas_activas = RepositorioEntrada::contar_entradas_activas_usuarios(Conexion::obtener_conexion(), $_SESSION['id_usuario']);
    $cantidad_entradas_inactivas = RepositorioEntrada::contar_entradas_inactivas_usuarios(Conexion::obtener_conexion(), $_SESSION['id_usuario']);

    $cantidad_comentarios = RepositorioComentario::contar_comentarios_usuarios(Conexion::obtener_conexion(), $_SESSION['id_usuario']);

        include_once 'Plantillas/Gestor-generico.inc.php';
    break;
    case 'entradas';

    $array_entradas = RepositorioEntrada::obtener_entradas_usuario_fecha_desc(Conexion::obtener_conexion(), $_SESSION['id_usuario']);

        include_once 'Plantillas/Gestor-entradas.inc.php';
    break;
    case 'comentarios';

    $array_comentarios = RepositorioComentario::obtener_comentarios_usuario_fecha_desc(Conexion::obtener_conexion(), $_SESSION['id_usuario']);
    
        include_once 'Plantillas/Gestor-comentarios.inc.php';
    break;
    case 'favoritos';
        include_once 'Plantillas/Gestor-favoritos.inc.php';
    break;
}

include_once 'Plantillas/Panel-control-cierre.inc.php';

?>



<?php

include_once 'Plantillas/Documento-cierre.inc.php';

?>