<?php

include 'main.php';

use Entity\Sorteo as Sorteo;
use Entity\Numero as Numero;

$nombre_sorteo = $_POST ["nombre"];
$numeros = $_POST ["numeros"];

//obteniendo todos los sorteos
$sorteo = getSorteoPorNombre($nombre_sorteo);

//comprobando que el sorteo no exista
if (!isset($sorteo)) {
     
    //creando el sorteo
    $nuevoSorteo = new Sorteo();
    $nuevoSorteo->setNombre($nombre_sorteo);
    $nuevoSorteo->setCantidadNumeros($numeros);
    $nuevoSorteo->setEstado(0);

    //persistiendo el sorteno
    $entityManager->persist($nuevoSorteo);
    $entityManager->flush();
    
    for($i = 0; $i < $numeros; ++$i) {
        $NuevoNumero = new Numero($nuevoSorteo,$i);
        $entityManager->persist($NuevoNumero);
        $entityManager->flush();
    }

    //redireccion hacia el home y comunicando que se creo exitosamente el sorteo
    header("Location:home.php?exitoso=$nombre");
 }

 else {

    //redireccion hacia el home y comunicando que el sorteo ya existe
    header("Location:home.php?fallido=$nombre");

 }
?>