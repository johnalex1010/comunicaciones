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
		$id_unidad = 1;
		$id_categoria = 3;
		$id_subCategoria = 2;
		$id_fase = 1;
		$fecha = date('Y-m-d');
		$comentario = 'Ingresa la Solicitud - Mensaje generado por el sistema.';


		for ($i=0; $i < 2 ; $i++) { 
			$_FILES['tn']['type'][$i];
			$_FILES['tn']['size'][$i];
			$_FILES['tn']['name'][$i];
			$_FILES['tn']['tmp_name'][$i];
		}
		$adjunto = array();
		$adjunto = $_FILES['tn']['name'];
		$count = count($_FILES['tn']['name']);

		for ($i=0; $i < $count; $i++) {
			$adj = $adjunto[$i];
			$in = 'CALL in_SolicitudADJ("'.$newST.'","'.$nombre.'","'.$email.'","'.$id_facDep.'","'.$telefono.'","'.$id_usuario.'","'.$id_unidad.'","'.$id_categoria.'","'.$id_subCategoria.'","'.$id_fase.'","'.$fecha.'","'.$comentario.'","'.$adj.'")';
			$insert = $conexion->query($in); //Ejecuto el procedimiento
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

				for ($i=0; $i < 2; $i++) { 
					move_uploaded_file($_FILES['tn']['tmp_name'][$i], $folder."/".$_FILES['tn']['name'][$i]);
				}
				//Envio de correo -- solicitudes@usantotomas.edu.co
				include '../../../mailer/e_solicitud.php';

				if($exito){
					//Redirección al resumen.
					header('Location:../../php/resumen/tomasNoticias.php');
				}
			}
		}else{
			echo "Error en la creación de la solicitud, por favor";
			session_destroy();
		}
	}else{
		echo "Error en la creación de la solicitud, por favor";
	}
?>