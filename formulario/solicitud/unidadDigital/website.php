
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
				<h3 class="titleThird">Sección Sitios Web</h3>
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
				<li class="tab-title tooltip <?php echo $active = isset($_POST['submitCorreosInstu']) ? $active = 'active' : "" ?>" title="<?php envioMailInstiT(); ?>" data-tippy-arrow="true" data-tippy-animation="shift-toward" data-tippy-placement="left"><a href="#panela1" aria-selected="true" tabindex="0">Nuevo sitio web</a></li>
				<li class="tab-title tooltip <?php echo $active = isset($_POST['submitTN']) ? $active = 'active' : "" ?>" title="<?php tomasNoticiaT(); ?>" data-tippy-arrow="true" data-tippy-animation="shift-toward" data-tippy-placement="left"><a href="#panelb1" aria-selected="false" tabindex="-1">Ajustes de textos y/o imagenes web</a></li>
				<li class="tab-title tooltip <?php echo $active = isset($_POST['submitCondo']) ? $active = 'active' : "" ?>" title="<?php condolenciasT(); ?>" data-tippy-arrow="true" data-tippy-animation="shift-toward" data-tippy-placement="left"><a href="#panelc1" aria-selected="false" tabindex="-1">Capacitación para contenidos web</a></li>
				<!-- <li class="tab-title tooltip <?php echo $active = isset($_POST['submitCumple']) ? $active = 'active' : "" ?>" title="<?php cumpleaniosT(); ?>" data-tippy-arrow="true" data-tippy-animation="shift-toward" data-tippy-placement="left"><a href="#paneld1" aria-selected="false" tabindex="-1">Desarrollo de aplicativos web</a></li> -->
			</ul>
			<!-- ========== Content TABS ========== -->
			<div class="tabs-content">
				<!-- ========== Content Nuevo sitio web ========== -->
				<div class="contentTab <?php echo $active = isset($_POST['submitCorreosInstu']) ? $active = 'active' : "" ?>" id="panela1" aria-hidden="false" >
					<h3>Nuevo sitio web</h3>
					<form action="" method="post" enctype="multipart/form-data">
						<p><span class="error"><?php echo $error[0][0] = (isset($error[0][0])) ? $error[0][0] : ""; ?></span></p>

						<div class="cuadricula">
							<div class="celda celdax2">
								<div class="group tooltip" title="<?php nombreEventoT(); ?>" data-tippy-arrow="true" data-tippy-animation="shift-toward">
					  				<input type="text" class="requi" name="nombreEvento" value="<?php echo $_SESSION['nombreEvento'] = (isset($_SESSION['nombreEvento'])) ? $_SESSION['nombreEvento'] : ''; ?>">
					  				<span class="bar"></span>
					  				<span class="required"></span>
					  				<label>Nombre del evento <span class="error"><?php echo $error[1] = (isset($error[1])) ? $error[1] : ""; ?></span></label>
					  			</div>
							</div>
							<div class="celda celdax2">
								<div class="group tooltip" title="<?php nombreEventoT(); ?>" data-tippy-arrow="true" data-tippy-animation="shift-toward">
					  				<input type="text" class="requi" name="nombreEvento" value="<?php echo $_SESSION['nombreEvento'] = (isset($_SESSION['nombreEvento'])) ? $_SESSION['nombreEvento'] : ''; ?>">
					  				<span class="bar"></span>
					  				<label>Subdominio.usta.edu.co <span class="error"><?php echo $error[1] = (isset($error[1])) ? $error[1] : ""; ?></span></label>
					  			</div>
							</div>
						</div>

						<div class="cuadricula">
							<div class="celda celdax2">
								<div class="group tooltip" title="<?php correosInstuT(); ?>" data-tippy-arrow="true" data-tippy-animation="shift-toward">
									<input type="file" class="requi" name="adjMailInsti" value="<?php echo $_SESSION['adjMailInsti3']?>">
									<span class="bar"></span>
									<label>Adjuntar contenido y plan de navegación en (Word /Excel / PDF) <span class="error"><?php echo $error[0][1] = (isset($error[0][1])) ? $error[0][1] : ""; ?></span></label>
								</div>
							</div>
							<div class="celda celdax2">
								<div class="group tooltip" title="<?php correosInstuT(); ?>" data-tippy-arrow="true" data-tippy-animation="shift-toward">
									<input type="file" class="requi" name="adjMailInsti" value="<?php echo $_SESSION['adjMailInsti3']?>">
									<span class="bar"></span>
									<label>Adjuntar ZIP con linea gráfica <span class="error"><?php echo $error[0][1] = (isset($error[0][1])) ? $error[0][1] : ""; ?></span></label>
								</div>
							</div>
						</div>
						<div class="cuadricula">
							<div class="celda">
								<div class="group tooltip" title="<?php lineamientoGraficosT(); ?>" data-tippy-arrow="true" data-tippy-animation="shift-toward" data-tippy-placement="left">
									<textarea name="lineamientoGraficos" id=""><?php echo $_SESSION['lineamientoGraficos'] ?></textarea>
					  				<span class="bar"></span>
					  				<label>Lineamientos gráficos <span class="error"><?php echo $error[11] = (isset($error[11])) ? $error[11] : ""; ?></span></label>
					  			</div>
							</div>
						</div>
						<button type='submit' name='submitCorreosInstu' class='btn btn-submit btn-send' value='Next' onclick="myFunction()" />Finalizar</button>
					</form>
				</div>
				<!-- ========== Content Ajustes de textos y/o imagenes web ========== -->
				<div class="contentTab <?php echo $active = isset($_POST['submitTN']) ? $active = 'active' : "" ?>" id="panelb1" aria-hidden="true" tabindex="-1">
					<h3>Ajustes de textos y/o imagenes web</h3>
					<form action="" method="post" enctype="multipart/form-data">
						<p><span class="error"><?php echo $error[1][0] = (isset($error[1][0])) ? $error[1][0] : ""; ?></span></p>
						<div class="cuadricula">
							<div class="celda">
								<div class="group tooltip" title="<?php nombreEventoT(); ?>" data-tippy-arrow="true" data-tippy-animation="shift-toward">
					  				<input type="text" class="requi" name="nombreEvento" value="<?php echo $_SESSION['nombreEvento'] = (isset($_SESSION['nombreEvento'])) ? $_SESSION['nombreEvento'] : ''; ?>">
					  				<span class="bar"></span>
					  				<span class="required"></span>
					  				<label>Url<span class="error"><?php echo $error[1] = (isset($error[1])) ? $error[1] : ""; ?></span></label>
					  			</div>
							</div>
						</div>
						<div class="cuadricula">
							<div class="celda celdax2">
								<div class="group tooltip" title="<?php TNwordT(); ?>" data-tippy-arrow="true" data-tippy-animation="shift-toward">
									<input type="file" class="requi" name="adjTNWord" value="<?php echo $_SESSION['adjTNWord3']?>">
									<span class="bar"></span>
									<label>Adjuntar documento PDF<span class="error"><?php echo $error[1][1] = (isset($error[1][1])) ? $error[1][1] : ""; ?></span></label>
								</div>
							</div>
							<div class="celda celdax2">
								<div class="group tooltip" title="<?php TNjpgT(); ?>" data-tippy-arrow="true" data-tippy-animation="shift-toward">
									<input type="file" class="requi" name="adjTNjpg" value="<?php echo $_SESSION['adjTNjpg3']?>">
									<span class="bar"></span>
									<label>Adjuntar imagen JPG/JPEG <span class="error"><?php echo $error[1][2] = (isset($error[1][2])) ? $error[1][2] : ""; ?></span></label>
								</div>
							</div>
						</div>
						<div class="cuadricula">
							<div class="celda">
								<div class="group tooltip" title="<?php lineamientoGraficosT(); ?>" data-tippy-arrow="true" data-tippy-animation="shift-toward" data-tippy-placement="left">
									<textarea name="lineamientoGraficos" id=""><?php echo $_SESSION['lineamientoGraficos'] ?></textarea>
					  				<span class="bar"></span>
					  				<label>Descripción adicional <span class="error"><?php echo $error[11] = (isset($error[11])) ? $error[11] : ""; ?></span></label>
					  			</div>
							</div>
						</div>
						<button type='submit' name='submitTN' class='btn btn-submit btn-send' value='Next' onclick="myFunction()" />Finalizar</button>
					</form>
				</div>
				<!-- ========== Content Capacitación contenidos web ========== -->
				<div class="contentTab <?php echo $active = isset($_POST['submitCondo']) ? $active = 'active' : "" ?>" id="panelc1" aria-hidden="true" tabindex="-1">
					<h3>Capacitación contenidos web</h3>
					<form action="" method="post">
						<p><span class="error"><?php echo $error[2][0] = (isset($error[2][0])) ? $error[2][0] : ""; ?></span></p>
						<div class="cuadricula">
							<div class="celda">
								<div class="group tooltip" title="<?php condoNombreT(); ?>" data-tippy-arrow="true" data-tippy-animation="shift-toward">
					  				<input type="text" class="requi" name="condoNombre" value="<?php echo $_SESSION['condoNombre'] = (isset($_SESSION['condoNombre'])) ? $_SESSION['condoNombre'] : ''; ?>">
					  				<span class="bar"></span>
					  				<span class="required"></span>
					  				<label>Nombre de la persona que tomará la capacitación <span class="error"><?php echo $error[2][1] = (isset($error[2][1])) ? $error[2][1] : ""; ?></label>
					  			</div>
							</div>
						</div>
						<div class="cuadricula">
							<div class="celda celdax2">
								<div class="group tooltip" title="<?php numTICEventoT(); ?>" data-tippy-arrow="true" data-tippy-animation="shift-toward">
					  				<input type="txt" name="numTICEvento" value="<?php echo $_SESSION['numTICEvento'] = (isset($_SESSION['numTICEvento'])) ? $_SESSION['numTICEvento'] : ''; ?>">
					  				<span class="bar"></span>
					  				<label>Telefono de contacto <span class="error"><span class="error"><?php echo $error[6] = (isset($error[6])) ? $error[6] : ""; ?></span></label>
					  			</div>
							</div>
							<div class="celda celdax2">
								<div class="group tooltip" title="<?php numTICEventoT(); ?>" data-tippy-arrow="true" data-tippy-animation="shift-toward">
					  				<input type="txt" name="numTICEvento" value="<?php echo $_SESSION['numTICEvento'] = (isset($_SESSION['numTICEvento'])) ? $_SESSION['numTICEvento'] : ''; ?>">
					  				<span class="bar"></span>
					  				<label>Celular de contacto <span class="error"><span class="error"><?php echo $error[6] = (isset($error[6])) ? $error[6] : ""; ?></span></label>
					  			</div>
							</div>
						</div>
						<div class="cuadricula">
							<div class="celda celdax3">
								<div class="group tooltip" title="<?php campoEmailT(); ?>" data-tippy-arrow="true" data-tippy-animation="shift-toward">
									<input type="email" required name="campoEmail" value="<?php echo $_SESSION['campoEmail'] = (isset($_SESSION['campoEmail'])) ? $_SESSION['campoEmail'] : ''; ?>">
									<span class="bar"></span>
									<span class="required"></span>
									<label>Correo Institucional <span class="error"><?php echo $error[1] = (isset($error[1])) ? $error[1] : ""; ?></span></label>
								</div>
							</div>
							<div class="celda celdax3">
								<div class="group tooltip" title="<?php condoFVelaT(); ?>" data-tippy-arrow="true" data-tippy-animation="shift-toward">
					  				<input type="date" name="condoFVela" value="<?php echo $_SESSION['condoFVela'] = (isset($_SESSION['condoFVela'])) ? $_SESSION['condoFVela'] : ''; ?>">
					  				<span class="bar"></span>
					  				<label>Fecha <span class="error"><?php echo $error[2][7] = (isset($error[2][7])) ? $error[2][7] : ""; ?></label>
					  			</div>
							</div>
							<div class="celda celdax3">
								<div class="group tooltip" title="<?php horaEventoT(); ?>" data-tippy-arrow="true" data-tippy-animation="shift-toward">
					  				<input type="time" name="horaEvento" value="<?php echo $_SESSION['horaEvento'] = (isset($_SESSION['horaEvento'])) ? $_SESSION['horaEvento'] : ''; ?>">
					  				<span class="bar"></span>
					  				<span class="required"></span>
					  				<label>Hora <span class="error"><?php echo $error[5] = (isset($error[5])) ? $error[5] : ""; ?></span></label>
					  			</div>
							</div>
						</div>
						<div class="cuadricula">
							<div class="celda">
								<div class="group tooltip" title="<?php lineamientoGraficosT(); ?>" data-tippy-arrow="true" data-tippy-animation="shift-toward" data-tippy-placement="left">
									<textarea name="lineamientoGraficos" id=""><?php echo $_SESSION['lineamientoGraficos'] ?></textarea>
					  				<span class="bar"></span>
					  				<label>Motivo de la capacitación <span class="error"><?php echo $error[11] = (isset($error[11])) ? $error[11] : ""; ?></span></label>
					  			</div>
							</div>
						</div>
						<button type='submit' name='submitCondo' class='btn btn-submit btn-send' value='Next' onclick="myFunction()" />Finalizar</button>
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