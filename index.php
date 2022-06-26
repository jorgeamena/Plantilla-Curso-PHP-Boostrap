<?php

include_once 'app/config.inc.php';
include_once 'app/Conexion.inc.php';
include_once 'app/ControlSession.inc.php';

include_once 'app/Usuario.inc.php';
include_once 'app/Entrada.inc.php';
include_once 'app/Comentario.inc.php';

include_once 'app/RepositorioUsuario.inc.php';
include_once 'app/RepositorioEntrada.inc.php';
include_once 'app/RepositorioComentario.inc.php';

$componentes_url = parse_url($_SERVER['REQUEST_URI']);

$ruta = $componentes_url['path'];

$partes_ruta = explode('/', $ruta);
$partes_ruta = array_filter($partes_ruta);
$partes_ruta = array_slice($partes_ruta, 0);

$ruta_elegida = 'Vistas/404.php';

if ($partes_ruta[0] == 'Plantilla-Curso-PHP-Boostrap') {
    if (count($partes_ruta) == 1) {
        $ruta_elegida = 'Vistas/home.php';
    } else if (count($partes_ruta) == 2) {
        switch($partes_ruta[1]) {
        case'login':
                $ruta_elegida = 'Vistas/login.php';
        break;
        case'Entradas':
            $ruta_elegida = 'Vistas/Entradas.php';
        break;
        case'logout':
                $ruta_elegida = 'Vistas/logout.php';
        break;
        case'contacto':
                $ruta_elegida = 'Vistas/contacto.php';
        break;
        case'favoritos':
            $ruta_elegida = 'Ejemplos/sidebars/index.html';
    break;
        case'autor':
            $ruta_elegida = 'Vistas/autor.php';
    break;
        case'registro':
                $ruta_elegida = 'Vistas/registro.php';
        break;
        case 'gestor':
                $ruta_elegida = 'Vistas/gestor.php';
                $gestor_actual = '';
        break;
        case 'nueva_entrada':
            $ruta_elegida = 'Vistas/nueva_entrada.php';
            $gestor_actual = '';
        break;
        case 'borrar_entrada':
            $ruta_elegida = 'Scripts/borrar_entrada.php';
            $gestor_actual = '';
        break;
        case 'borrar_comentario':
            $ruta_elegida = 'Scripts/borrar_comentario.php';
            $gestor_actual = '';
        break;
        case 'editar_entrada':
            $ruta_elegida = 'Vistas/editar_entrada.php';
            $gestor_actual = '';
        break;
        case 'nuevo_comentario':
            $ruta_elegida = 'Vistas/nuevo_comentario.php';
            $gestor_actual = '';
        break;
        case 'editar_comentario':
            $ruta_elegida = 'Vistas/editar_comentario.php';
            $gestor_actual = '';
        break;
        case 'Script_Relleno':
            $ruta_elegida = 'Scripts/Script_Relleno.php';
        break;
        case 'recuperar_clave':
            $ruta_elegida = 'Vistas/recuperar_clave.php';
        break;
        case 'generar_url_secreta':
            $ruta_elegida = 'Scripts/generar_url_secreta.php';
        break;
        case 'mail':
            $ruta_elegida = 'app/TestMail.inc.php';
        break;
        case 'buscar':
            $ruta_elegida = 'Vistas/buscar.php';
        break;
        case 'perfil':
            $ruta_elegida = 'Vistas/perfil.php';
        break;
        case 'cambiar_clave':
            $ruta_elegida = 'Plantillas/Cambiar_clave.inc.php';
        break;
        case 'clave_actualizada':
            $ruta_elegida = 'Vistas/clave_actualizada.php';
        break;
        }
    } else if (count($partes_ruta) == 3) {
        if ($partes_ruta[1] == 'registro_correcto') {
            $nombre = $partes_ruta[2];
            $ruta_elegida = 'Vistas/registro_correcto.php';
        }
        if ($partes_ruta[1] == 'entrada') {
            $url = $partes_ruta[2];

            Conexion::abrir_conexion();
            $entrada = RepositorioEntrada::obtener_entrada_url(Conexion::obtener_conexion(), $url);

            if($entrada != null) {

            $autor = RepositorioUsuario::obtener_usuario_por_id(Conexion::obtener_conexion(), $entrada -> obtener_autor_id());

            $comentarios = RepositorioComentario::obtener_comentarios(Conexion::obtener_conexion(), $entrada -> obtener_id());
             
            $entradas_azar = RepositorioEntrada::obtener_entradas_azar(Conexion::obtener_conexion(), 3);

            $ruta_elegida = 'Vistas/entrada.php';
            }
        }

        if($partes_ruta[1] == 'gestor') {
            switch($partes_ruta[2]) {
                case 'entradas':
                    $gestor_actual = 'entradas';
                    $ruta_elegida = 'Vistas/gestor.php';
                break;
                case 'comentarios':
                    $gestor_actual = 'comentarios';
                    $ruta_elegida = 'Vistas/gestor.php';
                break;
                case 'favoritos':
                    $gestor_actual = 'favoritos';
                    $ruta_elegida = 'Vistas/gestor.php';
                break;
            }
        }

        if($partes_ruta[1] == 'recuperacion_clave') {
            $url_personal = $partes_ruta[2];
            $ruta_elegida = 'Vistas/recuperacion_clave.php';
        }else if($partes_ruta[1] == 'clave_actualizada' && !ControlSession::session_iniciada()) {
            $nombre = str_replace('%20', ' ', $partes_ruta[2]);
            $ruta_elegida = 'Vistas/clave_actualizada.php';
        }
    }
}

include_once $ruta_elegida;



/*KISS-Keep It Simple Stupid*/

/*if ($partes_ruta[2] == 'registro') {
    include_once 'Vistas/registro.php';
} else if ($partes_ruta[2] == 'login') {
    include_once 'Vistas/login.php';
} else if ($partes_ruta[1] == 'Plantilla-Curso-PHP-Boostrap') {
    include_once 'Vistas/home.php';
} else {
    echo '404';
} */