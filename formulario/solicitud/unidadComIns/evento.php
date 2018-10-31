
<?php 
	session_start();

	set_time_limit(300);

	if ($_SESSION['home'] == 0) {
		header('Location:../../');
	}
	// session_destroy();
	require_once '../../php/conexion.php';
	require_once '../../php/funciones/tooltip.php';
	require_once '../../php/funciones/campos.php';
	require_once '../../php/validaciones/validarEvento.php';
	
?>

<!DOCTYPE html>
<html lang="es">
<head>
	<!-- METAS -->
	<meta charset="UTF-8" />
	<title>Evento Solicitudes | Departamento de Comunicaciones</title>
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
	<div id="enviar"></div>
	<div class="content">
		<!-- HOME -->
		<div class="home">
			<div class="titles">
				<h1 class="titlePrimary">Formato de solicitudes</h1>
				<h2 class="titleSecond">Departamento de comunicaciones</h2>
				<h3 class="titleThird">Sección Evento</h3>
			</div>
			<p class="txtIntro">Texto explicativo Lorem ipsum dolor sit amet, consectetur adipisicing elit. Voluptas beatae, eos nisi officia temporibus aliquid accusamus est maxime atque, voluptatibus commodi facere voluptatum esse quo ipsum expedita corporis ratione, debitis!
			</p>
			<p>Los campos con (<span style="color: #C20201;font-size:2rem;" >•</span>) son obligatorios.</p>
		</div>
	</div>
	<form id="msform" action="" method="post" enctype="multipart/form-data">
		<!-- Página 1 -->
		<!-- <fieldset>
		  	<div class="cuadricula">
		  		<div class="celda celdax3">
		  			<div class="group tooltip" title="<?php tipoEventoT(); ?>" data-tippy-arrow="true" data-tippy-animation="shift-toward">
		  				<select name="tipoEvento" id="tipoEvento">
						<?php
							if ($_POST['tipoEvento'] == "") {
								echo "<option value='' disable selected>- - -</option>";
							}else{
								$s = "SELECT tipoEvento FROM t_tipoevento WHERE id_tipoEvento='".$_POST['tipoEvento']."'";
								$rs = $conexion->query($s);
								$row = mysqli_fetch_array($rs);
								echo "<option value='".$_POST['tipoEvento']."' selected>".$row['tipoEvento']."</option>";
							}
							tipoEvento($conexion);
						?>
						</select>
		  				<span class="bar"></span>
		  				<span class="required"></span>
		  				<label>Tipo de evento <span class="error"><?php echo $error[0] = (isset($error[0])) ? $error[0] : ""; ?></span></label>
		  			</div>
		  		</div>
		  		<div class="celda celdax3">
		  			<div class="group tooltip" title="<?php nombreEventoT(); ?>" data-tippy-arrow="true" data-tippy-animation="shift-toward">
		  				<input type="text" class="requi" name="nombreEvento" value="<?php echo $_POST['nombreEvento'] = (isset($_POST['nombreEvento'])) ? $_POST['nombreEvento'] : ''; ?>">
		  				<span class="bar"></span>
		  				<span class="required"></span>
		  				<label>Nombre del evento <span class="error"><?php echo $error[1] = (isset($error[1])) ? $error[1] : ""; ?></span></label>
		  			</div>
		  		</div>
		  		<div class="celda celdax3">
		  			<div class="group tooltip" title="<?php lugarEventoT(); ?>" data-tippy-arrow="true" data-tippy-animation="shift-toward">
		  				<input type="text" name="lugarEvento"  value="<?php echo $_POST['lugarEvento'] = (isset($_POST['lugarEvento'])) ? $_POST['lugarEvento'] : ''; ?>">
		  				<span class="bar"></span>
		  				<span class="required"></span>
		  				<label>Lugar del evento <span class="error"><?php echo $error[2] = (isset($error[2])) ? $error[2] : ""; ?></span></label>
		  			</div>
		  		</div>
		  	</div>
		  	<div class="cuadricula">
		  		<div class="celda celdax3">
		  			<div class="group tooltip" title="<?php fIniEventoT(); ?>" data-tippy-arrow="true" data-tippy-animation="shift-toward">
		  				<input type="date" name="fIniEvento" value="<?php echo $_POST['fIniEvento'] = (isset($_POST['fIniEvento'])) ? $_POST['fIniEvento'] : ''; ?>">
		  				<span class="bar"></span>
		  				<span class="required"></span>
		  				<label>Fecha de inicio del evento <span class="error"><?php echo $error[3] = (isset($error[3])) ? $error[3] : ""; ?></span></label>
		  			</div>
		  		</div>
		  		<div class="celda celdax3">
		  			<div class="group tooltip" title="<?php fFinEventoT(); ?>" data-tippy-arrow="true" data-tippy-animation="shift-toward">
		  				<input type="date" class="requi" name="fFinEvento" value="<?php echo $_POST['fFinEvento'] = (isset($_POST['fFinEvento'])) ? $_POST['fFinEvento'] : ''; ?>">
		  				<span class="bar"></span>
		  				<span class="required"></span>
		  				<label>Fecha de finalización del evento <span class="error"><?php echo $error[4] = (isset($error[4])) ? $error[4] : ""; ?></span></label>
		  			</div>
		  		</div>
		  		<div class="celda celdax3">
		  			<div class="group tooltip" title="<?php horaEventoT(); ?>" data-tippy-arrow="true" data-tippy-animation="shift-toward">
		  				<input type="time" name="horaEvento" value="<?php echo $_POST['horaEvento'] = (isset($_POST['horaEvento'])) ? $_POST['horaEvento'] : ''; ?>">
		  				<span class="bar"></span>
		  				<span class="required"></span>
		  				<label>Hora de inicio del evento <span class="error"><?php echo $error[5] = (isset($error[5])) ? $error[5] : ""; ?></span></label>
		  			</div>
		  		</div>
		  	</div>
		  	<div class="cuadricula">	
		  		<div class="celda celdax2">
		  			<div class="group tooltip" title="<?php numTICEventoT(); ?>" data-tippy-arrow="true" data-tippy-animation="shift-toward">
		  				<input type="text" name="numTICEvento" value="<?php echo $_POST['numTICEvento'] = (isset($_POST['numTICEvento'])) ? $_POST['numTICEvento'] : ''; ?>">
		  				<span class="bar"></span>
		  				<label>Numero TIC del evento <span class="error"><span class="error"><?php echo $error[6] = (isset($error[6])) ? $error[6] : ""; ?></span></label>
		  			</div>
		  		</div>
		  		<div class="celda celdax2">
		  			<div class="group tooltip" title="<?php adjInfoEventoT(); ?>" data-tippy-arrow="true" data-tippy-animation="shift-toward">
		  				<input type="file" class="requi" name="adjInfoEvento" >
		  				<span class="bar"></span>
		  				<label>Adjuntar ZIP con información adcional <span class="error"><span class="error"><?php echo $error[7] = (isset($error[7])) ? $error[7] : ""; ?></span></label>
		  				<a class="linkGuia" href="">Click aquí para ver documento PDF guia</a>
		  			</div>
		  		</div>
		  	</div>
		  	<div class="cuadricula">
		  		<div class="celda celdax2 tooltip" title="<?php qCubAUEventoT(); ?>" data-tippy-arrow="true" data-tippy-animation="shift-toward" data-tippy-placement="left">
		  			<p class="colorTxt">¿Su evento requiere cubrimiento Audiovisual? <input type="checkbox" class="requi checkBtn btnCheck1" <?php if (!empty($_POST['tipoCubAUEvento'])) {echo "checked";}?>
		  			></p>
		  		</div>
		  		<div class="celda celdax2 tooltip" title="<?php qCubWebEventoT(); ?>" data-tippy-arrow="true" data-tippy-animation="shift-toward" data-tippy-placement="left">
		  			<p class="colorTxt">¿Su evento requiere sitioweb? <input type="checkbox" class="requi checkBtn btnCheck2" <?php if (!empty($_POST['tipoCubWEbEvento'])) {echo "checked";}?>></p>
		  		</div>
		  	</div>
		  	<div class="cuadricula">
		  		<div class="celda celdax2 p1" style="display: <?php echo $display = (isset($_POST['tipoCubAUEvento'])) ? "block" : "none"; ?>">
					<div class="contentCheck checkboxAudioVisual">
						<p class="colorTxt tooltip" title="<?php tipoCubAUEventoT(); ?>" data-tippy-arrow="true" data-tippy-animation="shift-toward" data-tippy-placement="left">¿Que tipo de cubrimiento audiovisual requiere? </p>
						<p><input type='checkbox' class="option-input checkbox" name='tipoCubAUEvento[]' value='1' <?php if (in_array("1", $_POST['tipoCubAUEvento'])) echo "checked"; ?> > Fotográfia</p>
						<p><input type='checkbox' class="option-input checkbox" name='tipoCubAUEvento[]' value='2' <?php if (in_array("2", $_POST['tipoCubAUEvento'])) echo "checked"; ?> > Zona T</p>
						<p><input type='checkbox' class="option-input checkbox" name='tipoCubAUEvento[]' value='3' <?php if (in_array("3", $_POST['tipoCubAUEvento'])) echo "checked"; ?> > Maestro de ceremonia</p>
						<p><input type='checkbox' class="option-input checkbox" name='tipoCubAUEvento[]' value='4' <?php if (in_array("4", $_POST['tipoCubAUEvento'])) echo "checked"; ?> > Redes sociales y divulgación de piezas</p>
					</div>
				</div>
		  		<div class="celda celdax2 p2" style="display: <?php echo $display = (isset($_POST['tipoCubWEbEvento'])) ? "block" : "none"; ?>">
		  			<div class="contentCheck">
						<p class="colorTxt tooltip" title="<?php tipoCubWEbEventoT(); ?>" data-tippy-arrow="true" data-tippy-animation="shift-toward" data-tippy-placement="left">¿Que tipo de sitio web requiere su evento? </p>
						<p><input type="radio" class="option-input radio" name="tipoCubWEbEvento" value="Nuevo" 
							<?php echo $checked = ($_POST['tipoCubWEbEvento'] == "Nuevo") ? $checked = "checked" : "" ?>
							 /> Nuevo</p>
						<p><input type="radio" class="option-input radio" name="tipoCubWEbEvento" value="Actualización" 
							<?php echo $checked = ($_POST['tipoCubWEbEvento'] == "Actualización") ? $checked = "checked" : "" ?>
						 /> Actualización</p>
					</div>
					<br><br>
					<div class="group tooltip" title="<?php jutifiCubWEbEventoT(); ?>" data-tippy-arrow="true" data-tippy-animation="shift-toward" data-tippy-placement="left">
						<textarea name="jutifiCubWEbEvento" ><?php echo $_POST['jutifiCubWEbEvento'] ?></textarea>
		  				<span class="bar"></span>
		  				<label>Justificación del sitio web <span class="error"><?php echo $error[8] = (isset($error[8])) ? $error[8] : ""; ?></span></label>
		  			</div>
		  			<br>
					<div class="group tooltip" title="<?php adjCubWEbEventoT(); ?>" data-tippy-arrow="true" data-tippy-animation="shift-toward" data-tippy-placement="left">
		  				<input type="file" class="requi" name="adjCubWEbEvento">
		  				<span class="bar"></span>	
		  				<label>Adjuntar ZIP con el plan de navegación e imagenes<span class="error"><?php echo $error[9] = (isset($error[9])) ? $error[9] : ""; ?></span></label>
		  			</div>
		  		</div>
		  	</div>
		    	<button type="button" name="next" class="btn btn-next btn-world" value="Next" />Siguiente</button>
		</fieldset> -->
		  
		<!-- Página 2 -->
		<fieldset>
			<div class="cuadricula">
				<div class="celda">
					<div class="group tooltip" title="<?php adjPresupuestoEventoT(); ?>" data-tippy-arrow="true" data-tippy-animation="shift-toward" data-tippy-placement="left">
		  				<input type="file" class="requi" name="adjPresupuestoEvento">
		  				<span class="bar"></span>
		  				<label>Adjuntar PDF de presupuesto <span class="error"><?php echo $error[10] = (isset($error[10])) ? $error[10] : ""; ?></span></label>
		  			</div>
				</div>
			</div>
			<div class="cuadricula">
				<div class="celda">
					<div class="contentCheck checkboxAudioVisual">
						<span class="error"><?php echo $error[13] = (isset($error[13])) ? $error[13] : ""; ?></span>
						<p class="colorTxt tooltip" title="<?php requerimientoIMPWEBEventoT(); ?>" data-tippy-arrow="true" data-tippy-animation="shift-toward" data-tippy-placement="left">¿Su solicitud requiere piezas?</p>
						<p><input type="checkbox" class="option-input checkbox btnCheckImp" <?php if (!empty($_POST['selectPiezaIMPEvento'][0])) {echo "checked";}?>>Impresas &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" class="option-input checkbox btnCheckWeb" <?php if (!empty($_POST['inputDIG'][0])) {echo "checked";}?>>Digitales</p>
					</div>
				</div>
			</div>

			<div class="cuadricula imp" style="display: <?php echo $display = (!empty($_POST['selectPiezaIMPEvento'][0])) ? "block" : "none"; ?>">
				<div class="celda">
					<h3 class="tooltip" title="<?php impresosEventoT(); ?>" data-tippy-arrow="true" data-tippy-animation="shift-toward" data-tippy-placement="left">IMPRESOS</h3>
					<div class="cuadricula">
						<div class="celda celdax70r">
							IMPRESOS
							<table border="0" class="tableImpWeb">
								
							</table>
						</div>
						<div class="celda celdax30r">
							<div class="boxImpDig">
								<h4>Impresos</h4>
								<div>
									<p>Adicione o elimine elementos según sea su requerimiento</p>
									<a class="linkGuia" href="#" target="_blank">Link Guia PDF IMP</a>
									<div class="plusMinus">
										<button id="addIMP" class="btn btn-send">Agregar Campos Impresos</button>
								    </div>
							    </div>
							</div>
						</div>
					</div>
				</div>
			</div>

			<div class="cuadricula web" style="display: <?php echo $display = (!empty($_POST['inputDIG'][0])) ? "block" : "none"; ?>"
				<div class="celda">
					<h3 class="tooltip" title="<?php digEventoT(); ?>" data-tippy-arrow="true" data-tippy-animation="shift-toward" data-tippy-placement="left">DIGITAL</h3>
					<div class="cuadricula">
						<div class="celda celdax70r">
							<div id="itemsDIG">
								<?php
									$d = "SELECT listPiezaDig FROM t_piezadig WHERE id_piezaDig='".$_POST['inputDIG'][0]."'";
									$rsd = $conexion->query($d);
									$f = mysqli_fetch_array($rsd);
									if (!empty($_POST['inputDIG'][0])) {
								?>
									<div>
										<div class="cuadricula">
											<div class="celda">
												<select name='inputDIG[]'>
													<option value='<?php echo $_POST['inputDIG'][0]; ?>'><?php echo $f['listPiezaDig']; ?></option>
													<option value=''>- - -</option>
													<?php piezaDigEvento($conexion); ?>
												</select>
											</div>
										</div>
									</div>
								<?php
									//for aquí
									$c = count($_POST['inputDIG']);
									for ($i=1; $i < $c; $i++) {
										if (!empty($_POST['inputDIG'][$i])){
											$d = "SELECT listPiezaDig FROM t_piezadig WHERE id_piezaDig='".$_POST['inputDIG'][$i]."'";
											$rsd = $conexion->query($d);
											$f = mysqli_fetch_array($rsd);
								?>
									<div id="div">
										<div class='cuadricula'>
											<div class='celda celdax90r'>
												<select name='inputDIG[]'>
													<option value='<?php echo $_POST['inputDIG'][$i]; ?>'><?php echo $f['listPiezaDig']; ?></option>
													<option value=''>- - -</option>
													<?php piezaDigEvento($conexion); ?>
												</select>
											</div>
											<div class='celda celdax10r'>
												<button class='deleteDIG removeBTNS'></button>
											</div>
										</div>
									</div>
								<?php
										}
									}

									}else{
								?>
									<div>
										<div class='cuadricula'>
											<div class='celda'>
												<select name='inputDIG[]'>
													<option value=''>- - -</option>
													<?php piezaDigEvento($conexion); ?>
												</select>
											</div>
										</div>
									</div>
								<?php 
									}
								?>


								<?php
									// $d = "SELECT listPiezaDig FROM t_piezadig WHERE id_piezaDig='".$_POST['inputDIG'][0]."'";
									// $rsd = $conexion->query($d);
									// $f = mysqli_fetch_array($rsd);

									// if (!empty($_POST['inputDIG'][0])) {
									// 	echo "<div>";
									// 	echo "<div class='cuadricula>";
									// 	echo "<div class='celda'>";
									// 	echo "<select name='inputDIG[]'>";
									// 	echo "<option value='".$_POST['inputDIG'][0]."'>".$f['listPiezaDig']."</option>";
									// 	echo "<option value=''>- - -</option>";
									// 	piezaDigEvento($conexion);
									// 	echo "</select>";
									// 	echo "</div>";
									// 	echo "</div>";
									// 	echo "</div>";
									// 	$c = count($_POST['inputDIG']);
									// 	for ($i=1; $i < $c; $i++) {
									// 		if (!empty($_POST['inputDIG'][$i])){
									// 			$d = "SELECT listPiezaDig FROM t_piezadig WHERE id_piezaDig='".$_POST['inputDIG'][$i]."'";
									// 			$rsd = $conexion->query($d);
									// 			$f = mysqli_fetch_array($rsd);

									// 			echo "<div id='div'>";
									// 				echo "<div class='cuadricula>";
									// 					echo "<div class='celda celdax90r'>";
									// 						echo "<select name='inputDIG[]'>";
									// 							echo "<option value='".$_POST['inputDIG'][$i]."'>".$f['listPiezaDig']."</option>";
									// 							echo "<option value=''>- - -</option>";
									// 							piezaDigEvento($conexion);
									// 						echo "</select>";
									// 					echo "</div>";
									// 					echo "<div class='celda celdax10r'>";
									// 						echo "<button class='deleteDIG removeBTNS'></button>";
									// 					echo "</div>";
									// 				echo "</div>";
									// 			echo "</div>";


												// echo "<div id='div'>";
												// echo "<select name='inputDIG[]'>";
												// echo "<option value='".$_POST['inputDIG'][$i]."'>".$f['listPiezaDig']."</option>";
												// echo "<option value=''>- - -</option>";
												// piezaDigEvento($conexion);
												// echo "</select>";
												// echo "<button class='deleteDIG removeBTNS'></button>";
												// echo "</div>";
										// 	}
										// }

									// }else{
									// 	echo "<select name='inputDIG[]'>";
									// 	echo "<option value=''>Seleccione una opción</option>";
									// 	piezaDigEvento($conexion);
									// 	echo "</select>";
									// }
								?>						
							</div>
						</div>
						<div class="celda celdax30r">
							<div class="boxImpDig">
								<h4>Digital</h4>
								<div>
									<p>Adicione o elimine elementos según sea su requerimiento</p>
									<a class="linkGuia" href="#" target="_blank">Link Guia PDF IMP</a>
									<div class="plusMinus">
								        <button id="addDIG" class="btn btn-send btn-prevent">Agregar Campos Digitales</button>
								    </div>
							    </div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<button type="button" name="next" class="btn btn-prev btn-world" value="Next" />Atras</button>
			<button type="button" name="next" class="btn btn-next btn-world" value="Next" />Siguiente</button>
			<button type='submit' name='submitEvento' class='btn btn-submit btn-send' value='Next' onclick="myFunction()" />Finalizar</button>
		</fieldset> 
		  
		<!-- Página 3 -->
<!-- 		<fieldset>
		  	<div class="cuadricula">
		  		<div class="celda celdax60r">
		  			<div class="group tooltip" title="<?php lineamientoGraficosT(); ?>" data-tippy-arrow="true" data-tippy-animation="shift-toward" data-tippy-placement="left">
						<textarea name="lineamientoGraficos"><?php echo $_POST['lineamientoGraficos'] ?></textarea>
		  				<span class="bar"></span>
		  				<label>Lineamientos gráficos <span class="error"><?php echo $error[11] = (isset($error[11])) ? $error[11] : ""; ?></span></label>
		  			</div>
		  		</div>
		  		<div class="celda celdax40r">
		  			<div class="selectColor">
						<p class="colorTxt tooltip" title="<?php colorEventoT(); ?>" data-tippy-arrow="true" data-tippy-animation="shift-toward" data-tippy-placement="left">Colores sugeridos para la elaboración de las piezas </p>
						<p><input type="color" name="colorEvento[]" list value="<?php echo $_POST['colorEvento'][0] = isset($_POST['colorEvento'][0]) ? $_POST['colorEvento'][0] : "#ABB1BA" ?>"> Color sugerido 1</p>
						<p><input type="color" name="colorEvento[]" list value="<?php echo $_POST['colorEvento'][1] = isset($_POST['colorEvento'][1]) ? $_POST['colorEvento'][1] : "#ABB1BA" ?>"> Color sugerido 2</p>
						<p><input type="color" name="colorEvento[]" list value="<?php echo $_POST['colorEvento'][2] = isset($_POST['colorEvento'][2]) ? $_POST['colorEvento'][2] : "#ABB1BA" ?>"> Color sugerido 3</p>
					</div>
		  		</div>
		  	</div>
		  	<div class="cuadricula">
		  		<div class="celda">
		  			<div class="contentCheck checkboxAudioVisual">
						<p class="colorTxt tooltip" title="<?php checkPublicoObjT(); ?>" data-tippy-arrow="true" data-tippy-animation="shift-toward" data-tippy-placement="left">¿Cual es su público objetivo? </p>
						
						<input type="checkbox" class="option-input checkbox"  name="checkPublicoObj[]" value="1" <?php if (in_array("1", $_POST['checkPublicoObj'])) echo "checked"; ?> /> Estudiantes pregrado<br>
						<input type="checkbox" class="option-input checkbox"  name="checkPublicoObj[]" value="2" <?php if (in_array("2", $_POST['checkPublicoObj'])) echo "checked"; ?> /> Estudiantes posgrado<br>
						<input type="checkbox" class="option-input checkbox"  name="checkPublicoObj[]" value="3" <?php if (in_array("3", $_POST['checkPublicoObj'])) echo "checked"; ?> /> Docentes<br>
						<input type="checkbox" class="option-input checkbox"  name="checkPublicoObj[]" value="4" <?php if (in_array("4", $_POST['checkPublicoObj'])) echo "checked"; ?> /> Colaboradores administrativos<br>
						<input type="checkbox" class="option-input checkbox"  name="checkPublicoObj[]" value="5" <?php if (in_array("5", $_POST['checkPublicoObj'])) echo "checked"; ?> /> Egresados<br>
						<input type="checkbox" class="option-input checkbox"  name="checkPublicoObj[]" value="6" <?php if (in_array("6", $_POST['checkPublicoObj'])) echo "checked"; ?> /> Directivos<br>
					</div>
		  		</div>
		  	</div>
		   	<button type="button" name="prev" class="btn btn-prev btn-world" value="Next" />Atras</button>
			<button type='submit' name='submitEvento' class='btn btn-submit btn-send' value='Next' onclick="myFunction()" />Finalizar</button>
		</fieldset> -->
	</form>

<?php //session_destroy(); ?>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.3/jquery.easing.min.js"></script>
<script src="../../js/tippy.all.min.js"></script>
<script src="../../js/main-min.js"></script>
<script>
</script>

</body>
</html>