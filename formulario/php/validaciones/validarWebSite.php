<?php
error_reporting (E_ALL & ~E_NOTICE & ~E_DEPRECATED);
error_reporting(0);


if (isset($_SESSION['campoNombre']) && isset($_SESSION['campoEmail']) && isset($_SESSION['campoFacDep']) && isset($_SESSION['campoTel'])) {
	/*
	=================================
	Validar Campos de Nuevo sitio Web
	=================================
	*/
	$error = array();
	if (isset($_POST['submitNewSite'])) {		
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
		/*===== Validar Aprobación de material dos campos =====*/
	}else{
		echo "No2";
	}

	/*
	=================================
	Validar Campos de Capactación Web
	=================================
	*/
	if (isset($_POST['submitCapa'])) {		
		/*===== Validar Aprobación de material dos campos =====*/
	}else{
		echo "No3";
	}

}else{
	header('Location:../../');
}
?>