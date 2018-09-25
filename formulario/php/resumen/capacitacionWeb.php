<?php
	session_start();
		set_time_limit(300);

	if ($_SESSION['home'] == 0) {
		header('Location:../../');
	}
	// session_destroy();

?>
<!DOCTYPE html>
<html lang="es">
<head>
	<!-- METAS -->
	<meta charset="UTF-8" />
	<title>Resumen Evento</title>
	<meta http-equiv="X-UA-Compatible" content="EDGE" />
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />	
	<meta name="description" content=""/>
	<meta name="keywords" content="">
	<meta name="author" content="John Alex Fandiño">

	<!-- LINK -->
	<link rel="shortcut icon" href="favicon.ico" />
	<link href="https://fonts.googleapis.com/css?family=Encode+Sans+Condensed|Righteous" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="../../css/main-min.css" />
</head>
<body>
<div class="content resumen">
	<h2>Resumen de solicitud de Sitios web - Capacitación Web</h2>
	<br>
	<div class="cuadricula">
		<div class="celda celdax2">
			<h3>Nombre del solicitante</h3>
			<p><?php echo $_SESSION['campoNombre'] ?></p>
		</div>
		<div class="celda celdax2">
			<h3>Email del solicitante</h3>
			<p><?php echo $_SESSION['campoEmail'] ?></p>
		</div>
	</div>
	<div class="cuadricula">
		<div class="celda celdax2">
			<h3>Departamento/Facultad del solicitante</h3>
			<p><?php echo $_SESSION['campoFacDep'] ?></p>
		</div>
		<div class="celda celdax2">
			<h3>Telefono de contacto del solicitante</h3>
			<p><?php echo $_SESSION['campoTel'] ?></p>
		</div>
	</div>
	<div class="cuadricula">
		<div class="celda celdax2">
			<h3>Nombre de la persona que tomara la capacitación</h3>
			<p><?php echo $_SESSION['nombreCapa'] ?></p>
		</div>
		<div class="celda celdax2">
			<h3>Telefono fijo de contacto</h3>
			<p><?php echo $_SESSION['numTelCapa'] ?></p>
		</div>
	</div>
	<div class="cuadricula">
		<div class="celda celdax2">
			<h3>Telefono celular de contacto</h3>
			<p><?php echo $_SESSION['numCelCapa'] ?></p>
		</div>
		<div class="celda celdax2">
			<h3>Correo institucional</h3>
			<p><?php echo $_SESSION['emailCapa'] ?></p>
		</div>
	</div>
	<div class="cuadricula">
		<div class="celda celdax2">
			<h3>Fecha (Sujeta a disponibilidad)</h3>
			<p><?php echo $_SESSION['fechaCapa'] ?></p>
		</div>
		<div class="celda celdax2">
			<h3>Hora (Sujeta a disponibilidad)</h3>
			<p><?php echo $_SESSION['horaCapa'] ?></p>
		</div>
	</div>
	<div class="cuadricula">
		<div class="celda">
			<h3>Motivo de la capacitación</h3>
			<p><?php echo $_SESSION['motivoCapa'] ?></p>
		</div>
	</div>
	<div class="cuadricula">
		<a class="btn btn-world" href="../../solicitud/unidadDigital/website.php">Atras</a>
		<a class="btn btn-send" href="#">Enviar Solicitud</a>
	</div>
</div>
</body>
</html>