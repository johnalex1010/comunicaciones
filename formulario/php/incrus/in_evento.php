<?php
	session_start();

	if ($_SESSION['home'] == 0) {
		header('Location:../../');
	}
	
	include_once '../../php/conexion.php';
	include_once '../../php/variables.php';
	include_once '../../php/funciones/campos.php';

//Insertar Solicitudes de solo Adjuntos tipo: Envío de correos Institucionales, Tomás Noticias, Cumpleaños

$selecFINNumST = "SELECT MAX(numST) FROM t_solicitud ORDER BY numST DESC"; // Selescciona la ultima ST igresada en la BD
$rst = $conexion->query($selecFINNumST);

if ($row = mysqli_fetch_row($rst)) {

	//Objetos iniciales de todas las ST
	$stOLD = $row[0];
	$newST = consecutivoST($stOLD);
	$nombre = $_SESSION['campoNombre'];
	$email = $_SESSION['campoEmail'];
	$id_facDep = $_SESSION['campoFacDep'];
	$telefono = $_SESSION['campoTel'];
	$id_usuario = 1;
	$id_unidad = 1;
	$id_categoria = 1;
	$id_subCategoria = 14;
	$id_fase = 1;
	$fecha = date('Y-m-d');
	$comentario = 'Ingresa la Solicitud - Mensaje generado por el sistema.';

	//Objetos especificos de la Tabla t_evento	
	$id_tipoEvento = $_POST['tipoEvento'];
	$nombreEvento = $_POST['nombreEvento'];
	$lugar = $_POST['lugarEvento'];
	$fechaInicio = $_POST['fIniEvento'];
	$fechaFin = $_POST['fFinEvento'];
	$hora = $_POST['horaEvento'];
	$numTIC = $_POST['numTICEvento'];
	$txtLineamientos = $_POST['lineamientoGraficos'];   

    //Creación de array para t_adjunto -- Más información evento
	$_FILES['adjInfoEvento']['type'];
	$_FILES['adjInfoEvento']['size'];
	$_FILES['adjInfoEvento']['name'];
	$_FILES['adjInfoEvento']['tmp_name'];

	//Creación de array para t_adjunto -- Información sitioweb del evento
	$_FILES['adjCubWEbEvento']['type'];
	$_FILES['adjCubWEbEvento']['size'];
	$_FILES['adjCubWEbEvento']['name'];
	$_FILES['adjCubWEbEvento']['tmp_name'];

	//Creación de array para t_adjunto -- Información presupuesto del evento
	$_FILES['adjPresupuestoEvento']['type'];
	$_FILES['adjPresupuestoEvento']['size'];
	$_FILES['adjPresupuestoEvento']['name'];
	$_FILES['adjPresupuestoEvento']['tmp_name'];

	//
	$zipAdj = $_FILES['adjInfoEvento']['name'];
	$zipWeb = $_FILES['adjCubWEbEvento']['name'];
	$pdfPresu = $_FILES['adjPresupuestoEvento']['name'];
	$adjunto = array();
	$countADJ = count($adjunto);
	
	if ($countADJ == 0) {
		if (!empty($zipAdj)) {
			$zipAdj = "IE_".$zipAdj; //IE_ => Prefijo que indica que el campo Información Adicional en Evento
			array_push($adjunto, $zipAdj);
		}
		if (!empty($zipWeb)) {
			$zipWeb = "IW_".$zipWeb; //IW_ => Prefijo que indica que el campo Información sobre sitio web del en Evento
			array_push($adjunto, $zipWeb);
		}
		if (!empty($pdfPresu)) {
			$pdfPresu = "PR_".$pdfPresu; //PR_ => Prefijo que indica que el campo Presupuesto en Evento
			array_push($adjunto, $pdfPresu);
		}
	}
	//Arra de Cubrimiento audiovisual
	$id_cubAudio = array();
	$id_cubAudio = $_POST['tipoCubAUEvento'];

	//Arra de Objetivo Público
	$id_objPublico = array(); //Referencia de t_resobjpublico
	$id_objPublico = $_POST['checkPublicoObj'];

	//Array para t_color
	$color = array();
	$color = $_POST['colorEvento'];

	//Array para cubriiento audiovisual
	$cubrimiento = array();
	$cubrimiento = $_POST["tipoCubAUEvento"];

	//Array para pieza impresa
	$pimp = array();
	$pimp = $_POST["ImpPieza"];

	//Array para acabado impresa
	$aimp = array();
	$aimp = $_POST["ImpAcabado"];

	//Array para tipo papel impresa
	$timp = array();
	$timp = $_POST["ImpTP"];

	//Array para tipo papel impresa
	$cimp = array();
	$cimp = $_POST["IMPCant"];

	//Array para pieza digital
	$dig = array();
	$dig = $_POST["inputDIG"];

	//Objetos de t_requerimientoWeb
	$tipoSitio = $_POST['tipoCubWEbEvento'];
	$justificacionWeb = $_POST["jutifiCubWEbEvento"];

	
	//Conteo de elemento de cada array
	$countADJ = count($adjunto);
	$countCubAud = count($id_cubAudio);
	$countOBJPu = count($id_objPublico);
	$countColor = count($color);
	$countCubri = count($cubrimiento);
	$countIMP = count($pimp);
	$countDIG = count($dig);

	//Llamar y ejecutar el pricedimiento almacenado de Eventos
	$in = 'CALL in_SolicitudEvento("'.$newST.'","'.$nombre.'","'.$email.'","'.$id_facDep.'","'.$telefono.'","'.$id_usuario.'","'.$id_unidad.'","'.$id_categoria.'","'.$id_subCategoria.'","'.$id_fase.'","'.$fecha.'","'.$comentario.'","'.$id_tipoEvento.'","'.$nombreEvento.'","'.$lugar.'","'.$fechaInicio.'","'.$fechaFin.'","'.$hora.'","'.$numTIC.'","'.$txtLineamientos.'")';
	$insert = $conexion->query($in); //Ejecuto el procedimiento

	//Condiciones para poder agregar los array de forma independiente
	$selecNumST = "SELECT numST FROM t_solicitud WHERE numST=".$newST; // Busca que ya este la nueva ST
	$rstNumST = $conexion->query($selecFINNumST);
	$select= mysqli_fetch_row($rstNumST);

	if ($select[0] == $newST) {
		
		for ($i=0; $i < $countADJ; $i++) {
			$adj = $adjunto[$i];
			$inAdj = 'INSERT INTO t_adjunto(numST, adjunto) VALUES ("'.$newST.'","'.$adj.'")';
			$rstAdj = $conexion->query($inAdj);
		}

		for ($j=0; $j < $countOBJPu; $j++) {
			$ojP = $id_objPublico[$j];
			$inObjP = 'INSERT INTO t_resobjpublico(id_objPublico, numST) VALUES ("'.$ojP.'","'.$newST.'")';
			$rstObjP = $conexion->query($inObjP);
		}

		for ($k=0; $k < $countColor; $k++) {
			$col = $color[$k];
			$inColor = 'INSERT INTO t_color(color, numST) VALUES ("'.$col.'","'.$newST.'")';
			$rstColor = $conexion->query($inColor);
		}

		for ($m=0; $m < $countIMP; $m++) { 
			$impreP = $pimp[$m];
			$impreA = $aimp[$m];
			$impreT = $timp[$m];
			$impreC = $cimp[$m];

			$inIMP = 'INSERT INTO t_respiezaimp (id_piezaImp, id_acabadoImp, id_papelImp, cantidad, numST) VALUES ("'.$impreP.'", "'.$impreA.'", "'.$impreT.'", "'.$impreC.'", "'.$newST.'")';
			$rstIMP = $conexion->query($inIMP);
		}

		for ($n=0; $n < $countDIG; $n++) { 
			$digital = $dig[$n];
			$inDIG = 'INSERT INTO t_respiezadig (id_piezaDig, numST) VALUES ("'.$digital.'", "'.$newST.'")';
			$rstDIG = $conexion->query($inDIG);
		}

		for ($o=0; $o < $countCubAud; $o++) {
			$cubAu = $id_cubAudio[$o];
			$inCubAu = 'INSERT INTO t_cubrimiento(id_audiovisual, numST) VALUES ("'.$cubAu.'","'.$newST.'")';
			$rstCubAud = $conexion->query($inCubAu);
		}
		
		if (!empty($tipoSitio)) {
			$inCubri = 'INSERT INTO t_requerimientoweb(tipoWeb, justificacionWeb, numST) VALUES ("'.$tipoSitio.'","'.$justificacionWeb.'","'.$newST.'")';
			$rstCubri = $conexion->query($inCubri);
		}
		mysqli_close($conexion);
		$_SESSION['numST'] = $newST;

		//Se pregunta si exíste la consulta
		if (isset($insert)) {

			$folderST = $newST;
			$folder = $rutaDestinoST.$folderST;
			
			// Se pregunta si no exíste la carpeta a crear
			if (!file_exists($folder)) {
				//Se crea la carpeta e ingresan los adjuntos
				$newFolderST = mkdir("$rutaDestinoST$folderST", 0777);
				move_uploaded_file($_FILES['adjInfoEvento']['tmp_name'], $folder."/".$_FILES['adjInfoEvento']['name']);
				move_uploaded_file($_FILES['adjCubWEbEvento']['tmp_name'], $folder."/".$_FILES['adjCubWEbEvento']['name']);
				move_uploaded_file($_FILES['adjPresupuestoEvento']['tmp_name'], $folder."/".$_FILES['adjPresupuestoEvento']['name']);

				//Envio de correo -- solicitudes@usantotomas.edu.co
				include '../../../mailer/e_solicitud.php';

				if($exito){
					//Redirección al resumen.
					header('Location:../../php/resumen/eventoResumen.php');
				}
			}
		}else{
			echo "Error en la creación de la solicitud, por favor";
			session_destroy();
		}
	}else{
		echo "Error en la creación de la solicitud, por favor";
		session_destroy();
	}
}
?>