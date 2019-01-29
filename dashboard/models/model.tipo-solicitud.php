<?php
$ST = $_GET['ST'];
$ts = $conexion->prepare("SELECT 
	S.numST,
	S.nombre,
	S.email,
	FD.facDep,
	S.telefono,	
	RU.id_subCategoria,
	U.nomUnidad,
	CAT.categoria,
	SCAT.subCategoria
FROM 
	t_solicitud AS S,
	t_facDep AS FD,
	t_unidad AS U,
	t_categoria AS CAT,
	t_subCategoria AS SCAT,
	t_resUnidad AS RU
WHERE 
	RU.id_unidad=U.id_unidad
	AND RU.id_categoria=CAT.id_categoria
	AND RU.id_subCategoria=SCAT.id_subCategoria
	AND S.id_facDep=FD.id_facDep
	AND S.numST=RU.numST
	AND S.numST = :numST");
$ts->execute(array(':numST' => $ST));
$ts = $ts->fetch();
?>