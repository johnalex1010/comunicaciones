<?php
$date = date('Y');

$stsT = $conexion->prepare("SELECT COUNT(*) AS TOTAL FROM t_solicitud WHERE fecha_ingreso LIKE '".$date."%';");
$stsT->execute();
$stsT = $stsT->fetch();

$stsD = $conexion->prepare("SELECT COUNT(*) AS DESARROLLO FROM t_trasabilidad AS T, t_solicitud AS S WHERE S.numST=T.numST AND T.id_fase=1 AND T.id_trasabilidad IN (SELECT MAX(id_trasabilidad) FROM t_trasabilidad GROUP BY numST) AND S.fecha_ingreso LIKE '".$date."%';");
$stsD->execute();
$stsD = $stsD->fetch();

$stsF = $conexion->prepare("SELECT COUNT(*) AS FINALIZADAS FROM t_trasabilidad AS T, t_solicitud AS S WHERE S.numST=T.numST AND T.id_fase=2 AND T.id_trasabilidad IN (SELECT MAX(id_trasabilidad) FROM t_trasabilidad GROUP BY numST) AND S.fecha_ingreso LIKE '".$date."%';");
$stsF->execute();
$stsF = $stsF->fetch();

$stsC = $conexion->prepare("SELECT COUNT(*) AS CANCELADAS FROM t_trasabilidad AS T, t_solicitud AS S WHERE S.numST=T.numST AND T.id_fase=3 AND T.id_trasabilidad IN (SELECT MAX(id_trasabilidad) FROM t_trasabilidad GROUP BY numST) AND S.fecha_ingreso LIKE '".$date."%';");
$stsC->execute();
$stsC = $stsC->fetch();

?>