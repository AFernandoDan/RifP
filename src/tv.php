<?php

$valor_sesion = "Esta es una sesion";

// inicializacion y seteado de valor a la SESSION $sesion
session_start();
$_SESSION["errores"]=$valor_sesion;

unset($_SESSION["errores"]);

if (isset($_SESSION["errores"])) {
    echo "La sesion existe";
}else {
    echo "La sesion no existe";
}

?>