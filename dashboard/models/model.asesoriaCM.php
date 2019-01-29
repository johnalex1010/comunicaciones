<?php
$consulta = $conexion->prepare("SELECT * FROM t_asesoriaCM WHERE numST=:numST");
$consulta->execute(array(':numST' => $ST));
$consulta = $consulta->fetch();
?>