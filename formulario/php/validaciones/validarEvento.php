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

		// /*===== Validar Tipo Evento =====*/
		// 	if (empty($_POST['tipoEvento'])){
		// 		$error[0] = "El campo es obligatorio";
		// 	}
		// 	echo "Numero de evento ".$_POST['tipoEvento'];
		// 	echo "<br>";

		// /*===== Validar Nombre evento =====*/
		// 	if (empty($_POST['nombreEvento'])) {
		// 		$error[1] = "El campo es obligatorio";
		// 	}
		// 	echo $_POST['nombreEvento'];
		// 	echo "<br>";

		// /*===== Validar Lugar evento =====*/
		// 	if (empty($_POST['lugarEvento'])) {
		// 		$error[2] = "El campo es obligatorio";
		// 	}
		// 	echo $_POST['lugarEvento'];
		// 	echo "<br>";

		// /*===== Validar Fecha inicio  del evento =====*/
		// 	if (empty($_POST['fIniEvento'])) {
		// 		$error[3] = "El campo es obligatorio";
		// 	}else{
		// 		$date = explode("-", $_POST['fIniEvento']);
		// 		$countDate =  count($date);
		// 		if ($countDate == 3 && checkdate($date[1], $date[2], $date[0])) {
		// 			echo "Inicio ".$_POST['fIniEvento'];
		// 			echo "<br>";
		// 		}else{
		// 			$error[3] = "El formato fecha es incorrecto";
		// 		}
		// 	}

		// /*===== Validar Fecha fin  del evento =====*/
		// 	if (empty($_POST['fFinEvento'])) {
		// 		$error[4] = "El campo es obligatorio";
		// 	}else{
		// 		$date = explode("-", $_POST['fFinEvento']);
		// 		$countDate =  count($date);
		// 		if ($countDate == 3 && checkdate($date[1], $date[2], $date[0])) {
		// 			if ($_POST['fFinEvento'] >= $_POST['fIniEvento']) {
		// 				echo "Fin ".$_POST['fFinEvento'];
		// 				echo "<br>";
		// 			}else{
		// 				$error[4] = "La fecha de finalización debe ser mayor o igual a la fecha de inicio";
		// 			}
		// 		}else{
		// 			$error[4] = "El formato fecha es incorrecto";
		// 		}
		// 	}

		// /*===== Validar hora del evento =====*/
		// 	if (empty($_POST['horaEvento'])) {
		// 		$error[5] = "El campo es obligatorio";
		// 	}
		// 	echo "Hora ".$_POST['horaEvento'];
		// 	echo "<br>";

		// /*===== Validar NUM TIC  del evento =====*/
		// 	if (!empty($_POST['numTICEvento'])){
		// 		if (!is_numeric($_POST['numTICEvento'])) {
		// 			$error[6] = "El campo debe ser numerico";
		// 		}
		// 	}
		// 	echo "El num TIC es: ".$_POST['numTICEvento'];
		// 	echo "<br>";
 
		// /*===== Validar Adjunto Adicionales =====*/
		// 	if (!empty($_FILES['adjInfoEvento']['name'])) {
		// 		if($_FILES['adjInfoEvento']['type'] == "application/zip"){
		// 			if ($_FILES['adjInfoEvento']['size'] > 8000000) {
		// 				$error[7] = "El archivo adjunto excede el tamaño permitido de 1MB";
		// 			}else{
		// 				echo $_FILES['adjInfoEvento']['type'];
		// 				echo $_FILES['adjInfoEvento']['size'];
		// 				echo $_FILES['adjInfoEvento']['name'];
		// 				echo $_FILES['adjInfoEvento']['tmp_name'];
		// 				echo "<br>";
		// 			}
		// 		}else{
		// 			$error[7] = "El archivo adjunto debe ser un ZIP de máximo 1MB";
		// 		}
		// 	}

		// /*===== Validar Cubrimiento Audiovisual Checked =====*/
		// 	$tipoCubAUEvento = array();
		// 	if (isset($_POST['tipoCubAUEvento']) || !empty($_POST['tipoCubAUEvento'])) {			
		// 		echo "Array de cubrimiento Audiovisual: ". $_POST['tipoCubAUEvento'];
		// 		echo "<br>";
		// 	}

		// /*===== Validar Cubrimiento WEB Radios Button =====*/
		// 	if (!empty($_POST['tipoCubWEbEvento'])) {
		// 		echo "Tipo web ".$_POST['tipoCubWEbEvento'];
		// 		echo "<br>";
		// 	}

		// /*===== Validar Justifcación web =====*/
		// 	if (!empty($_POST['jutifiCubWEbEvento'])) {
		// 		if (strlen($_POST['jutifiCubWEbEvento'])<=510) {
		// 			echo "Justi web: ".$_POST['jutifiCubWEbEvento'];
		// 			echo "<br>";
		// 		}else{
		// 			$error[8] = "Son máximo 500 caracteres";
		// 		}
		// 	}

		// /*===== Validar Adjunto Web =====*/
		// 	if (!empty($_FILES['adjCubWEbEvento']['name'])) {
		// 		if($_FILES['adjCubWEbEvento']['type'] == "application/zip"){
		// 			if ($_FILES['adjCubWEbEvento']['size'] > 8000000) {
		// 				$error[9] = "El archivo adjunto excede el tamaño permitido de 1MB";
		// 			}else{
		// 				echo $_FILES['adjCubWEbEvento']['type'];
		// 				echo $_FILES['adjCubWEbEvento']['size'];
		// 				echo $_FILES['adjCubWEbEvento']['name'];
		// 				echo $_FILES['adjCubWEbEvento']['tmp_name'];
		// 				echo "<br";
		// 			}
		// 		}else{
		// 			$error[9] = "El archivo adjunto debe ser un ZIP de máximo 1MB";
		// 		}
		// 	}

		
		//==========
		//PÁGINA DOS
		//==========

		/*===== Validar Adjunto Presupuesto=====*/
			if (!empty($_FILES['adjPresupuestoEvento']['name'])) {
				if($_FILES['adjPresupuestoEvento']['type'] == "application/pdf"){
					if ($_FILES['adjPresupuestoEvento']['size'] > 2000000) {
						$error[10] = "El archivo adjunto excede el tamaño permitido de 1MB";
					}else{
						echo $_FILES['adjPresupuestoEvento']['type'];
						echo $_FILES['adjPresupuestoEvento']['size'];
						echo $_FILES['adjPresupuestoEvento']['name'];
						echo $_FILES['adjPresupuestoEvento']['tmp_name'];
						echo "<br>";
					}
				}else{
					$error[10] = "El archivo adjunto debe ser un PDF de máximo 1MB";
				}
			}

		/*===== Validar Que existena Piezas impresas y digitales =====*/
			if (empty($_POST['selectPiezaIMPEvento'][0]) && empty($_POST['inputDIG'][0])) {
				$error[13] = "Debe seleccionar alguna de las opciones";
			}else{
				//Digitales
				if (!empty($_POST['inputDIG'][0])) {
					echo $c = count($_POST['inputDIG']);

					for ($i=0; $i < $c; $i++) { 
						$_POST['inputDIG'][$i];
					}
					
				}
			}


		/*===== Validar ADD Impresos Piezas =====*/


		/*===== Validar ADD Impresos Acaboados =====*/


		/*===== Validar ADD Impresos Tipo papel =====*/


		/*===== Validar Cantidad impresos =====*/


		/*===== Validar ADD Digitales =====*/


		//===========
		//PÁGINA TRES
		//===========

		// /*===== Validar Lineamientos graficos =====*/
		// 	if (!empty($_POST['lineamientoGraficos'])) {
		// 		if (strlen($_POST['lineamientoGraficos'])<=510) {
		// 			echo "Lineamientos ".$_POST['lineamientoGraficos'];
		// 			echo "<br>";
		// 		}else{
		// 			$error[11] = "Son máximo 500 caracteres";
		// 		}			
		// 	}

		// /*===== Validar Colores =====*/
		// 	if (!empty($_POST['colorEvento'])) {
		// 		echo "Array de colores: ".$_POST['colorEvento'];
		// 		echo "<br>";
		// 	}

		// /*===== Validar Publico Objetivo =====*/
		// 	if (!empty($_POST['checkPublicoObj'])) {
		// 		echo "Array de público objetivo: ".$_POST['checkPublicoObj'];
		// 		echo "<br>";
		// 	}

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
			// header("Location: ../../php/resumen/eventoResumen.php");
		}

	}
}else{
	header('Location:../../');
	echo "NO existen";
}
?>