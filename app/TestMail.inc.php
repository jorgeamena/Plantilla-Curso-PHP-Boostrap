<?php

    ini_set('display_errors', 1);
    error_reporting(E_ALL);
    $from = "jorge.mena@correo.das.gtm";
    $to = "zuilan@correo.das.gtm";
    $subject = "prueba php mail";
    $message = "php mail funciona";
    $headers = "From:" . $from;
    mail($to, $subject, $message, $headers);
    echo "el correo fue enviado";

?>