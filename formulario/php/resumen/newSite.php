<?php
	session_start();
		set_time_limit(300);

	if ($_SESSION['home'] == 0) {
		header('Location:../../');
	}
	// session_destroy();
	include_once '../conexion.php';
	//Insertar ST. Solicitud de Capacitación Web
	$facDep = "SELECT facDep FROM t_facdep WHERE id_facDep =".$_SESSION['campoFacDep']; // Selescciona la ultima ST igresada en la BD
	$rst = $conexion->query($facDep);
	$row = mysqli_fetch_row($rst);
	$facDep = $row[0];

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
	<h2>Resumen de solicitud de Sitios web - Nuevo Sitio</h2>
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
			<p><?php echo $facDep; ?></p>
		</div>
		<div class="celda celdax2">
			<h3>Telefono de contacto del solicitante</h3>
			<p><?php echo $_SESSION['campoTel'] ?></p>
		</div>
	</div>
	<div class="cuadricula">
		<div class="celda celdax2">
			<h3>Nombre del evento</h3>
			<p><?php echo $_SESSION['nombreEventWeb'] ?></p>
		</div>
		<div class="celda celdax2">
			<h3>Subdominio</h3>
			<p><?php echo $_SESSION['subdominio'] ?></p>
		</div>
	</div>
	<div class="cuadricula">
		<div class="celda celdax2">
			<h3>Contendio de plan de navegación y linea gráfica (Adjutno)</h3>
			<p><?php echo $_SESSION['adjPlanNav3'] = (!empty($_SESSION['adjPlanNav3'])) ? $_SESSION['adjPlanNav3'] : "No hay Adjunto";?></p>
		</div>
		<div class="celda celdax2">
			<h3>Motivo por el cual debe ser creado.</h3>
			<p><?php echo $_SESSION['motivoNewWeb'] ?></p>
		</div>
	</div>
	<div class="cuadricula">
		<a class="btn btn-world" href="../../solicitud/unidadDigital/website.php">Atras</a>
		<a class="btn btn-send" href="../incrus/in_newSite.php">Enviar Solicitud</a>
	</div>
</div>
</body>
</html>