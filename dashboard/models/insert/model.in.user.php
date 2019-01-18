<?php
	if (isset($_POST['submitNU'])) {
		if (!$error) {
			$newUser = $conexion->prepare("INSERT INTO t_usuario (usuario, password, nombres, apellidos, email, fecha_creacion, activo, id_cargo, id_permiso) VALUES (:usuario, :password, :nombres, :apellidos, :email, :fecha, :activo, :id_cargo, :id_permiso)");
			$newUser->execute(
				array(
					':usuario' => $_POST['usuario'],
					':password' => $hash,
					':nombres' => $_POST['nombres'],
					':apellidos' => $_POST['apellidos'],
					':email' => $_POST['email'],
					':fecha' => date("Y-m-d"),
					':activo' => 1,
					':id_cargo' => $_POST['cargo'],
					':id_permiso' => $_POST['permiso']
				)
			);
			$popMjsExito = "El usuario <b>".$_POST['usuario']."</b> a sido creado correctamente.";
			$_POST['submitNU'] = "";
			$_POST['usuario'] = "";
			$_POST['password'] = "";
			$_POST['repassword'] = "";
			$hash = "";
			$_POST['nombres'] = "";
			$_POST['apellidos'] = "";
			$_POST['email'] = "";
			$_POST['cargo'] = "";
			$_POST['permiso'] = "";
		}
	}
		
?>