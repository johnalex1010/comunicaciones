<?php
$consultaUno = $conexion->prepare("SELECT SQL_CALC_FOUND_ROWS
	CCM.*,
	OBJ.listPublico
FROM
	t_campaniascm AS CCM,
	t_objpublico AS OBJ,
	t_resobjpublico AS ROBJ
WHERE
	CCM.numST=ROBJ.numST
	AND ROBJ.id_objPublico=OBJ.id_objPublico
	AND CCM.numST=:numST");
$consultaUno->execute(array(':numST' => $ST));
$consultaUno = $consultaUno->fetchAll(PDO::FETCH_ASSOC);
$totalDos = $conexion->query("SELECT FOUND_ROWS() AS total");
$totalDos = $totalDos->fetch()['total'];

/*---------*/
$consultaDos = $conexion->prepare("SELECT * FROM t_adjunto WHERE numST=:numST");
$consultaDos->execute(array(':numST' => $ST));
$consultaDos = $consultaDos->fetch();
?>