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

		/*===== Validar Tipo Evento =====*/
		if (!isset($_POST['tipoEvento']) || empty($_POST['tipoEvento'])){
			$error[0] = "El campo es obligatorio";
		}else{
			$_SESSION['tipoEvento'] = $_POST['tipoEvento'];
		}

		/*===== Validar Nombre evento =====*/
		if (!isset($_POST['nombreEvento']) || empty($_POST['nombreEvento'])) {
			$error[1] = "El campo es obligatorio";
		}else{
			$_SESSION['nombreEvento'] = $_POST['nombreEvento'];
		}

		/*===== Validar Lugar evento =====*/
		if (!isset($_POST['lugarEvento']) || empty($_POST['lugarEvento'])) {
			$error[2] = "El campo es obligatorio";
		}else{
			$_SESSION['lugarEvento'] = $_POST['lugarEvento'];
		}

		/*===== Validar Fecha inicio  del evento =====*/
		if (!isset($_POST['fIniEvento']) || empty($_POST['fIniEvento'])) {
			$error[3] = "El campo es obligatorio";
		}else{
			$_POST['fIniEvento'];
			$date = explode("-", $_POST['fIniEvento']);
			$countDate =  count($date);
			if ($countDate == 3 && checkdate($date[1], $date[2], $date[0])) {
				$_SESSION['fIniEvento'] = $_POST['fIniEvento'];
			}else{
				$error[3] = "El formato fecha es incorrecto";
			}
		}

		/*===== Validar Fecha fin  del evento =====*/
		if (!isset($_POST['fFinEvento']) || empty($_POST['fFinEvento'])) {
			$error[4] = "El campo es obligatorio";
		}else{
			$_POST['fFinEvento'];
			$date = explode("-", $_POST['fFinEvento']);
			$countDate =  count($date);
			if ($countDate == 3 && checkdate($date[1], $date[2], $date[0])) {
				if ($_POST['fFinEvento'] >= $_POST['fIniEvento']) {
					$_SESSION['fFinEvento'] = $_POST['fFinEvento'];
				}else{
					$error[4] = "La fecha de finalización debe ser mayor o igual a la fecha de inicio";
				}
			}else{
				$error[4] = "El formato fecha es incorrecto";
			}

		}

		/*===== Validar hora del evento =====*/
		if (!isset($_POST['horaEvento']) || empty($_POST['horaEvento'])) {
			$error[5] = "El campo es obligatorio";
		}else{
			$_SESSION['horaEvento'] = $_POST['horaEvento'];
		}

		/*===== Validar NUM TIC  del evento =====*/
		if (!empty($_POST['numTICEvento'])){
			if (is_numeric($_POST['numTICEvento'])) {
				$_SESSION['numTICEvento'] = $_POST['numTICEvento'];
			}else{
				$error[6] = "El campo debe ser numerico";
			}
		}else{
			unset($_SESSION['numTICEvento']);
		}
 
		/*===== Validar Adjunto Adicionales =====*/
		if (!empty($_FILES['adjInfoEvento']['name'])) {
			if($_FILES['adjInfoEvento']['type'] == "application/zip"){
				if ($_FILES['adjInfoEvento']['size'] > 8000000) {
					$error[7] = "El archivo adjunto excede el tamaño permitido de 1MB";
				}else{
					$_SESSION['adjInfoEvento1'] = $_FILES['adjInfoEvento']['type'];			
					$_SESSION['adjInfoEvento2'] = $_FILES['adjInfoEvento']['size'];			
					$_SESSION['adjInfoEvento3'] = $_FILES['adjInfoEvento']['name'];			
					$_SESSION['adjInfoEvento4'] = $_FILES['adjInfoEvento']['tmp_name'];
				}
			}else{
				$error[7] = "El archivo adjunto debe ser un ZIP de máximo 1MB";
			}
		}

		/*===== Validar Cubrimiento Audiovisual Checked =====*/
		$tipoCubAUEvento = array();
		if (isset($_POST['tipoCubAUEvento']) || !empty($_SESSION['tipoCubAUEvento'])) {
			unset( $_SESSION["echoTCA"] );
			$_SESSION['tipoCubAUEvento'] = $_POST['tipoCubAUEvento'];
			$tipoCubAUEvento = $_SESSION['tipoCubAUEvento'];
			$TCAcount = count($tipoCubAUEvento);
			for ($tcacont=0; $tcacont < $TCAcount; $tcacont++) { 
				$_SESSION['echoTCA'] .= $tipoCubAUEvento[$tcacont]."<br>";	
			}
		}else{
			unset( $_SESSION["echoTCA"] );
			unset( $_SESSION["tipoCubAUEvento"] );
		}

		/*===== Validar Cubrimiento WEB Radios Button =====*/
		if (!empty($_POST['tipoCubWEbEvento'])) {
			$_SESSION['tipoCubWEbEvento'] = $_POST['tipoCubWEbEvento'];	
		}

		/*===== Validar Justifcación web =====*/
		if (isset($_POST['jutifiCubWEbEvento'])) {
			unset( $_SESSION["jutifiCubWEbEvento"] );
			if (strlen($_POST['jutifiCubWEbEvento'])<=510) {
				$_SESSION['jutifiCubWEbEvento'] = $_POST['jutifiCubWEbEvento'];
			}else{
				$_SESSION['jutifiCubWEbEvento'] = $_POST['jutifiCubWEbEvento'];
				$error[8] = "Son máximo 500 caracteres";
			}
		}

		/*===== Validar Adjunto Web =====*/
		if (!empty($_FILES['adjCubWEbEvento']['name'])) {
			if($_FILES['adjCubWEbEvento']['type'] == "application/zip"){
				if ($_FILES['adjCubWEbEvento']['size'] > 8000000) {
					$error[9] = "El archivo adjunto excede el tamaño permitido de 1MB";
				}else{
					$_SESSION['adjCubWEbEvento1'] = $_FILES['adjCubWEbEvento']['type'];			
					$_SESSION['adjCubWEbEvento2'] = $_FILES['adjCubWEbEvento']['size'];			
					$_SESSION['adjCubWEbEvento3'] = $_FILES['adjCubWEbEvento']['name'];			
					$_SESSION['adjCubWEbEvento4'] = $_FILES['adjCubWEbEvento']['tmp_name'];
				}
			}else{
				$error[9] = "El archivo adjunto debe ser un ZIP de máximo 1MB";
			}
		}

		/*===== Validar Adjunto Presupuesto=====*/
		if (!empty($_FILES['adjPresupuestoEvento']['name'])) {
			if($_FILES['adjPresupuestoEvento']['type'] == "application/pdf"){
				if ($_FILES['adjPresupuestoEvento']['size'] > 2000000) {
					$error[10] = "El archivo adjunto excede el tamaño permitido de 1MB";
				}else{
					$_SESSION['adjPresupuestoEvento1'] = $_FILES['adjPresupuestoEvento']['type'];			
					$_SESSION['adjPresupuestoEvento2'] = $_FILES['adjPresupuestoEvento']['size'];			
					$_SESSION['adjPresupuestoEvento3'] = $_FILES['adjPresupuestoEvento']['name'];			
					$_SESSION['adjPresupuestoEvento4'] = $_FILES['adjPresupuestoEvento']['tmp_name'];
				}
			}else{
				$error[10] = "El archivo adjunto debe ser un PDF de máximo 1MB";
			}
		}
		/*===== Validar Que existena Piezas impresas y digitales =====*/
		// $selectPiezaIMPEvento = array();
		// $tipoPapelIMPEvento = array();
		if (empty($_POST['selectPiezaIMPEvento'][0]) && empty($_POST['tipoDIGEvento'][0])) {
			$error[13] = "Debe seleccionar alguna de las opciones";
		}


		/*===== Validar ADD Impresos Piezas =====*/
		$selectPiezaIMPEvento = array();
		if (isset($_POST['selectPiezaIMPEvento'])) {
			unset( $_SESSION["echoSPI"] );
			$_SESSION['selectPiezaIMPEvento'] = $_POST['selectPiezaIMPEvento'];
			$selectPiezaIMPEvento = $_SESSION['selectPiezaIMPEvento'];
			$SPIcount = count($selectPiezaIMPEvento);
			for ($spicont=0; $spicont < $SPIcount; $spicont++) { 
				$_SESSION['echoSPI'] .= $selectPiezaIMPEvento[$spicont]."<br>";	
			}
		}else{
			unset( $_SESSION['selectPiezaIMPEvento'] );
		}

		/*===== Validar ADD Impresos Acaboados =====*/
		$acabadoIMPEvento = array();
		if (isset($_POST['acabadoIMPEvento'])) {
			unset( $_SESSION["echoSAI"] );
			$_SESSION['acabadoIMPEvento'] = $_POST['acabadoIMPEvento'];
			$acabadoIMPEvento = $_SESSION['acabadoIMPEvento'];
			$SAIcount = count($acabadoIMPEvento);
			for ($saicont=0; $saicont < $SAIcount; $saicont++) { 
				$_SESSION['echoSAI'] .= $acabadoIMPEvento[$saicont]."<br>";	
			}
		}else{
			unset( $_SESSION['acabadoIMPEvento'] );
		}

		/*===== Validar ADD Impresos Tipo papel =====*/
		$tipoPapelIMPEvento = array();
		if (isset($_POST['tipoPapelIMPEvento'])) {
			unset( $_SESSION["echoSTPI"] );
			$_SESSION['tipoPapelIMPEvento'] = $_POST['tipoPapelIMPEvento'];
			$tipoPapelIMPEvento = $_SESSION['tipoPapelIMPEvento'];
			$STPIcount = count($tipoPapelIMPEvento);
			for ($stpicont=0; $stpicont < $STPIcount; $stpicont++) { 
				$_SESSION['echoSTPI'] .= $tipoPapelIMPEvento[$stpicont]."<br>";	
			}
		}else{
			unset( $_SESSION['tipoPapelIMPEvento'] );
		}

		/*===== Validar Cantidad impresos =====*/
		if (isset($_POST['cantidadIMPEvento']) && !empty($_POST['cantidadIMPEvento'])) {
			unset( $_SESSION["cantidadIMPEvento"] );
			$_SESSION['cantidadIMPEvento'] = $_POST['cantidadIMPEvento'];
			$cantidadIMPEvento = $_SESSION['cantidadIMPEvento'];
			$countCant = count($cantidadIMPEvento);
			if($countCant == 0){
				unset( $_SESSION['cantidadIMPEvento']);
			}else{
				for ($cantcont=0; $cantcont < $countCant; $cantcont++) {
					if (empty($_POST['cantidadIMPEvento'][$cantcont])) {
						$_SESSION['echoSCPI'][$cantcont] .= $cantidadIMPEvento[$cantcont]."<br>";
					}else{
						if (is_numeric($_POST['cantidadIMPEvento'][$cantcont])) {
							$_SESSION['echoSCPI'][$cantcont] .= $cantidadIMPEvento[$cantcont]."<br>";
						}else{
							$error[12] = "Debe ser númerico";
						}
					}				
				}
			}				
		}else{
			unset( $_SESSION['cantidadIMPEvento'] );
		}

		/*===== Validar ADD Digitales =====*/
		$tipoDIGEvento = array();
		if (isset($_POST['tipoDIGEvento'])) {
			unset( $_SESSION["echoSPD"] );
			$_SESSION['tipoDIGEvento'] = $_POST['tipoDIGEvento'];
			$tipoDIGEvento = $_SESSION['tipoDIGEvento'];
			$SPDcount = count($tipoDIGEvento);
			for ($spdcont=0; $spdcont < $SPDcount; $spdcont++) { 
				$_SESSION['echoSPD'] .= $tipoDIGEvento[$spdcont]."<br>";	
			}
		}else{
			unset( $_SESSION['tipoDIGEvento'] );
		}

		/*===== Validar Lineamientos graficos =====*/
		if (isset($_POST['lineamientoGraficos'])) {
			unset( $_SESSION["lineamientoGraficos"] );
			if (strlen($_POST['lineamientoGraficos'])<=510) {
				$_SESSION['lineamientoGraficos'] = $_POST['lineamientoGraficos'];
			}else{
				$_SESSION['lineamientoGraficos'] = $_POST['lineamientoGraficos'];
				$error[11] = "Son máximo 500 caracteres";
			}			
		}

		/*===== Validar Colores =====*/
		$colorEvento = array();
		if (isset($_POST['colorEvento'])) {
			unset( $_SESSION["echoColor"] );
			$_SESSION['colorEvento'] = $_POST['colorEvento'];
			$colorEvento = $_SESSION['colorEvento'];
			$colorcount = count($colorEvento);
			for ($colorcont=0; $colorcont < $colorcount; $colorcont++) {
				$_SESSION['echoColor'] .= $colorEvento[$colorcont]."<br>";				
			}
		}else{
			unset( $_SESSION['colorEvento'] );
		}
		/*===== Validar Publico Objetivo =====*/
		$checkPublicoObj = array();
		if (isset($_POST['checkPublicoObj'])) {
			unset( $_SESSION["echoPO"] );
			$_SESSION['checkPublicoObj'] = $_POST['checkPublicoObj'];
			$checkPublicoObj = $_SESSION['checkPublicoObj'];
			$POcount = count($checkPublicoObj);
			for ($pocont=0; $pocont < $POcount; $pocont++) {
				$_SESSION['echoPO'] .= $checkPublicoObj[$pocont]."<br>";
			}
		}else{
			unset( $_SESSION['checkPublicoObj'] );
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
			header("Location: ../../php/resumen/eventoResumen.php");
		}

	}else{
		//echo  "no post evetno";
	}
}else{
	header('Location:../../');
	echo "NO existen";
}
?>