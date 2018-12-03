<?php
/*Función para cambiar la fecha a formato leible*/
function fecha($fecha){
  $timestamp = strtotime($fecha);
  $months = ['Enero','Febrero','Marzo','Abril','Mayo','Junio','Julio','Agosto','Septiembre','Octubre','Noviembre','Diciembre'];

  $day = date('d', $timestamp);
  $month = date('m', $timestamp) - 1;
  $year = date('Y', $timestamp);

  $fecha = "$day de ".$months[$month]." del $year";
  return $fecha;
}

/*Funcion para cambiar el formato de 24 horas a 12 horas*/
function doceHoras($hora){
	$hora = date("g:i a",strtotime($hora));
	return $hora;
}
?>