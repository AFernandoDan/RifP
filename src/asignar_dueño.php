<?php

include 'main.php';

$nuevo_dueño = $_POST ["nuevo_dueño"];
$id_numero = $_POST ["id_numero"];

$sorteos = getSorteos();

//obteniendo todos los numeros del sorteo a eliminar
$numero = getNumeroPorId($id_numero);

$numero->setDueño($nuevo_dueño);
$numero->setEstadoDueño(true);
$entityManager->flush();

?>
<script>history.back();</script>


