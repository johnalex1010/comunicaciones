<?php
if (isset($_POST['submit'])) {
	$consulta = $conexion->prepare("SELECT SQL_CALC_FOUND_ROWS * FROM t_usuario WHERE usuario=:usuario");
	$consulta->execute(array(':usuario' => $_POST['usuario']));
	$consulta = $consulta->fetch();
	$totalUsuario = $conexion->query("SELECT FOUND_ROWS() AS registro");
	$totalUsuario = $totalUsuario->fetch()['registro'];

	if ($totalUsuario == 1) {
		if ($consulta['activo'] == 1) {
			if (password_verify($_POST['password'], $consulta['password'])) {
				$_SESSION['usuario'] = $_POST['usuario'];
			}else{
				$error = "<p class='btn btn-rounded btn-inverse-danger'>Usuario y contraseña incorrectos</p><br>";
			}
		}else{
			$error = "<p class='btn btn-rounded btn-inverse-danger'>Usuario y contraseña incorrectos</p><br>";
		}
	
	}else{
		$error = "<p class='btn btn-rounded btn-inverse-danger'>Usuario y contraseña incorrectos</p><br>";
	}
}
?>