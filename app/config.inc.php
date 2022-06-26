<?php

//info de la besa de datos
define('NOMBRE_SERVIDOR', 'localhost');
define('NOMBRE_USUARIO', 'root');
define('PASSWORD', '');
define('NOMBRE_BD','aprender');

//rutas de la web
define("SERVIDOR", "http://localhost/Plantilla-Curso-PHP-Boostrap");
define("RUTA_REGISTRO", SERVIDOR."/registro");
define("RUTA_REGISTRO_CORRECTO", SERVIDOR."/registro_correcto");
define("RUTA_LOGIN", SERVIDOR."/login");
define("RUTA_LOGOUT", SERVIDOR."/logout");
define("RUTA_ENTRADA", SERVIDOR."/entrada");
define("RUTA_VISOR_ENTRADAS", SERVIDOR."/Entradas");
define("RUTA_GESTOR", SERVIDOR."/gestor");
define("RUTA_GESTOR_ENTRADAS", RUTA_GESTOR."/entradas");
define("RUTA_GESTOR_COMENTARIOS", RUTA_GESTOR."/comentarios");
define("RUTA_GESTOR_FAVORITOS", RUTA_GESTOR."/favoritos");
define("RUTA_NUEVA_ENTRADA", SERVIDOR."/nueva_entrada");
define("RUTA_BORRAR_ENTRADA", SERVIDOR."/borrar_entrada");
define("RUTA_EDITAR_ENTRADA", SERVIDOR."/editar_entrada");
define("RUTA_COMENTAR_ENTRADA", SERVIDOR."/nuevo_comentario");
define("RUTA_BORRAR_COMENTARIO", SERVIDOR."/borrar_comentario");
define("RUTA_EDITAR_COMENTARIO", SERVIDOR."/editar_comentario");
define("RUTA_CONTACTO", SERVIDOR."/contacto");
define("RUTA_FAVORITOS", SERVIDOR."/favoritos");
define("RUTA_AUTOR", SERVIDOR."/autor");
define("RUTA_RECUPERAR_CLAVE", SERVIDOR."/recuperar_clave");
define("RUTA_GENERAR_URL_SECRETA", SERVIDOR."/generar_url_secreta");
define("RUTA_PRUEBA_MAIL", SERVIDOR."/mail");
define("RUTA_RECUPERACION_CLAVE", SERVIDOR."/recuperacion_clave");
define("RUTA_CLAVE_ACTUALIZADA", SERVIDOR."/clave_actualizada");
define("RUTA_BUSCAR", SERVIDOR."/buscar");
define("RUTA_PERFIL", SERVIDOR."/perfil");
define("RUTA_CAMBIAR_CLAVE", SERVIDOR."/cambiar_clave");

//recussos
define("RUTA_CSS", SERVIDOR . "/css/");
define("RUTA_JS", SERVIDOR . "/js/");
define("DIRECTORIO_RAIZ", realpath(dirname(__FILE__)."/.."));