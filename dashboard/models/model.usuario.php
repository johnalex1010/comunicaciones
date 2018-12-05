<?php
$consulta = $conexion->prepare("SELECT U.*, C.cargo FROM t_usuario AS U, t_cargo AS C WHERE U.id_cargo = C.id_cargo AND U.usuario=:usuario");
$consulta->execute(array(':usuario' => $_SESSION['usuario']));
$consulta = $consulta->fetch();
?>