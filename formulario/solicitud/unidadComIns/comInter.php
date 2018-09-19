<!DOCTYPE html>
<html lang="es">
<head>
	<base href="http://localhost/JohnAlexUSTA/comunicaciones/formulario/">
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
		<div ng-app="myApp" ng-controller="myCtrl">
		  <div ng-show="pagina==1">
		    <div>pagina 1
				<div class="cuadricula">
					<div class="celda">TITULO</div>
				</div>
		    </div>
		    <button class="btn btn-world" ng-click="siguiente()">Siguiente</button>
		  </div>
		  <div ng-show="pagina==2">
		    <div>pagina 2
				<div class="cuadricula">
					<div class="celda celdax2">
						<div class="group tooltip" title="lorem" data-tippy-arrow="true" data-tippy-animation="shift-toward">
							<input type="text" required value="John Alexander">
							<span class="bar"></span>
							<label>Name <span class="error">Error en el campo</span></label>
						</div>
					</div>
					<div class="celda celdax2">
						<div class="group tooltip" title="lorem" data-tippy-arrow="true" data-tippy-animation="shift-toward">
							<input type="text" required value="">
							<span class="bar"></span>
							<label>Email <span class="error"></span></label>
						</div>
					</div>
				</div>
		    </div>
		    <button class="btn btn-world" ng-click="anterior()">Anterior</button>
		    <button class="btn btn-world" ng-click="siguiente()">Siguiente</button>
		  </div>
		  <div ng-show="pagina==3">
		    <div>pagina 3
				<div class="cuadricula">
					<div class="celda celdax3">
						<div class="group">      
							<input type="text" required value="John Alexander">
							<span class="bar"></span>
							<label>Name <span class="error">Error en el campo</span></label>
						</div>
					</div>
					<div class="celda celdax3">
						<div class="group">      
							<input type="text" required value="John Alexander">
							<span class="bar"></span>
							<label>Name <span class="error">Error en el campo</span></label>
						</div>
					</div>
					<div class="celda celdax3">
						<div class="group">      
							<input type="text" required value="John Alexander">
							<span class="bar"></span>
							<label>Name <span class="error">Error en el campo</span></label>
						</div>
					</div>
				</div>
		    </div>
		    <button class="btn btn-world" ng-click="anterior()">Anterior</button>
		    <button class="btn btn-world" ng-click="siguiente()">Siguiente</button>
		  </div>
		  <div ng-show="pagina==4">
		    <div>pagina 4
				<div class="cuadricula">
					<div class="celda celdax4">
						<button class="btn btn-world">John Alexander Fandiño</button>
					</div>
					<div class="celda celdax4">
						<button class="btn btn-send">John Alexander Fandiño</button>
					</div>
					<div class="celda celdax4">4</div>
					<div class="celda celdax4">4</div>
				</div>
		    </div>
		    <button class="btn btn-world" ng-click="anterior()">Anterior</button>
		    <button class="btn btn-world" ng-click="siguiente()">Siguiente</button>
		  </div>
		  <div ng-show="pagina==5">
		    <div>pagina 5
				<div class="cuadricula">
					<div class="celda celdax30">
						<div class="group">      
							<input type="text" required value="John Alexander">
							<span class="bar"></span>
							<label>Name <span class="error">Error en el campo</span></label>
						</div>
					</div>
					<div class="celda celdax70">
						<div class="group">      
							<input type="text" required value="John Alexander">
							<span class="bar"></span>
							<label>Name <span class="error">Error en el campo</span></label>
						</div>
					</div>
				</div>
		    </div>
		    <button class="btn btn-world" ng-click="anterior()">Anterior</button>
		  </div>
		</div>
	</div>



<script src="js/btnNextPrev.js"></script>
<script src="js/tippy.all.min.js"></script>
<script src="js/main.js"></script>
</body>
</html>