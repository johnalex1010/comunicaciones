<?php
	//=====
	//RUTAS
	//=====
		$rutaDestinoST = "\\/172.16.1.99\/Comunicaciones\/Comunicaciones USTA\/3.Comunicaciones Institucionales\/1. Comunicacion Interna\/ST\/";
		$anio =  date('Y');
		if (!file_exists($rutaDestinoST.$anio)) {mkdir("$rutaDestinoST$anio", 0777);}

		// $rutaDestinoST = "../../ST/$anio/"; //-- Ruta Local
		$rutaDestinoST = "$rutaDestinoST$anio/"; //--Ruta Compartida
?>