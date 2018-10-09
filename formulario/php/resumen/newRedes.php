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
	<h2>Resumen de solicitud de Creación de redes sociales</h2>
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
		<div class="celda">
			<h3>Tipo de red social a crear</h3>
			<ul>
				<?php
				if (isset($_SESSION['checkNewRedes'])) {
					$dg = count($_SESSION['checkNewRedes']);
					for ($i=0; $i < $dg ; $i++) { 						
						$a = "SELECT redSocial FROM t_tiporedsocial WHERE id_tipoRedSocial=".$_SESSION['checkNewRedes'][$i]."";
						$ra = $conexion->query($a);
						$rowa = mysqli_fetch_row($ra);
						echo "<li>".$rowa[0]."</li>";
					}
				}else{
					echo "No hay Publico objetivo";
				}
				?>
			</ul>
		</div>
	</div>
	<div class="cuadricula">
		<div class="celda celdax3">
			<h3>Nombre de perfil (sugerido)</h3>
			<p><?php echo $_SESSION['nombreNewPerfil'] ?></p>
		</div>
		<div class="celda celdax3">
			<h3>Correo personal para asociar al perfil</h3>
			<p><?php echo $_SESSION['emailNewPerfil'] ?></p>
		</div>
		<div class="celda celdax3">
			<h3>Archivo con imagnes sugeridas (Adjutno)</h3>
			<p><?php echo $_SESSION['adjImgNewRed3'] = (!empty($_SESSION['adjImgNewRed3'])) ? $_SESSION['adjImgNewRed3'] : "No hay Adjunto"; ?></p>
		</div>
	</div>
	<div class="cuadricula">
		<div class="celda">
			<h3>Descripción del perfil</h3>
			<p><?php echo $_SESSION['descNewRed'] ?></p>
		</div>
	</div>
	<div class="cuadricula">
		<div class="celda celdax3">
			<h3>Telefono de contacto para el perfil</h3>
			<p><?php echo $_SESSION['numTelNewRed'] ?></p>
		</div>
		<div class="celda celdax3">
			<h3>Dirección / Ubibación para el perfil</h3>
			<p><?php echo $_SESSION['dirNewRed'] ?></p>
		</div>
		<div class="celda celdax3">
			<h3>Correo de contacto para el perfil</h3>
			<p><?php echo $_SESSION['emailNewPerfil2'] ?></p>
		</div>
	</div>
	<div class="cuadricula">
		<a class="btn btn-world" href="../../solicitud/unidadDigital/communityManager.php">Atras</a>
		<a class="btn btn-send" href="../incrus/in_newRedes.php">Enviar Solicitud</a>
	</div>
</div>
</body>
</html>