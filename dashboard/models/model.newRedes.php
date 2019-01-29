<?php
$consultaUno = $conexion->prepare("SELECT * FROM t_creaRedesCM WHERE numST=:numST");
$consultaUno->execute(array(':numST' => $ST));
$consultaUno = $consultaUno->fetch();
/*---------*/

$consultaDos = $conexion->prepare("SELECT SQL_CALC_FOUND_ROWS adjunto FROM t_adjunto WHERE numST=:numST");
$consultaDos->execute(array(':numST' => $ST));
$consultaDos = $consultaDos->fetch();
$totalDos = $conexion->query("SELECT FOUND_ROWS() AS total");
$totalDos = $totalDos->fetch()['total'];
/*---------*/

$consultaTres = $conexion->prepare("SELECT SQL_CALC_FOUND_ROWS
	TR.redSocial
FROM
	t_resTRS AS RTR,
	t_tipoRedSocial AS TR
WHERE
	RTR.id_tipoRedSocial=TR.id_tipoRedSocial
	AND RTR.numST=:numST");
$consultaTres->execute(array(':numST' => $ST));
$consultaTres = $consultaTres->fetchAll(PDO::FETCH_ASSOC);
$totalTres = $conexion->query("SELECT FOUND_ROWS() AS total");
$totalTres = $totalTres->fetch()['total'];
?>