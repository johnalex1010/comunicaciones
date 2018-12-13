<?php
	if (isset($_POST['submitUserST'])) {
		if ($perT['perT'] == 1) {
			if (!empty($_POST['userST'])) {
				$sust = $conexion->prepare("SELECT SQL_CALC_FOUND_ROWS  * FROM t_resusuario WHERE numST=:numST AND id_usuario=:id_usuario");
				$sust->execute(array(':numST'=> $ts['numST'], ':id_usuario'=> $_POST['userST']));
				$sust = $sust->fetchAll(PDO::FETCH_ASSOC);

				$sustTotal = $conexion->query("SELECT FOUND_ROWS() AS totalRU");
				$sustTotal = $sustTotal->fetch()['totalRU'];

				if ($sustTotal == 0) {
					//Agregar usuario a la ST
					$addUser = $conexion->prepare("INSERT INTO t_resusuario (id_usuario, numST) VALUES (:id_usuario, :numST)");
					$addUser->execute(
						array(
							':id_usuario' => $_POST['userST'],
							':numST' => $ts['numST']
						)
					);
					unset($_POST['userST']);
					//Agregar trazabilidad de creación de usuario					
					$uSela = $conexion->prepare("SELECT * FROM t_usuario WHERE id_usuario=:id_usersystem");
					$uSela->execute(array(':id_usersystem' => $consulta['id_usuario']));
					$uSela = $uSela->fetch();

					$uSelb = $conexion->prepare("SELECT * FROM t_usuario WHERE id_usuario=:id_userpost");
					$uSelb->execute(array(':id_userpost' => $_POST['userST']));
					$uSelb = $uSelb->fetch();

					$usuario = 1; // Usuario del sistema
					$maxT['id_fase'];
					$comentario = "El usuario <b>".$uSela['nombres']." ".$uSela['apellidos']."</b> agregó al usuario <b>".$uSelb['nombres']." ".$uSelb['apellidos']."</b>";

					$inAddUser = $conexion->prepare("INSERT INTO t_trasabilidad (id_fase, numST, fecha, comentario, id_usuario) VALUES (:id_fase, :numST, :fecha, :comentario, :id_usuario)");
				
					$inAddUser->execute(
						array(				
							':id_fase' => $maxT['id_fase'],
							':numST' => $ts['numST'],
							':fecha' => date('Y-m-d'),
							':comentario' => $comentario,
							':id_usuario' => $usuario
						)
					);
					header('Location:'. URL."pages/trazabilidad.php?ST=".$ts['numST']);
				}else{
					$popMjs = "Este usuario ya ha sido agregado previamente.";

				}
			}
		}else{
			$popMjs = "No tiene permisos para agregar usuarios.";
		}
	}
?>