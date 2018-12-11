<?php
$pU = $conexion->prepare("SELECT U.* FROM t_usuario AS U WHERE U.usuario=:usuario");
$pU->execute(array(':usuario' => $_SESSION['usuario']));
$pU = $pU->fetch();
?>