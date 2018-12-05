<?php
	session_start();

	if ($_SESSION['home'] == 0) {
		header('Location:../../');
	}
	
	include_once '../../php/conexion.php';
	include_once '../../php/variables.php';
	include_once '../../php/funciones/campos.php';


	//Insertar ST. Solicitud de Capacitación Web
	$selecFINNumST = "SELECT MAX(numST) FROM t_solicitud ORDER BY numST DESC"; // Selescciona la ultima ST igresada en la BD
	$rst = $conexion->query($selecFINNumST);

	if ($row = mysqli_fetch_row($rst)) {
		$stOLD = $row[0];
		$newST = consecutivoST($stOLD);
		$nombre = $_SESSION['campoNombre'];
		$email = $_SESSION['campoEmail'];
		$id_facDep = $_SESSION['campoFacDep'];
		$telefono = $_SESSION['campoTel'];
		$id_usuario = 1;
		$id_unidad = 3;
		$id_categoria = 6;
		$id_subCategoria = 11;
		$id_fase = 1;
		$fecha = date('Y-m-d');
		$comentario = 'Ingresa la Solicitud - Mensaje generado por el sistema.';
		$nombreCam = $_POST['nomCampa'];
		$justificacion = $_POST['justiCampa'];
		$objetivo = $_POST['objCampa'];
		$descripcion = $_POST['descripCampa'];
		$fechaHoraIni = $_POST['fIniCampa'];
		$fechaHoraFin = $_POST['fFinCampa'];
		$palabrasClaves = $_POST['keyCampa'];
		$_FILES['ajdImgCampa']['type'];
		$_FILES['ajdImgCampa']['size'];
		$_FILES['ajdImgCampa']['name'];	
		$_FILES['ajdImgCampa']['tmp_name'];
		$adjunto = $_FILES['ajdImgCampa']['name'];
		$id_objPublico = array();
		$id_objPublico = $_POST['checkPublicoObj'];
		$count = count($id_objPublico);


		for ($i=0; $i < $count; $i++) { 
			//LLamo el pricedimiento almacenado
			$a = "SELECT id_objPublico FROM t_objpublico WHERE id_objPublico=".$id_objPublico[$i]."";
			$ra = $conexion->query($a);
			$rowa = mysqli_fetch_row($ra);
			$public = $rowa[0];
			$in = 'CALL in_SolicitudCampaniaCM("'.$newST.'","'.$nombre.'","'.$email.'","'.$id_facDep.'","'.$telefono.'","'.$id_usuario.'","'.$id_unidad.'","'.$id_categoria.'","'.$id_subCategoria.'","'.$id_fase.'","'.$fecha.'","'.$comentario.'","'.$nombreCam.'","'.$justificacion.'","'.$objetivo.'","'.$descripcion.'","'.$fechaHoraIni.'","'.$fechaHoraFin.'","'.$palabrasClaves.'","'.$public.'")';
			$insert = $conexion->query($in); //Ejecuto el procedimiento
		}

		//Condiciones para poder agregar los array de forma independiente
		$selecNumST = "SELECT numST FROM t_solicitud WHERE numST=".$newST; // Busca que ya este la nueva ST
		$rstNumST = $conexion->query($selecFINNumST);
		$select= mysqli_fetch_row($rstNumST);

		if ($select[0] == $newST) {
			if (!empty($adjunto)) {
				$inADJ = 'INSERT INTO t_adjunto(numST, adjunto) VALUES ("'.$newST.'","'.$adjunto.'")';
				$rstADJ = $conexion->query($inADJ);
			}
		}else{
			mysqli_close($conexion);
			echo "No Funciono";
		}

		mysqli_close($conexion);

		$_SESSION['numST'] = $newST;

		//Se pregunta si exíste la consulta
		if (isset($insert)) {
			$folderST = $newST;
			$folder = $rutaDestinoST.$folderST;
			
			// Se pregunta si no exíste la carpeta a crear
			if (!file_exists($folder)) {
				//Se crea la carpeta e ingresan los adjuntos
				$newFolderST = mkdir("$rutaDestinoST$folderST", 0777);
				move_uploaded_file($_FILES['ajdImgCampa']['tmp_name'], $folder."/".$_FILES['ajdImgCampa']['name']);

				//Envio de correo -- solicitudes@usantotomas.edu.co
				include '../../../mailer/e_solicitud.php';

				if($exito){
					//Redirección al resumen.
					header('Location:../../php/resumen/campaniaCM.php');
				}
			}
		}else{
			echo "Error en la creación de la solicitud, por favor";
			// session_destroy();
		}		
	}else{
		echo "Error en la creación de la solicitud, por favor";
		// session_destroy();
	}
?>