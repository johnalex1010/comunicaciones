<?php

/*
==================
Validar Datos Home
==================
*/
// echo $_POST['campoTel'];

if (isset($_POST['submit'])) {
	$error = array();
	/*===== Validar Nombres =====*/
	if (!isset($_POST['campoNombre']) || empty($_POST['campoNombre'])) {
		$error[0] = "El campo es obligatorio";
	}else{
		$campoNombre = $_POST['campoNombre'];
		$patron = '/^[a-zA-ZÑñ, ]*$/';
		if(preg_match($patron,$campoNombre)){
			$_SESSION['campoNombre'] = $campoNombre;
        }else{
        	$error[0] = "El campo solo debe contener letras";
        	$_SESSION['campoNombre'] = $campoNombre;
        }
	}

	/*===== Validar Email =====*/
	if (!isset($_POST['campoEmail']) || empty($_POST['campoEmail'])) {
		$error[1] = "El campo es obligatorio";
	}else{
		$campoEmail = $_POST['campoEmail'];
		if (filter_var($campoEmail, FILTER_VALIDATE_EMAIL)) {
			$_SESSION['campoEmail'] = $campoEmail;
		}else{
			$_SESSION['campoEmail'] = $campoEmail;
			$error[1] = "Esta dirección de correo no es válida.";
		}
	}

	/*===== Validar Facultad/Dependencia =====*/
	if (!isset($_POST['campoFacDep']) || empty($_POST['campoFacDep'])){
		$error[2] = "El campo es obligatorio";
	}else{
		$campoFacDep = $_POST['campoFacDep'];
		$_SESSION['campoFacDep'] = $campoFacDep;
	}

	/*===== Validar Telefono =====*/
	if (!isset($_POST['campoTel']) || empty($_POST['campoTel'])){
		$error[3] = "El campo es obligatorio";
	}else{
		$campoTel = $_POST['campoTel'];
		if (!filter_var($_POST['campoTel'], FILTER_VALIDATE_INT) === false) {		    
			$_SESSION['campoTel'] = $campoTel;
		} else {
		    $_SESSION['campoTel'] = $campoTel;
			$error[3] = "Solo se aceptan numeros";
		}
	}

	if ($error) {
		$_SESSION['error'] = true;
	}else{
		$_SESSION['error'] = false;
		$_SESSION['home'] = true;
	}


	
}else{
	// echo "noclik";
}
	

?>