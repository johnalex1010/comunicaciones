<!DOCTYPE html>
<html lang="es">
<head>
	<!-- METAS -->
	<meta charset="UTF-8" />
	<title>Solicitudes | Departamento de Comunicaciones</title>
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

	<div class="content msjFinal">		
		<img src="../../img/logo.png" alt="Logo" class="logoComunica">
		<h1 class="hMsjFinal">GRACIAS</h1>
		<p class="pMsjFinal">Para seguir el estado de su solicitud, utlice el siguiente código:</p>
		<div class="btn btn-send btn-msjFinal"><?php echo $newST ?></div>
		<a href="../../" class="btn btn-world btn-newST">Nueva solicitud</a>

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
			<div class="celda">
				<h3>Información (Adjutno)</h3>
				<p><?php echo $_SESSION['adjMailInsti3'] = (!empty($_SESSION['adjMailInsti3'])) ? $_SESSION['adjMailInsti3'] : "No hay Adjunto"; ?></p>
			</div>
		</div>
	</div>

</body>
</html>
