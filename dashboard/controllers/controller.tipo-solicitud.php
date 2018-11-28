<?php
$tipoSolcitud = 2;
	switch ($tipoSolcitud) {
		case '1':
			$view_tipo_solicitud = '../views/view-tipo-solicitud/view.sin-tipo.php';
			break;
		case '2':
			$view_tipo_solicitud = '../views/view-tipo-solicitud/view.evento.php';
			break;

		case '3':
			$view_tipo_solicitud = '../views/view-tipo-solicitud/view.emailInstitucionales.php';
			break;

		case '4':
			$view_tipo_solicitud = '../views/view-tipo-solicitud/view.tomasNoticias.php';
			break;

		case '5':
			$view_tipo_solicitud = '../views/view-tipo-solicitud/view.condolencias.php';
			break;

		case '6':
			$view_tipo_solicitud = '../views/view-tipo-solicitud/view.cumpleanios.php';
			break;

		case '7':
			$view_tipo_solicitud = '../views/view-tipo-solicitud/view.tarjetasConmemorativas.php';
			break;

		case '8':
			$view_tipo_solicitud = '../views/view-tipo-solicitud/view.aprobMate.php';
			break;

		case '9':
			$view_tipo_solicitud = '../views/view-tipo-solicitud/view.newSite.php';
			break;

		case '10':
			$view_tipo_solicitud = '../views/view-tipo-solicitud/view.ajustesWeb.php';
			break;

		case '11':
			$view_tipo_solicitud = '../views/view-tipo-solicitud/view.capacitacionWeb.php';
			break;

		case '12':
			$view_tipo_solicitud = '../views/view-tipo-solicitud/view.newRedes.php';
			break;

		case '13':
			$view_tipo_solicitud = '../views/view-tipo-solicitud/view.campaniaCM.php';
			break;

		case '14':
			$view_tipo_solicitud = '../views/view-tipo-solicitud/view.asesoriaCM.php';
			break;
		
		default:
			$view_tipo_solicitud = '../views/view-tipo-solicitud/view.sin-tipo.php';
			break;
	}
?>