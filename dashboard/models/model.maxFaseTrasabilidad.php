<?php
$maxT = $conexion->prepare("SELECT MAX(id_fase) AS MAXT FROM t_trasabilidad WHERE numST=:numST");
$maxT->execute(array(':numST' => $ST));
$maxT = $maxT->fetch();
?>