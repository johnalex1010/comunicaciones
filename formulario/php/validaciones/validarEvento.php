<?php
error_reporting (E_ALL & ~E_NOTICE & ~E_DEPRECATED);
error_reporting(0);
/*
==================
Validar Datos Home
==================
*/

if (isset($_SESSION['campoNombre']) && isset($_SESSION['campoEmail']) && isset($_SESSION['campoFacDep']) && isset($_SESSION['campoTel'])) {

	if (isset($_POST['submitEvento'])) {
		$error = array();

		//==========
		//PÁGINA UNO
		//==========

		/*===== Validar Tipo Evento =====*/
			if (empty($_POST['tipoEvento'])){
				$error[0] = "El campo es obligatorio";
			}

		/*===== Validar Nombre evento =====*/
			if (empty($_POST['nombreEvento'])) {
				$error[1] = "El campo es obligatorio";
			}

		/*===== Validar Lugar evento =====*/
			if (empty($_POST['lugarEvento'])) {
				$error[2] = "El campo es obligatorio";
			}
		
		/*===== Validar Fecha inicio  del evento =====*/
			if (empty($_POST['fIniEvento'])) {
				$error[3] = "El campo es obligatorio";
			}else{
				$date = explode("-", $_POST['fIniEvento']);
				$countDate =  count($date);
				if ($countDate == 3 && checkdate($date[1], $date[2], $date[0])) {
					$_POST['fIniEvento'];
				}else{
					$error[3] = "El formato fecha es incorrecto";
				}
			}

		/*===== Validar Fecha fin  del evento =====*/
			if (empty($_POST['fFinEvento'])) {
				$error[4] = "El campo es obligatorio";
			}else{
				$date = explode("-", $_POST['fFinEvento']);
				$countDate =  count($date);
				if ($countDate == 3 && checkdate($date[1], $date[2], $date[0])) {
					if ($_POST['fFinEvento'] >= $_POST['fIniEvento']) {
						$_POST['fFinEvento'];						
					}else{
						$error[4] = "La fecha de finalización debe ser mayor o igual a la fecha de inicio";
					}
				}else{
					$error[4] = "El formato fecha es incorrecto";
				}
			}

		/*===== Validar hora del evento =====*/
			if (empty($_POST['horaEvento'])) {
				$error[5] = "El campo es obligatorio";
			}

		/*===== Validar NUM TIC  del evento =====*/
			if (!empty($_POST['numTICEvento'])){
				if (!is_numeric($_POST['numTICEvento'])) {
					$error[6] = "El campo debe ser numerico";
				}
			}
 
		/*===== Validar Adjunto Adicionales =====*/
			if (!empty($_FILES['adjInfoEvento']['name'])) {
				if(($_FILES['adjInfoEvento']['type'] == "application/zip") || ($_FILES['adjInfoEvento']['type'] == "application/x-zip-compressed")){
					if ($_FILES['adjInfoEvento']['size'] > 1500000) {
						$error[7] = "El archivo adjunto excede el tamaño permitido de 1MB";
					}else{
						$_FILES['adjInfoEvento']['type'];
						$_FILES['adjInfoEvento']['size'];
						$_FILES['adjInfoEvento']['name'];
						$_FILES['adjInfoEvento']['tmp_name'];
					}
				}else{
					$error[7] = "El archivo adjunto debe ser un ZIP de máximo 1MB";
				}
			}

		/*===== Validar Cubrimiento Audiovisual Checked =====*/
			$tipoCubAUEvento = array();
			if (isset($_POST['tipoCubAUEvento']) || !empty($_POST['tipoCubAUEvento'])) {			
				$_POST['tipoCubAUEvento'];
			}

		/*===== Validar Cubrimiento WEB Radios Button =====*/
			if (!empty($_POST['tipoCubWEbEvento'])) {
				$_POST['tipoCubWEbEvento'];

				/*===== Validar Justifcación web =====*/
				if (!empty($_POST['jutifiCubWEbEvento'])) {
					if (strlen($_POST['jutifiCubWEbEvento'])<=510) {
						$_POST['jutifiCubWEbEvento'];
					}else{
						$error[8] = "Son máximo 500 caracteres";
					}
				}
			}		

		/*===== Validar Adjunto Web =====*/
			if (!empty($_FILES['adjCubWEbEvento']['name'])) {
				if(($_FILES['adjInfoEvento']['type'] == "application/zip") || ($_FILES['adjInfoEvento']['type'] == "application/x-zip-compressed")){
					if ($_FILES['adjCubWEbEvento']['size'] > 1500000) {
						$error[9] = "El archivo adjunto excede el tamaño permitido de 1MB";
					}else{
						$_FILES['adjCubWEbEvento']['type'];
						$_FILES['adjCubWEbEvento']['size'];
						$_FILES['adjCubWEbEvento']['name'];
						$_FILES['adjCubWEbEvento']['tmp_name'];
					}
				}else{
					$error[9] = "El archivo adjunto debe ser un ZIP de máximo 1MB";
				}
			}

		
		//==========
		//PÁGINA DOS
		//==========

		/*===== Validar Adjunto Presupuesto=====*/
			if (!empty($_FILES['adjPresupuestoEvento']['name'])) {
				if($_FILES['adjPresupuestoEvento']['type'] == "application/pdf"){
					if ($_FILES['adjPresupuestoEvento']['size'] > 2000000) {
						$error[10] = "El archivo adjunto excede el tamaño permitido de 1MB";
					}else{
						$_FILES['adjPresupuestoEvento']['type'];
						$_FILES['adjPresupuestoEvento']['size'];
						$_FILES['adjPresupuestoEvento']['name'];
						$_FILES['adjPresupuestoEvento']['tmp_name'];
					}
				}else{
					$error[10] = "El archivo adjunto debe ser un PDF de máximo 1MB";
				}
			}

		/*===== Validar Que existena Piezas impresas y digitales =====*/
			if (empty($_POST['ImpPieza'][0]) && empty($_POST['inputDIG'][0])) {
				$error[13] = "Debe seleccionar alguna de las opciones";
			}else{

				/*===== Validar ADD Impresos Piezas =====*/
				if (!empty($_POST['ImpPieza'][0])) {
					$c = count($_POST['ImpPieza']);

					for ($i=0; $i < $c; $i++) { 
						$_POST['ImpPieza'][$i];
					}					
				}

				/*===== Validar ADD Impresos Acaboados =====*/
				if (!empty($_POST['ImpAcabado'][0])) {
					$c = count($_POST['ImpAcabado']);

					for ($i=0; $i < $c; $i++) { 
						$_POST['ImpAcabado'][$i];
					}					
				}

				/*===== Validar ADD Impresos Tipo papel =====*/
				if (!empty($_POST['ImpTP'][0])) {
					$c = count($_POST['ImpTP']);

					for ($i=0; $i < $c; $i++) { 
						$_POST['ImpTP'][$i];
					}					
				}

				/*===== Validar Cantidad impresos =====*/
				if (!empty($_POST['IMPCant'][0])) {
					$c = count($_POST['IMPCant']);
					for ($i=0; $i < $c; $i++) {
						if (is_numeric($_POST['IMPCant'][$i])) {
							$_POST['IMPCant'][$i];
						}else{
							$error[12][$i] = "Debe ser número";
						}						
					}					
				}

				/*===== Validar ADD Digitales =====*/
				if (!empty($_POST['inputDIG'][0])) {
					$c = count($_POST['inputDIG']);
					//$error[10] = "Debe ser número";
					for ($i=0; $i < $c; $i++) { 
						$_POST['inputDIG'][$i];
					}					
				}
			}


		//===========
		//PÁGINA TRES
		//===========

		/*===== Validar Lineamientos graficos =====*/
			if (!empty($_POST['lineamientoGraficos'])) {
				if (strlen($_POST['lineamientoGraficos'])<=510) {
					$_POST['lineamientoGraficos'];
				}else{
					$error[11] = "Son máximo 500 caracteres";
				}			
			}

		/*===== Validar Colores =====*/
			if (!empty($_POST['colorEvento'])) {
				$_POST['colorEvento'];
			}

		/*===== Validar Publico Objetivo =====*/
			if (!empty($_POST['checkPublicoObj'])) {
				$_POST['checkPublicoObj'];
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
			include_once '../../php/incrus/in_evento.php';
		}

	}
}else{
	// header('Location:../../');
	echo "<script>window.location.replace('../../');</script>";
	echo "NO existen";
}
?>