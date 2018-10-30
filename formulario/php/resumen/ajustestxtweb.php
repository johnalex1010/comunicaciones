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
<?php
$s = "SELECT AJ.*, ADJ.adjunto FROM t_ajusteweb AS AJ, t_adjunto AS ADJ WHERE AJ.numST=ADJ.numST AND AJ.numST='".$_SESSION['numST']."'";
$rs = $conexion->query($s);
$row = mysqli_fetch_array($rs);
?>
<div class="content msjFinal resumen">
	<img src="../../img/logo.png" alt="Logo" class="logoComunica">
	<h1 class="hMsjFinal">GRACIAS</h1>
	<p class="pMsjFinal">Para seguir el estado de su solicitud, utlice el siguiente código:</p>
	<div class="btn btn-send btn-msjFinal"><?php echo $_SESSION['numST'] ?></div>
	<a href="../../" class="btn btn-world btn-newST">Nueva solicitud</a>
	<h2>Resumen de solicitud de Sitios web - Ajustes de texto y/o imagenes</h2>
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
			<h3>URL donde se realizaran los cambios</h3>
			<p><?php echo $row["urlAjuste"]; ?></p>
		</div>
	</div>
	<div class="cuadricula">
		<div class="celda celdax2">
			<h3>Contendo que se va a cambiar/corregir (Adjutno)</h3>
			<p><?php echo $row["adjunto"]; ?></p>
		</div>
		<div class="celda celdax2">
			<h3>Descripción.</h3>
			<p><?php echo $row["descripcion"]; ?></p>
		</div>
	</div>
	<?php mysqli_close($conexion); session_destroy(); ?>
</div>
</body>
</html>