<?php
$consulta = $conexion->prepare("SELECT SQL_CALC_FOUND_ROWS usuario, password FROM t_usuario WHERE usuario=:usuario AND password=:password");
$consulta->execute(
	array(
		':usuario' => $_POST['usuario'],
		':password' => $_POST['password']
	)	
);
$consulta = $consulta->fetch();
$totalUsuario = $conexion->query("SELECT FOUND_ROWS() AS registro");
$totalUsuario = $totalUsuario->fetch()['registro'];

if (isset($_POST['submit'])) {
	if ($totalUsuario == 1) {
		$_SESSION['usuario'] = $_POST['usuario'];
	}else{
		$error = "<p class='btn btn-rounded btn-inverse-danger'>Usuario y contraseña incorrectos</p><br>";
	}
}
?>