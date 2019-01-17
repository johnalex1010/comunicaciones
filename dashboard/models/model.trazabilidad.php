<?php

$consultaT = $conexion->prepare("SELECT SQL_CALC_FOUND_ROWS T.*, U.usuario, F.fase FROM t_trasabilidad AS T, t_usuario AS U, t_fase AS F WHERE T.id_fase=F.id_fase AND T.id_usuario=U.id_usuario AND numST=:numST ORDER BY id_trasabilidad DESC");
$consultaT->execute(array(':numST' => $ST));
$consultaT = $consultaT->fetchAll(PDO::FETCH_ASSOC);

$totalTrazabilidad = $conexion->query("SELECT FOUND_ROWS() AS totalTrazabilidad");
$totalTrazabilidad = $totalTrazabilidad->fetch()['totalTrazabilidad'];
?>