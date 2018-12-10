<?php
$user = $conexion->prepare("SELECT U.*, C.cargo, P.permiso FROM t_usuario U, t_cargo AS C, t_permiso AS P WHERE U.id_cargo=C.id_cargo AND U.id_permiso=P.id_permiso AND U.id_usuario=:id");
$user->execute(array(':id'=> $_GET['id']));
$user = $user->fetch();
?>