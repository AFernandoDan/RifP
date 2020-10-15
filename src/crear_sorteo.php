<?php

require "..\bootstrap.php";

require "..\Entity\Sorteo.php";
require "..\Entity\Numero.php";

use Entity\Sorteo as Sorteo;
use Entity\Numero as Numero;

$nombre = $_POST ["nombre"];
$numeros = $_POST ["numeros"];

//obteniendo todos los sorteos
$sorteos = $entityManager->getRepository("Entity\Sorteo")->findBy(["nombre"=>$nombre]);

//comprobando que el sorteo no exista
if (count($sorteos) == 0) {
     
    //creando el sorteo
    $nuevoSorteo = new Sorteo();
    $nuevoSorteo->setNombre($nombre);
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