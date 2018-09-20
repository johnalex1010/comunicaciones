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
					echo $error[0] = "El archivo adjunto excede el tamaño permitido de 1MB";
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
				echo $error[0] = "El archivo adjunto debe ser un PDF o Word de máximo 1MB";
			}
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
		echo "si";
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
		echo "si";
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
		echo "si";
	}else{
		echo "N05";
	}

}else{
	header('Location:../../');
}
?>