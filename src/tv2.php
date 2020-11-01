<?php

// comprobando desde otro archivo que la session existe
session_start();
if (isset($_SESSION["errores"])) {
    echo "La sesion existe";
}else {
    echo "La sesion no existe";
}

?>