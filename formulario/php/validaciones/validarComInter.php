<?php
error_reporting (E_ALL & ~E_NOTICE & ~E_DEPRECATED);
error_reporting(0);


if (isset($_SESSION['campoNombre']) && isset($_SESSION['campoEmail']) && isset($_SESSION['campoFacDep']) && isset($_SESSION['campoTel'])) {
	/*
	========================================
	Validar Campo de Correos Institucionales
	========================================
	*/
	if (isset($_POST['submitCorreosInstu'])) {
		$error = array();
		
		/*===== Validar Adjunto Adicionales =====*/
		if (!empty($_FILES['adjMailInsti']['name'])) {
			if(($_FILES['adjMailInsti']['type'] == "application/pdf")  || ($_FILES['adjMailInsti']['type'] == "application/msword") || ($_FILES['adjMailInsti']['type'] == "application/vnd.openxmlformats-officedocument.wordprocessingml.document")){
				if ($_FILES['adjMailInsti']['size'] > 8000000) {
					$error[0][1] = "El archivo adjunto excede el tamaño permitido de 1MB";
				}else{					
					include_once '../../php/incrus/in_emailInstitucionales.php';
				}	
			}else{
				$error[0][1] = "El archivo adjunto debe ser un PDF o Word de máximo 1MB";
			}
		}else{
			$error[0][0] = "El archivo adjunto es obligatorio";
		}

		// Validando si existen errores en todo formulario
		if ($error) {
			echo "<div class='modalError' id='modalError'>";
			echo "<div class='boxError'>";
			echo "<div class='cerraModal' id='cerraModal'>X</div>";
			echo "<h3>Estimado usuario:</h3>";
			echo "El formulario tiene errores, por favor corrijalos para continuar. Si su solicitud contiene archivos adjuntos, por favor vuelvalos a relacionar";
			echo "</div>";
			echo "</div>";
		}
	}

	/*
	===============================
	Validar Campos de Tomás Noticas
	===============================
	*/
	if (isset($_POST['submitTN'])) {
		$error = array();

		if (!empty($_FILES['tn']['name'][0]) && !empty($_FILES['tn']['name'][1])) {		
			if ((($_FILES['tn']['type'][0] == "application/msword") || ($_FILES['tn']['type'][0] == "application/vnd.openxmlformats-officedocument.wordprocessingml.document")) && (($_FILES['tn']['type'][1] == "image/jpeg") || ($_FILES['tn']['type'][1] == "image/jpg") || ($_FILES['tn']['type'][1] == "image/png"))){
				if (($_FILES['tn']['size'][0] > 5000000) && ($_FILES['tn']['size'][1] > 5000000)) {
					$error[1][0] = "Los archivos execenden el peso valido: Para el documento Word es: 4MB y para la imagen JPG/PNG es de: 2MB";
				}else{
					include_once '../../php/incrus/in_tomasNoticias.php';
				}				
			}else{
				$error[1][0] = "Los formatos validos son (Word y JPG/PNG)";
			}
		}else{
			$error[1][0] = "Los campos son requeridos";
		}


		// Validando si existen errores en todo formulario
		if ($error) {
			echo "<div class='modalError' id='modalError'>";
			echo "<div class='boxError'>";
			echo "<div class='cerraModal' id='cerraModal'>X</div>";
			echo "<h3>Estimado usuario:</h3>";
			echo "El formulario tiene errores, por favor corrijalos para continuar. Si su solicitud contiene archivos adjuntos, por favor vuelvalos a relacionar";
			echo "</div>";
			echo "</div>";
		}
	}
	/*
	==============================
	Validar Campos de Condolencias
	==============================
	*/
	if (isset($_POST['submitCondo'])) {
		$error = array();
		if (!empty($_POST['condoNombre']) && !empty($_POST['condoCargo']) && !empty($_POST['condoFacDep']) && !empty($_POST['condoFalle'])) {

			/*===== Validar Nombre Doliente =====*/
			if (!isset($_POST['condoNombre']) || empty($_POST['condoNombre'])) {
				$error[2][1] = "El campo es obligatorio";
			}

			/*===== Validar Cargo Doliente =====*/
			if (!isset($_POST['condoCargo']) || empty($_POST['condoCargo'])) {
				$error[2][2] = "El campo es obligatorio";
			}

			/*===== Validar Facultad/Dependencia =====*/
			if (!isset($_POST['condoFacDep']) || empty($_POST['condoFacDep'])){
				$error[2][3] = "El campo es obligatorio";
			}

			/*===== Validar Nombre Fallecido =====*/
			if (!isset($_POST['condoFalle']) || empty($_POST['condoFalle'])) {
				$error[2][4] = "El campo es obligatorio";
			}

			/*===== Validar Parentesco =====*/
			if (!isset($_POST['condoParen']) || empty($_POST['condoParen'])) {
				//$error[2][5] = "El campo es obligatorio";
			}

			/*===== Validar Lugar velación =====*/
			if (!isset($_POST['condoLugarVel']) || empty($_POST['condoLugarVel'])) {
				//$error[2][6] = "El campo es obligatorio";
			}

			/*===== Validar Fecha de conmemoración =====*/
			if (!isset($_POST['condoFVela']) || empty($_POST['condoFVela'])) {
				//$error[2][7] = "El campo es obligatorio";
			}else{
				$_POST['condoFVela'];
				$date = explode("-", $_POST['condoFVela']);
				$countDate =  count($date);
				if ($countDate == 3 && checkdate($date[1], $date[2], $date[0])) {
					$_POST['condoFVela'];
				}else{
					$error[2][8] = "El formato fecha es incorrecto";
				}
			}

			/*===== Validar hora velación =====*/
			if (!isset($_POST['condoHVela']) || empty($_POST['condoHVela'])) {
				//$error[2][8] = "El campo es obligatorio";
			}
		}else{
			$error[2][0] = "Los campos obligatorios";
		}

		// Validando si existen errores en todo formulario
		if ($error) {
			echo "<div class='modalError' id='modalError'>";
			echo "<div class='boxError'>";
			echo "<div class='cerraModal' id='cerraModal'>X</div>";
			echo "<h3>Estimado usuario:</h3>";
			echo "El formulario tiene errores, por favor corrijalos para continuar. Si su solicitud contiene archivos adjuntos, por favor vuelvalos a relacionar";
			echo "</div>";
			echo "</div>";
		}else{
			include_once '../../php/incrus/in_condolencias.php';
		}
	}
	/*
	===========================
	Validar Campo de Cumpleaños
	===========================
	*/
	if (isset($_POST['submitCumple'])) {
		$error = array();
		/*===== Validar Adjunto Adicionales =====*/
		if (!empty($_FILES['cumple']['name'])) {
			if(($_FILES['cumple']['type'] == "application/pdf")  || ($_FILES['cumple']['type'] == "application/msword") || ($_FILES['cumple']['type'] == "application/vnd.openxmlformats-officedocument.wordprocessingml.document")){
				if ($_FILES['cumple']['size'] > 8000000) {
					$error[3][1] = "El archivo adjunto excede el tamaño permitido de 1MB";
				}else{
					include_once '../../php/incrus/in_cumpleanios.php';
				}
			}else{
				$error[3][1] = "El archivo adjunto debe ser un PDF o Word de máximo 1MB";
			}
		}else{
			$error[3][0] = "El archivo adjunto es obligatorio";
		}
		// Validando si existen errores en todo formulario
		if ($error) {
			echo "<div class='modalError' id='modalError'>";
			echo "<div class='boxError'>";
			echo "<div class='cerraModal' id='cerraModal'>X</div>";
			echo "<h3>Estimado usuario:</h3>";
			echo "El formulario tiene errores, por favor corrijalos para continuar. Si su solicitud contiene archivos adjuntos, por favor vuelvalos a relacionar";
			echo "</div>";
			echo "</div>";
		}
	}
	/*
	=========================================
	Validar Campos de Tarjetas conmemorativas
	=========================================
	*/
	if (isset($_POST['submitTC'])) {
		$error = array();
		/*===== Validar Nombre evento =====*/
		if (!empty($_POST['conmeNombre']) && !empty($_POST['conmeF']) && !empty($_POST['conmeMSJ'])) {

			/*===== Validar Nombre Conmemoración =====*/
			if (!isset($_POST['conmeNombre']) || empty($_POST['conmeNombre'])) {
				$error[4][1] = "El campo es obligatorio";
			}

			/*===== Validar Fecha de conmemoración =====*/
			if (!isset($_POST['conmeF']) || empty($_POST['conmeF'])) {
				$error[4][2] = "El campo es obligatorio";
			}else{
				$_POST['conmeF'];
				$date = explode("-", $_POST['conmeF']);
				$countDate =  count($date);
				if ($countDate == 3 && checkdate($date[1], $date[2], $date[0])) {
					$_POST['conmeF'];
				}else{
					$error[4][2] = "El formato fecha es incorrecto";
				}
			}

			/*===== Validar Justifcación web =====*/
			if (isset($_POST['conmeMSJ'])) {
				unset( $_SESSION["conmeMSJ"] );
				if (strlen($_POST['conmeMSJ'])<=510) {
					$_POST['conmeMSJ'];
				}else{
					$error[4][3] = "Son máximo 500 caracteres";
				}
			}

		}else{
			$error[4][0] = "Los campos obligatorios";
		}
		// Validando si existen errores en todo formulario
		if ($error) {
			echo "<div class='modalError' id='modalError'>";
			echo "<div class='boxError'>";
			echo "<div class='cerraModal' id='cerraModal'>X</div>";
			echo "<h3>Estimado usuario:</h3>";
			echo "El formulario tiene errores, por favor corrijalos para continuar. Si su solicitud contiene archivos adjuntos, por favor vuelvalos a relacionar";
			echo "</div>";
			echo "</div>";
		}else{
			include_once '../../php/incrus/in_tarjetasConmemorativas.php';
		}
	}

}else{
	header('Location:../../');
}
?>