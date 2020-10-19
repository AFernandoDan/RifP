<?php

include 'main.php';

$nuevo_responsable = $_POST ["nuevo_responsable"];
$id_numero = $_POST ["id_numero"];

$sorteos = getSorteos();

//obteniendo todos los numeros del sorteo a eliminar
$numero = getNumeroPorId($id_numero);

$numero->setResponsable($nuevo_responsable);
$numero->setEstadoResponsable(true);
$entityManager->flush();

?>
<script>history.back();</script>


