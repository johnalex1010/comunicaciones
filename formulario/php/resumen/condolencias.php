<?php
	session_start();
		set_time_limit(300);

	if ($_SESSION['home'] == 0) {
		header('Location:../../');
	}
	// session_destroy();
	include_once '../conexion.php';
	//Insertar ST. Solicitud de Capacitación Web
	$facDep = "SELECT facDep FROM t_facdep WHERE id_facDep =".$_SESSION['campoFacDep'];
	$facDepCondo = "SELECT facDep FROM t_facdep WHERE id_facDep =".$_SESSION['condoFacDep'];
	$rst = $conexion->query($facDep);
	$rstCondo = $conexion->query($facDepCondo);
	$row = mysqli_fetch_row($rst);
	$rowCondo = mysqli_fetch_row($rstCondo);
	$facDep = $row[0];
	$facDepCondo = $rowCondo[0];

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
	<h2>Resumen de solicitud de Comunicaciones Internas - Condolencias</h2>
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
			<p><?php echo $facDep ?></p>
		</div>
		<div class="celda celdax2">
			<h3>Telefono de contacto del solicitante</h3>
			<p><?php echo $_SESSION['campoTel'] ?></p>
		</div>
	</div>
	<div class="cuadricula">
		<div class="celda celdax3">
			<h3>Nombre del administrativo o estudiante</h3>
			<p><?php echo $_SESSION['condoNombre'] ?></p>
		</div>
		<div class="celda celdax3">
			<h3>Cargo</h3>
			<p><?php echo $_SESSION['condoCargo'] ?></p>
		</div>
		<div class="celda celdax3">
			<h3>Facultad / Dependencia</h3>
			<p><?php echo $facDepCondo ?></p>
		</div>	
	</div>
	<div class="cuadricula">
		<div class="celda celdax3">
			<h3>Nombre del facllecido</h3>
			<p><?php echo $_SESSION['condoFalle'] ?></p>
		</div>
		<div class="celda celdax3">
			<h3>Parentesco</h3>
			<p><?php echo $_SESSION['condoParen'] ?></p>
		</div>
		<div class="celda celdax3">
			<h3>Lugar de velación</h3>
			<p><?php echo $_SESSION['condoLugarVel'] ?></p>
		</div>
	</div>
	<div class="cuadricula">
		<div class="celda celdax2">
			<h3>Fecha de velación</h3>
			<p><?php echo $_SESSION['condoFVela'] ?></p>
		</div>
		<div class="celda celdax2">
			<h3>Hora de velación</h3>
			<p><?php echo $_SESSION['condoHVela'] ?></p>
		</div>
	</div>
	<div class="cuadricula">
		<a class="btn btn-world" href="../../solicitud/unidadComIns/comInter.php">Atras</a>
		<a class="btn btn-send" href="../incrus/in_condolencias.php">Enviar Solicitud</a>
	</div>
</div>
</body>
</html>