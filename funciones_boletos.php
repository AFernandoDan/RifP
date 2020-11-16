<?php

//EntityManager y conexion a base de datos
require_once '../RifP/bootstrap.php';

require_once '../RifP/entity/Rifa.php';
require_once '../RifP/entity/Boleto.php';

Use Entity\Rifa;
Use Entity\Boleto;

require 'src/repositorios.php';

require 'src/crear_rifa.php';

require 'src/eliminar_rifa.php';

require 'src/getters.php';

require 'src/validaciones.php';

require 'public/gui/listar_boletos.php';

if (isset($_POST["quitarDuenoBoletoId"])) {
    $id_boleto = $_POST["quitarDuenoBoletoId"];
    $boleto = getBoletoPorId($id_boleto);
    echo $boleto->quitarDueno();
    
    echo"<script> setTimeout(window.history.go(-1),2000); </script>";
}

if (isset($_POST["quitarResponsableBoletoId"])) {
    $id_boleto = $_POST["quitarResponsableBoletoId"];
    $boleto = getBoletoPorId($id_boleto);
    echo $boleto->quitarResponsable();

    echo"<script> setTimeout(window.history.go(-1),2000); </script>";
}

if (isset($_POST["asignarResponsableNombre"]) && isset($_POST["asignarResponsableBoletoId"])) {

    $nombre = $_POST["asignarResponsableNombre"];
    $id_boleto = $_POST["asignarResponsableBoletoId"];
    $boleto = getBoletoPorId($id_boleto);

    echo $boleto->asignarResponsable($nombre);

    echo"<script> setTimeout(window.history.go(-1),2000); </script>";
}

if (isset($_POST["asignarDuenoNombre"]) && isset($_POST["asignarDuenoBoletoId"])) {

    $nombre = $_POST["asignarDuenoNombre"];
    $id_boleto = $_POST["asignarDuenoBoletoId"];
    $boleto = getBoletoPorId($id_boleto);

    echo $boleto->asignarDueno($nombre);

    echo"<script> setTimeout(window.history.go(-1),2000); </script>";
}

?>
