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
$s="SELECT
	RS.*,
	TRS.redSocial
FROM
	t_crearedescm AS RS,
	t_restrs AS RRS,
	t_tiporedsocial AS TRS
WHERE
	RRS.id_tipoRedSocial=TRS.id_tipoRedSocial
	AND RS.numST=RRS.numST
	AND RS.numST='".$_SESSION['numST']."'";
$rs = $conexion->query($s);
$a = array();
for ($i=0; $i<4; $i++) {
	$row = mysqli_fetch_array($rs);
	$nomPerfil[$i] = $row["nomPerfil"];
	$emailPersonal[$i] = $row["emailPersonal"];
	$descripcion[$i] = $row["descripcion"];
	$direccion[$i] = $row["direccion"];
	$telPerfil[$i] = $row["telPerfil"];
	$emailPerfil[$i] = $row["emailPerfil"];
	array_push($a, $row["redSocial"]);
}

?>

<div class="content msjFinal resumen">
		<img class="logo" src="../../img/logo.png" alt="Logo">
		<h1 class="hMsjFinal">GRACIAS</h1>
		<p class="pMsjFinal">Para seguir el estado de su solicitud, utlice el siguiente código:</p>
		<div class="btn btn-send btn-msjFinal"><?php echo $_SESSION['numST'] ?></div>
		<a href="../../" class="btn btn-world btn-newST">Nueva solicitud</a>	
	<h2>Resumen de solicitud de Creación de redes sociales</h2>
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
					$c = count($a);
					for ($i=0; $i < $c ; $i++) { 
						echo "<li>".$a[$i]."</li>";
					}
				?>
			</ul>
		</div>
	</div>
	<div class="cuadricula">
		<div class="celda celdax3">
			<h3>Nombre de perfil (sugerido)</h3>
			<p><?php echo $nomPerfil[0] ?></p>
		</div>
		<div class="celda celdax3">
			<h3>Correo personal para asociar al perfil</h3>
			<p><?php echo $emailPersonal[0] ?></p>
		</div>
		<div class="celda celdax3">
			<h3>Archivo con imagnes sugeridas (Adjunto)</h3>
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
	</div>
	<div class="cuadricula">
		<div class="celda">
			<h3>Descripción del perfil</h3>
			<p><?php echo $descripcion[0] ?></p>
		</div>
	</div>
	<div class="cuadricula">
		<div class="celda celdax3">
			<h3>Telefono de contacto para el perfil</h3>
			<p><?php echo $telPerfil[0] ?></p>
		</div>
		<div class="celda celdax3">
			<h3>Dirección / Ubibación para el perfil</h3>
			<p><?php echo $direccion[0] ?></p>
		</div>
		<div class="celda celdax3">
			<h3>Correo de contacto para el perfil</h3>
			<p><?php echo $emailPerfil[0] ?></p>
		</div>
	</div>
	<?php mysqli_close($conexion); session_destroy(); ?>
</div>

</body>
</html>