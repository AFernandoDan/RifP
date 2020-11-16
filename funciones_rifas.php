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

if (isset($_POST["eliminarRifaId"])) {

    $id_rifa = $_POST["eliminarRifaId"];
    eliminarRifa($id_rifa);

}

if (isset($_POST["sortearRifaId"])) {

    $id_rifa = $_POST["sortearRifaId"];
    getRifaPorId($id_rifa)->sortear();

}

if (isset($_POST["crearRifaNombre"]) && isset($_POST["crearRifaCantidadBoletos"])) {
  
    $nombre = $_POST["crearRifaNombre"];
    $cantidad_boletos = $_POST["crearRifaCantidadBoletos"];
  
    crearRifa($nombre, $cantidad_boletos);
  
}

header('Location: index.php');
?>