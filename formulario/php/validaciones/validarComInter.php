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
					unset($_SESSION['adjMailInsti1']);
					unset($_SESSION['adjMailInsti2']);
					unset($_SESSION['adjMailInsti3']);
					unset($_SESSION['adjMailInsti4']);
					echo $error[0][1] = "El archivo adjunto excede el tamaño permitido de 1MB";
				}else{
					$_SESSION['adjMailInsti1'] = $_FILES['adjMailInsti']['type'];			
					$_SESSION['adjMailInsti2'] = $_FILES['adjMailInsti']['size'];			
					$_SESSION['adjMailInsti3'] = $_FILES['adjMailInsti']['name'];			
					$_SESSION['adjMailInsti4'] = $_FILES['adjMailInsti']['tmp_name'];
				}
			}else{
				unset($_SESSION['adjMailInsti1']);
				unset($_SESSION['adjMailInsti2']);
				unset($_SESSION['adjMailInsti3']);
				unset($_SESSION['adjMailInsti4']);
				echo $error[0][1] = "El archivo adjunto debe ser un PDF o Word de máximo 1MB";
			}
		}else{
			echo $error[0][0] = "El archivo adjunto es obligatorio";
		}
	}else{
		echo "No1";
	}

	/*
	===============================
	Validar Campos de Tomás Noticas
	===============================
	*/
	if (isset($_POST['submitTN'])) {
		$error = array();

		/*===== Validar Que los dos campos existan =====*/
		if (!empty($_FILES['adjTNWord']['name']) && !empty($_FILES['adjTNjpg']['name'])) {
			/*===== Validar Adjunto Adicionales =====*/
			if (!empty($_FILES['adjTNWord']['name'])) {
				if(($_FILES['adjTNWord']['type'] == "application/msword") || ($_FILES['adjTNWord']['type'] == "application/vnd.openxmlformats-officedocument.wordprocessingml.document")){
					if ($_FILES['adjTNWord']['size'] > 8000000) {
						unset($_SESSION['adjTNWord1']);
						unset($_SESSION['adjTNWord2']);
						unset($_SESSION['adjTNWord3']);
						unset($_SESSION['adjTNWord4']);
						echo $error[1][1] = "El archivo adjunto excede el tamaño permitido de 1MB";
					}else{
						$_SESSION['adjTNWord1'] = $_FILES['adjTNWord']['type'];			
						$_SESSION['adjTNWord2'] = $_FILES['adjTNWord']['size'];			
						$_SESSION['adjTNWord3'] = $_FILES['adjTNWord']['name'];			
						$_SESSION['adjTNWord4'] = $_FILES['adjTNWord']['tmp_name'];
					}
				}else{
					unset($_SESSION['adjTNWord1']);
					unset($_SESSION['adjTNWord2']);
					unset($_SESSION['adjTNWord3']);
					unset($_SESSION['adjTNWord4']);
					echo $error[1][1] = " El adjunto debe ser un Word de máximo 1MB";
				}
			}

			/*===== Validar Adjunto Adicionales =====*/
			if (!empty($_FILES['adjTNjpg']['name'])) {
				if(($_FILES['adjTNjpg']['type'] == "image/jpeg") || ($_FILES['adjTNjpg']['type'] == "image/jpg")){
					if ($_FILES['adjTNjpg']['size'] > 8000000) {
						unset($_SESSION['adjTNjpg1']);
						unset($_SESSION['adjTNjpg2']);
						unset($_SESSION['adjTNjpg3']);
						unset($_SESSION['adjTNjpg4']);
						echo $error[1][2] = "El archivo adjunto excede el tamaño permitido de 1MB";
					}else{
						$_SESSION['adjTNjpg1'] = $_FILES['adjTNjpg']['type'];			
						$_SESSION['adjTNjpg2'] = $_FILES['adjTNjpg']['size'];			
						$_SESSION['adjTNjpg3'] = $_FILES['adjTNjpg']['name'];			
						$_SESSION['adjTNjpg4'] = $_FILES['adjTNjpg']['tmp_name'];
					}
				}else{
					unset($_SESSION['adjTNjpg1']);
					unset($_SESSION['adjTNjpg2']);
					unset($_SESSION['adjTNjpg3']);
					unset($_SESSION['adjTNjpg4']);
					echo $error[1][2] = "El adjunto debe ser un JPG/JPEG de máximo 1MB";
				}
			}
		}else{
			echo $error[1][0] = "Los campos son requeridos";
		}
	}else{
		echo "No2";
	}
	/*
	==============================
	Validar Campos de Condolencias
	==============================
	*/
	if (isset($_POST['submitCondo'])) {
		$error = array();
		echo "si";
	}else{
		echo "No3";
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
					unset($_SESSION['cumple1']);
					unset($_SESSION['cumple2']);
					unset($_SESSION['cumple3']);
					unset($_SESSION['cumple4']);
					echo $error[3][1] = "El archivo adjunto excede el tamaño permitido de 1MB";
				}else{
					$_SESSION['cumple1'] = $_FILES['cumple']['type'];			
					$_SESSION['cumple2'] = $_FILES['cumple']['size'];			
					$_SESSION['cumple3'] = $_FILES['cumple']['name'];			
					$_SESSION['cumple4'] = $_FILES['cumple']['tmp_name'];
				}
			}else{
				unset($_SESSION['cumple1']);
				unset($_SESSION['cumple2']);
				unset($_SESSION['cumple3']);
				unset($_SESSION['cumple4']);
				echo $error[3][1] = "El archivo adjunto debe ser un PDF o Word de máximo 1MB";
			}
		}else{
			echo $error[3][0] = "El archivo adjunto es obligatorio";
		}
	}else{
		echo "No4";
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
			}else{
				$_SESSION['conmeNombre'] = $_POST['conmeNombre'];
			}

			/*===== Validar Fecha inicio  del evento =====*/
			if (!isset($_POST['conmeF']) || empty($_POST['conmeF'])) {
				$error[4][2] = "El campo es obligatorio";
			}else{
				$_POST['conmeF'];
				$date = explode("-", $_POST['conmeF']);
				$countDate =  count($date);
				if ($countDate == 3 && checkdate($date[1], $date[2], $date[0])) {
					$_SESSION['conmeF'] = $_POST['conmeF'];
				}else{
					$error[4][2] = "El formato fecha es incorrecto";
				}
			}

			/*===== Validar Justifcación web =====*/
			if (isset($_POST['conmeMSJ'])) {
				unset( $_SESSION["conmeMSJ"] );
				if (strlen($_POST['conmeMSJ'])<=510) {
					$_SESSION['conmeMSJ'] = $_POST['conmeMSJ'];
				}else{
					$_SESSION['conmeMSJ'] = $_POST['conmeMSJ'];
					$error[4][3] = "Son máximo 500 caracteres";
				}
			}

		}else{
			unset($_SESSION['conmeNombre']);
			unset($_SESSION['conmeF']);
			unset($_SESSION['conmeMSJ']);
			echo $error[4][0] = "Los campos obligatorios";
		}
	}else{
		echo "N05";
	}

}else{
	header('Location:../../');
}
?>