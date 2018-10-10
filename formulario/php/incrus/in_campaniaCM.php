<?php
	session_start();

	if ($_SESSION['home'] == 0) {
		header('Location:../../');
	}
	
	include_once '../conexion.php';
	include_once '../funciones/campos.php';


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
		$comentario = 'Ingresa la Solicitud';

		$nombreCam = $_SESSION['nomCampa'];
		$justificacion = $_SESSION['justiCampa'];
		$objetivo = $_SESSION['objCampa'];	
		$fechaHoraIni = $_SESSION['fIniCampa'];
		$fechaHoraFin = $_SESSION['fFinCampa'];
		$palabrasClaves = $_SESSION['keyCama'];
		$_FILES['ajdImgCampa']['type'] = 		$_SESSION['ajdImgCampa1'];
		$_FILES['ajdImgCampa']['size'] = 		$_SESSION['ajdImgCampa2'];
		$_FILES['ajdImgCampa']['name'] = 		$_SESSION['ajdImgCampa3'];
		$_FILES['ajdImgCampa']['tmp_name'] = 	$_SESSION['ajdImgCampa4'];
		$adjunto = $_FILES['ajdImgCampa']['name'];
		$id_objPublico = array();
		$id_objPublico = $_SESSION['checkPublicoObj'];
		$count = count($id_objPublico);


		for ($i=0; $i < $count; $i++) { 
			//LLamo el pricedimiento almacenado
			$a = "SELECT id_objPublico FROM t_objpublico WHERE id_objPublico=".$id_objPublico[$i]."";
			$ra = $conexion->query($a);
			$rowa = mysqli_fetch_row($ra);
			$public = $rowa[0];
			$in = 'CALL in_SolicitudCampaniaCM("'.$newST.'","'.$nombre.'","'.$email.'","'.$id_facDep.'","'.$telefono.'","'.$id_usuario.'","'.$id_unidad.'","'.$id_categoria.'","'.$id_subCategoria.'","'.$id_fase.'","'.$fecha.'","'.$comentario.'","'.$nombreCam.'","'.$justificacion.'","'.$objetivo.'","'.$fechaHoraIni.'","'.$fechaHoraFin.'","'.$palabrasClaves.'","'.$adjunto.'","'.$public.'")';
			$insert = $conexion->query($in); //Ejecuto el procedimiento
		}

		echo codigoSeguimiento($newST);

		//La eliminación de Sesión y cierre de conexión se debe hacer al final del envio de correo a solicitudes@usantotomas.edu.co
		mysqli_close($conexion);
		session_destroy();
	}else{
		echo "Error en la creación de la solicitud, por favor";
	}




?>


