<?php

include 'main.php';

use Entity\Sorteo as Sorteo;
use Entity\Numero as Numero;

$nombre_sorteo = $_POST ["nombre"];
$cantidad_numeros = $_POST ["numeros"];

//obteniendo todos los sorteos
$sorteo = getSorteoPorNombre($nombre_sorteo);

//comprobando que no existe otro sorteo con el mismo nombre
if (!isset($sorteo)) {
     
    //creando el sorteo
    $nuevoSorteo = new Sorteo($nombre_sorteo,$cantidad_numeros);

    //persistiendo el sorteno
    $entityManager->persist($nuevoSorteo);
    $entityManager->flush();
    
    for($i = 0; $i < $cantidad_numeros; ++$i) {
        $NuevoNumero = new Numero($nuevoSorteo,$i);
        $entityManager->persist($NuevoNumero);
        $entityManager->flush();
    }

    //redireccion hacia el home y comunicando que se creo exitosamente el sorteo
    header("Location:home.php?exitoso=$nombre_sorteo");
 }

 else {

    //redireccion hacia el home y comunicando que el sorteo ya existe
    header("Location:home.php?fallido=$nombre_sorteo");

 }
?>