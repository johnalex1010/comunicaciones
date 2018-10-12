<?php
	session_start();
		set_time_limit(300);

	if ($_SESSION['home'] == 0) {
		header('Location:../../');
	}
	// session_destroy();
	include_once '../conexion.php';
	//Insertar ST. Solicitud de Capacitación Web
	$facDep = "SELECT f.facDep, t.tipoEvento FROM t_facdep AS f, t_tipoevento AS t WHERE f.id_facDep =".$_SESSION['campoFacDep']." AND t.id_tipoEvento =".$_SESSION['tipoEvento']."";
	$rst = $conexion->query($facDep);
	$row = mysqli_fetch_row($rst);
	// $row[0];
	// $row[1];

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
	<h2>Resumen de solicitud de evento</h2>
	<br>
	<div class="cuadricula">
		<div class="celda celdax70r">
			<h3>Piezas Impresas</h3>
			<table>
				<tr>
					<th>Pieza</th>
					<th>Acabados</th>
					<th>Tipo de papel</th>
					<th>Cantidad</th>
				</tr>
				<?php
					$im = count($_SESSION['selectPiezaIMPEvento']);
				if ($_SESSION['selectPiezaIMPEvento']) {

					for ($i=0; $i < $im ; $i++) {
						$a = "SELECT p.listPiezaImp FROM t_piezaimp AS p WHERE p.id_piezaImp =".$_SESSION['selectPiezaIMPEvento'][$i]."";

						$rsta = $conexion->query($a);
						$rowa = mysqli_fetch_row($rsta);
						echo "<tr>";
						echo "<td>".$rowa[$i]."</td>";
						echo "<td>".$_SESSION['acabadoIMPEvento'][$i]."</td>";
						echo "<td>".$_SESSION['tipoPapelIMPEvento'][$i]."</td>";
						echo "<td>".$_SESSION['cantidadIMPEvento'][$i]."</td>";
						echo "</tr>";

					}
				}else{
					echo "No hay solicitud Impresa";
				}

				?>
			</table>
		</div>
		<div class="celda celdax30r">
			<h3>Piezas Digitales</h3>
			<ul>
				<?php
					$dg = count($_SESSION['tipoDIGEvento']);
				if ($_SESSION['tipoDIGEvento']) {
					for ($i=0; $i < $dg ; $i++) { 
						echo "<li>".$_SESSION['tipoDIGEvento'][$i]."</li>";
					}
				}else{
					echo "No hay solicitud Digital";
				}

				?>
			</ul>
		</div>
	</div>
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
			<p><?php echo $row[0] ?></p>
		</div>
		<div class="celda celdax2">
			<h3>Telefono de contacto del solicitante</h3>
			<p><?php echo $_SESSION['campoTel'] ?></p>
		</div>
	</div>
	<div class="cuadricula">
		<div class="celda celdax3">
			<h3>Tipo de evento</h3>
			<p><?php echo $row[1] ?></p>
		</div>
		<div class="celda celdax3">
			<h3>Nombre del evento</h3>
			<p><?php echo $_SESSION['nombreEvento'] ?></p>
		</div>
		<div class="celda celdax3">
			<h3>Lugar del evento</h3>
			<p><?php echo $_SESSION['lugarEvento'] ?></p>
		</div>
	</div>
	<div class="cuadricula">
		<div class="celda celdax3">
			<h3>Fecha inicio del evento</h3>
			<p><?php echo $_SESSION['fIniEvento'] ?></p>
		</div>
		<div class="celda celdax3">
			<h3>Fecha fin del evento</h3>
			<p><?php echo $_SESSION['fFinEvento'] ?></p>
		</div>
		<div class="celda celdax3">
			<h3>Hora del evento</h3>
			<p><?php echo $_SESSION['horaEvento'] ?></p>
		</div>
	</div>
	<div class="cuadricula">
		<div class="celda celdax2">
			<h3>Numero TIC</h3>
			<p><?php echo $_SESSION['numTICEvento'] = (isset($_SESSION['numTICEvento'])) ? $_SESSION['numTICEvento'] : "No tiene  numero de TIC's"; unset($_SESSION['numTICEvento']) ?></p>
		</div>
		<div class="celda celdax2">
			<h3>Información adicional (Adjutno)</h3>
			<p><?php echo $_SESSION['adjInfoEvento3'] = (!empty($_SESSION['adjInfoEvento3'])) ? $_SESSION['adjInfoEvento3'] : "No hay Adjunto"; unset($_SESSION['adjInfoEvento3']) ?></p>
		</div>
	</div>
	<div class="cuadricula">
		<div class="celda celdax30l">
			<h3>Cubrimiento audio visual</h3>
			<ul>
				<?php echo $_SESSION['echoTCA'] = (!empty($_SESSION['echoTCA'])) ? "<li>".$_SESSION['echoTCA']."</li>" : "No hay items"; unset($_SESSION['echoTCA']) ?>
			</ul>
		</div>
		<div class="celda celdax70l">
			<h3>Sitio web para el evento</h3>
			<p><strong>Tipo sitio web: </strong><?php echo $_SESSION['tipoCubWEbEvento'] = (!empty($_SESSION['tipoCubWEbEvento'])) ? $_SESSION['tipoCubWEbEvento'] : "No hay items"; unset($_SESSION['tipoCubWEbEvento']) ?></p>
			<p><strong>Justificación: </strong><?php echo $_SESSION['jutifiCubWEbEvento'] = (!empty($_SESSION['jutifiCubWEbEvento'])) ? $_SESSION['jutifiCubWEbEvento'] : "No hay Justificación"; unset($_SESSION['jutifiCubWEbEvento']) ?></p>
			<p><strong>ZIP con plan de navegación: </strong><?php echo $_SESSION['adjCubWEbEvento3'] = (!empty($_SESSION['adjCubWEbEvento3'])) ? $_SESSION['adjCubWEbEvento3'] : "No hay Adjunto"; unset($_SESSION['adjCubWEbEvento3']) ?></p>
		</div>
	</div>
	<div class="cuadricula">
		<div class="celda celdax70r">
			<h3>Piezas Impresas</h3>
			<table>
				<tr>
					<th>Pieza</th>
					<th>Acabados</th>
					<th>Tipo de papel</th>
					<th>Cantidad</th>
				</tr>
				<?php
					$im = count($_SESSION['selectPiezaIMPEvento']);
				if ($_SESSION['selectPiezaIMPEvento']) {
					for ($i=0; $i < $im ; $i++) { 
						echo "<tr>";
						echo "<td>".$_SESSION['selectPiezaIMPEvento'][$i]."</td>";
						echo "<td>".$_SESSION['acabadoIMPEvento'][$i]."</td>";
						echo "<td>".$_SESSION['tipoPapelIMPEvento'][$i]."</td>";
						echo "<td>".$_SESSION['cantidadIMPEvento'][$i]."</td>";
						echo "</tr>";
					}
				}else{
					echo "No hay solicitud Impresa";
				}

				?>
			</table>
		</div>
		<div class="celda celdax30r">
			<h3>Piezas Digitales</h3>
			<ul>
				<?php
					$dg = count($_SESSION['tipoDIGEvento']);
				if ($_SESSION['tipoDIGEvento']) {
					for ($i=0; $i < $dg ; $i++) { 
						echo "<li>".$_SESSION['tipoDIGEvento'][$i]."</li>";
					}
				}else{
					echo "No hay solicitud Digital";
				}

				?>
			</ul>
		</div>
	</div>
	<div class="cuadricula">
		<div class="celda">
			<h3>Adjunto presupuesto PDF</h3>
			<p><?php echo $_SESSION['adjPresupuestoEvento3'] = (!empty($_SESSION['adjPresupuestoEvento3'])) ? $_SESSION['adjPresupuestoEvento3'] : "No hay Adjunto"; unset($_SESSION['adjPresupuestoEvento3']) ?></p>
		</div>
	</div>
	<div class="cuadricula">
		<div class="celda celdax3">
			<h3>Lienamientos gráficos</h3>
			<p><?php echo $_SESSION['lineamientoGraficos'] = (!empty($_SESSION['lineamientoGraficos'])) ? $_SESSION['lineamientoGraficos'] : "No hay Justificación"; unset($_SESSION['lineamientoGraficos']) ?></p>
		</div>
		<div class="celda celdax3">
			<h3>Colores sugeridos (Hexadecimal)</h3>
				<?php 

					if ($_SESSION['colorEvento']) {
						$co = count($_SESSION['colorEvento']);

						for ($c=0; $c < $co; $c++) { 
							echo "<p>Color sugerido".($c+1).": <b style='color:".$_SESSION['colorEvento'][$c]."'>". strtoupper($_SESSION['colorEvento'][$c])."</b></p>";
						}
					}

				?>
		</div>
		<div class="celda celdax3">
			<h3>Publico objetivo</h3>
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
		<a class="btn btn-world" href="../../solicitud/unidadComIns/evento.php">Atras</a>
		<a class="btn btn-send" href="../incrus/in_evento.php">Enviar Solicitud</a>
	</div>
</div>
</body>
</html>