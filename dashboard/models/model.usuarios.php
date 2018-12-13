<?php
$consultaU = $conexion->prepare("SELECT SQL_CALC_FOUND_ROWS U.*, C.cargo, P.permiso FROM t_usuario U, t_cargo AS C, t_permiso AS P WHERE U.id_cargo=C.id_cargo AND U.id_permiso=P.id_permiso ORDER BY nombres ASC");
$consultaU->execute();
$consultaU = $consultaU->fetchAll(PDO::FETCH_ASSOC);

$totalU = $conexion->query("SELECT FOUND_ROWS() AS totalU");
$totalU = $totalU->fetch()['totalU'];
?>