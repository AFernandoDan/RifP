<?php

require 'repositorios.php';

require 'crear_rifa.php';

require 'eliminar_rifa.php';

require 'getters.php';

require 'validaciones.php';

global $entityManager;



$rifa = getRifaPorNombre("bien");
$boleto = $rifa->getBoletos()[0];
$boleto->asignarResponsable("responsable");
$boleto->asignarDueno("dueno");
$rifa->sortear();

$id = $rifa->getId();



?>