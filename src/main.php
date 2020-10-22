<?php

require "..\bootstrap.php";

require "..\Entity\Sorteo.php";
require "..\Entity\Numero.php";

global $entityManager;

function getSorteos() {
    
    $sorteos = $GLOBALS['entityManager']->getRepository("Entity\Sorteo")->findBy([]);
    
    return $sorteos;
    
}

function getSorteoPorId($id_sorteo) {
    
    $sorteo = $GLOBALS['entityManager']->getRepository("Entity\Sorteo")->findOneBy(["id"=>$id_sorteo]);
    
    return $sorteo;
    
}

function getNumeroPorId ($id_numero) {
    
    $sorteos = getSorteos();
    
    $numero = $GLOBALS['entityManager']->getRepository("Entity\Numero")->findOneBy(["id"=>$id_numero]);
    
    return $numero;
    
}

function getNumerosPorSorteo($sorteo) {
    
    $sorteo = getSorteoPorId($sorteo);
    
    $numeros = $GLOBALS['entityManager']->getRepository("Entity\Numero")->findBy(["id_sorteo"=>$sorteo]);
    
    return $numeros;
    
}

function getSorteoPorNombre($nombre_sorteo) {
    
    $sorteo = $GLOBALS['entityManager']->getRepository("Entity\Sorteo")->findOneBy(["nombre"=>$nombre_sorteo]);
    
    return $sorteo;
    
}

function getNumerosVendidosPorSorteo($id_sorteo) {
    
    $sorteo = getSorteoPorId($id_sorteo);
    
    $numeros = $GLOBALS['entityManager']->getRepository("Entity\Numero")->findBy(["id_sorteo"=>$sorteo,"estado_dueño"=>1]);
    
    return $numeros;
    
}

function eliminarSorteo($id_sorteo) {
    
    $sorteo = getSorteoPorId($id_sorteo);

    //obteniendo todos los numeros del sorteo a eliminar
    $numeros = getNumerosPorSorteo($sorteo);
    echo"hola";

    $sorteo -> setGanador(NULL);
    $sorteo -> setEstado(false);

    //eliminando todos los numeros del sorteo
    foreach ($numeros as $numero) {
        $GLOBALS['entityManager']->remove($numero);
        $GLOBALS['entityManager']->flush();
    }

    //eliminando el sorteo
    $GLOBALS['entityManager']->remove($sorteo);
    $GLOBALS['entityManager']->flush();
}