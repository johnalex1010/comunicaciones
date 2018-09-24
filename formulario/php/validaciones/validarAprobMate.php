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
				unset( $_SESSION["echoAM"] );
				$_SESSION['checkAprobMate'] = $_POST['checkAprobMate'];
				$checkAprobMate = $_SESSION['checkAprobMate'];
				$TCAcount = count($checkAprobMate);
				for ($tcacont=0; $tcacont < $TCAcount; $tcacont++) { 
					$_SESSION['echoAM'] .= $checkAprobMate[$tcacont]."<br>";	
				}
			}else{

				unset( $_SESSION["echoAM"] );
				unset( $_SESSION["checkAprobMate"] );
				$error[0][0] = "Debe seleccionar al menos una  opción.";
			}

			/*===== Validar Adjunto Aprtobación de Material =====*/
			if (!empty($_FILES['adjAprobMate']['name'])) {
				if(($_FILES['adjAprobMate']['type'] == "application/pdf")  || ($_FILES['adjAprobMate']['type'] == "application/msword") || ($_FILES['adjAprobMate']['type'] == "application/vnd.openxmlformats-officedocument.wordprocessingml.document")){
					if ($_FILES['adjAprobMate']['size'] > 8000000) {
						unset($_SESSION['adjMailInsti1']);
						unset($_SESSION['adjMailInsti2']);
						unset($_SESSION['adjMailInsti3']);
						unset($_SESSION['adjMailInsti4']);
						echo $error[0][1] = "El archivo adjunto excede el tamaño permitido de 1MB";
					}else{
						$_SESSION['adjAprobMate1'] = $_FILES['adjAprobMate']['type'];			
						$_SESSION['adjAprobMate2'] = $_FILES['adjAprobMate']['size'];			
						$_SESSION['adjAprobMate3'] = $_FILES['adjAprobMate']['name'];			
						$_SESSION['adjAprobMate4'] = $_FILES['adjAprobMate']['tmp_name'];
					}
				}else{
					unset($_SESSION['adjAprobMate1']);
					unset($_SESSION['adjAprobMate2']);
					unset($_SESSION['adjAprobMate3']);
					unset($_SESSION['adjAprobMate4']);
					$error[0][1] = "El archivo adjunto debe ser un PDF o Word de máximo 1MB";
				}
			}else{
				$error[0][1] = "El archivo adjunto es obligatorio";
			}
	}else{
		// echo "No1";
	}

}else{
	header('Location:../../');
}
?>