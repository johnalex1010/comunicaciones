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
		$id_subCategoria = 3;
		$id_fase = 1;
		$fecha = date('Y-m-d');
		$comentario = 'Ingresa la Solicitud - Mensaje generado por el sistema.';

		$nombreDoliente = $_POST['condoNombre'];
		$cargo = $_POST['condoCargo'];
		$idfacDepCondo = $_POST['condoFacDep'];
		$nombreFallecido = $_POST['condoFalle'];
		$parentesco = $_POST['condoParen'];
		$lugarVelacion = $_POST['condoLugarVel'];
		$fechaVelacion = $_POST['condoFVela'];
		$horaVelacion = $_POST['condoHVela'];
		
		$in = 'CALL in_SolicitudCondo("'.$newST.'","'.$nombre.'","'.$email.'","'.$id_facDep.'","'.$telefono.'","'.$id_usuario.'","'.$id_unidad.'","'.$id_categoria.'","'.$id_subCategoria.'","'.$id_fase.'","'.$fecha.'","'.$comentario.'","'.$nombreDoliente.'","'.$cargo.'","'.$idfacDepCondo.'","'.$nombreFallecido.'","'.$parentesco.'","'.$lugarVelacion.'","'.$fechaVelacion.'","'.$horaVelacion.'")';
		$insert = $conexion->query($in); //Ejecuto el procedimiento
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
				
				//Envio de correo -- solicitudes@usantotomas.edu.co
				include '../../../mailer/e_solicitud.php';

				if($exito){
					//Redirección al resumen.
					header('Location:../../php/resumen/condolencias.php');
				}
			}
		}else{
			echo "Error en la creación de la solicitud, por favor";
			session_destroy();
		}
	}else{
		echo "Error en la creación de la solicitud, por favor";
		session_destroy();
	}




?>


