<?php 
	session_start();

	set_time_limit(300);

	if ($_SESSION['home'] == 0) {
		header('Location:../../');
	}
	// session_destroy();
	require_once '../../php/funciones/tooltip.php';
	require_once '../../php/funciones/campos.php';
	require_once '../../php/validaciones/validarCM.php';
?>

<!DOCTYPE html>
<html lang="es">
<head>
	<!-- METAS -->
	<meta charset="UTF-8" />
	<title>Unidad digital community manager | Departamento de Comunicaciones</title>
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
				<h3 class="titleThird">Sección Community Manager</h3>
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
				<li class="tab-title tooltip <?php echo $active = isset($_POST['submitNewSite']) ? $active = 'active' : "" ?>" title="<?php tabNewSite(); ?>" data-tippy-arrow="true" data-tippy-animation="shift-toward" data-tippy-placement="left"><a href="#panela1" aria-selected="true" tabindex="0">Creación de redes sociales</a></li>
				<li class="tab-title tooltip <?php echo $active = isset($_POST['submitAjusteWeb']) ? $active = 'active' : "" ?>" title="<?php tabAjusTxtImgT(); ?>" data-tippy-arrow="true" data-tippy-animation="shift-toward" data-tippy-placement="left"><a href="#panelb1" aria-selected="false" tabindex="-1">Campañas</a></li>
				<li class="tab-title tooltip <?php echo $active = isset($_POST['submitCapa']) ? $active = 'active' : "" ?>" title="<?php tabCapWebT(); ?>" data-tippy-arrow="true" data-tippy-animation="shift-toward" data-tippy-placement="left"><a href="#panelc1" aria-selected="false" tabindex="-1">Asesorias</a></li>
			</ul>
			<!-- ========== Content TABS ========== -->
			<div class="tabs-content">
				<!-- ========== Content Nuevo sitio web ========== -->
				<div class="contentTab <?php echo $active = isset($_POST['submitNewSite']) ? $active = 'active' : "" ?>" id="panela1" aria-hidden="false" >
					<h3>Creación de redes sociales</h3>
					<form action="" method="post" enctype="multipart/form-data">
						<div class="cuadricula">
							<div class="celda celdax2">
								<div class="group tooltip" title="<?php nombreEventoWebT(); ?>" data-tippy-arrow="true" data-tippy-animation="shift-toward">
					  				<input type="text" class="requi" name="nombreEventWeb" value="<?php echo $_SESSION['nombreEventWeb'] = (isset($_SESSION['nombreEventWeb'])) ? $_SESSION['nombreEventWeb'] : ''; ?>">
					  				<span class="bar"></span>
					  				<span class="required"></span>
					  				<label>Nombre del evento <span class="error"><?php echo $error[0][0] = (isset($error[0][0])) ? $error[0][0] : ""; ?></span></label>
					  			</div>
							</div>
							<div class="celda celdax2">
								<div class="group tooltip" title="<?php subdominioT(); ?>" data-tippy-arrow="true" data-tippy-animation="shift-toward">
					  				<input type="text" class="requi" name="subdominio" value="<?php echo $_SESSION['subdominio'] = (isset($_SESSION['subdominio'])) ? $_SESSION['subdominio'] : ''; ?>">
					  				<span class="bar"></span>
					  				<label>Subdominio.usta.edu.co <span class="error"><?php echo $error[0][1] = (isset($error[0][1])) ? $error[0][1] : ""; ?></span></label>
					  			</div>
							</div>
						</div>

						<div class="cuadricula">
							<div class="celda">
								<div class="group tooltip" title="<?php adjPlanNavT(); ?>" data-tippy-arrow="true" data-tippy-animation="shift-toward">
									<input type="file" class="requi" name="adjPlanNav" value="<?php echo $_SESSION['adjPlanNav3']?>">
									<span class="bar"></span>
									<span class="required"></span>
									<label>Adjuntar ZIP con contenido, plan de navegación y linea gráfica <span class="error"><?php echo $error[0][2] = (isset($error[0][2])) ? $error[0][2] : ""; ?></span></label>
								</div>
							</div>

						</div>
						<div class="cuadricula">
							<div class="celda">
								<div class="group tooltip" title="<?php motivoNewWebT(); ?>" data-tippy-arrow="true" data-tippy-animation="shift-toward" data-tippy-placement="left">
									<textarea name="motivoNewWeb" maxlength="500" id=""><?php echo $_SESSION['motivoNewWeb'] ?></textarea>
					  				<span class="bar"></span>
					  				<span class="required"></span>
					  				<label>Motivo por el cual debe ser creado <span class="error"><?php echo $error[0][3] = (isset($error[0][3])) ? $error[0][3] : ""; ?></span></label>
					  			</div>
							</div>

						</div>
						<button type='submit' name='submitNewSite' class='btn btn-submit btn-send' value='Next' onclick="myFunction()" />Finalizar</button>
					</form>
				</div>
				<!-- ========== Content Ajustes de textos y/o imagenes web ========== -->
				<div class="contentTab <?php echo $active = isset($_POST['submitAjusteWeb']) ? $active = 'active' : "" ?>" id="panelb1" aria-hidden="true" tabindex="-1">
					<h3>Campañas</h3>
					<form action="" method="post" enctype="multipart/form-data">
						<div class="cuadricula">
							<div class="celda">

								<div class="group tooltip" title="<?php urlWebT(); ?>" data-tippy-arrow="true" data-tippy-animation="shift-toward">
					  				<input type="text" class="requi" name="urlWeb" value="<?php echo $_SESSION['urlWeb'] = (isset($_SESSION['urlWeb'])) ? $_SESSION['urlWeb3'] : ''; ?>">
					  				<span class="bar"></span>
					  				<span class="required"></span>
					  				<label>Url donde se realizaran los cambios <span class="error"><?php echo $error[1][0] = (isset($error[1][0])) ? $error[1][0] : ""; ?></span></label>
					  			</div>
							</div>
						</div>
						<div class="cuadricula">
							<div class="celda">
								<div class="group tooltip" title="<?php adjDocWEbT(); ?>" data-tippy-arrow="true" data-tippy-animation="shift-toward">
									<input type="file" class="requi" name="adjDocWEb" value="<?php echo $_SESSION['adjDocWEb3']?>">
									<span class="bar"></span>
									<span class="required"></span>
									<label>Adjuntar ZIP con los ajustes detallados <span class="error"><?php echo $error[1][1] = (isset($error[1][1])) ? $error[1][1] : ""; ?></span></label>
								</div>
							</div>
						</div>
						<div class="cuadricula">
							<div class="celda">
								<div class="group tooltip" title="<?php descripWebT(); ?>" data-tippy-arrow="true" data-tippy-animation="shift-toward" data-tippy-placement="left">
									<textarea name="descripWeb" maxlength="500" id=""><?php echo $_SESSION['descripWeb'] ?></textarea>
					  				<span class="bar"></span>
					  				<label>Descripción adicional <span class="error"><?php echo $error[1][2] = (isset($error[1][2])) ? $error[1][2] : ""; ?></span></label>
					  			</div>
							</div>
						</div>
						<button type='submit' name='submitAjusteWeb' class='btn btn-submit btn-send' value='Next' onclick="myFunction()" />Finalizar</button>
					</form>
				</div>
				<!-- ========== Content Capacitación contenidos web ========== -->
				<div class="contentTab <?php echo $active = isset($_POST['submitCapa']) ? $active = 'active' : "" ?>" id="panelc1" aria-hidden="true" tabindex="-1">
					<h3>Asesorias</h3>
					<form action="" method="post">
						<div class="cuadricula">
							<div class="celda">
								<div class="group tooltip" title="<?php nombreCapaT(); ?>" data-tippy-arrow="true" data-tippy-animation="shift-toward">
					  				<input type="text" class="requi" name="nombreCapa" value="<?php echo $_SESSION['nombreCapa'] = (isset($_SESSION['nombreCapa'])) ? $_SESSION['nombreCapa'] : ''; ?>">
					  				<span class="bar"></span>
					  				<span class="required"></span>
					  				<label>Nombre de la persona que tomará la capacitación <span class="error"><?php echo $error[2][0] = (isset($error[2][0])) ? $error[2][0] : ""; ?></label>
					  			</div>
							</div>
						</div>
						<div class="cuadricula">
							<div class="celda celdax2">
								<div class="group tooltip" title="<?php numTelCapaT(); ?>" data-tippy-arrow="true" data-tippy-animation="shift-toward">
					  				<input type="text" name="numTelCapa" value="<?php echo $_SESSION['numTelCapa'] = (isset($_SESSION['numTelCapa'])) ? $_SESSION['numTelCapa'] : ''; ?>">
					  				<span class="bar"></span>
					  				<span class="required"></span>
					  				<label>Telefono de contacto <span class="error"><span class="error"><?php echo $error[2][1] = (isset($error[2][1])) ? $error[2][1] : ""; ?></span></label>
					  			</div>
							</div>
							<div class="celda celdax2">
								<div class="group tooltip" title="<?php numCelCapaT(); ?>" data-tippy-arrow="true" data-tippy-animation="shift-toward">
					  				<input type="text" name="numCelCapa" value="<?php echo $_SESSION['numCelCapa'] = (isset($_SESSION['numCelCapa'])) ? $_SESSION['numCelCapa'] : ''; ?>">
					  				<span class="bar"></span>
					  				<label>Celular de contacto <span class="error"><span class="error"><?php echo $error[2][2] = (isset($error[2][2])) ? $error[2][2] : ""; ?></span></label>
					  			</div>
							</div>
						</div>
						<div class="cuadricula">
							<div class="celda celdax3">
								<div class="group tooltip" title="<?php emailCapaT(); ?>" data-tippy-arrow="true" data-tippy-animation="shift-toward">
									<input type="text" name="emailCapa" value="<?php echo $_SESSION['emailCapa'] = (isset($_SESSION['emailCapa'])) ? $_SESSION['emailCapa'] : ''; ?>">
									<span class="bar"></span>
									<span class="required"></span>
									<label>Correo Institucional <span class="error"><?php echo $error[2][3] = (isset($error[2][3])) ? $error[2][3] : ""; ?></span></label>
								</div>
							</div>
							<div class="celda celdax3">
								<div class="group tooltip" title="<?php fechaCapaT(); ?>" data-tippy-arrow="true" data-tippy-animation="shift-toward">
					  				<input type="date" name="fechaCapa" value="<?php echo $_SESSION['fechaCapa'] = (isset($_SESSION['fechaCapa'])) ? $_SESSION['fechaCapa'] : ''; ?>">
					  				<span class="bar"></span>
					  				<label>Fecha <span class="error"><?php echo $error[2][4] = (isset($error[2][4])) ? $error[2][4] : ""; ?></label>
					  			</div>
							</div>
							<div class="celda celdax3">
								<div class="group tooltip" title="<?php horaCapaT(); ?>" data-tippy-arrow="true" data-tippy-animation="shift-toward">
					  				<input type="time" name="horaCapa" value="<?php echo $_SESSION['horaCapa'] = (isset($_SESSION['horaCapa'])) ? $_SESSION['horaCapa'] : ''; ?>">
					  				<span class="bar"></span>
					  				<label>Hora <span class="error"><?php echo $error[2][5] = (isset($error[2][5])) ? $error[2][5] : ""; ?></span></label>
					  			</div>
							</div>
						</div>
						<div class="cuadricula">
							<div class="celda">
								<div class="group tooltip" title="<?php motivoCapaT(); ?>" data-tippy-arrow="true" data-tippy-animation="shift-toward" data-tippy-placement="left">
									<textarea name="motivoCapa" maxlength="500" id=""><?php echo $_SESSION['motivoCapa'] ?></textarea>
					  				<span class="bar"></span>
					  				<span class="required"></span>
					  				<label>Motivo de la capacitación <span class="error"><?php echo $error[2][6] = (isset($error[2][6])) ? $error[2][6] : ""; ?></span></label>
					  			</div>
							</div>
						</div>
						<button type='submit' name='submitCapa' class='btn btn-submit btn-send' value='Next' onclick="myFunction()" />Finalizar</button>
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