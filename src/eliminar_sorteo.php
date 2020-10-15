<?php

require "..\bootstrap.php";

require "..\Entity\Sorteo.php";
require "..\Entity\Numero.php";

//obteniendo el id del sorteo que se quiere eliminar
$id_sorteo = $_POST ["id_sorteo"];

//buscando el sorteo que se va a eliminar
$sorteo = $entityManager->getRepository("Entity\Sorteo")->findOneBy(["id"=>$id_sorteo]);

//obteniendo todos los numeros del sorteo a eliminar
$numeros = $entityManager->getRepository("Entity\Numero")->findBy(["id_sorteo"=>$sorteo]);

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

