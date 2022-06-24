<?php

include_once 'app/ControlSession.inc.php';
include_once 'app/Redireccion.inc.php';
include_once 'app/config.inc.php';

ControlSession::cerrar_session();
Redireccion::redirigir(SERVIDOR);