<?php
error_reporting (E_ALL & ~E_NOTICE & ~E_DEPRECATED);
error_reporting(0);


if (isset($_SESSION['campoNombre']) && isset($_SESSION['campoEmail']) && isset($_SESSION['campoFacDep']) && isset($_SESSION['campoTel'])) {
	/*
	========================================
	Validar Campos de Aprobación de Material
	========================================
	*/
	if (isset($_POST['submitAprobMate'])) {
		$error = array();

		/*===== Validar Aprobación de material dos campos =====*/
		$checkAprobMate = array();
		/*===== Validar Aprobación de material Checked =====*/
		if (isset($_POST['checkAprobMate']) || !empty($_POST['checkAprobMate'])) {
			$_POST['checkAprobMate'];
			$TCAcount = count($_POST['checkAprobMate']);
			for ($i=0; $i < $TCAcount; $i++) { 
				$_POST['checkAprobMate'][$i];
			}
		}else{
			$error[0][0] = "Debe seleccionar al menos una  opción.";
		}

		/*===== Validar Adjunto Aprtobación de Material =====*/
		if (!empty($_FILES['adjAprobMate']['name'])) {
			if($_FILES['adjAprobMate']['type'] == "application/zip"){
				if ($_FILES['adjAprobMate']['size'] > 8000000) {
					$error[0][1] = "El archivo adjunto excede el tamaño permitido de 1MB";
				}else{
					include_once '../../php/incrus/in_aprobacionMaterial.php';
				}
			}else{
				$error[0][1] = "El archivo adjunto debe ser un ZIP";
			}
		}else{
			$error[0][1] = "El archivo adjunto es obligatorio";
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
		}
	}
}else{
	header('Location:../../');
}
?>