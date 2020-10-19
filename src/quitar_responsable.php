<?php

include 'main.php';

//obteniendo el repositorio de los sorteos
$id_numero = $_POST ["id_numero"];

$sorteos = getSorteos();

//obteniendo todos los numeros del sorteo a eliminar
$numero = getNumeroPorId($id_numero);

$numero->setResponsable("Sin responsable");
$numero->setEstadoResponsable(false);
$entityManager->flush();

?>
<script>history.back();</script>
