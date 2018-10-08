<?php 

	session_start();
	set_time_limit(300);

	require_once 'php/funciones/tooltip.php';
	require_once 'php/funciones/campos.php';
	require_once 'php/validaciones/validarHome.php';
?>
<!DOCTYPE html>
<html lang="es">
<head>
	<!-- METAS -->
	<meta charset="UTF-8" />
	<title>Solicitudes | Departamento de Comunicaciones</title>
	<meta http-equiv="X-UA-Compatible" content="EDGE" />
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />	
	<meta name="description" content=""/>
	<meta name="keywords" content="">
	<meta name="author" content="John Alex Fandiño">

	<!-- LINK -->
	<link rel="shortcut icon" href="favicon.ico" />
	<link href="https://fonts.googleapis.com/css?family=Encode+Sans+Condensed|Righteous" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="css/main-min.css" />

</head>
<body>
	
	<div class="content">
		<!-- HOME -->
		<div class="home">
			<div class="titles">
				<h1 class="titlePrimary">Formato de solicitudes</h1>
				<h2 class="titleSecond">Departamento de comunicaciones</h2>
			</div>
			<p class="txtIntro">Texto explicativo Lorem ipsum dolor sit amet, consectetur adipisicing elit. Voluptas beatae, eos nisi officia temporibus aliquid accusamus est maxime atque, voluptatibus commodi facere voluptatum esse quo ipsum expedita corporis ratione, debitis!
			</p>

			<button id="myBtn" class="modalVideo">Modal al video explicativo</button>
			<!-- The Modal -->
			<div id="myModal" class="modal">

			  <!-- Modal content -->
			  <div class="modal-content">
			    <span class="close">&times;</span>
			   <h2>Video exlicativo</h2>
			   <br>
			   <!-- <iframe width="100%" height="400" src="https://www.youtube.com/embed/iEPTlhBmwRg" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe> -->
			  </div>

			</div>
			<p>Los campos con (<span style="color: #C20201;font-size:2rem;" >•</span>) son obligatorios.</p>
			<br>
			<!-- FORMUALRIO INICAL -->
			<form action="" method="POST">
				
				<div class="cuadricula">
					<div class="celda celdax2">
						<div class="group tooltip" title="<?php campoNombreT(); ?>" data-tippy-arrow="true" data-tippy-animation="shift-toward">
							<input type="text" name="campoNombre" required value="<?php echo $_SESSION['campoNombre'] = (isset($_SESSION['campoNombre'])) ? $_SESSION['campoNombre'] : ''; ?>">
							<span class="bar"></span>
							<span class="required"></span>
							<label>Nombre completo <span class="error"><?php echo $error[0] = (isset($error[0])) ? $error[0] : ""; ?></span></label>
						</div>
					</div>
					<div class="celda celdax2">
						<div class="group tooltip" title="<?php campoEmailT(); ?>" data-tippy-arrow="true" data-tippy-animation="shift-toward">
							<input type="email" required name="campoEmail" value="<?php echo $_SESSION['campoEmail'] = (isset($_SESSION['campoEmail'])) ? $_SESSION['campoEmail'] : ''; ?>">
							<span class="bar"></span>
							<span class="required"></span>
							<label>Correo Institucional <span class="error"><?php echo $error[1] = (isset($error[1])) ? $error[1] : ""; ?></span></label>
						</div>
					</div>
				</div>
				<div class="cuadricula">
					<div class="celda celdax2">
						<div class="group tooltip" title="<?php campoFacDepT(); ?>" data-tippy-arrow="true" data-tippy-animation="shift-toward">
							<select name="campoFacDep" id="campoFacDep" required>
							<?php
								if ($_SESSION['campoFacDep'] == "") {
									echo "<option value='' disable selected></option>";
								}else{
									echo "<option value='".$_SESSION['campoFacDep']."' selected>".$facDep."</option>";
								}
								campoFacDep();
							?>
							</select>
							<span class="bar"></span>
							<span class="required"></span>
							<label>Seleccione una Facultad/Dependencia <span class="error"><?php echo $error[2] = (isset($error[2])) ? $error[2] : ""; ?></span></label>
						</div>
					</div>
					<div class="celda celdax2">
						<div class="group tooltip" title="<?php campoTelT(); ?>" data-tippy-arrow="true" data-tippy-animation="shift-toward">
							<input type="text" required name="campoTel" value="<?php echo $_SESSION['campoTel'] = (isset($_SESSION['campoTel'])) ? $_SESSION['campoTel'] : ''; ?>">
							<span class="bar"></span>
							<span class="required"></span>
							<label>Numero de telefono de contacto <span class="error"><?php echo $error[3] = (isset($error[3])) ? $error[3] : ""; ?></span></label>
						</div>
					</div>
				</div>
				<?php 

					

				?>

				<?php if (!isset($_POST['submit']) || $_SESSION['error'] == true) { echo $_SESSION['home'] = false;	?>
					<div class="cuadricula">
						<div class="celda">
							<input name="submit" type="submit" class="btn btn-world" value="Continuar">
						</div>
					</div>

				<?php }elseif($_SESSION['error'] == false) { $_SESSION['home'] = true;?>
				<!-- NAV -->
				<nav class="navUnidades">
					<ul class="navUnidad">
						<li>Comunicaciones Institucionales
							<ul class="subNavUnidad">
								<li class="tooltip" title="<?php eventoT(); ?>" data-tippy-arrow="true" data-tippy-animation="shift-toward" data-tippy-placement="right"><a href="solicitud/unidadComIns/evento.php">Eventos</a></li>
								<!-- <li class="tooltip" title="<?php campaniaT(); ?>" data-tippy-arrow="true" data-tippy-animation="shift-toward" data-tippy-placement="right"><a href="#">Campañas</a></li> -->
								<li class="tooltip" title="<?php comInterT(); ?>" data-tippy-arrow="true" data-tippy-animation="shift-toward" data-tippy-placement="right"><a href="solicitud/unidadComIns/comInter.php">Comunicaciones Internas</a></li>
								<li class="tooltip" title="<?php aprobMateT(); ?>" data-tippy-arrow="true" data-tippy-animation="shift-toward" data-tippy-placement="right"><a href="solicitud/unidadComIns/aprobMate.php" >Material para aprobación</a></li>
							</ul>
						</li>
						<!-- <li>Medios Audiovisuales
							<ul class="subNavUnidad">
								<li><a href="#">Sub	Unidad</a></li>
								<li><a href="#">Sub Unidad</a></li>
								<li><a href="#">Sub Unidad</a></li>
							</ul>
						</li> -->
						<li>Unidad Digital
							<ul class="subNavUnidad">
								<li class="tooltip" title="<?php webSiteT(); ?>" data-tippy-arrow="true" data-tippy-animation="shift-toward" data-tippy-placement="left"><a href="solicitud/unidadDigital/website.php">Web Site</a></li>
								<li class="tooltip" title="<?php CMT(); ?>" data-tippy-arrow="true" data-tippy-animation="shift-toward" data-tippy-placement="left"><a href="solicitud/unidadDigital/communityManager.php">Community Manager</a></li>
							</ul>
						</li>
					</ul>
				</nav>
				<?php  }else{}?>
			</form>
		</div>
	</div>
<?php //session_destroy(); ?>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.3/jquery.easing.min.js"></script>
<script src="js/tippy.all.min.js"></script>
<script src="js/functionTooltip.js"></script>
<script src="js/main-min.js"></script>
</body>
</html>