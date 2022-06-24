<?php

$destinatario = "jorge.mena@correo.das.gtm";
$asunto = "prueba de email";
$mensaje = "esto es una prueba";

$exito = mail($destinatario, $asunto, $mensaje);

if($exito) {
    echo 'email enviado';
} else {
    echo 'email fallido';
}