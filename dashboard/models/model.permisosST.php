<?php
$per = $conexion->prepare("SELECT SQL_CALC_FOUND_ROWS RU.*, U.* FROM t_resUsuario AS RU, t_usuario AS U WHERE RU.id_usuario=U.id_usuario AND RU.numST=:numST AND U.usuario=:usuario");
$per->execute(array(':usuario' => $_SESSION['usuario'], ':numST' => $ts['numST']));
$per = $per->fetch();

$perT = $conexion->query("SELECT FOUND_ROWS() AS perT");
$perT = $perT->fetch()['perT'];
?>