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
		$id_categoria = 4;
		$id_subCategoria = 13;
		$id_fase = 1;
		$fecha = date('Y-m-d');
		$comentario = 'Ingresa la Solicitud';

		echo $_FILES['adjAprobMate']['type'];
		echo $_FILES['adjAprobMate']['size'];
		echo $_FILES['adjAprobMate']['name'];
		echo $_FILES['adjAprobMate']['tmp_name'];
		$adjunto = $_FILES['adjAprobMate']['name'];

		$nomAprobMate = $_POST['checkAprobMate'];
		$count = count($nomAprobMate);
		

		for ($i=0; $i < $count; $i++) { 
			//LLamo el pricedimiento almacenado
			$am = $nomAprobMate[$i];
			$in = 'CALL in_SolicitudAprobMate("'.$newST.'","'.$nombre.'","'.$email.'","'.$id_facDep.'","'.$telefono.'","'.$id_usuario.'","'.$id_unidad.'","'.$id_categoria.'","'.$id_subCategoria.'","'.$id_fase.'","'.$fecha.'","'.$comentario.'","'.$adjunto.'","'.$am.'")';
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
				move_uploaded_file($_FILES['adjAprobMate']['tmp_name'], $folder."/".$_FILES['adjAprobMate']['name']);

				//Envio de correo -- solicitudes@usantotomas.edu.co
				include '../../../mailer/e_solicitud.php';

				if($exito){
					//Redirección al resumen.
					header('Location:../../php/resumen/aprobacionMaterial.php');
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