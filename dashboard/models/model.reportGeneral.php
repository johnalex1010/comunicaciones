<?php
$stsT = $conexion->prepare("SELECT COUNT(*) AS TOTAL FROM t_trasabilidad WHERE  id_trasabilidad IN (SELECT MAX(id_trasabilidad) FROM t_trasabilidad GROUP BY numST)");
$stsT->execute();
$stsT = $stsT->fetch();

$stsD = $conexion->prepare("SELECT COUNT(*) AS DESARROLLO FROM t_trasabilidad WHERE id_fase=1 AND id_trasabilidad IN (SELECT MAX(id_trasabilidad) FROM t_trasabilidad GROUP BY numST)");
$stsD->execute();
$stsD = $stsD->fetch();

$stsF = $conexion->prepare("SELECT COUNT(*) AS FINALIZADAS FROM t_trasabilidad WHERE id_fase=2 AND id_trasabilidad IN (SELECT MAX(id_trasabilidad) FROM t_trasabilidad GROUP BY numST)");
$stsF->execute();
$stsF = $stsF->fetch();

$stsC = $conexion->prepare("SELECT COUNT(*) AS CANCELADAS FROM t_trasabilidad WHERE id_fase=3 AND id_trasabilidad IN (SELECT MAX(id_trasabilidad) FROM t_trasabilidad GROUP BY numST)");
$stsC->execute();
$stsC = $stsC->fetch();

?>