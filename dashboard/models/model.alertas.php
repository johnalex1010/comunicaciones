<?php
$consultaA = $conexion->prepare("SELECT SQL_CALC_FOUND_ROWS A.*, U.usuario, U.nombres, U.apellidos FROM t_alertas AS A, t_usuario U WHERE A.id_usuario=U.id_usuario AND numST=:numST");
$consultaA->execute(array(':numST' => $ST));
$consultaA = $consultaA->fetchAll(PDO::FETCH_ASSOC);

$totalA = $conexion->query("SELECT FOUND_ROWS() AS totalA");
$totalA = $totalA->fetch()['totalA'];
?>