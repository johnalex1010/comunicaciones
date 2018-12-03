<?php
$consulta = $conexion->prepare("SELECT
	AW.*,
	ADJ.adjunto
FROM
	t_ajusteWeb AS AW,
	t_adjunto AS ADJ
WHERE
	AW.numST=ADJ.numST
	AND AW.numST=:numST");
$consulta->execute(array(':numST' => $ST));
$consulta = $consulta->fetch();

?>