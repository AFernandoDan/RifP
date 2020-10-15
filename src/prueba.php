<?php

require "..\bootstrap.php";

require "..\Entity\Sorteo.php";
require "..\Entity\Numero.php";

//obteniendo todos los sorteos
$sorteo = $entityManager->getRepository("Entity\Sorteo")->findOneBy(["id"=>2]);

//comprobando que el sorteo no exista
if (isset($sorteo)) {
    $sorteo -> setGanador(NULL);
    $sorteo -> setEstado(false);
    $entityManager -> flush();
}