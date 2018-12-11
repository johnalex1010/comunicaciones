<?php
switch ($maxT['id_fase']) {
	case '1':
		$estado = "card-color-enDesarrollo";
		break;
	case '2':
		$estado = "card-color-finalizado";
		break;
	case '3':
		$estado = "card-color-cancelado";
		break;
	default:
		header('Location:'.URL);
		break;
}
?>