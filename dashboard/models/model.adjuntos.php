<?php
$consulta = $conexion->prepare("SELECT * FROM t_adjunto WHERE numST = :numST");
$consulta->execute(array(':numST' => $ST));
$consulta = $consulta->fetchAll(PDO::FETCH_ASSOC);

?>