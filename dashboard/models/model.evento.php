<?php
$consultaUno = $conexion->prepare("SELECT E.*, TE.tipoEvento FROM t_evento AS E, t_tipoevento AS TE WHERE E.id_tipoEvento=TE.id_tipoEvento AND numST=:numST");
$consultaUno->execute(array(':numST' => $ST));
$consultaUno = $consultaUno->fetch();
/*--------*/

$consultaDos = $conexion->prepare("SELECT SQL_CALC_FOUND_ROWS * FROM t_color WHERE numST=:numST");
$consultaDos->execute(array(':numST' => $ST));
$consultaDos = $consultaDos->fetchAll(PDO::FETCH_ASSOC);
$totalDos = $conexion->query("SELECT FOUND_ROWS() AS total");
$totalDos = $totalDos->fetch()['total'];

/*--------*/

$consultaTres = $conexion->prepare("SELECT SQL_CALC_FOUND_ROWS OBJ.listPublico FROM t_objpublico AS OBJ, t_resobjpublico AS ROBJ WHERE ROBJ.id_objPublico=OBJ.id_objPublico AND numST=:numST");
$consultaTres->execute(array(':numST' => $ST));
$consultaTres = $consultaTres->fetchAll(PDO::FETCH_ASSOC);
$totalTres = $conexion->query("SELECT FOUND_ROWS() AS total");
$totalTres = $totalTres->fetch()['total'];

/*--------*/
$consultaCuatro = $conexion->prepare("SELECT SQL_CALC_FOUND_ROWS * FROM t_adjunto WHERE numST=:numST");
$consultaCuatro->execute(array(':numST' => $ST));
$consultaCuatro = $consultaCuatro->fetchAll(PDO::FETCH_ASSOC);
$totalCuatro = $conexion->query("SELECT FOUND_ROWS() AS total");
$totalCuatro = $totalCuatro->fetch()['total'];

/*--------*/
$consultaCinco = $conexion->prepare("SELECT SQL_CALC_FOUND_ROWS A.listAudioVisual FROM t_cubrimiento AS C, t_audiovisual AS A WHERE C.id_audiovisual=A.id_audioVisual AND numST=:numST");
$consultaCinco->execute(array(':numST' => $ST));
$consultaCinco = $consultaCinco->fetchAll(PDO::FETCH_ASSOC);
$totalCinco = $conexion->query("SELECT FOUND_ROWS() AS total");
$totalCinco = $totalCinco->fetch()['total'];

/*--------*/
$consultaSeis = $conexion->prepare("SELECT SQL_CALC_FOUND_ROWS * FROM t_requerimientoweb WHERE numST=:numST");
$consultaSeis->execute(array(':numST' => $ST));
$consultaSeis = $consultaSeis->fetchAll(PDO::FETCH_ASSOC);
$totalSeis = $conexion->query("SELECT FOUND_ROWS() AS total");
$totalSeis = $totalSeis->fetch()['total'];

/*--------*/
$consultaSiete = $conexion->prepare("SELECT SQL_CALC_FOUND_ROWS D.listPiezaDig FROM t_piezadig AS D, t_respiezadig AS RD WHERE RD.id_piezaDig=D.id_piezaDig AND RD.numST=:numST");
$consultaSiete->execute(array(':numST' => $ST));
$consultaSiete = $consultaSiete->fetchAll(PDO::FETCH_ASSOC);
$totalSiete = $conexion->query("SELECT FOUND_ROWS() AS total");
$totalSiete = $totalSiete->fetch()['total'];

/*--------*/
$consultaOcho = $conexion->prepare("SELECT SQL_CALC_FOUND_ROWS
	I.listPiezaImp,
	A.listAcabadoImp,
	P.listPapelImp,
	RI.cantidad
FROM
	t_piezaimp AS I,
	t_acabadoimp AS A,
	t_papelimp AS P,
	t_respiezaimp AS RI
WHERE
	RI.id_piezaImp=I.id_piezaImp
	AND RI.id_acabadoImp=A.id_acabadoImp
	AND RI.id_papelImp=P.id_papelImp
	AND RI.numST=:numST");
$consultaOcho->execute(array(':numST' => $ST));
$consultaOcho = $consultaOcho->fetchAll(PDO::FETCH_ASSOC);
$totalOcho = $conexion->query("SELECT FOUND_ROWS() AS total");
$totalOcho = $totalOcho->fetch()['total'];
?>