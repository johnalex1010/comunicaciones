<?php
	if (isset($_POST['submitAlertST'])) {
		if ($perT['perT'] == 1) {
			if (!empty($_POST['fecha_alerta'])) {
				if($_POST['fecha_alerta'] > date('Y-m-d')){
					$sAlert = $conexion->prepare("SELECT SQL_CALC_FOUND_ROWS A.*, U.usuario, U.nombres, U.apellidos FROM t_alertas AS A, t_usuario U WHERE A.id_usuario=U.id_usuario AND numST=:numST");
					$sAlert->execute(array(':numST'=> $ts['numST']));
					$sAlert = $sAlert->fetchAll(PDO::FETCH_ASSOC);

					$sustTotalA = $conexion->query("SELECT FOUND_ROWS() AS totalA");
					$sustTotalA = $sustTotalA->fetch()['totalA'];

					if ($sustTotalA >= 3) {
						$popMjs = "El maxímo de alertas permitidas es de 3.";
					}else{
						//Insert de alertas
						$addAlert = $conexion->prepare("INSERT INTO t_alertas (fecha_alerta, id_usuario, numST) VALUES (:fecha_alerta, :id_usuario, :numST)");
						$addAlert->execute(
							array(
								':fecha_alerta' => $_POST['fecha_alerta'],
								':id_usuario' => $consulta['id_usuario'],
								':numST' => $ts['numST']
							)
						);

						//Insert de trazabilidad
						$uSela = $conexion->prepare("SELECT * FROM t_usuario WHERE id_usuario=:id_usersystem");
						$uSela->execute(array(':id_usersystem' => $consulta['id_usuario']));
						$uSela = $uSela->fetch();

						$uSelb = $conexion->prepare("SELECT * FROM t_usuario WHERE id_usuario=:id_userpost");
						$uSelb->execute(array(':id_userpost' => $_POST['userST']));
						$uSelb = $uSelb->fetch();

						$usuario = 1; // Usuario del sistema
						$maxT['id_fase'];
						$comentario = "El usuario <b>".$uSela['nombres']." ".$uSela['apellidos']."</b> agregó una nueva alerta para el día <b>".fecha($_POST['fecha_alerta'])."</b>.";

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
					}
					unset($_POST['fecha_alerta']);

				}else{
					$popMjs = "La fecha de la alerta debe ser mayor al día de hoy.";
				}
			}
		}else{
			$popMjs = "No tiene permisos para agregar nuevas alertas.";
		}
	}
?>