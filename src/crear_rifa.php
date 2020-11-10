<?php

//EntityManager y conexion a base de datos
require_once '../RifP/bootstrap.php';

//clases

use Entity\Rifa as Rifa;
use Entity\Boleto as Boleto;

function crearRifa($nombre, $cantidad_boletos) {

    $validacion_nombre = validarNombre($nombre);
    $validacion_cantidad_boletos = validarNumero($cantidad_boletos);

    if ($validacion_nombre != null) {
        echo $validacion_nombre;
        return null;
    }

    if (getRifaPorNombre($nombre) != null ) {
        echo "Ya existe una rifa con el nombre: ".$nombre;
        return null;
    }

    if ($validacion_cantidad_boletos != null) {
        echo $validacion_cantidad_boletos;
        return null;
    }

    //crear rifa
    $nueva_rifa = new Rifa($nombre, $cantidad_boletos);
                
    $GLOBALS['entityManager']->persist($nueva_rifa);
        
    crearBoletos($nueva_rifa,$cantidad_boletos);
        
    $GLOBALS['entityManager']->flush();

    echo "La rifa se creo exitosamente";
    return $nueva_rifa;

}

function crearBoletos($rifa,$cantidad_boletos) {

    for ($contador = 0; $contador < $cantidad_boletos; $contador++) {
        //crear los boletos
        $nuevo_boleto = new Boleto($rifa,$contador);
        $GLOBALS['entityManager']->persist($nuevo_boleto);
    }

}

?>