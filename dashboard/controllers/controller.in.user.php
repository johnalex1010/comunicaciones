<?php
if (isset($_POST['submitNU'])) {
	$error = array();
	$patron = '/^[a-zA-ZÑñáéíóúÁÉÍÓÚ, ]*$/';

	// VALIDAR NOMBRES
	if (!isset($_POST['nombres']) || empty($_POST['nombres'])) {
		$error[0] = "Falta el campo <b>Nombre(s)</b>";
	}else{
		
		if(preg_match($patron,$_POST['nombres'])){
			$_POST['nombres'];
		}else{
			$error[0] = "El campo <b>Nombre(s)</b> solo debe contener letras.";
		}
	}

	// VALIDAR APELLIDOS
	if (!isset($_POST['apellidos']) || empty($_POST['apellidos'])) {
		$error[1] = "Falta el campo <b>Apellido(s)</b>";
	}else{
		if(preg_match($patron,$_POST['apellidos'])){
			$_POST['apellidos'];
		}else{
			$error[1] = "El campo <b>Apellido(s)</b> solo debe contener letras.";
		}
	}

	//VALIDAR EMAIL
	if (!isset($_POST['email']) || empty($_POST['email'])) {
		$error[2] = "El campo <b>Email</b> es obligatorio.";
	}else{
		if (filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
			$_POST['email'];
		}else{
			$error[2] = "La <b>dirección de correo</b> no es válida.";
		}
	}

	//VALIDAR CARGO
	if (!isset($_POST['cargo']) || empty($_POST['cargo'])) {
		$error[3] = "El campo <b>Cargo</b> es obligatorio.";
	}else{
		$c = $conexion->prepare("SELECT * FROM t_cargo WHERE id_cargo=:id_cargo");
		$c->execute(array('id_cargo' => $_POST['cargo']));
		$c = $c->fetch();

		if ($_POST['cargo'] == $c['id_cargo']) {
			$_POST['cargo'];
		}else{
			$error[3] = "El <b>Cargo</b> seleccionado no es valido.";
		}
	}

	//VALIDAR USUARIO
	if (!isset($_POST['usuario']) || empty($_POST['usuario'])) {
		$error[4] = "El campo <b>Usuario</b> es obligatorio.";
	}else{
		$usu = $conexion->prepare("SELECT * FROM t_usuario WHERE usuario=:usuario");
		$usu->execute(array('usuario' => $_POST['usuario']));
		$usu = $usu->fetch();

		if ($_POST['usuario'] != $usu['usuario']) {
			if(preg_match($patron,$_POST['usuario'])){
				$_POST['usuario'];
			}else{
				$error[4] = "El campo <b>Usuario</b> solo debe contener letras.";
			}
		}else{
			$error[4] = "El <b>Usuario</b> ya existe.";
		}
	}

	// VALIDAR PASSWORD
	if (!isset($_POST['password']) || empty($_POST['password'])) {
		$error[5] = "Los campos de <b>Contraseña</b> y <b>Repetir contraseña</b> son obligatorios.";
	}else{
		if ($_POST['password'] == $_POST['repassword']) {
			$hash =  password_hash($_POST['password'], PASSWORD_DEFAULT, ['cost'=>10]);
			// $hash;
		}else{
			$error[5] = "La <b>contraseña</b> no coincide.";
		}
	}		

	//VALIDAR PERMISOS
	if (!isset($_POST['permiso']) || empty($_POST['permiso'])) {
		$error[6] = "El campo <b>Permiso</b> es obligatorio.";
	}else{
		$p = $conexion->prepare("SELECT * FROM t_permiso WHERE id_permiso=:id_permiso");
		$p->execute(array('id_permiso' => $_POST['permiso']));
		$p = $p->fetch();

		if ($_POST['permiso'] == $p['id_permiso']) {
			$_POST['permiso'];
		}else{
			$error[6] = "El <b>Permiso</b> seleccionado no es valido.";
		}
	}
}
?>