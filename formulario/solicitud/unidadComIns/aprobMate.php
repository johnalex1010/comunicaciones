<?php
	session_start();
	set_time_limit(300);
	if ($_SESSION['home'] == 0) {
		header('Location:../../');
	}
	// session_destroy();
	require_once '../../php/funciones/tooltip.php';
	require_once '../../php/funciones/campos.php';
	require_once '../../php/validaciones/validarAprobMate.php';
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
		<div class="vertical-tabs">
			<!-- ========== Link TABS ========== -->
			<ul class="tabs vertical" data-tab="">
				<li class="tab-title tooltip active" title="<?php envioMailInstiT(); ?>" data-tippy-arrow="true" data-tippy-animation="shift-toward" data-tippy-placement="left"><a href="#panela1" aria-selected="true" tabindex="0">Aprobación de Material</a></li>
			</ul>
			<!-- ========== Content TABS ========== -->
			<div class="tabs-content">
				<!-- ========== Content Aprobación Material ========== -->
				<div class="contentTab active" id="panela1" aria-hidden="false">
					<form action="" method="post" enctype="multipart/form-data">						
						<div class="cuadricula">
					  		<div class="celda">
					  			<div class="contentCheck checkboxAudioVisual">
									<div class="colorTxt tooltip" title="<?php checkAprobMateT(); ?>" data-tippy-arrow="true" data-tippy-animation="shift-toward" data-tippy-placement="left">¿Que tipo de material desea ser aprobado? </div>
										<span class="error"><?php echo $error[0][0] = (isset($error[0][0])) ? $error[0][0] : ""; ?></span><br>						
										<input type="checkbox" class="option-input checkbox" name="checkAprobMate[]" value="Aprobación Material 1" <?php if (in_array("Aprobación Material 1", $_POST['checkAprobMate'])) echo "checked"; ?> /> Aprobación Material 1<br>
										<input type="checkbox" class="option-input checkbox" name="checkAprobMate[]" value="Aprobación Material 2" <?php if (in_array("Aprobación Material 2", $_POST['checkAprobMate'])) echo "checked"; ?> /> Aprobación Material 2<br>
										<input type="checkbox" class="option-input checkbox" name="checkAprobMate[]" value="Aprobación Material 3" <?php if (in_array("Aprobación Material 3", $_POST['checkAprobMate'])) echo "checked"; ?> /> Aprobación Material 3<br>
										<br>
										<br>									
								</div>
								<div class="group tooltip" title="<?php adjAprobMateT(); ?>" data-tippy-arrow="true" data-tippy-animation="shift-toward">
									<input type="file" class="requi" name="adjAprobMate">
									<span class="bar"></span>
									<label>Adjuntar ZIP material para aprobación. <span class="error"><?php echo $error[0][1] = (isset($error[0][1])) ? $error[0][1] : ""; ?></span></label>
								</div>
					  		</div>
					  	</div>
					  	<button type='submit' name='submitAprobMate' class='btn btn-submit btn-send' value='Next' onclick="myFunction()" />Finalizar</button>
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