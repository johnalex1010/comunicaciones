<?php
error_reporting (E_ALL & ~E_NOTICE & ~E_DEPRECATED);
error_reporting(0);


if (isset($_SESSION['campoNombre']) && isset($_SESSION['campoEmail']) && isset($_SESSION['campoFacDep']) && isset($_SESSION['campoTel'])) {
	/*
	===================================
	Validar Campos de Creación de redes
	===================================
	*/
	if (isset($_POST['submitNewRedes'])) {
		$error = array();

		/*===== Validar Tipo de red social =====*/
		if (isset($_POST['checkNewRedes']) || !empty($_POST['checkNewRedes'])) {
			unset( $_SESSION["echoAM"] );
			$_SESSION['checkNewRedes'] = $_POST['checkNewRedes'];
			$checkNewRedes = $_SESSION['checkNewRedes'];
			$TCAcount = count($checkNewRedes);
			for ($tcacont=0; $tcacont < $TCAcount; $tcacont++) { 
				$_SESSION['echoAM'] .= $checkNewRedes[$tcacont]."<br>";	
			}
		}else{

			unset( $_SESSION["echoAM"] );
			unset( $_SESSION["checkNewRedes"] );
			$error[0][0] = "Debe seleccionar al menos una  opción.";
		}

		/*===== Validar Nombre del perfil =====*/
		if (isset($_POST['nombreNewPerfil']) && !empty($_POST['nombreNewPerfil'])) {
			unset( $_SESSION["nombreNewPerfil"] );
			$_SESSION['nombreNewPerfil'] = $_POST['nombreNewPerfil'];
		}else{
			//$error[0][1] = "Campo obligatorio";
		}

		/*===== Validar Email de perfil 1 =====*/
		if (!isset($_POST['emailNewPerfil']) || empty($_POST['emailNewPerfil'])) {
			$error[0][2] = "El campo es obligatorio";
		}else{
			$emailNewPerfil = $_POST['emailNewPerfil'];
			if (filter_var($emailNewPerfil, FILTER_VALIDATE_EMAIL)) {
				$_SESSION['emailNewPerfil'] = $emailNewPerfil;
			}else{
				$_SESSION['emailNewPerfil'] = $emailNewPerfil;
				$error[0][2] = "Esta dirección de correo no es válida.";
			}
		}
		/*===== Validar Adjunto Imagenes sugeridas =====*/
		if (!empty($_FILES['adjImgNewRed']['name'])) {
			if($_FILES['adjImgNewRed']['type'] == "application/zip"){
				if ($_FILES['adjImgNewRed']['size'] > 8000000) {
					unset($_SESSION['adjImgNewRed1']);
					unset($_SESSION['adjImgNewRed2']);
					unset($_SESSION['adjImgNewRed3']);
					unset($_SESSION['adjImgNewRed4']);
					echo $error[0][3] = "El archivo adjunto excede el tamaño permitido de 1MB";
				}else{
					$_SESSION['adjImgNewRed1'] = $_FILES['adjImgNewRed']['type'];			
					$_SESSION['adjImgNewRed2'] = $_FILES['adjImgNewRed']['size'];			
					$_SESSION['adjImgNewRed3'] = $_FILES['adjImgNewRed']['name'];			
					$_SESSION['adjImgNewRed4'] = $_FILES['adjImgNewRed']['tmp_name'];
				}
			}else{
				unset($_SESSION['adjImgNewRed1']);
				unset($_SESSION['adjImgNewRed2']);
				unset($_SESSION['adjImgNewRed3']);
				unset($_SESSION['adjImgNewRed4']);
				echo $error[0][3] = "El archivo adjunto debe ser un ZIP de máximo 1MB";
			}
		}else{
			//$error[0][3] = "El archivo adjunto es obligatorio";
		}

		/*===== Validar Descripción para asociar al el perfil =====*/
		if (isset($_POST['descNewRed']) && !empty($_POST['descNewRed'])) {
			unset( $_SESSION["descNewRed"] );
			if (strlen($_POST['descNewRed'])<=510) {
				$_SESSION['descNewRed'] = $_POST['descNewRed'];
			}else{
				$_SESSION['descNewRed'] = $_POST['descNewRed'];
				$error[0][4] = "Son máximo 500 caracteres";
			}
		}else{
			$error[0][4] = "Campo obligatorio";
		}

		/*===== Validar Telefono de Contacto =====*/
		if (isset($_POST['numTelNewRed']) && !empty($_POST['numTelNewRed'])) {
			if (is_numeric($_POST['numTelNewRed'])) {
				$_SESSION['numTelNewRed'] = $_POST['numTelNewRed'];
			}else{
				$error[0][5] = "El campo debe ser numerico";
			}
		}else{
			$error[0][5] = "Campo obligatorio";
		}

		/*===== ValidarDirección =====*/
		if (isset($_POST['dirNewRed']) && !empty($_POST['dirNewRed'])) {
			$_SESSION['dirNewRed'] = $_POST['dirNewRed'];
		}else{
			$error[0][6] = "Campo obligatorio";
		}

		/*===== Validar Email de perfil 2 =====*/
		if (!isset($_POST['emailNewPerfil2']) || empty($_POST['emailNewPerfil2'])) {
			$error[0][7] = "El campo es obligatorio";
		}else{
			$emailNewPerfil2 = $_POST['emailNewPerfil2'];
			if (filter_var($emailNewPerfil2, FILTER_VALIDATE_EMAIL)) {
				$_SESSION['emailNewPerfil2'] = $emailNewPerfil2;
			}else{
				$_SESSION['emailNewPerfil2'] = $emailNewPerfil2;
				$error[0][7] = "Esta dirección de correo no es válida.";
			}
		}

		// Validando si existen errores en todo formulario
		if ($error) {
			echo "<div class='modalError' id='modalError'>";
			echo "<div class='boxError'>";
			echo "<div class='cerraModal' id='cerraModal'>X</div>";
			echo "<h3>Estimado usuario:</h3>";
			echo "El formulario tiene errores, por favor corrijalos para continuar.";
			echo "</div>";
			echo "</div>";
		}else{
			header("Location: ../../php/resumen/newRedes.php");
		}
	}else{
		// echo "No1";
	}

	/*
	=============================
	Validar Campos de Camapaña
	=============================
	*/
	if (isset($_POST['submitCampania'])) {
		$error = array();

		/*===== Validar Nombre de camapaña =====*/
		if (isset($_POST['nomCampa']) && !empty($_POST['nomCampa'])) {
			unset( $_SESSION["nomCampa"] );
			$_SESSION['nomCampa'] = $_POST['nomCampa'];
		}else{
			$error[1][0] = "Campo obligatorio";
		}

		/*===== Validar Justifación de la campaña =====*/
		if (isset($_POST['justiCampa']) && !empty($_POST['justiCampa'])) {
			unset( $_SESSION["justiCampa"] );
			if (strlen($_POST['justiCampa'])<=510) {
				$_SESSION['justiCampa'] = $_POST['justiCampa'];
			}else{
				$_SESSION['justiCampa'] = $_POST['justiCampa'];
				$error[1][1] = "Son máximo 500 caracteres";
			}
		}else{
			$error[1][1] = "Campo obligatorio";
		}

		/*===== Validar Objetivo de la camapaña =====*/
		if (isset($_POST['objCampa']) && !empty($_POST['objCampa'])) {
			unset( $_SESSION["objCampa"] );
			if (strlen($_POST['objCampa'])<=510) {
				$_SESSION['objCampa'] = $_POST['objCampa'];
			}else{
				$_SESSION['objCampa'] = $_POST['objCampa'];
				$error[1][2] = "Son máximo 500 caracteres";
			}
		}else{
			$error[1][2] = "Campo obligatorio";
		}

		/*===== Validar Descripción de la camapaña =====*/
		if (isset($_POST['descripCampa']) && !empty($_POST['descripCampa'])) {
			unset( $_SESSION["descripCampa"] );
			if (strlen($_POST['descripCampa'])<=510) {
				$_SESSION['descripCampa'] = $_POST['descripCampa'];
			}else{
				$_SESSION['descripCampa'] = $_POST['descripCampa'];
				$error[1][3] = "Son máximo 500 caracteres";
			}
		}else{
			$error[1][3] = "Campo obligatorio";
		}

		/*===== Validar Ajunto de imagenes de referencia =====*/
		if (!empty($_FILES['adjDocWEb']['name'])) {
			if($_FILES['adjDocWEb']['type'] == "application/zip"){
				if ($_FILES['adjDocWEb']['size'] > 8000000) {
					unset($_SESSION['adjDocWEb1']);
					unset($_SESSION['adjDocWEb2']);
					unset($_SESSION['adjDocWEb3']);
					unset($_SESSION['adjDocWEb4']);
					echo $error[1][4] = "El archivo adjunto excede el tamaño permitido de 1MB";
				}else{
					$_SESSION['adjDocWEb1'] = $_FILES['adjDocWEb']['type'];			
					$_SESSION['adjDocWEb2'] = $_FILES['adjDocWEb']['size'];			
					$_SESSION['adjDocWEb3'] = $_FILES['adjDocWEb']['name'];			
					$_SESSION['adjDocWEb4'] = $_FILES['adjDocWEb']['tmp_name'];
				}
			}else{
				unset($_SESSION['adjDocWEb1']);
				unset($_SESSION['adjDocWEb2']);
				unset($_SESSION['adjDocWEb3']);
				unset($_SESSION['adjDocWEb4']);
				echo $error[1][4] = "El archivo adjunto debe ser un ZIP de máximo 1MB";
			}
		}else{
			//$error[1][1] = "El archivo adjunto es obligatorio";
		}

		/*===== Validar Fecha inicio de la campaña =====*/
		if (!isset($_POST['fIniCampa']) || empty($_POST['fIniCampa'])) {
			$error[1][5] = "El campo es obligatorio";
		}else{
			$_POST['fIniCampa'];
			$date = explode("-", $_POST['fIniCampa']);
			$countDate =  count($date);
			if ($countDate == 3 && checkdate($date[1], $date[2], $date[0])) {
				$_SESSION['fIniCampa'] = $_POST['fIniCampa'];
			}else{
				$error[1][5] = "El formato fecha es incorrecto";
			}
		}

		/*===== Validar Fecha fin de la campaña =====*/
		if (!isset($_POST['fFinCampa']) || empty($_POST['fFinCampa'])) {
			$error[1][6] = "El campo es obligatorio";
		}else{
			$_POST['fFinCampa'];
			$date = explode("-", $_POST['fFinCampa']);
			$countDate =  count($date);
			if ($countDate == 3 && checkdate($date[1], $date[2], $date[0])) {
				if ($_POST['fFinCampa'] >= $_POST['fIniCampa']) {
					$_SESSION['fFinCampa'] = $_POST['fFinCampa'];
				}else{
					$error[1][6] = "La fecha de finalización debe ser mayor o igual a la fecha de inicio";
				}
			}else{
				$error[1][6] = "El formato fecha es incorrecto";
			}
		}

		/*===== Validar Palabras clave campaña =====*/
		if (isset($_POST['keyCama']) && !empty($_POST['keyCama'])) {
			unset( $_SESSION["keyCama"] );
			if (strlen($_POST['keyCama'])<=510) {
				$_SESSION['keyCama'] = $_POST['keyCama'];
			}else{
				$_SESSION['keyCama'] = $_POST['keyCama'];
				$error[1][7] = "Son máximo 500 caracteres";
			}
		}else{
			//$error[1][7] = "Campo obligatorio";
		}

		/*===== Validar Público objetivp =====*/
		if (isset($_POST['checkPublicoObj']) || !empty($_POST['checkPublicoObj'])) {
			unset( $_SESSION["echoAM"] );
			$_SESSION['checkPublicoObj'] = $_POST['checkPublicoObj'];
			$checkPublicoObj = $_SESSION['checkPublicoObj'];
			$TCAcount = count($checkPublicoObj);
			for ($tcacont=0; $tcacont < $TCAcount; $tcacont++) { 
				$_SESSION['echoAM'] .= $checkPublicoObj[$tcacont]."<br>";	
			}
		}else{

			unset( $_SESSION["echoAM"] );
			unset( $_SESSION["checkPublicoObj"] );
			$error[1][8] = "Debe seleccionar al menos una  opción.";
		}

		// Validando si existen errores en todo formulario
		if ($error) {
			echo "<div class='modalError' id='modalError'>";
			echo "<div class='boxError'>";
			echo "<div class='cerraModal' id='cerraModal'>X</div>";
			echo "<h3>Estimado usuario:</h3>";
			echo "El formulario tiene errores, por favor corrijalos para continuar.";
			echo "</div>";
			echo "</div>";
		}else{
			header("Location: ../../php/resumen/campaniaCM.php");
		}
	}else{
		// echo "No2";
	}

	/*
	==========================
	Validar Campos de Asesoria
	==========================
	*/
	if (isset($_POST['submitAsesoria'])) {
		$error = array();
		/*===== Validar Nombre de la persona que va a tomar la capacitación =====*/
		if (isset($_POST['temaAseso']) && !empty($_POST['temaAseso'])) {
			$_SESSION['temaAseso'] = $_POST['temaAseso'];
		}else{
			$error[2][0] = "Campo obligatorio";
		}

		/*===== Validar Nombre de la persona que va a tomar la capacitación =====*/
		if (isset($_POST['lugarAseso']) && !empty($_POST['lugarAseso'])) {
			$_SESSION['lugarAseso'] = $_POST['lugarAseso'];
		}else{
			//$error[2][1] = "Campo obligatorio";
		}

		/*===== Validar Fecha Asesoria =====*/
		if (!isset($_POST['fechaAseso']) || empty($_POST['fechaAseso'])) {
			//$error[2][2] = "El campo es obligatorio";
		}else{
			$_POST['fechaAseso'];
			$date = explode("-", $_POST['fechaAseso']);
			$countDate =  count($date);
			if ($countDate == 3 && checkdate($date[1], $date[2], $date[0])) {
				$_SESSION['fechaAseso'] = $_POST['fechaAseso'];
			}else{
				$error[2][2] = "El formato fecha es incorrecto";
			}
		}
		/*===== Validar hora la capactitacion =====*/
		if (!isset($_POST['horaAseso']) || empty($_POST['horaAseso'])) {
			//$error[2][3] = "El campo es obligatorio";
		}else{
			$_SESSION['horaAseso'] = $_POST['horaAseso'];
		}

		// Validando si existen errores en todo formulario
		if ($error) {
			echo "<div class='modalError' id='modalError'>";
			echo "<div class='boxError'>";
			echo "<div class='cerraModal' id='cerraModal'>X</div>";
			echo "<h3>Estimado usuario:</h3>";
			echo "El formulario tiene errores, por favor corrijalos para continuar.";
			echo "</div>";
			echo "</div>";
		}else{
			header("Location: ../../php/resumen/asesoriaCM.php");
		}
	}else{
		// echo "No3";
	}

}else{
	header('Location:../../');
}
?>