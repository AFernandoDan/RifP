<?php

include 'main.php';

$nuevo_dueño = $_POST ["nuevo_dueño"];
$id_numero = $_POST ["id_numero"];

$sorteos = getSorteos();

$numero = getNumeroPorId($id_numero);

$numero->asignarDueño($nuevo_dueño);
$entityManager->flush();

?>
<script>history.back();</script>


