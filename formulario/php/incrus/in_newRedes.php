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
		$id_subCategoria = 10;
		$id_fase = 1;
		$fecha = date('Y-m-d');
		$comentario = 'Ingresa la Solicitud';

		$nomPerfil = $_SESSION['nombreNewPerfil'];
		$emailPersonal = $_SESSION['emailNewPerfil']; 
		$descripcion = $_SESSION['descNewRed'];
		$direccion = $_SESSION['dirNewRed'];
		$telPerfil = $_SESSION['numTelNewRed'];	
		$emailPerfil = $_SESSION['emailNewPerfil2'];
		$_FILES['adjAprobMate']['type'] = 		$_SESSION['adjImgNewRed1'];
		$_FILES['adjAprobMate']['size'] = 		$_SESSION['adjImgNewRed2'];
		$_FILES['adjAprobMate']['name'] = 		$_SESSION['adjImgNewRed3'];
		$_FILES['adjAprobMate']['tmp_name'] = 	$_SESSION['adjImgNewRed4'];
		$adjunto = $_FILES['adjAprobMate']['name'];
		$id_tipoRedSocial = array();
		$id_tipoRedSocial = $_SESSION['checkNewRedes'];
		$count = count($id_tipoRedSocial);


		for ($i=0; $i < $count; $i++) { 
			//LLamo el pricedimiento almacenado
			$a = "SELECT id_tipoRedSocial FROM t_tiporedsocial WHERE id_tipoRedSocial=".$id_tipoRedSocial[$i]."";
			$ra = $conexion->query($a);
			$rowa = mysqli_fetch_row($ra);
			$rs = $rowa[0];
			$in = 'CALL in_SolicitudNewRedSocial("'.$newST.'","'.$nombre.'","'.$email.'","'.$id_facDep.'","'.$telefono.'","'.$id_usuario.'","'.$id_unidad.'","'.$id_categoria.'","'.$id_subCategoria.'","'.$id_fase.'","'.$fecha.'","'.$comentario.'","'.$nomPerfil.'","'.$emailPersonal.'","'.$descripcion.'","'.$direccion.'","'.$telPerfil.'","'.$emailPerfil.'","'.$adjunto.'","'.$rs.'")';
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


