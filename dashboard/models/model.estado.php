<?php
$fase = $conexion->prepare("SELECT SQL_CALC_FOUND_ROWS * FROM t_fase;");
$fase->execute();
$fase = $fase->fetchAll(PDO::FETCH_ASSOC);

$estadoNum = $conexion->query("SELECT FOUND_ROWS() AS totalF");
$estadoNum = $estadoNum->fetch()['totalF'];
?>