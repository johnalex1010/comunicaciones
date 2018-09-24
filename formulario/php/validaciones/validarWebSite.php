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
	}else{
		echo "No1";
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
		        echo $_SESSION['urlWeb'] = $urlWeb;
		    } else {
		        echo $error[1][0] = "La URL no es valida";
		    }
		}else{
			echo $error[1][0] = "Campo obligatorio";
		}

		/*===== Validar Ajunto de ajustes =====*/
		if (!empty($_FILES['adjDocWEb']['name'])) {
			if($_FILES['adjDocWEb']['type'] == "application/zip"){
				if ($_FILES['adjDocWEb']['size'] > 8000000) {
					unset($_SESSION['adjDocWEb1']);
					unset($_SESSION['adjDocWEb2']);
					unset($_SESSION['adjDocWEb3']);
					unset($_SESSION['adjDocWEb4']);
					echo $error[1][1] = "El archivo adjunto excede el tamaño permitido de 1MB";
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
				echo $error[1][1] = "El archivo adjunto debe ser un ZIP de máximo 1MB";
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
	}else{
		echo "No2";
	}

	/*
	=================================
	Validar Campos de Capactación Web
	=================================
	*/
	if (isset($_POST['submitCapa'])) {
	$error = array();	
		/*===== Validar Aprobación de material dos campos =====*/
	}else{
		echo "No3";
	}

}else{
	header('Location:../../');
}
?>