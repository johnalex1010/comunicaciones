<?php
error_reporting (E_ALL & ~E_NOTICE & ~E_DEPRECATED);
error_reporting(0);


if (isset($_SESSION['campoNombre']) && isset($_SESSION['campoEmail']) && isset($_SESSION['campoFacDep']) && isset($_SESSION['campoTel'])) {
	/*
	=================================
	Validar Campos de Nuevo sitio Web
	=================================
	*/	
	if (isset($_POST['submitNewSite'])) {
		$error = array();
		/*===== Validar Nombre del evento web =====*/
		if (isset($_POST['nombreEventWeb']) && !empty($_POST['nombreEventWeb'])) {
			$_POST['nombreEventWeb'];
		}else{
			$error[0][0] = "Campo obligatorio";
		}

		/*===== Validar Subdominio =====*/
		if (isset($_POST['subdominio']) && !empty($_POST['subdominio'])) {
			$_POST['subdominio'];
		}

		/*===== Validar Adjunto Contenido y plan de navgación =====*/
		if (!empty($_FILES['adjPlanNav']['name'])) {
			if(($_FILES['adjPlanNav']['type'] == "application/zip") || ($_FILES['adjPlanNav']['type'] == "application/x-zip-compressed")){
				if ($_FILES['adjPlanNav']['size'] > 8000000) {
					$error[0][2] = "El archivo adjunto excede el tamaño permitido de 8MB";
				}else{
					$_FILES['adjPlanNav']['type'];			
					$_FILES['adjPlanNav']['size'];			
					$_FILES['adjPlanNav']['name'];			
					$_FILES['adjPlanNav']['tmp_name'];
				}
			}else{
				$error[0][2] = "El archivo adjunto debe ser un ZIP de máximo 8MB";
			}
		}else{
			$error[0][2] = "El archivo adjunto es obligatorio";
		}

		/*===== Validar TXT motivo web =====*/
		if (isset($_POST['motivoNewWeb']) && !empty($_POST['motivoNewWeb'])) {
			if (strlen($_POST['motivoNewWeb'])<=510) {
				$_POST['motivoNewWeb'];
			}else{
				$error[0][3] = "Son máximo 500 caracteres";
			}
		}else{
			$error[0][3] = "Campo obligatorio";
		}

		// Validando si existen errores en todo formulario
		if ($error) {
			echo "<div class='modalError' id='modalError'>";
			echo "<div class='boxError'>";
			echo "<div class='cerraModal' id='cerraModal'>X</div>";
			echo "<h3>Estimado usuario:</h3>";
			echo "El formulario contiene errores, por favor corrija para continuar. Si su solicitud contiene archivos adjuntos, por favor vuelva a relacionarlos.";
			echo "</div>";
			echo "</div>";
		}else{
			include_once '../../php/incrus/in_newSite.php';
		}
	}

	/*
	=============================
	Validar Campos de Ajustes Web
	=============================
	*/
	if (isset($_POST['submitAjusteWeb'])) {
		$error = array();
		/*===== Validar URL web =====*/
		if (isset($_POST['urlWeb']) && !empty($_POST['urlWeb'])) {
			$urlWeb = $_POST['urlWeb'];
		    // Remover los caracteres ilegales de la url
		    $urlWeb = filter_var($urlWeb, FILTER_SANITIZE_URL);
		    // Validar url
		    if (!filter_var($urlWeb, FILTER_VALIDATE_URL) === false) {
		        $urlWeb;
		    } else {
		        $error[1][0] = "La URL no es valida";
		    }
		}else{
			$error[1][0] = "Campo obligatorio";
		}

		/*===== Validar Ajunto de ajustes =====*/
		if (!empty($_FILES['adjDocWEb']['name'])) {
			if(($_FILES['adjDocWEb']['type'] == "application/zip") || ($_FILES['adjDocWEb']['type'] == "application/x-zip-compressed")){
				if ($_FILES['adjDocWEb']['size'] > 8000000) {$error[1][1] = "El archivo adjunto excede el tamaño permitido de 1MB";
				}else{
					$_FILES['adjDocWEb']['type'];			
					$_FILES['adjDocWEb']['size'];			
					$_FILES['adjDocWEb']['name'];			
					$_FILES['adjDocWEb']['tmp_name'];
				}
			}else{
				$error[1][1] = "El archivo adjunto debe ser un ZIP de máximo 1MB";
			}
		}else{
			$error[1][1] = "El archivo adjunto es obligatorio";
		}

		/*===== Validar TXT Descripcion adiconal =====*/			
		if (strlen($_POST['descripWeb'])<=510) {
			$_POST['descripWeb'];
		}else{
			$error[1][2] = "Son máximo 500 caracteres";
		}

		// Validando si existen errores en todo formulario
		if ($error) {
			echo "<div class='modalError' id='modalError'>";
			echo "<div class='boxError'>";
			echo "<div class='cerraModal' id='cerraModal'>X</div>";
			echo "<h3>Estimado usuario:</h3>";
			echo "El formulario contiene errores, por favor corrija para continuar. Si su solicitud contiene archivos adjuntos, por favor vuelva a relacionarlos..";
			echo "</div>";
			echo "</div>";
		}else{
			include_once '../../php/incrus/in_ajustestxtweb.php';
		}
	}

	/*
	=================================
	Validar Campos de Capactación Web
	=================================
	*/
	if (isset($_POST['submitCapa'])) {
		$error = array();	
		/*===== Validar Nombre de la persona que va a tomar la capacitación =====*/
		if (isset($_POST['nombreCapa']) && !empty($_POST['nombreCapa'])) {
			$_POST['nombreCapa'];
		}else{
			$error[2][0] = "Campo obligatorio";
		}

		/*===== Validar Telefono Fijo Contacto =====*/
		if (isset($_POST['numTelCapa']) && !empty($_POST['numTelCapa'])) {
			if (is_numeric($_POST['numTelCapa'])) {
				$_POST['numTelCapa'];
			}else{
				$error[2][1] = "El campo debe ser numerico";
			}
		}else{
			$error[2][1] = "Campo obligatorio";
		}

		/*===== Validar Telefono Celular Contacto =====*/
		if (!empty($_POST['numCelCapa'])) {
			if (is_numeric($_POST['numCelCapa'])) {
				$_POST['numCelCapa'];
			}else{
				$error[2][2] = "El campo debe ser numerico";
			}
		}

		/*===== Validar Email =====*/
		if (!isset($_POST['emailCapa']) || empty($_POST['emailCapa'])) {
			$error[2][3] = "El campo es obligatorio";
		}else{
			$emailCapa = $_POST['emailCapa'];
			if (filter_var($emailCapa, FILTER_VALIDATE_EMAIL)) {
				$emailCapa;
			}else{
				$error[2][3] = "Esta dirección de correo no es válida.";
			}
		}

		/*===== Validar Fecha de capacitación =====*/
		if (!empty($_POST['fechaCapa'])) {
			$date = explode("-", $_POST['fechaCapa']);
			$countDate =  count($date);
			if ($countDate == 3 && checkdate($date[1], $date[2], $date[0])) {
				$_POST['fechaCapa'];
			}else{
				$error[2][4] = "El formato fecha es incorrecto";
			}
		}
		
		/*===== Validar hora la capactitacion =====*/
		if (!isset($_POST['horaCapa']) || empty($_POST['horaCapa'])) {
			//$error[2][5] = "El campo es obligatorio";
		}else{
			$_POST['horaCapa'];
		}

		/*===== Validar Motivo de capacitación web =====*/
		if (isset($_POST['motivoCapa']) && !empty($_POST['motivoCapa'])) {
			if (strlen($_POST['motivoCapa'])<=510) {
				$_POST['motivoCapa'];
			}else{
				$error[2][6] = "Son máximo 500 caracteres";
			}
		}else{
			$error[2][6] = "El campo es obligatorio";
		}

		// Validando si existen errores en todo formulario
		if ($error) {
			echo "<div class='modalError' id='modalError'>";
			echo "<div class='boxError'>";
			echo "<div class='cerraModal' id='cerraModal'>X</div>";
			echo "<h3>Estimado usuario:</h3>";
			echo "El formulario contiene errores, por favor corrija para continuar. Si su solicitud contiene archivos adjuntos, por favor vuelva a relacionarlos..";
			echo "</div>";
			echo "</div>";
		}else{
			include_once '../../php/incrus/in_capacitacionWeb.php';
		}
	}
}else{
	header('Location:../../');
}
?>