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
	<h2>Resumen de solicitud de Creación campañas</h2>
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
		<div class="celda">
			<h3>Nombre de la campaña</h3>
			<p><?php echo $_SESSION['nomCampa'] ?></p>
		</div>
	</div>
	<div class="cuadricula">
		<div class="celda celdax2">
			<h3>Justificación</h3>
			<p><?php echo $_SESSION['justiCampa'] ?></p>
		</div>
		<div class="celda celdax2">
			<h3>Objetivo</h3>
			<p><?php echo $_SESSION['objCampa'] ?></p>
		</div>
	</div>
	<div class="cuadricula">
		<div class="celda celdax2">
			<h3>Descripción</h3>
			<p><?php echo $_SESSION['descripCampa'] ?></p>
		</div>
		<div class="celda celdax2">
			<h3>Palabras clave (Keywords)</h3>
			<p><?php echo $_SESSION['keyCama'] ?></p>
		</div>
	</div>

	<div class="cuadricula">
		<div class="celda celdax3">
			<h3>Imagenes de referencia (Adjunto)</h3>
			<p><?php echo $_SESSION['adjDocWEb3'] = (!empty($_SESSION['adjDocWEb3'])) ? $_SESSION['adjDocWEb3'] : "No hay Adjunto"; ?></p>
		</div>
		<div class="celda celdax3">
			<h3>Fecha de inicio de la campaña</h3>
			<p><?php echo $_SESSION['fIniCampa'] ?></p>
		</div>
		<div class="celda celdax3">
			<h3>Fecha de finalización de la campaña</h3>
			<p><?php echo $_SESSION['fFinCampa'] ?></p>
		</div>
	</div>
	<div class="cuadricula">
		<div class="celda">
			<h3>Público objetivo</h3>
			<ul>
				<?php
				if (isset($_SESSION['checkPublicoObj'])) {
					$dg = count($_SESSION['checkPublicoObj']);
					for ($i=0; $i < $dg ; $i++) { 
						echo "<li>".$_SESSION['checkPublicoObj'][$i]."</li>";
					}
				}else{
					echo "No hay Publico objetivo";
				}
				?>
			</ul>
		</div>
	</div>
	<div class="cuadricula">
		<a class="btn btn-world" href="../../solicitud/unidadDigital/communityManager.php">Atras</a>
		<a class="btn btn-send" href="#">Enviar Solicitud</a>
	</div>
</div>
</body>
</html>