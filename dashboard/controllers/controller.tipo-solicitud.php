<?php
$tipoSolcitud = $ts['id_subCategoria'];
	switch ($tipoSolcitud) {
		case '1':
			$model = '../models/model.emailInstitucionales.php';
			$view_tipo_solicitud = '../views/view-tipo-solicitud/view.emailInstitucionales.php';
			break;
		case '2':
			$model = '../models/model.tomasNoticias.php';
			$view_tipo_solicitud = '../views/view-tipo-solicitud/view.tomasNoticias.php';
			break;

		case '3':
			$model = '../models/model.condolencias.php';
			$view_tipo_solicitud = '../views/view-tipo-solicitud/view.condolencias.php';
			break;

		case '4':
			$model = '../models/model.cumpleanios.php';
			$view_tipo_solicitud = '../views/view-tipo-solicitud/view.cumpleanios.php';
			break;

		case '5':
			$model = '../models/model.tarjetasConmemorativas.php';
			$view_tipo_solicitud = '../views/view-tipo-solicitud/view.tarjetasConmemorativas.php';
			break;

		case '6':
			$model = '../models/model.newSite.php';
			$view_tipo_solicitud = '../views/view-tipo-solicitud/view.newSite.php';
			break;

		case '7':
			$model = '../models/model.ajustesWeb.php';
			$view_tipo_solicitud = '../views/view-tipo-solicitud/view.ajustesWeb.php';
			break;

		case '8':
			$view_tipo_solicitud = '../views/view-tipo-solicitud/view.desarrollo-aplicactivos.php';			
			break;

		case '9':
			$model = '../models/model.capacitacionWeb.php';
			$view_tipo_solicitud = '../views/view-tipo-solicitud/view.capacitacionWeb.php';
			break;

		case '10':
			$model = '../models/model.newRedes.php';
			$view_tipo_solicitud = '../views/view-tipo-solicitud/view.newRedes.php';
			break;

		case '11':
			$model = '../models/model.campaniaCM.php';
			$view_tipo_solicitud = '../views/view-tipo-solicitud/view.campaniaCM.php';
			break;

		case '12':
			$model = '../models/model.asesoriaCM.php';			
			$view_tipo_solicitud = '../views/view-tipo-solicitud/view.asesoriaCM.php';
			break;

		case '13':
			$model = '../models/model.aprobMate.php';
			$view_tipo_solicitud = '../views/view-tipo-solicitud/view.aprobMate.php';
			break;

		case '14':
			$model = '../models/model.evento.php';
			$view_tipo_solicitud = '../views/view-tipo-solicitud/view.evento.php';
			break;
		
		default:
			header('Location:'.URL);
			break;
	}
?>