<?php
	session_start();
set_time_limit(300);

	if ($_SESSION['home'] == 0) {
		header('Location:../../');
	}
	// session_destroy();
	include_once '../conexion.php';
	include_once '../funciones/tooltip.php';
	//Insertar ST. Solicitud de Capacitación Web
	$facDep = "SELECT f.facDep FROM t_facDep AS f WHERE f.id_facDep =".$_SESSION['campoFacDep']."";
	$rst = $conexion->query($facDep);
	$rowF = mysqli_fetch_row($rst);
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
$s = "SELECT E.*, TE.tipoEvento FROM t_evento AS E,	t_tipoEvento AS TE WHERE TE.id_tipoEvento=E.id_tipoEvento AND E.numST='".$_SESSION['numST']."'";
$rs = $conexion->query($s);
$row = mysqli_fetch_array($rs);
?>

<div class="content msjFinal resumen">
	<img class="logo" src="../../img/logo.png" alt="Logo">
	<h1 class="hMsjFinal">GRACIAS</h1>
	<p class="pMsjFinal">Su solicitud ha sido creada exitosamente. <br> Para conocer el estado de la misma por favor utilice el siguiente código:</p>
	<div class="btn btn-send btn-msjFinal"><?php echo $_SESSION['numST'] ?></div>
	<a href="../../" class="btn btn-world btn-newST">Nueva solicitud</a>
	<h2>Resumen de solicitud de evento</h2>
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
			<p><?php echo $rowF[0] ?></p>
		</div>
		<div class="celda celdax2">
			<h3>Telefono de contacto del solicitante</h3>
			<p><?php echo $_SESSION['campoTel'] ?></p>
		</div>
	</div>
	<div class="cuadricula">
		<div class="celda celdax3">
			<h3>Tipo de evento</h3>
			<p><?php echo $row["tipoEvento"]; ?></p>
		</div>
		<div class="celda celdax3">
			<h3>Nombre del evento</h3>
			<p><?php echo $row['nombreEvento'] ?></p>
		</div>
		<div class="celda celdax3">
			<h3>Lugar del evento</h3>
			<p><?php echo $row['lugar'] ?></p>
		</div>
	</div>
	<div class="cuadricula">
		<div class="celda celdax3">
			<h3>Fecha inicio del evento</h3>
			<p><?php echo $row['fechaInicio'] ?></p>
		</div>
		<div class="celda celdax3">
			<h3>Fecha fin del evento</h3>
			<p><?php echo $row['fechaFin'] ?></p>
		</div>
		<div class="celda celdax3">
			<h3>Hora del evento</h3>
			<p><?php echo $row['hora'] ?></p>
		</div>
	</div>
	<div class="cuadricula">
		<div class="celda celdax3">
			<h3>Numero TIC</h3>
			<p><?php if (!empty($row['numTIC'])) {echo $row['numTIC'];}else{echo "No tiene  numero de TIC's";}?></p>
		</div>
		<div class="celda celdax3">
			<h3>Cubrimiento audio visual</h3>
			<ul>
				<ul>
				<?php
					$cu = "SELECT A.listAudioVisual FROM t_cubrimiento AS C, t_audioVisual AS A WHERE C.id_audioVisual=A.id_audioVisual AND C.numST='".$_SESSION['numST']."'";
					$rsCU = $conexion->query($cu);

					$numeroCU = mysqli_num_rows($rsCU);
					if (empty($numeroCU)) {
						echo "<li>No hay cubrimiento audiovisual</li>";
					}else{
						for ($i=0; $i < $numeroCU; $i++) { 
							$rowCU = mysqli_fetch_array($rsCU);
							echo "<li>".$rowCU['listAudioVisual']."</li>";
						}
					}

				?>
			</ul>
			</ul>
		</div>
		<div class="celda celdax3">
			<h3>Sitio web para el evento</h3>
			<?php
				$web = "SELECT * FROM t_requerimientoWeb WHERE numST='".$_SESSION['numST']."'";
				$rsWeb = $conexion->query($web);
				$rowWeb = mysqli_fetch_array($rsWeb);
			?>

			<p><strong>Tipo sitio web: </strong><?php if (empty($rowWeb['tipoWeb'])){echo "NO";}else{echo $rowWeb['tipoWeb'];}?></p>
			<p><strong>Justificación: </strong><?php if (empty($rowWeb['justificacionWeb'])){echo "NO";}else{echo $rowWeb['justificacionWeb'];}?></p>
		</div>
	</div>
	<div class="cuadricula">
		<div class="celda celdax70r">
			<h3>Piezas Impresas</h3>
			<table>
				<tr>
					<th>Pieza</th>
					<th>Acabado</th>
					<th>Tipo de papel</th>
					<th>Cantidad</th>
				</tr>
				<?php
					$imp = "SELECT p.listPiezaImp, a.listAcabadoImp, tp.listPapelImp, rs.cantidad FROM t_resPiezaImp AS rs, t_piezaImp AS p, t_acabadoImp AS a, t_papelImp AS tp WHERE rs.id_piezaImp=p.id_piezaImp	AND rs.id_acabadoImp=a.id_acabadoImp AND rs.id_papelImp=tp.id_papelImp AND rs.numST='".$_SESSION['numST']."'";
					$rsImp = $conexion->query($imp);

					$numImp = mysqli_num_rows($rsImp);
					if (empty($numImp)) {
						echo "<tr>";
						echo "<td>No hay piezas impresas</td>";
						echo "</tr>";
					}else{
					while ($rowIp = mysqli_fetch_array($rsImp, MYSQLI_ASSOC)) {
				?>
					<tr>
						<td><?php echo $rowIp['listPiezaImp']; ?></td>
						<td><?php echo $rowIp['listAcabadoImp']; ?></td>
						<td><?php echo $rowIp['listPapelImp']; ?></td>
						<td><?php echo $rowIp['cantidad']; ?></td>
					</tr>
				<?php
					}
					}
				?>
			</table>
		</div>
		<div class="celda celdax30r">
			<h3>Piezas Digitales</h3>
			<table>
				<tr>
					<th>Pieza digital</th>
				</tr>
				<?php
					$dig = "SELECT d.listPiezaDig FROM t_resPiezaDig AS pd,	t_piezaDig AS d WHERE pd.id_piezaDig=d.id_piezaDig AND pd.numST='".$_SESSION['numST']."'";
					$rsDig = $conexion->query($dig);
					$numDif = mysqli_num_rows($rsDig);
					if (empty($numDif)) {
						echo "<tr>";
						echo "<td>No hay piezas digitales</td>";
						echo "</tr>";
					}else{
						while ($rowPD = mysqli_fetch_array($rsDig, MYSQLI_ASSOC)) {
				?>
						<tr>
							<td><?php echo $rowPD['listPiezaDig']; ?></td>
						</tr>
				<?php
						}
					}
				?>
			</table>
		</div>
	</div>
	<div class="cuadricula">
		<div class="celda celdax4">
			<h3>Lienamientos gráficos</h3>
			<p><?php if (!empty($row['txtLineamientos'])) {echo $row['txtLineamientos'];}else{echo "No hay Justificación";}?></p>
		</div>
		<div class="celda celdax4">
			<h3>Colores sugeridos (Hexadecimal)</h3>
			<ul>
				<?php
					$obj = "SELECT color FROM t_color WHERE numST='".$_SESSION['numST']."'";
					$rsobJ = $conexion->query($obj);

					$numeroColor = mysqli_num_rows($rsobJ);
					if (empty($numeroColor)) {
						echo "<li>No hay colores</li>";
					}else{
						for ($i=0; $i < $numeroColor; $i++) { 
							$rowObj = mysqli_fetch_array($rsobJ);
							echo "<li style='color:".$rowObj['color']."'>".$rowObj['color']."</li>";
						}
					}

				?>
			</ul>
		</div>
		<div class="celda celdax4">
			<h3>Publico objetivo</h3>
			<ul>
				<?php
					$obj = "SELECT OBJ.listPublico FROM t_resObjpublico AS ROBJ, t_objPublico AS OBJ WHERE ROBJ.id_objPublico=OBJ.id_objPublico AND numST='".$_SESSION['numST']."'";
					$rsobJ = $conexion->query($obj);					

					$numero = mysqli_num_rows($rsobJ);
					if (empty($numero)) {
						echo "<li>No hay público objetivo</li>";
					}else{
						for ($i=0; $i < $numero; $i++) { 
							$rowObj = mysqli_fetch_array($rsobJ);
							echo "<li>".$rowObj['listPublico']."</li>";
						}
					}

				?>
			</ul>
		</div>
		<div class="celda celdax4">
			<div class="tooltip" title="<?php prefijosEventoT(); ?>" data-tippy-arrow="true" data-tippy-animation="shift-toward">
			<h3>Adjuntos</h3>
			<ul>
				<?php
				$adj = "SELECT * FROM t_adjunto WHERE numST='".$_SESSION['numST']."'";
				$rsAjd = $conexion->query($adj);
				$numero = mysqli_num_rows($rsAjd);
				if (empty($numero)) {
						echo "<li>No hay documentos adjuntos</li>";
				}else{
					while ($rowAdj = mysqli_fetch_array($rsAjd)) {
						echo "<li>".$rowAdj['adjunto']."</li>";
					}
				}
			?>
			</ul>
			</div>
		</div>
	</div>
	<?php mysqli_close($conexion); session_destroy(); ?>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.3/jquery.easing.min.js"></script>
<script src="../../js/tippy.all.min.js"></script>
<script src="../../js/main.js"></script>
</body>
</html>