<?php

include 'main.php';

//obteniendo el id del sorteo que se quiere eliminar
$id_sorteo = $_POST ["id_sorteo"];

//buscando el sorteo que se va a eliminar
$sorteo = getSorteoPorId($id_sorteo);

//obteniendo todos los numeros del sorteo a eliminar
$numeros = getNumerosPorSorteo($sorteo);

$sorteo -> setGanador(NULL);
$sorteo -> setEstado(false);

//eliminando todos los numeros del sorteo
foreach ($numeros as $numero) {
    $entityManager->remove($numero);
    $entityManager->flush();
}

//eliminando el sorteo
$entityManager->remove($sorteo);
$entityManager->flush();

header("Location:home.php");
?>

