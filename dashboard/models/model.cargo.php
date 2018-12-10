<?php 

$cargo = $conexion->prepare("SELECT SQL_CALC_FOUND_ROWS * FROM t_cargo");
$cargo->execute();
$cargo = $cargo->fetchAll(PDO::FETCH_ASSOC);

$totalCargo = $conexion->query("SELECT FOUND_ROWS() AS total");
$totalCargo = $totalCargo->fetch()['total'];

?>