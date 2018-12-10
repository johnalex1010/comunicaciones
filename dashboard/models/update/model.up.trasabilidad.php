<?php

	if (isset($_POST['submitT'])) {

		if (!empty($_POST['comentario'])) {
			$upTrasabilidad = $conexion->prepare("INSERT INTO t_trasabilidad (id_fase, numST, fecha, comentario, id_usuario) VALUES (:id_fase, :numST, :fecha, :comentario, :id_usuario)");
			
			$upTrasabilidad->execute(
				array(				
					':id_fase' => $maxT['MAXT'],
					':numST' => $ts['numST'],
					':fecha' => date('Y-m-d'),
					':comentario' => $_POST['comentario'],
					':id_usuario' => $consulta['id_usuario']
				)
			);
			header('Location:'. URL."pages/resume.php?ST=".$ts['numST']);
		}else{
			$errorTrasabilidad = "<p class='btn btn-rounded btn-inverse-danger'>El campo está vacio</p><br>";
		}
	}
?>