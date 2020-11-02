<?php

require_once '../RifP/entity/Rifa.php';
require_once '../RifP/entity/Boleto.php';

global $entityManager;

function rifasRepository(){
    $repositorio = $GLOBALS['entityManager']->getRepository("entity\Rifa");
    return $repositorio;
}

function boletosRepository(){
    $repositorio = $GLOBALS['entityManager']->getRepository("entity\Boleto");
    return $repositorio;
}

function ganadoresRepository(){
    $repositorio = $GLOBALS['entityManager']->getRepository("entity\Ganador");
    return $repositorio;
}