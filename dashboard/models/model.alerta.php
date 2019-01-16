<?php
$consultaAl = $conexion->prepare("SELECT SQL_CALC_FOUND_ROWS
	t.comentario, a.fecha_alerta, a.numST
FROM t_trasabilidad  t
INNER JOIN t_alertas a
ON t.numST = a.numST
WHERE a.fecha_alerta IN (SELECT MAX(fecha_alerta) FROM t_alertas GROUP BY numST)
AND t.id_trasabilidad IN (SELECT MAX(id_trasabilidad) FROM t_trasabilidad GROUP BY numST)
ORDER BY a.numST DESC;");
$consultaAl->execute();
$consultaAl = $consultaAl->fetchAll(PDO::FETCH_ASSOC);

$totalAl = $conexion->query("SELECT FOUND_ROWS() AS totalAl");
$totalAl = $totalAl->fetch()['totalAl'];
?>