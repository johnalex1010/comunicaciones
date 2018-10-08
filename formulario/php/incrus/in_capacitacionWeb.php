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
		$id_categoria = 5;
		$id_subCategoria = 9;
		$id_fase = 1;
		$fecha = date('Y-m-d');
		$comentario = 'Ingresa la Solicitud';

		$nomPersona = $_SESSION['nombreCapa'];
		$telefonoExt = $_SESSION['numTelCapa'];
		$numCelular = $_SESSION['numCelCapa'];
		$email = $_SESSION['emailCapa'];
		$fechaCW = $_SESSION['fechaCapa'];
		$horaCW = $_SESSION['horaCapa'];
		$txtMotivo = $_SESSION['motivoCapa'];

		$in = 'CALL in_SolicitudCapaWeb("'.$newST.'","'.$nombre.'","'.$email.'","'.$id_facDep.'","'.$telefono.'","'.$id_usuario.'","'.$id_unidad.'","'.$id_categoria.'","'.$id_subCategoria.'","'.$id_fase.'","'.$fecha.'","'.$comentario.'","'.$nomPersona.'","'.$telefonoExt.'","'.$numCelular.'","'.$email.'","'.$fechaCW.'","'.$horaCW.'","'.$txtMotivo.'")';
		$insert = $conexion->query($in); //Ejecuto el procedimiento	

		echo codigoSeguimiento($newST);

		//La eliminación de Sesión y cierre de conexión se debe hacer al final del envio de correo a solicitudes@usantotomas.edu.co
		mysqli_close($conexion);
		session_destroy();
	}else{
		echo "Error en la creación de la solicitud, por favor";
	}




?>


