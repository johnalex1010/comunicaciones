<?php
	session_start();
		set_time_limit(300);

	if ($_SESSION['home'] == 0) {
		header('Location:../../');
	}
	// session_destroy();
	include_once '../conexion.php';
	//Insertar ST. Solicitud de Capacitación Web
	$facDep = "SELECT facDep FROM t_facDep WHERE id_facDep =".$_SESSION['campoFacDep']; // Selescciona la ultima ST igresada en la BD
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
$s="SELECT
	C.*,
	OBJ.listPublico
FROM
	t_campaniasCM AS C,
	t_objPublico AS OBJ,
	t_resObjpublico AS ROBJ
WHERE
	ROBJ.id_objPublico=OBJ.id_objPublico
	AND C.numST=ROBJ.numST
	AND C.numST='".$_SESSION['numST']."'";
$rs = $conexion->query($s);
$a = array();
for ($i=0; $i<7; $i++) {
	$row = mysqli_fetch_array($rs);
	$nombreCam[$i] = $row["nombreCam"];
	$objetivo[$i] = $row["objetivo"];
	$justificacion[$i] = $row["justificacion"];
	$descripcion[$i] = $row["descripcion"];
	$fechaHoraIni[$i] = $row["fechaHoraIni"];
	$fechaHoraFin[$i] = $row["fechaHoraFin"];
	$palabrasClaves[$i] = $row["palabrasClaves"];
	array_push($a, $row["listPublico"]);
}

?>
<div class="content msjFinal resumen">
	<img class="logo" src="../../img/logo.png" alt="Logo">
	<h1 class="hMsjFinal">GRACIAS</h1>
	<p class="pMsjFinal">Para seguir el estado de su solicitud, utlice el siguiente código:</p>
	<div class="btn btn-send btn-msjFinal"><?php echo $_SESSION['numST'] ?></div>
	<a href="../../" class="btn btn-world btn-newST">Nueva solicitud</a>	
	<h2>Resumen de solicitud de Creación campañas</h2>
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
			<h3>Nombre de la campaña</h3>
			<p><?php echo $nombreCam[0] ?></p>
		</div>
	</div>
	<div class="cuadricula">
		<div class="celda celdax2">
			<h3>Justificación</h3>
			<p><?php echo $justificacion[0] ?></p>
		</div>
		<div class="celda celdax2">
			<h3>Objetivo</h3>
			<p><?php echo $objetivo[0] ?></p>
		</div>
	</div>
	<div class="cuadricula">
		<div class="celda celdax2">
			<h3>Descripción</h3>
			<p><?php echo $descripcion[0] ?></p>
		</div>
		<div class="celda celdax2">
			<h3>Palabras clave (Keywords)</h3>
			<p><?php echo $palabrasClaves[0] ?></p>
		</div>
	</div>

	<div class="cuadricula">
		<div class="celda celdax3">
			<h3>Imagenes de referencia (Adjunto)</h3>
			<p>
				<?php
					$sADJ = "SELECT adjunto FROM t_adjunto WHERE numST='".$_SESSION['numST']."'";
					$rsADJ = $conexion->query($sADJ);
					
					$numero = mysqli_num_rows($rsADJ);
					if ($numero == 0) {
						echo "No hay Adjuntos";
					}else{
						$row = mysqli_fetch_array($rsADJ);
						echo $row['adjunto'];
					}

					
				?>
			</p>
		</div>
		<div class="celda celdax3">
			<h3>Fecha de inicio de la campaña</h3>
			<p><?php echo $fechaHoraIni[0] ?></p>
		</div>
		<div class="celda celdax3">
			<h3>Fecha de finalización de la campaña</h3>
			<p><?php echo $fechaHoraFin[0] ?></p>
		</div>
	</div>
	<div class="cuadricula">
		<div class="celda">
			<h3>Público objetivo</h3>
			<ul>
				<?php
					$c = count($a);
					for ($i=0; $i < $c ; $i++) { 
						echo "<li>".$a[$i]."</li>";
					}
				?>
			</ul>
		</div>
	</div>
	<?php mysqli_close($conexion); session_destroy(); ?>
</div>
</body>
</html>