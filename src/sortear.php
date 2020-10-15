<?php

require "..\bootstrap.php";

require "..\Entity\Sorteo.php";
require "..\Entity\Numero.php";

$id_sorteo = $_POST ["id_sorteo"];

$sorteo = $entityManager->getRepository("Entity\Sorteo")->findOneBy(["id"=>$id_sorteo]);

//obteniendo todos los numeros del sorteo a eliminar
$numeros = $entityManager->getRepository("Entity\Numero")->findBy(["id_sorteo"=>$sorteo,"estado_dueño"=>1]);

if (count($numeros) >= 1) {
    $numero_ganador = $numeros[array_rand($numeros)];
    
    $sorteo->setEstado(true);
    $sorteo->setGanador($numero_ganador);
    $entityManager->flush();
}
else {
    $numero_ganador = "no hay ningun numero vendido";
}
?>
<script>history.back();</script>
