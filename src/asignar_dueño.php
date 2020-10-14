<?php

require "..\bootstrap.php";

require "..\Entity\Sorteo.php";
require "..\Entity\Numero.php";

$nuevo_dueño = $_POST ["nuevo_dueño"];
$id_numero = $_POST ["id_numero"];

$sorteos = $entityManager->getRepository("Entity\Sorteo")->findBy([]);

//obteniendo todos los numeros del sorteo a eliminar
$numero = $entityManager->getRepository("Entity\Numero")->findOneBy(["id"=>$id_numero]);

$numero->setDueño($nuevo_dueño);
$numero->setEstadoDueño(true);
$entityManager->flush();

?>
<script>history.back();</script>


