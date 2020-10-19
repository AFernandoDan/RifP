<?php

include 'main.php';

$id_sorteo = $_POST ["id_sorteo"];

$sorteo = getSorteoPorId($id_sorteo);

//obteniendo todos los numeros del sorteo a eliminar
$numeros = getNumerosVendidosPorSorteo($sorteo);

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
