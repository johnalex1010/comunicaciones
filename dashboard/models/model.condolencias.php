<?php
$consulta = $conexion->prepare("SELECT  C.*, F.facDep FROM t_condolencias AS C, t_facDep AS F WHERE C.id_facDep=F.id_facDep AND C.numST=:numST");
$consulta->execute(array(':numST' => $ST));
$consulta = $consulta->fetch();
?>