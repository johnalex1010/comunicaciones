
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
		<fieldset>
		  	<div class="cuadricula">
		  		<div class="celda celdax3">
		  			<div class="group tooltip" title="<?php tipoEventoT(); ?>" data-tippy-arrow="true" data-tippy-animation="shift-toward">
		  				<select name="tipoEvento" id="tipoEvento">
						<?php
							if ($_SESSION['tipoEvento'] == "") {
								echo "<option value='' disable selected>- - -</option>";
							}else{
								echo "<option value='".$_SESSION['tipoEvento']."' selected>".$_SESSION['tipoEvento']."</option>";
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
		  				<input type="text" class="requi" name="nombreEvento" value="<?php echo $_SESSION['nombreEvento'] = (isset($_SESSION['nombreEvento'])) ? $_SESSION['nombreEvento'] : ''; ?>">
		  				<span class="bar"></span>
		  				<span class="required"></span>
		  				<label>Nombre del evento <span class="error"><?php echo $error[1] = (isset($error[1])) ? $error[1] : ""; ?></span></label>
		  			</div>
		  		</div>
		  		<div class="celda celdax3">
		  			<div class="group tooltip" title="<?php lugarEventoT(); ?>" data-tippy-arrow="true" data-tippy-animation="shift-toward">
		  				<input type="text" name="lugarEvento"  value="<?php echo $_SESSION['lugarEvento'] = (isset($_SESSION['lugarEvento'])) ? $_SESSION['lugarEvento'] : ''; ?>">
		  				<span class="bar"></span>
		  				<span class="required"></span>
		  				<label>Lugar del evento <span class="error"><?php echo $error[2] = (isset($error[2])) ? $error[2] : ""; ?></span></label>
		  			</div>
		  		</div>
		  	</div>
		  	<div class="cuadricula">
		  		<div class="celda celdax3">
		  			<div class="group tooltip" title="<?php fIniEventoT(); ?>" data-tippy-arrow="true" data-tippy-animation="shift-toward">
		  				<input type="date" name="fIniEvento" value="<?php echo $_SESSION['fIniEvento'] = (isset($_SESSION['fIniEvento'])) ? $_SESSION['fIniEvento'] : ''; ?>">
		  				<span class="bar"></span>
		  				<span class="required"></span>
		  				<label>Fecha de inicio del evento <span class="error"><?php echo $error[3] = (isset($error[3])) ? $error[3] : ""; ?></span></label>
		  			</div>
		  		</div>
		  		<div class="celda celdax3">
		  			<div class="group tooltip" title="<?php fFinEventoT(); ?>" data-tippy-arrow="true" data-tippy-animation="shift-toward">
		  				<input type="date" class="requi" name="fFinEvento" value="<?php echo $_SESSION['fFinEvento'] = (isset($_SESSION['fFinEvento'])) ? $_SESSION['fFinEvento'] : ''; ?>">
		  				<span class="bar"></span>
		  				<span class="required"></span>
		  				<label>Fecha de finalización del evento <span class="error"><?php echo $error[4] = (isset($error[4])) ? $error[4] : ""; ?></span></label>
		  			</div>
		  		</div>
		  		<div class="celda celdax3">
		  			<div class="group tooltip" title="<?php horaEventoT(); ?>" data-tippy-arrow="true" data-tippy-animation="shift-toward">
		  				<input type="time" name="horaEvento" value="<?php echo $_SESSION['horaEvento'] = (isset($_SESSION['horaEvento'])) ? $_SESSION['horaEvento'] : ''; ?>">
		  				<span class="bar"></span>
		  				<span class="required"></span>
		  				<label>Hora de inicio del evento <span class="error"><?php echo $error[5] = (isset($error[5])) ? $error[5] : ""; ?></span></label>
		  			</div>
		  		</div>
		  	</div>
		  	<div class="cuadricula">	
		  		<div class="celda celdax2">
		  			<div class="group tooltip" title="<?php numTICEventoT(); ?>" data-tippy-arrow="true" data-tippy-animation="shift-toward">
		  				<input type="text" name="numTICEvento" value="<?php echo $_SESSION['numTICEvento'] = (isset($_SESSION['numTICEvento'])) ? $_SESSION['numTICEvento'] : ''; ?>">
		  				<span class="bar"></span>
		  				<label>Numero TIC del evento <span class="error"><span class="error"><?php echo $error[6] = (isset($error[6])) ? $error[6] : ""; ?></span></label>
		  			</div>
		  		</div>
		  		<div class="celda celdax2">
		  			<div class="group tooltip" title="<?php adjInfoEventoT(); ?>" data-tippy-arrow="true" data-tippy-animation="shift-toward">
		  				<input type="file" class="requi" name="adjInfoEvento" value="<?php echo $_SESSION['adjInfoEvento3']?>">
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
		  		<div class="celda celdax2 p1" style="display: <?php echo $display = (isset($_SESSION['tipoCubAUEvento'])) ? "block" : "none"; ?>">
					<div class="contentCheck checkboxAudioVisual">
						<p class="colorTxt tooltip" title="<?php tipoCubAUEventoT(); ?>" data-tippy-arrow="true" data-tippy-animation="shift-toward" data-tippy-placement="left">¿Que tipo de cubrimiento audiovisual requiere? </p>
						<p><input type='checkbox' class="option-input checkbox" name='tipoCubAUEvento[]' value='1' <?php if (in_array("1", $_SESSION['tipoCubAUEvento'])) echo "checked"; ?> > Fotográfia</p>
						<p><input type='checkbox' class="option-input checkbox" name='tipoCubAUEvento[]' value='2' <?php if (in_array("2", $_SESSION['tipoCubAUEvento'])) echo "checked"; ?> > Zona T</p>
						<p><input type='checkbox' class="option-input checkbox" name='tipoCubAUEvento[]' value='3' <?php if (in_array("3", $_SESSION['tipoCubAUEvento'])) echo "checked"; ?> > Maestro de ceremonia</p>
						<p><input type='checkbox' class="option-input checkbox" name='tipoCubAUEvento[]' value='4' <?php if (in_array("4", $_SESSION['tipoCubAUEvento'])) echo "checked"; ?> > Redes sociales y divulgación de piezas</p>
					</div>
				</div>
		  		<div class="celda celdax2 p2" style="display: <?php echo $display = (isset($_SESSION['tipoCubWEbEvento'])) ? "block" : "none"; ?>">
		  			<div class="contentCheck">
						<p class="colorTxt tooltip" title="<?php tipoCubWEbEventoT(); ?>" data-tippy-arrow="true" data-tippy-animation="shift-toward" data-tippy-placement="left">¿Que tipo de sitio web requiere su evento? </p>
						<p><input type="radio" class="option-input radio" name="tipoCubWEbEvento" value="Nuevo" 
							<?php echo $checked = ($_SESSION['tipoCubWEbEvento'] == "Nuevo") ? $checked = "checked" : "" ?>
							 /> Nuevo</p>
						<p><input type="radio" class="option-input radio" name="tipoCubWEbEvento" value="Actualización" 
							<?php echo $checked = ($_SESSION['tipoCubWEbEvento'] == "Actualización") ? $checked = "checked" : "" ?>
						 /> Actualización</p>
					</div>
					<br><br>
					<div class="group tooltip" title="<?php jutifiCubWEbEventoT(); ?>" data-tippy-arrow="true" data-tippy-animation="shift-toward" data-tippy-placement="left">
						<textarea name="jutifiCubWEbEvento" id="" maxlength="500"><?php echo $_SESSION['jutifiCubWEbEvento'] ?></textarea>
		  				<span class="bar"></span>
		  				<label>Justificación del sitio web <span class="error"><?php echo $error[8] = (isset($error[8])) ? $error[8] : ""; ?></span></label>
		  			</div>
		  			<br>
					<div class="group tooltip" title="<?php adjCubWEbEventoT(); ?>" data-tippy-arrow="true" data-tippy-animation="shift-toward" data-tippy-placement="left">
		  				<input type="file" class="requi" name="adjCubWEbEvento" value="<?php echo $_SESSION['adjCubWEbEvento'] = (isset($_SESSION['adjCubWEbEvento'])) ? $_SESSION['adjCubWEbEvento'] : ''; ?>">
		  				<span class="bar"></span>	
		  				<label>Adjuntar ZIP con el plan de navegación e imagenes<span class="error"><?php echo $error[9] = (isset($error[9])) ? $error[9] : ""; ?></span></label>
		  			</div>
		  		</div>
		  	</div>
		    	<button type="button" name="next" class="btn btn-next btn-world" value="Next" />Siguiente</button>
		</fieldset>
		  
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
						<p><input type="checkbox" class="option-input checkbox btnCheckImp" <?php if (!empty($_SESSION['selectPiezaIMPEvento'][0])) {echo "checked";}?>>Impresas &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" class="option-input checkbox btnCheckWeb" <?php if (!empty($_SESSION['tipoDIGEvento'][0])) {echo "checked";}?>>Digitales</p>
					</div>
				</div>
			</div>

			<div class="cuadricula imp" style="display: <?php echo $display = (!empty($_SESSION['selectPiezaIMPEvento'][0])) ? "block" : "none"; ?>">
				<div class="celda">
					<h3 class="tooltip" title="<?php impresosEventoT(); ?>" data-tippy-arrow="true" data-tippy-animation="shift-toward" data-tippy-placement="left">IMPRESOS</h3>
					<div class="cuadricula">
						<div class="celda celdax70r">
							<table border="0" class="tableImpWeb">
								<tbody id="row_divIMP">
									<tr id="floorstrText0">
										<td>
											<div class="group tooltip" title="<?php selectPiezaIMPEventoT(); ?>" data-tippy-arrow="true" data-tippy-animation="shift-toward">
								  				<select name="selectPiezaIMPEvento[]">
												<?php
													if ($_SESSION['selectPiezaIMPEvento'][0] == "") {
														echo "<option value='' disable selected>- - -</option>";
													}else{
														echo "<option value='".$_SESSION['selectPiezaIMPEvento'][0]."' selected>".$_SESSION['selectPiezaIMPEvento'][0]."</option>";
													}
													piezaImpEvento($conexion);
												?>
												</select>
								  				<span class="bar"></span>
								  				<label>Seleccione pieza </label>
								  			</div>
										</td>
										<td>
											<div class="group tooltip" title="<?php acabadoIMPEventoT(); ?>" data-tippy-arrow="true" data-tippy-animation="shift-toward">
								  				<select name="acabadoIMPEvento[]" id="acabadoIMPEvento">
												<?php
													if ($_SESSION['acabadoIMPEvento'][0] == "") {
														echo "<option value='' disable selected>- - -</option>";
													}else{
														echo "<option value='".$_SESSION['acabadoIMPEvento'][0]."' selected>".$filaIMP[1]."</option>";
													}
													acabadosImpEvento($conexion);
												?>
												</select>
								  				<span class="bar"></span>
								  				<label>Seleccione Acabados </label>
								  			</div>
										</td>
										<td>
											<div class="group tooltip" title="<?php tipoPapelIMPEventoT(); ?>" data-tippy-arrow="true" data-tippy-animation="shift-toward">
								  				<select name="tipoPapelIMPEvento[]" id="tipoPapelIMPEvento">
												<?php
													if ($_SESSION['tipoPapelIMPEvento'][0] == "") {
														echo "<option value='' disable selected>- - -</option>";
													}else{
														echo "<option value='".$_SESSION['tipoPapelIMPEvento'][0]."' selected>".$_SESSION['tipoPapelIMPEvento'][0]."</option>";
													}
													tipoPapelEvento($conexion);
												?>
												</select>
								  				<span class="bar"></span>
								  				<label>Tipo de papel </label>
								  			</div>
										</td>
										<td>
											<div class="group tooltip" title="<?php cantidadIMPEventoT(); ?>" data-tippy-arrow="true" data-tippy-animation="shift-toward">
											<input type="text" name="cantidadIMPEvento[]" id="cantidadIMPEvento" value="<?php echo $_SESSION['cantidadIMPEvento'][0] = (!empty($_SESSION['cantidadIMPEvento'][0])) ? $_SESSION['cantidadIMPEvento'][0] : ""; ?>">
								  				<span class="bar"></span>
								  				<label>Cantidad <span class="error"><?php echo $error[12] = (isset($error[12])) ? $error[12] : ""; ?></span></label>
								  			</div>
										</td>
									</tr>
									<?php 

										if (isset($_SESSION['selectPiezaIMPEvento'][1])) {

											if (!empty($_SESSION['selectPiezaIMPEvento'][1])) {
											
											
											$conutArrayImp = count($_SESSION['selectPiezaIMPEvento']);

											for ($i=2; $i <= $conutArrayImp; $i++) { 
									?>
									<tr id="floorstrText<?php echo $i-1; ?>">
										<td>
											<div class="group tooltip" title="<?php selectPiezaIMPEventoT(); ?>" data-tippy-arrow="true" data-tippy-animation="shift-toward">
								  				<select name="selectPiezaIMPEvento[]">
												<?php
													if ($_SESSION['selectPiezaIMPEvento'][$i-1] == "") {
														echo "<option value='' disable selected>- - -</option>";
													}else{
														echo "<option value='".$_SESSION['selectPiezaIMPEvento'][$i-1]."' selected>".$_SESSION['selectPiezaIMPEvento'][$i-1]."</option>";
													}
													piezaImpEvento($conexion);
												?>
												</select>
								  				<span class="bar"></span>
								  				<label>Seleccione pieza </label>
								  			</div>
										</td>
										<td>
											<div class="group tooltip" title="<?php acabadoIMPEventoT(); ?>" data-tippy-arrow="true" data-tippy-animation="shift-toward">
								  				<select name="acabadoIMPEvento[]" id="acabadoIMPEvento">
												<?php
													if ($_SESSION['acabadoIMPEvento'][$i-1] == "") {
														echo "<option value='' disable selected>- - -</option>";
													}else{
														echo "<option value='".$_SESSION['acabadoIMPEvento'][$i-1]."' selected>".$_SESSION['acabadoIMPEvento'][$i-1]."</option>";
													}
													acabadosImpEvento($conexion);
												?>
												</select>
								  				<span class="bar"></span>
								  				<label>Seleccione Acabados </label>
								  			</div>
										</td>
										<td>
											<div class="group tooltip" title="<?php tipoPapelIMPEventoT(); ?>" data-tippy-arrow="true" data-tippy-animation="shift-toward">
								  				<select name="tipoPapelIMPEvento[]" id="tipoPapelIMPEvento">
												<?php
													if ($_SESSION['tipoPapelIMPEvento'][$i-1] == "") {
														echo "<option value='' disable selected>- - -</option>";
													}else{
														echo "<option value='".$_SESSION['tipoPapelIMPEvento'][$i-1]."' selected>".$_SESSION['tipoPapelIMPEvento'][$i-1]."</option>";
													}
													tipoPapelEvento($conexion);
												?>
												</select>
								  				<span class="bar"></span>
								  				<label>Tipo de papel </label>
								  			</div>
										</td>
										<td>
											<div class="group tooltip" title="<?php cantidadIMPEventoT(); ?>" data-tippy-arrow="true" data-tippy-animation="shift-toward">
											<input type="text" name="cantidadIMPEvento[]" id="cantidadIMPEvento" value="<?php echo $_SESSION['cantidadIMPEvento'][$i-1] = (!empty($_SESSION['cantidadIMPEvento'][$i-1])) ? $_SESSION['cantidadIMPEvento'][$i-1] : ""; ?>">
								  				<span class="bar"></span>
								  				<label>Cantidad <span class="error"><?php echo $error[12] = (isset($error[12])) ? $error[12] : ""; ?></span></label>
								  			</div>
										</td>
									</tr>
									<?php }	} } ?>
									</tbody>
							</table>
						</div>
						<div class="celda celdax30r">
							<div class="boxImpDig">
								<h4>Impresos</h4>
								<div>
									<p>Adicione o elimine elementos según sea su requerimiento</p>
									<a class="linkGuia" href="#" target="_blank">Link Guia PDF IMP</a>
									<div class="plusMinus">
								        <a class="btn" href="javascript:add_trIMP();">Add</a>
								        <a class="btn" href="javascript:remove_trIMP();">Remove</a>
								    </div>
							    </div>
							</div>
						</div>
					</div>
				</div>
			</div>

			<div class="cuadricula web" style="display: <?php echo $display = (!empty($_SESSION['tipoDIGEvento'][0])) ? "block" : "none"; ?>"
				<div class="celda">
					<h3 class="tooltip" title="<?php digEventoT(); ?>" data-tippy-arrow="true" data-tippy-animation="shift-toward" data-tippy-placement="left">DIGITAL</h3>
					<div class="cuadricula">
						<div class="celda celdax70r">
							<div id="row_divDIG">
								<div class="group tooltip" title="<?php tipoDIGEventoT(); ?>" data-tippy-arrow="true" data-tippy-animation="shift-toward" data-tippy-placement="left">
					  				<select name="tipoDIGEvento[]">
									<?php
										if ($_SESSION['tipoDIGEvento'][0] == "") {
											echo "<option value='' disable selected>- - -</option>";
										}else{
											echo "<option value='".$_SESSION['tipoDIGEvento'][0]."' selected>".$_SESSION['tipoDIGEvento'][0]."</option>";
										}
										piezaDigEvento($conexion);
									?>
									</select>
					  				<span class="bar"></span>
					  				<label>Seleccione pieza </label>
					  			</div>							
					  		

					  		<?php
					  			if (isset($_SESSION['tipoDIGEvento'][1])) {
					  				if (!empty($_SESSION['tipoDIGEvento'][1])) {
					  					$conutArrayDig = count($_SESSION['tipoDIGEvento']);

										for ($d=2; $d <= $conutArrayDig; $d++) {
											// echo $d;
							?>
								<div id="floorstrText<?php echo $d-1 ?>">
									<div class="group tooltip" title="<?php tipoDIGEventoT(); ?>" data-tippy-arrow="true" data-tippy-animation="shift-toward" data-tippy-placement="left">
						  				<select name="tipoDIGEvento[]">
										<?php
											if ($_SESSION['tipoDIGEvento'][$d-1] == "") {
												echo "<option value='' disable selected>- - -</option>";
											}else{
												echo "<option value='".$_SESSION['tipoDIGEvento'][$d-1]."' selected>".$_SESSION['tipoDIGEvento'][$d-1]."</option>";
											}
											piezaDigEvento($conexion);
										?>
										</select>
						  				<span class="bar"></span>
						  				<label>Seleccione pieza</label>
						  			</div>
						  		</div>
						  	<?php 
										}
					  				}
					  			}
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
								        <a class="btn" href="javascript:add_trWEB();">Add</a>
								        <a class="btn" href="javascript:remove_trWEB();">Remove</a>
								    </div>
							    </div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<button type="button" name="next" class="btn btn-prev btn-world" value="Next" />Atras</button>
			<button type="button" name="next" class="btn btn-next btn-world" value="Next" />Siguiente</button>
		</fieldset> 
		  
		<!-- Página 3 -->
		<fieldset>
		  	<div class="cuadricula">
		  		<div class="celda celdax60r">
		  			<div class="group tooltip" title="<?php lineamientoGraficosT(); ?>" data-tippy-arrow="true" data-tippy-animation="shift-toward" data-tippy-placement="left">
						<textarea name="lineamientoGraficos" id="" maxlength="500"><?php echo $_SESSION['lineamientoGraficos'] ?></textarea>
		  				<span class="bar"></span>
		  				<label>Lineamientos gráficos <span class="error"><?php echo $error[11] = (isset($error[11])) ? $error[11] : ""; ?></span></label>
		  			</div>
		  		</div>
		  		<div class="celda celdax40r">
		  			<div class="selectColor">
						<p class="colorTxt tooltip" title="<?php colorEventoT(); ?>" data-tippy-arrow="true" data-tippy-animation="shift-toward" data-tippy-placement="left">Colores sugeridos para la elaboración de las piezas </p>
						<p><input type="color" name="colorEvento[]" list value="<?php echo $_SESSION['colorEvento'][0] = isset($_SESSION['colorEvento'][0]) ? $_SESSION['colorEvento'][0] : "#ABB1BA" ?>"> Color sugerido 1</p>
						<p><input type="color" name="colorEvento[]" list value="<?php echo $_SESSION['colorEvento'][1] = isset($_SESSION['colorEvento'][1]) ? $_SESSION['colorEvento'][1] : "#ABB1BA" ?>"> Color sugerido 2</p>
						<p><input type="color" name="colorEvento[]" list value="<?php echo $_SESSION['colorEvento'][2] = isset($_SESSION['colorEvento'][2]) ? $_SESSION['colorEvento'][2] : "#ABB1BA" ?>"> Color sugerido 3</p>
					</div>
		  		</div>
		  	</div>
		  	<div class="cuadricula">
		  		<div class="celda">
		  			<div class="contentCheck checkboxAudioVisual">
						<p class="colorTxt tooltip" title="<?php checkPublicoObjT(); ?>" data-tippy-arrow="true" data-tippy-animation="shift-toward" data-tippy-placement="left">¿Cual es su público objetivo? </p>
						
						<input type="checkbox" class="option-input checkbox"  name="checkPublicoObj[]" value="1" <?php if (in_array("1", $_SESSION['checkPublicoObj'])) echo "checked"; ?> /> Estudiantes pregrado<br>
						<input type="checkbox" class="option-input checkbox"  name="checkPublicoObj[]" value="2" <?php if (in_array("2", $_SESSION['checkPublicoObj'])) echo "checked"; ?> /> Estudiantes posgrado<br>
						<input type="checkbox" class="option-input checkbox"  name="checkPublicoObj[]" value="3" <?php if (in_array("3", $_SESSION['checkPublicoObj'])) echo "checked"; ?> /> Docentes<br>
						<input type="checkbox" class="option-input checkbox"  name="checkPublicoObj[]" value="4" <?php if (in_array("4", $_SESSION['checkPublicoObj'])) echo "checked"; ?> /> Colaboradores administrativos<br>
						<input type="checkbox" class="option-input checkbox"  name="checkPublicoObj[]" value="5" <?php if (in_array("5", $_SESSION['checkPublicoObj'])) echo "checked"; ?> /> Egresados<br>
						<input type="checkbox" class="option-input checkbox"  name="checkPublicoObj[]" value="6" <?php if (in_array("6", $_SESSION['checkPublicoObj'])) echo "checked"; ?> /> Directivos<br>
					</div>
		  		</div>
		  	</div>
		   	<button type="button" name="prev" class="btn btn-prev btn-world" value="Next" />Atras</button>
			<button type='submit' name='submitEvento' class='btn btn-submit btn-send' value='Next' onclick="myFunction()" />Finalizar</button>
		</fieldset>
		

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