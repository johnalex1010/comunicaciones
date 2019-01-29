<?php
$consulta = $conexion->prepare("SELECT SQL_CALC_FOUND_ROWS
	AM.*,
	ADJ.adjunto
FROM
	t_aprobMate AS AM,
	t_adjunto AS ADJ
WHERE
	AM.numST=ADJ.numST
	AND AM.numST=:numST");
$consulta->execute(array(':numST' => $ST));
$consulta = $consulta->fetchAll(PDO::FETCH_ASSOC);

$totalRecursos = $conexion->query("SELECT FOUND_ROWS() AS total");
$totalRecursos = $totalRecursos->fetch()['total'];

?>