<?php
$consulta = $conexion->prepare("SELECT
	NW.*,
	ADJ.adjunto
FROM
	t_newWeb AS NW,
	t_adjunto AS ADJ
WHERE
	NW.numST=ADJ.numST
	AND NW.numST=:numST");
$consulta->execute(array(':numST' => $ST));
$consulta = $consulta->fetch();

?>