<?php
$maxT = $conexion->prepare("SELECT * FROM t_trasabilidad WHERE id_trasabilidad IN (SELECT MAX(id_trasabilidad) FROM t_trasabilidad WHERE numST=:numST) AND numST=:numST");
$maxT->execute(array(':numST' => $ST));
$maxT = $maxT->fetch();
?>