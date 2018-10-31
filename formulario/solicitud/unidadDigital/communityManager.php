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
				<li class="tab-title tooltip <?php echo $active = isset($_POST['submitNewRedes']) ? $active = 'active' : "" ?>" title="<?php tabNewRedesT(); ?>" data-tippy-arrow="true" data-tippy-animation="shift-toward" data-tippy-placement="left"><a href="#panela1" aria-selected="true" tabindex="0">Creación de redes sociales</a></li>
				<li class="tab-title tooltip <?php echo $active = isset($_POST['submitCampania']) ? $active = 'active' : "" ?>" title="<?php tabCamaniaRedT(); ?>" data-tippy-arrow="true" data-tippy-animation="shift-toward" data-tippy-placement="left"><a href="#panelb1" aria-selected="false" tabindex="-1">Campañas</a></li>
				<li class="tab-title tooltip <?php echo $active = isset($_POST['submitAsesoria']) ? $active = 'active' : "" ?>" title="<?php tabAsesoriaRedT(); ?>" data-tippy-arrow="true" data-tippy-animation="shift-toward" data-tippy-placement="left"><a href="#panelc1" aria-selected="false" tabindex="-1">Asesorías</a></li>
			</ul>
			<!-- ========== Content TABS ========== -->
			<div class="tabs-content">
				<!-- ========== Content Creación de redes sociales ========== -->
				<div class="contentTab <?php echo $active = isset($_POST['submitNewRedes']) ? $active = 'active' : "" ?>" id="panela1" aria-hidden="false" >
					<h3>Creación de redes sociales</h3>
					<form action="" method="post" enctype="multipart/form-data">
						<div class="cuadricula">
							<div class="celda">
								<div class="contentCheck checkboxAudioVisual">
									<div class="colorTxt tooltip" title="<?php checkNewRedesT(); ?>" data-tippy-arrow="true" data-tippy-animation="shift-toward" data-tippy-placement="left">¿Que tipo de red social desea crear?</div>
									<span class="error"><?php echo $error[0][0] = (isset($error[0][0])) ? $error[0][0] : ""; ?></span><br>						
									<input type="checkbox" class="option-input checkbox" name="checkNewRedes[]" value="1" <?php if (in_array("1", $_POST['checkNewRedes'])) echo "checked"; ?> /> Fanpage Facebook<br>
									<input type="checkbox" class="option-input checkbox" name="checkNewRedes[]" value="2" <?php if (in_array("2", $_POST['checkNewRedes'])) echo "checked"; ?> /> Perfil Instagram<br>
									<input type="checkbox" class="option-input checkbox" name="checkNewRedes[]" value="3" <?php if (in_array("3", $_POST['checkNewRedes'])) echo "checked"; ?> /> Perfil Twitter<br>
									<input type="checkbox" class="option-input checkbox" name="checkNewRedes[]" value="4" <?php if (in_array("4", $_POST['checkNewRedes'])) echo "checked"; ?> /> Perfil Linkedin<br>
									<br>
									<br>
								</div>
							</div>
						</div>
						<div class="cuadricula">
							<div class="celda celdax3">
								<div class="group tooltip" title="<?php nombreNewPerfilT(); ?>" data-tippy-arrow="true" data-tippy-animation="shift-toward">
					  				<input type="text" class="requi" name="nombreNewPerfil" value="<?php echo $_POST['nombreNewPerfil'] = (isset($_POST['nombreNewPerfil'])) ? $_POST['nombreNewPerfil'] : ''; ?>">
					  				<span class="bar"></span>
					  				<label>Nombre de perfil (Sugerido) <span class="error"><?php echo $error[0][1] = (isset($error[0][1])) ? $error[0][1] : ""; ?></span></label>
					  			</div>
							</div>
							<div class="celda celdax3">
								<div class="group tooltip" title="<?php emailNewPerfilT(); ?>" data-tippy-arrow="true" data-tippy-animation="shift-toward">
					  				<input type="text" class="requi" name="emailNewPerfil" value="<?php echo $_POST['emailNewPerfil'] = (isset($_POST['emailNewPerfil'])) ? $_POST['emailNewPerfil'] : ''; ?>">
					  				<span class="bar"></span>
					  				<span class="required"></span>
					  				<label>Correo personal para asociar al Fanpage <span class="error"><?php echo $error[0][2] = (isset($error[0][2])) ? $error[0][2] : ""; ?></span></label>
					  			</div>
							</div>
							<div class="celda celdax3">
								<div class="group tooltip" title="<?php adjImgNewRedT(); ?>" data-tippy-arrow="true" data-tippy-animation="shift-toward">
									<input type="file" class="requi" name="adjImgNewRed" value="<?php echo $_POST['adjImgNewRed3']?>">
									<span class="bar"></span>
									<label>Adjuntar ZIP con imagenes (Opcional) <span class="error"><?php echo $error[0][3] = (isset($error[0][3])) ? $error[0][3] : ""; ?></span></label>
								</div>
							</div>
						</div>
						<div class="cuadricula">
							<div class="celda">
								<div class="group tooltip" title="<?php descNewRedT(); ?>" data-tippy-arrow="true" data-tippy-animation="shift-toward" data-tippy-placement="left">
									<textarea name="descNewRed" id=""><?php echo $_POST['descNewRed'] ?></textarea>
					  				<span class="bar"></span>
					  				<span class="required"></span>
					  				<label>Descripción para asociar al perfil <span class="error"><?php echo $error[0][4] = (isset($error[0][4])) ? $error[0][4] : ""; ?></span></label>
					  			</div>
							</div>
						</div>
						<div class="cuadricula">
							<div class="celda celdax3">
								<div class="group tooltip" title="<?php numTelNewRedT(); ?>" data-tippy-arrow="true" data-tippy-animation="shift-toward">
					  				<input type="text" name="numTelNewRed" value="<?php echo $_POST['numTelNewRed'] = (isset($_POST['numTelNewRed'])) ? $_POST['numTelNewRed'] : ''; ?>">
					  				<span class="bar"></span>
					  				<span class="required"></span>
					  				<label>Telefono de contacto <span class="error"><span class="error"><?php echo $error[0][5] = (isset($error[0][5])) ? $error[0][5] : ""; ?></span></label>
					  			</div>
							</div>
							<div class="celda celdax3">
								<div class="group tooltip" title="<?php dirNewRedT(); ?>" data-tippy-arrow="true" data-tippy-animation="shift-toward">
					  				<input type="text" class="requi" name="dirNewRed" value="<?php echo $_POST['dirNewRed'] = (isset($_POST['dirNewRed'])) ? $_POST['dirNewRed'] : ''; ?>">
					  				<span class="bar"></span>
					  				<span class="required"></span>
					  				<label>Dirección y/o ubucación <span class="error"><?php echo $error[0][6] = (isset($error[0][6])) ? $error[0][6] : ""; ?></label>
					  			</div>
							</div>
							<div class="celda celdax3">
								<div class="group tooltip" title="<?php emailNewPerfil2T(); ?>" data-tippy-arrow="true" data-tippy-animation="shift-toward">
									<input type="text" name="emailNewPerfil2" value="<?php echo $_POST['emailNewPerfil2'] = (isset($_POST['emailNewPerfil2'])) ? $_POST['emailNewPerfil2'] : ''; ?>">
									<span class="bar"></span>
									<span class="required"></span>
									<label>Correo de contacto <span class="error"><?php echo $error[0][7] = (isset($error[0][7])) ? $error[0][7] : ""; ?></span></label>
								</div>
							</div>
						</div>
						<button type='submit' name='submitNewRedes' class='btn btn-submit btn-send' value='Next' onclick="myFunction()" />Finalizar</button>
					</form>
				</div>
				<!-- ========== Content Campañas CM ========== -->
				<div class="contentTab <?php echo $active = isset($_POST['submitCampania']) ? $active = 'active' : "" ?>" id="panelb1" aria-hidden="true" tabindex="-1">
					<h3>Campañas</h3>
					<form action="" method="post" enctype="multipart/form-data">
						<div class="cuadricula">
							<div class="celda">
								<div class="group tooltip" title="<?php nomCampaT(); ?>" data-tippy-arrow="true" data-tippy-animation="shift-toward">
					  				<input type="text" class="requi" name="nomCampa" value="<?php echo $_POST['nomCampa'] = (isset($_POST['nomCampa'])) ? $_POST['nomCampa'] : ''; ?>">
					  				<span class="bar"></span>
					  				<span class="required"></span>
					  				<label>Nombre de la campaña <span class="error"><?php echo $error[1][0] = (isset($error[1][0])) ? $error[1][0] : ""; ?></span></label>
					  			</div>
							</div>
						</div>
						<div class="cuadricula">
							<div class="celda">
								<div class="group tooltip" title="<?php justiCampaT(); ?>" data-tippy-arrow="true" data-tippy-animation="shift-toward" data-tippy-placement="left">
									<textarea name="justiCampa" id=""><?php echo $_POST['justiCampa'] ?></textarea>
					  				<span class="bar"></span>
					  				<span class="required"></span>
					  				<label>Justificación de la campaña <span class="error"><?php echo $error[1][1] = (isset($error[1][1])) ? $error[1][1] : ""; ?></span></label>
					  			</div>
							</div>
						</div>
						<div class="cuadricula">
							<div class="celda">
								<div class="group tooltip" title="<?php objCampaT(); ?>" data-tippy-arrow="true" data-tippy-animation="shift-toward" data-tippy-placement="left">
									<textarea name="objCampa" id=""><?php echo $_POST['objCampa'] ?></textarea>
					  				<span class="bar"></span>
					  				<span class="required"></span>
					  				<label>Objetivo de la campaña <span class="error"><?php echo $error[1][2] = (isset($error[1][2])) ? $error[1][2] : ""; ?></span></label>
					  			</div>
							</div>
						</div>
						<div class="cuadricula">
							<div class="celda">
								<div class="group tooltip" title="<?php descripCampaT(); ?>" data-tippy-arrow="true" data-tippy-animation="shift-toward" data-tippy-placement="left">
									<textarea name="descripCampa" id=""><?php echo $_POST['descripCampa'] ?></textarea>
					  				<span class="bar"></span>
					  				<span class="required"></span>
					  				<label>Descripción de la campaña <span class="error"><?php echo $error[1][3] = (isset($error[1][3])) ? $error[1][3] : ""; ?></span></label>
					  			</div>
							</div>
						</div>
						<div class="cuadricula">
							<div class="celda celdax3">
								<div class="group tooltip" title="<?php ajdImgCampaT(); ?>" data-tippy-arrow="true" data-tippy-animation="shift-toward">
									<input type="file" class="requi" name="ajdImgCampa" value="<?php echo $_POST['ajdImgCampa3']?>">
									<span class="bar"></span>
									<label>Adjuntar ZIP con imagenes de referencia <span class="error"><?php echo $error[1][4] = (isset($error[1][4])) ? $error[1][4] : ""; ?></span></label>
								</div>
							</div>
							<div class="celda celdax3">
					  			<div class="group tooltip" title="<?php fIniCampaT(); ?>" data-tippy-arrow="true" data-tippy-animation="shift-toward">
					  				<input type="date" name="fIniCampa" value="<?php echo $_POST['fIniCampa'] = (isset($_POST['fIniCampa'])) ? $_POST['fIniCampa'] : ''; ?>">
					  				<span class="bar"></span>
					  				<span class="required"></span>
					  				<label>Fecha de inicio de la campaña <span class="error"><?php echo $error[1][5] = (isset($error[1][5])) ? $error[1][5] : ""; ?></span></label>
					  			</div>
					  		</div>
					  		<div class="celda celdax3">
					  			<div class="group tooltip" title="<?php fFinCampaT(); ?>" data-tippy-arrow="true" data-tippy-animation="shift-toward">
					  				<input type="date" class="requi" name="fFinCampa" value="<?php echo $_POST['fFinCampa'] = (isset($_POST['fFinCampa'])) ? $_POST['fFinCampa'] : ''; ?>">
					  				<span class="bar"></span>
					  				<span class="required"></span>
					  				<label>Fecha de finalización de la campaña <span class="error"><?php echo $error[1][6] = (isset($error[1][6])) ? $error[1][6] : ""; ?></span></label>
					  			</div>
					  		</div>
						</div>
						<div class="cuadricula">
							<div class="celda">
								<div class="group tooltip" title="<?php keyCampaT(); ?>" data-tippy-arrow="true" data-tippy-animation="shift-toward" data-tippy-placement="left">
									<textarea name="keyCampa" id=""><?php echo $_POST['keyCampa'] ?></textarea>
					  				<span class="bar"></span>
					  				<label>Palabras clave <span class="error"><?php echo $error[1][7] = (isset($error[1][7])) ? $error[1][7] : ""; ?></span></label>
					  			</div>
							</div>
						</div>
						<div class="cuadricula">
							<div class="celda">
								<div class="contentCheck checkboxAudioVisual">
									<div class="colorTxt tooltip" title="<?php checkPublicoObjT(); ?>" data-tippy-arrow="true" data-tippy-animation="shift-toward" data-tippy-placement="left">¿Cual es su público objetivo? </div>
									<span class="error"><?php echo $error[1][8] = (isset($error[1][8])) ? $error[1][8] : ""; ?></span><br>
									<input type="checkbox" class="option-input checkbox"  name="checkPublicoObj[]" value="1" <?php if (in_array("1", $_POST['checkPublicoObj'])) echo "checked"; ?> /> Estudiantes pregrado<br>
									<input type="checkbox" class="option-input checkbox"  name="checkPublicoObj[]" value="2" <?php if (in_array("2", $_POST['checkPublicoObj'])) echo "checked"; ?> /> Estudiantes posgrado<br>
									<input type="checkbox" class="option-input checkbox"  name="checkPublicoObj[]" value="3" <?php if (in_array("3", $_POST['checkPublicoObj'])) echo "checked"; ?> /> Docentes<br>
									<input type="checkbox" class="option-input checkbox"  name="checkPublicoObj[]" value="4" <?php if (in_array("4", $_POST['checkPublicoObj'])) echo "checked"; ?> /> Colaboradores administrativos<br>
									<input type="checkbox" class="option-input checkbox"  name="checkPublicoObj[]" value="5" <?php if (in_array("5", $_POST['checkPublicoObj'])) echo "checked"; ?> /> Egresados<br>
									<input type="checkbox" class="option-input checkbox"  name="checkPublicoObj[]" value="6" <?php if (in_array("6", $_POST['checkPublicoObj'])) echo "checked"; ?> /> Directivos<br>
									<br>
									<br>									
								</div>
							</div>
						</div>
						<button type='submit' name='submitCampania' class='btn btn-submit btn-send' value='Next' onclick="myFunction()" />Finalizar</button>
					</form>
				</div>
				<!-- ========== Asesorías CM ========== -->
				<div class="contentTab <?php echo $active = isset($_POST['submitAsesoria']) ? $active = 'active' : "" ?>" id="panelc1" aria-hidden="true" tabindex="-1">
					<h3>Asesorías</h3>
					<form action="" method="post">
						<div class="cuadricula">
							<div class="celda celdax2">
								<div class="group tooltip" title="<?php temaAsesoT(); ?>" data-tippy-arrow="true" data-tippy-animation="shift-toward">
					  				<input type="text" class="requi" name="temaAseso" value="<?php echo $_POST['temaAseso'] = (isset($_POST['temaAseso'])) ? $_POST['temaAseso'] : ''; ?>">
					  				<span class="bar"></span>
					  				<span class="required"></span>
					  				<label>Tema central de la asesoría <span class="error"><?php echo $error[2][0] = (isset($error[2][0])) ? $error[2][0] : ""; ?></label>
					  			</div>
							</div>
							<div class="celda celdax2">
								<div class="group tooltip" title="<?php lugarAsesoT(); ?>" data-tippy-arrow="true" data-tippy-animation="shift-toward">
					  				<input type="text" class="requi" name="lugarAseso" value="<?php echo $_POST['lugarAseso'] = (isset($_POST['lugarAseso'])) ? $_POST['lugarAseso'] : ''; ?>">
					  				<span class="bar"></span>
					  				<label>Lugar sugerido para la asesoría <span class="error"><?php echo $error[2][1] = (isset($error[2][1])) ? $error[2][1] : ""; ?></label>
					  			</div>
							</div>
						</div>
						<div class="cuadricula">
							<div class="celda celdax2">
								<div class="group tooltip" title="<?php fechaAsesoT(); ?>" data-tippy-arrow="true" data-tippy-animation="shift-toward">
					  				<input type="date" name="fechaAseso" value="<?php echo $_POST['fechaCapa'] = (isset($_POST['fechaAseso'])) ? $_POST['fechaAseso'] : ''; ?>">
					  				<span class="bar"></span>
					  				<label>Fecha (Sujeta a disponibilidad) <span class="error"><?php echo $error[2][2] = (isset($error[2][2])) ? $error[2][2] : ""; ?></label>
					  			</div>
							</div>
							<div class="celda celdax2">
								<div class="group tooltip" title="<?php horaAsesoT(); ?>" data-tippy-arrow="true" data-tippy-animation="shift-toward">
					  				<input type="time" name="horaAseso" value="<?php echo $_POST['horaAseso'] = (isset($_POST['horaAseso'])) ? $_POST['horaAseso'] : ''; ?>">
					  				<span class="bar"></span>
					  				<label>Hora (Sujeta a disponibilidad) <span class="error"><?php echo $error[2][3] = (isset($error[2][3])) ? $error[2][3] : ""; ?></span></label>
					  			</div>
					  		</div>
						</div>
						<button type='submit' name='submitAsesoria' class='btn btn-submit btn-send' value='Next' onclick="myFunction()" />Finalizar</button>
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