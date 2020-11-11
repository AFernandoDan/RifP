<?php

global $entityManager;

function getRifas(){
    $rifas = rifasRepository()->findBy([]);
    return $rifas;
}

function getRifaPorId($id_rifa) {
    
    $rifa = rifasRepository()->findOneBy(["id"=>$id_rifa]);
    
    return $rifa;
    
}

function getRifaPorNombre($nombre_rifa) {
    
    $rifa = rifasRepository()->findOneBy(["nombre"=>$nombre_rifa]);
    
    return $rifa;
    
}

function getBoletoPorId($id_boleto) {
    
    $boleto = boletosRepository()->findOneBy(["id"=>$id_boleto]);
    
    return $boleto;
    
}