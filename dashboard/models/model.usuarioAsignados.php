<?php
$consultaUA = $conexion->prepare("SELECT SQL_CALC_FOUND_ROWS RU.*, U.* FROM t_resusuario AS RU, t_usuario U WHERE RU.id_usuario=U.id_usuario AND numST=:numST");
$consultaUA->execute(array(':numST' => $ST));
$consultaUA = $consultaUA->fetchAll(PDO::FETCH_ASSOC);

$totalUA = $conexion->query("SELECT FOUND_ROWS() AS totalUA");
$totalUA = $totalUA->fetch()['totalUA'];
?>