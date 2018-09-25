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
			$_SESSION['nombreEventWeb'] = $_POST['nombreEventWeb'];
		}else{
			$error[0][0] = "Campo obligatorio";
		}

		/*===== Validar Subdominio =====*/
		if (isset($_POST['subdominio']) && !empty($_POST['subdominio'])) {
			$_SESSION['subdominio'] = $_POST['subdominio'];
		}else{
			// $error[0][1] = "Campo obligatorio";
		}

		/*===== Validar Adjunto Contenido y plan de navgación =====*/
		if (!empty($_FILES['adjPlanNav']['name'])) {
			if($_FILES['adjPlanNav']['type'] == "application/zip"){
				if ($_FILES['adjPlanNav']['size'] > 8000000) {
					unset($_SESSION['adjPlanNav1']);
					unset($_SESSION['adjPlanNav2']);
					unset($_SESSION['adjPlanNav3']);
					unset($_SESSION['adjPlanNav4']);
					echo $error[0][2] = "El archivo adjunto excede el tamaño permitido de 1MB";
				}else{
					$_SESSION['adjPlanNav1'] = $_FILES['adjPlanNav']['type'];			
					$_SESSION['adjPlanNav2'] = $_FILES['adjPlanNav']['size'];			
					$_SESSION['adjPlanNav3'] = $_FILES['adjPlanNav']['name'];			
					$_SESSION['adjPlanNav4'] = $_FILES['adjPlanNav']['tmp_name'];
				}
			}else{
				unset($_SESSION['adjPlanNav1']);
				unset($_SESSION['adjPlanNav2']);
				unset($_SESSION['adjPlanNav3']);
				unset($_SESSION['adjPlanNav4']);
				echo $error[0][2] = "El archivo adjunto debe ser un ZIP de máximo 1MB";
			}
		}else{
			$error[0][2] = "El archivo adjunto es obligatorio";
		}

		/*===== Validar TXT motivo web =====*/
		if (isset($_POST['motivoNewWeb']) && !empty($_POST['motivoNewWeb'])) {
			unset( $_SESSION["motivoNewWeb"] );
			if (strlen($_POST['motivoNewWeb'])<=510) {
				$_SESSION['motivoNewWeb'] = $_POST['motivoNewWeb'];
			}else{
				$_SESSION['motivoNewWeb'] = $_POST['motivoNewWeb'];
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
			echo "El formulario tiene errores, por favor corrijalos para continuar.";
			echo "</div>";
			echo "</div>";
		}else{
			header("Location: ../../php/resumen/newSite.php");
		}
	}else{
		// echo "No1";
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
		        $_SESSION['urlWeb'] = $urlWeb;
		    } else {
		        $error[1][0] = "La URL no es valida";
		    }
		}else{
			$error[1][0] = "Campo obligatorio";
		}

		/*===== Validar Ajunto de ajustes =====*/
		if (!empty($_FILES['adjDocWEb']['name'])) {
			if($_FILES['adjDocWEb']['type'] == "application/zip"){
				if ($_FILES['adjDocWEb']['size'] > 8000000) {
					unset($_SESSION['adjDocWEb1']);
					unset($_SESSION['adjDocWEb2']);
					unset($_SESSION['adjDocWEb3']);
					unset($_SESSION['adjDocWEb4']);
					$error[1][1] = "El archivo adjunto excede el tamaño permitido de 1MB";
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
				$error[1][1] = "El archivo adjunto debe ser un ZIP de máximo 1MB";
			}
		}else{
			$error[1][1] = "El archivo adjunto es obligatorio";
		}

		/*===== Validar TXT Descripcion adiconal =====*/			
		if (strlen($_POST['descripWeb'])<=510) {
			unset( $_SESSION["descripWeb"] );
			$_SESSION['descripWeb'] = $_POST['descripWeb'];
		}else{
			$_SESSION['descripWeb'] = $_POST['descripWeb'];
			$error[1][2] = "Son máximo 500 caracteres";
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
			header("Location: ../../php/resumen/ajustestxtweb.php");
		}
	}else{
		// echo "No2";
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
			$_SESSION['nombreCapa'] = $_POST['nombreCapa'];
		}else{
			$error[2][0] = "Campo obligatorio";
		}

		/*===== Validar Telefono Fijo Contacto =====*/
		if (isset($_POST['numTelCapa']) && !empty($_POST['numTelCapa'])) {
			if (is_numeric($_POST['numTelCapa'])) {
				$_SESSION['numTelCapa'] = $_POST['numTelCapa'];
			}else{
				$error[2][1] = "El campo debe ser numerico";
			}
		}else{
			$error[2][1] = "Campo obligatorio";
		}

		/*===== Validar Telefono Celular Contacto =====*/
		if (!empty($_POST['numCelCapa'])) {
			if (is_numeric($_POST['numCelCapa'])) {
				$_SESSION['numCelCapa'] = $_POST['numCelCapa'];
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
				$_SESSION['emailCapa'] = $emailCapa;
			}else{
				$_SESSION['emailCapa'] = $emailCapa;
				$error[2][3] = "Esta dirección de correo no es válida.";
			}
		}

		/*===== Validar Fecha de capacitación =====*/
		$date = explode("-", $_POST['fechaCapa']);
		$countDate =  count($date);
		if ($countDate == 3 && checkdate($date[1], $date[2], $date[0])) {
			$_SESSION['fechaCapa'] = $_POST['fechaCapa'];
		}else{
			$error[2][4] = "El formato fecha es incorrecto";
		}

		/*===== Validar hora la capactitacion =====*/
		if (!isset($_POST['horaCapa']) || empty($_POST['horaCapa'])) {
			//$error[2][5] = "El campo es obligatorio";
		}else{
			$_SESSION['horaCapa'] = $_POST['horaCapa'];
		}

		/*===== Validar Motivo de capacitación web =====*/
		if (isset($_POST['motivoCapa']) && !empty($_POST['motivoCapa'])) {
			unset( $_SESSION["motivoCapa"] );
			if (strlen($_POST['motivoCapa'])<=510) {
				$_SESSION['motivoCapa'] = $_POST['motivoCapa'];
			}else{
				$_SESSION['motivoCapa'] = $_POST['motivoCapa'];
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
			echo "El formulario tiene errores, por favor corrijalos para continuar.";
			echo "</div>";
			echo "</div>";
		}else{
			header("Location: ../../php/resumen/capacitacionWeb.php");
		}
	}else{
		// echo "No3";
	}

}else{
	header('Location:../../');
}
?>