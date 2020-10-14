<?php

require "..\bootstrap.php";

require "..\Entity\Sorteo.php";
require "..\Entity\Numero.php";

//obteniendo el repositorio de los sorteos
$id_numero = $_POST ["id_numero"];

$sorteos = $entityManager->getRepository("Entity\Sorteo")->findBy([]);

//obteniendo todos los numeros del sorteo a eliminar
$numero = $entityManager->getRepository("Entity\Numero")->findOneBy(["id"=>$id_numero]);

$numero->setDueño("Sin dueño");
$numero->setEstadoDueño(false);
$entityManager->flush();

?>
<script>history.back();</script>
