<?php
	//=====
	//RUTAS
	//=====
		$rutaDestinoST = "\\/172.16.1.51\/Comunicaciones\/Comunicaciones USTA\/3.Comunicaciones Institucionales\/1. Comunicacion Interna\/ST\/";
		// $anio =  date('Y');
		$anio =  "2019";
		if (!file_exists($rutaDestinoST.$anio)) {mkdir("$rutaDestinoST$anio", 0777);}

		// $rutaDestinoST = "../../ST/$anio/"; //-- Ruta Local
		$rutaDestinoST = "$rutaDestinoST$anio/"; //--Ruta Compartida
?>