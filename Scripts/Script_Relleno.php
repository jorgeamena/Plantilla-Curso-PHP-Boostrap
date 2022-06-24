<?php

include_once 'app/config.inc.php';
include_once 'app/Conexion.inc.php';

include_once 'app/Usuario.inc.php';
include_once 'app/Entrada.inc.php';
include_once 'app/Comentario.inc.php';

include_once 'app/RepositorioUsuario.inc.php';
include_once 'app/RepositorioEntrada.inc.php';
include_once 'app/RepositorioComentario.inc.php';

Conexion::abrir_conexion();

for ($usuarios = 0; $usuarios < 100; $usuarios++) {
    $nombre = sa(10);
    $email = sa(5).'@'.sa(3);
    $password = password_hash('123456', PASSWORD_DEFAULT);

    $usuario = new Usuario('', $nombre, $email, $password, '', '');
    RepositorioUsuario::insertar_usuario(Conexion::obtener_conexion(), $usuario);
}

for($entradas = 0; $entradas < 100; $entradas++){
    $titulo = sa(10);
    $url = $titulo;
    $texto = lorem();
    $autor = rand(0, 100);

    $entrada = new Entrada('', $autor, $url, $titulo, $texto, '', '');
    RepositorioEntrada::insertar_entrada(Conexion::obtener_conexion(), $entrada);
}

for($comentarios = 0; $comentarios < 100; $comentarios++){
    $titulo = sa(10);
    $texto = lorem();
    $autor = rand(0, 100);
    $entrada = rand(0, 100);

    $comentario = new Comentario('', $autor, $entrada, $titulo, $texto, '');
    RepositorioComentario::insertar_comentario(Conexion::obtener_conexion(), $comentario);
}

function sa($longitud) {
    $caracteres = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $numero_caracteres = strlen($caracteres);
    $string_aleatorio = '';

    for($i = 0; $i < $longitud; $i++) {
        $string_aleatorio .= $caracteres[rand(0, $numero_caracteres - 1)];
    }

    return $string_aleatorio;
}

function lorem() {
    $lorem = 'En la actualidad, en muchos países el órgano competente para conocer en primer lugar la comisión de un fenómeno antijurídico lo constituye la “Policía” cuya misión es la de elaborar y proponer la política de prevención del delito, y prevenir, neutralizar y esclarecer las actividades delictivas de carácter común, preservar el orden público y la seguridad colectiva.
    En Cuba como principal institución para la mantención del orden está el Ministerio del Interior (MININT) que bajo la dirección del Partido Comunista de Cuba (PCC) es el encargado de garantizar la seguridad del estado y el orden interior.
    En el Órgano de la Policía Nacional Revolucionaria (PNR) como parte del Ministerio del Interior es la institución que está designada para preservar el orden público, la seguridad colectiva y la tranquilidad ciudadana, así como la toma de medidas como la imposición de las Advertencias Oficiales y Contravenciones, mediante la obstaculización, descubrimiento y corte de actividades delictivas y antisociales, la prevención de la accidentalidad, compulsando la protección de los bienes estatales y personales, en estrecho vínculo con el resto de los factores del Sistema de Policía, del Sub-Sistema MININT y el pueblo.
    Una Advertencia Oficial constituye una acción legal policial aplicable a ciudadanos que por su conducta antisocial, sus relaciones o vínculos con personas peligrosas para la sociedad, las demás personas y el orden social, económico y político del estado, puedan resultar proclives al delito o que, siendo objeto de atención y control profiláctico mediante los Grupos de Prevención y Atención Social por los motivos anteriores, no evolucionan favorablemente después de agotados los métodos de profilaxis general y particular. 
    Una Contravención, en Derecho penal, es una medida tomada con aquellas personas que presentan una conducta antijurídica que cumple con los mismos requisitos de un delito (tipicidad, antijuridicidad y culpabilidad), que pone en peligro algún bien jurídico protegible, pero que es considerado de menor gravedad y que por tanto no es tipificada como delito. Y dado que la gravedad de la falta es menor a la de un delito las penas que se imponen por las mismas suelen ser menos graves que las de los delitos y por demás solo son pecuniarias.';
    return $lorem;
}