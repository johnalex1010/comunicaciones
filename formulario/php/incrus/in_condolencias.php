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
		$id_unidad = 1;
		$id_categoria = 3;
		$id_subCategoria = 3;
		$id_fase = 1;
		$fecha = date('Y-m-d');
		$comentario = 'Ingresa la Solicitud';

		$nombreDoliente = 'Nombre Velción';
		$cargo = $_SESSION['condoCargo'];
		$idfacDepCondo = $_SESSION['condoFacDep'];
		$nombreFallecido = $_SESSION['condoFalle'];
		$parentesco = $_SESSION['condoParen'];
		$lugarVelacion = $_SESSION['condoLugarVel'];
		$fechaVelacion = $_SESSION['condoFVela'];
		$horaVelacion = $_SESSION['condoHVela'];
		
		$in = 'CALL in_SolicitudCondo("'.$newST.'","'.$nombre.'","'.$email.'","'.$id_facDep.'","'.$telefono.'","'.$id_usuario.'","'.$id_unidad.'","'.$id_categoria.'","'.$id_subCategoria.'","'.$id_fase.'","'.$fecha.'","'.$comentario.'","'.$nombreDoliente.'","'.$cargo.'","'.$idfacDepCondo.'","'.$nombreFallecido.'","'.$parentesco.'","'.$lugarVelacion.'","'.$fechaVelacion.'","'.$horaVelacion.'")';
		$insert = $conexion->query($in); //Ejecuto el procedimiento


		echo codigoSeguimiento($newST);

		//La eliminación de Sesión y cierre de conexión se debe hacer al final del envio de correo a solicitudes@usantotomas.edu.co
		mysqli_close($conexion);
		session_destroy();
	}else{
		echo "Error en la creación de la solicitud, por favor";
	}




?>


