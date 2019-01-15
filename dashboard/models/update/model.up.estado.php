<?php
	if (isset($_POST['submitEstado'])) {

		if ($perT['perT'] == 1) {
			if ($_POST['estado'] != $maxT['id_fase']) {
				$u = $conexion->prepare("SELECT * FROM t_usuario WHERE id_usuario = :id_usuario");
				$u->execute(array(':id_usuario' => $consulta['id_usuario']));
				$u = $u->fetch();

				$e = $conexion->prepare("SELECT * FROM t_fase WHERE id_fase= :id_fase");
				$e->execute(array(':id_fase' => $_POST['estado']));
				$e = $e->fetch();

				$_POST['estado'];
				$consulta['id_usuario'];
				$comentario = "El usuario: <b>".$u['nombres']." ".$u['apellidos']."</b> cambio el estado de la solicitud a: <b>" .$e['fase']."</b>";
				$usuario = 1; // Usuario del sistema


				$upE = $conexion->prepare("INSERT INTO t_trasabilidad (id_fase, numST, fecha, comentario, id_usuario) VALUES (:id_fase, :numST, :fecha, :comentario, :id_usuario)");
				$upE->execute(
					array(				
						':id_fase' => $_POST['estado'],
						':numST' => $ts['numST'],
						':fecha' => date('Y-m-d'),
						':comentario' => $comentario,
						':id_usuario' => $usuario
					)
				);
				header('Location:'. URL."pages/resume.php?ST=".$ts['numST']);
			}
		}else{
			$popMjs = "No tiene permisos para cambiar el estado.";
		}			
	}
?>