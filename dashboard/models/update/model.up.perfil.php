<?php
	if (isset($_POST['submitPerfil'])) {
		$a = $conexion->prepare("SELECT SQL_CALC_FOUND_ROWS * FROM t_usuario WHERE usuario=:usuario");
		$a->execute(array(':usuario' => $consulta['usuario']));
		$a = $a->fetch();
		$totalUsuario = $conexion->query("SELECT FOUND_ROWS() AS registro");
		$totalUsuario = $totalUsuario->fetch()['registro'];

		if ($totalUsuario == 1) {
			if ($consulta['activo'] == 1) {
				//Nombres
				if (!empty($_POST['nombres'])) {
					$nombres = $_POST['nombres'];
				}else{
					$nombres = $consulta['nombres'];
				}

				//Apellidos
				if (!empty($_POST['apellidos'])) {
					$apellidos = $_POST['apellidos'];
				}else{
					$apellidos = $consulta['apellidos'];
				}

				//Password
				if (empty($_POST['password']) || empty($_POST['repassword'])) {
					$password = $a['password'];
				}else{
					if ($_POST['password'] == $_POST['repassword']) {
						$password = password_hash($_POST['password'], PASSWORD_DEFAULT, ['cost'=>10]);
					}else{
						echo $popMjs = "La contraseña no es igual";
					}
				}
				// $popMjs = "Datos guardados";
				$upPerfil = $conexion->prepare("UPDATE t_usuario SET password=:password, nombres=:nombres, apellidos=:apellidos WHERE usuario=:usuario");
				$upPerfil->execute(
					array(
						'usuario' => $consulta['usuario'],
						'nombres' => $nombres,
						'apellidos' => $apellidos,
						'password' => $password
					)
				);

				// $upPerfil->close();
				header('Location:'. URL."pages/perfil.php");
				
			}
		}else{
			$popMjs = "<p class='btn btn-rounded btn-inverse-danger'>Usuario y contraseña incorrectos</p><br>";
		}
	}
?>