<?php
$consulta = $conexion->prepare("SELECT * FROM t_capacitacionWeb WHERE numST=:numST");
$consulta->execute(array(':numST' => $ST));
$consulta = $consulta->fetch();
?>