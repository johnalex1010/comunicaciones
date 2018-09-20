
<?php 
	session_start();

	set_time_limit(300);

	if ($_SESSION['home'] == 0) {
		header('Location:../../');
	}
	// session_destroy();
	require_once '../../php/funciones/tooltip.php';
	require_once '../../php/funciones/campos.php';
	require_once '../../php/validaciones/validarComInter.php';
?>

<!DOCTYPE html>
<html lang="es">
<head>
	<!-- METAS -->
	<meta charset="UTF-8" />
	<title>Comunicaciones Internas Solicitudes | Departamento de Comunicaciones</title>
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
				<h3 class="titleThird">Sección Comunicaciones Internas</h3>
			</div>
			<p class="txtIntro">Texto explicativo Lorem ipsum dolor sit amet, consectetur adipisicing elit. Voluptas beatae, eos nisi officia temporibus aliquid accusamus est maxime atque, voluptatibus commodi facere voluptatum esse quo ipsum expedita corporis ratione, debitis!
			</p>
			<p>Los campos con (<span style="color: #C20201;font-size:2rem;" >•</span>) son obligatorios.</p>
		</div>
	</div>
	<div class="content">
		<h2>Seleccione una de las opciones</h2>
		<div class="vertical-tabs">
			<!-- ========== Link TABS ========== -->
			<ul class="tabs vertical" data-tab="">
				<li class="tab-title  tooltip" title="<?php envioMailInstiT(); ?>" data-tippy-arrow="true" data-tippy-animation="shift-toward" data-tippy-placement="left"><a href="#panela1" aria-selected="true" tabindex="0">Envío de correos institucionales</a></li>
				<li class="tab-title  tooltip" title="<?php tomasNoticiaT(); ?>" data-tippy-arrow="true" data-tippy-animation="shift-toward" data-tippy-placement="left"><a href="#panelb1" aria-selected="false" tabindex="-1">Tomás Noticias</a></li>
				<li class="tab-title  tooltip" title="<?php condolenciasT(); ?>" data-tippy-arrow="true" data-tippy-animation="shift-toward" data-tippy-placement="left"><a href="#panelc1" aria-selected="false" tabindex="-1">Condolencias a través de mailing institucional</a></li>
				<li class="tab-title  tooltip" title="<?php cumpleaniosT(); ?>" data-tippy-arrow="true" data-tippy-animation="shift-toward" data-tippy-placement="left"><a href="#paneld1" aria-selected="false" tabindex="-1">Cumpleaños por mes a través de mailing institucional</a></li>
				<li class="tab-title  tooltip" title="<?php tarjetasConmemorativasT(); ?>" data-tippy-arrow="true" data-tippy-animation="shift-toward" data-tippy-placement="left"><a href="#paneld1" aria-selected="false" tabindex="-1">Tarjetas fechas conmemorativas</a></li>
			</ul>
			<!-- ========== Content TABS ========== -->
			<div class="tabs-content">
				<!-- ========== Content Correos Institucionales ========== -->
				<div class="contentTab" id="panela1" aria-hidden="false" >
					<h3>Envío de correos institucionales</h3>
					<form action="" method="post" enctype="multipart/form-data">
						<div class="cuadricula">
							<div class="celda">
								<div class="group tooltip" title="<?php correosInstuT(); ?>" data-tippy-arrow="true" data-tippy-animation="shift-toward">
									<input type="file" class="requi" name="adjMailInsti" value="<?php echo $_SESSION['adjMailInsti3']?>">
									<span class="bar"></span>
									<label>Adjuntar documento Word o PDF <span class="error"><?php echo $error[0] = (isset($error[0])) ? $error[0] : ""; ?></span></label>
								</div>
							</div>
						</div>
						<button type='submit' name='submitCorreosInstu' class='btn btn-submit btn-send' value='Next' onclick="myFunction()" />Finalizar</button>
					</form>
				</div>
				<!-- ========== Content Tomás Noticias ========== -->
				<div class="contentTab" id="panelb1" aria-hidden="true" tabindex="-1">
					<h3>Tomás Noticias</h3>
					<form action="" method="post" enctype="multipart/form-data">
						<div class="cuadricula">
							<div class="celda celdax2">
								<div class="group tooltip" title="<?php TNwordT(); ?>" data-tippy-arrow="true" data-tippy-animation="shift-toward">
									<input type="file" class="requi" name="adjInfoEvento" value="<?php echo $_SESSION['adjInfoEvento3']?>">
									<span class="bar"></span>
									<label>Adjuntar documento Word con la noticia <span class="error">Error</span></label>
								</div>
							</div>
							<div class="celda celdax2">
								<div class="group tooltip" title="<?php TNjpgT(); ?>" data-tippy-arrow="true" data-tippy-animation="shift-toward">
									<input type="file" class="requi" name="adjInfoEvento" value="<?php echo $_SESSION['adjInfoEvento3']?>">
									<span class="bar"></span>
									<label>Adjuntar imagen JPG de la noticia <span class="error">Error</span></label>
								</div>
							</div>
						</div>
						<button type='submit' name='submitTN' class='btn btn-submit btn-send' value='Next' onclick="myFunction()" />Finalizar</button>
					</form>
				</div>
				<!-- ========== Content Condolencias ========== -->
				<div class="contentTab" id="panelc1" aria-hidden="true" tabindex="-1">
					<h3>Condolencias</h3>
					<form action="" method="post">
						<div class="cuadricula">
							<div class="celda celdax3">
								<div class="group tooltip" title="<?php condoNombreT(); ?>" data-tippy-arrow="true" data-tippy-animation="shift-toward">
					  				<input type="text" class="requi" name="nombreEvento" value="<?php echo $_SESSION['nombreEvento'] = (isset($_SESSION['nombreEvento'])) ? $_SESSION['nombreEvento'] : ''; ?>">
					  				<span class="bar"></span>
					  				<span class="required"></span>
					  				<label>Nombre del administrativo o estudiante <span class="error">Error</span></label>
					  			</div>
							</div>
							<div class="celda celdax3">
								<div class="group tooltip" title="<?php condoCargoT(); ?>" data-tippy-arrow="true" data-tippy-animation="shift-toward">
					  				<input type="text" class="requi" name="nombreEvento" value="<?php echo $_SESSION['nombreEvento'] = (isset($_SESSION['nombreEvento'])) ? $_SESSION['nombreEvento'] : ''; ?>">
					  				<span class="bar"></span>
					  				<span class="required"></span>
					  				<label>Cargo <span class="error">Error</span></label>
					  			</div>
							</div>
							<div class="celda celdax3">
								<div class="group tooltip" title="<?php condoFacDepT(); ?>" data-tippy-arrow="true" data-tippy-animation="shift-toward">
					  				<select name="tipoEvento" id="tipoEvento">
									<?php
										if ($_SESSION['tipoEvento'] == "") {
											echo "<option value='' disable selected>- - -</option>";
										}else{
											echo "<option value='".$_SESSION['tipoEvento']."' selected>".$_SESSION['tipoEvento']."</option>";
										}
										tipoEvento();
									?>
									</select>
					  				<span class="bar"></span>
					  				<span class="required"></span>
					  				<label>Facultad / Dependencia <span class="error">Error</span></label>
					  			</div>
							</div>
						</div>
						<div class="cuadricula">
							<div class="celda celdax3">
								<div class="group tooltip" title="<?php condoFalleT(); ?>" data-tippy-arrow="true" data-tippy-animation="shift-toward">
					  				<input type="text" class="requi" name="nombreEvento" value="<?php echo $_SESSION['nombreEvento'] = (isset($_SESSION['nombreEvento'])) ? $_SESSION['nombreEvento'] : ''; ?>">
					  				<span class="bar"></span>
					  				<span class="required"></span>
					  				<label>Nombre del fallecido <span class="error">Error</span></label>
					  			</div>
							</div>
							<div class="celda celdax3">
								<div class="group tooltip" title="<?php condoParenT(); ?>" data-tippy-arrow="true" data-tippy-animation="shift-toward">
					  				<input type="text" class="requi" name="nombreEvento" value="<?php echo $_SESSION['nombreEvento'] = (isset($_SESSION['nombreEvento'])) ? $_SESSION['nombreEvento'] : ''; ?>">
					  				<span class="bar"></span>
					  				<label>Parentesco <span class="error">Error</span></label>
					  			</div>
							</div>
							<div class="celda celdax3">
								<div class="group tooltip" title="<?php condoLugarVelT(); ?>" data-tippy-arrow="true" data-tippy-animation="shift-toward">
					  				<input type="text" class="requi" name="nombreEvento" value="<?php echo $_SESSION['nombreEvento'] = (isset($_SESSION['nombreEvento'])) ? $_SESSION['nombreEvento'] : ''; ?>">
					  				<span class="bar"></span>
					  				<label>Lugar de velación <span class="error">Error</span></label>
					  			</div>
							</div>
						</div>
						<div class="cuadricula">
							<div class="celda celdax3">
								<div class="group tooltip" title="<?php condoFVelaT(); ?>" data-tippy-arrow="true" data-tippy-animation="shift-toward">
					  				<input type="date" name="fIniEvento" value="<?php echo $_SESSION['fIniEvento'] = (isset($_SESSION['fIniEvento'])) ? $_SESSION['fIniEvento'] : ''; ?>">
					  				<span class="bar"></span>
					  				<label>Fecha de velación <span class="error">Error</span></label>
					  			</div>
							</div>
							<div class="celda celdax3">
								<div class="group tooltip" title="<?php condoHVelaT(); ?>" data-tippy-arrow="true" data-tippy-animation="shift-toward">
					  				<input type="time" name="horaEvento" value="<?php echo $_SESSION['horaEvento'] = (isset($_SESSION['horaEvento'])) ? $_SESSION['horaEvento'] : ''; ?>">
					  				<span class="bar"></span>
					  				<label>Hora de velación <span class="error"><?php echo $error[5] = (isset($error[5])) ? $error[5] : ""; ?></span></label>
					  			</div>
							</div>
							<div class="celda celdax3"></div>
						</div>
						<button type='submit' name='submitCondo' class='btn btn-submit btn-send' value='Next' onclick="myFunction()" />Finalizar</button>
					</form>
				</div>
				<!-- ========== Content Cumpleaños ========== -->
				<div class="contentTab" id="paneld1" aria-hidden="true" tabindex="-1">
					<h3>Envío de cumpleaños por mes</h3>
					<form action="" method="post" enctype="multipart/form-data">
						<div class="cuadricula">
							<div class="celda">
								<div class="group tooltip" title="<?php cumpleT(); ?>" data-tippy-arrow="true" data-tippy-animation="shift-toward">
									<input type="file" class="requi" name="adjInfoEvento" value="<?php echo $_SESSION['adjInfoEvento3']?>">
									<span class="bar"></span>
									<label>Adjuntar documento PDF <span class="error">Error</span></label>
								</div>
							</div>
						</div>
						<button type='submit' name='submitCumple' class='btn btn-submit btn-send' value='Next' onclick="myFunction()" />Finalizar</button>
					</form>
				</div>
				<!-- ========== Content Tarjetas conmemorativas ========== -->
				<div class="contentTab" id="paneld1" aria-hidden="true" tabindex="-1">
					<h3>Tarjetas de fechas conmemorativas</h3>
					<form action="" method="post">
						<div class="cuadricula">
							<div class="celda celdax2">
								<div class="group tooltip" title="<?php conmeNombreT(); ?>" data-tippy-arrow="true" data-tippy-animation="shift-toward">
					  				<input type="text" class="requi" name="nombreEvento" value="<?php echo $_SESSION['nombreEvento'] = (isset($_SESSION['nombreEvento'])) ? $_SESSION['nombreEvento'] : ''; ?>">
					  				<span class="bar"></span>
					  				<span class="required"></span>
					  				<label>Nombre de la conmemoración <span class="error">Error</span></label>
					  			</div>
							</div>
							<div class="celda celdax2">
								<div class="group tooltip" title="<?php conmeFT(); ?>" data-tippy-arrow="true" data-tippy-animation="shift-toward">
					  				<input type="date" name="fIniEvento" value="<?php echo $_SESSION['fIniEvento'] = (isset($_SESSION['fIniEvento'])) ? $_SESSION['fIniEvento'] : ''; ?>">
					  				<span class="bar"></span>
					  				<label>Fecha de conmemoración <span class="error">Error</span></label>
					  			</div>
							</div>
						</div>
						<div class="cuadricula">
							<div class="celda">
								<div class="group tooltip" title="<?php conmeMSJT(); ?>" data-tippy-arrow="true" data-tippy-animation="shift-toward">
									<textarea name="jutifiCubWEbEvento" id=""><?php //echo $_SESSION['jutifiCubWEbEvento'] ?></textarea>
					  				<span class="bar"></span>
					  				<label>Mensaje <span class="error">Error</span></label>
					  			</div>
							</div>
						</div>
						<button type='submit' name='submitTC' class='btn btn-submit btn-send' value='Next' onclick="myFunction()" />Finalizar</button>
					</form>
				</div>
			</div>
		</div>
	</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.3/jquery.easing.min.js"></script>
<script src="../../js/tippy.all.min.js"></script>
<script src="../../js/main-min.js"></script>

</body>
</html>