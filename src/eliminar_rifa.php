<?php

function eliminarRifa($id_rifa) {

    $rifa = getRifaPorId($id_rifa);

    if ($rifa != null) {

        $boletos = $rifa->getBoletos();

        foreach ($boletos as $value) {
            $GLOBALS['entityManager']->remove($value);
            $GLOBALS['entityManager']->flush();
        }
        
        $GLOBALS['entityManager']->remove($rifa);
        $GLOBALS['entityManager']->flush();

    }else{
        echo "No existe una rifa con el id: ".$id_rifa;
    }


}

?>