<?php 

$permiso = $conexion->prepare("SELECT SQL_CALC_FOUND_ROWS * FROM t_permiso");
$permiso->execute();
$permiso = $permiso->fetchAll(PDO::FETCH_ASSOC);

$totalPermiso = $conexion->query("SELECT FOUND_ROWS() AS total");
$totalPermiso = $totalPermiso->fetch()['total'];

?>