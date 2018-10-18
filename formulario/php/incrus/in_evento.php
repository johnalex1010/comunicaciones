<?php
	session_start();

	if ($_SESSION['home'] == 0) {
		header('Location:../../');
	}
	
	include_once '../conexion.php';
	include_once '../funciones/campos.php';

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
	$comentario = 'Ingresa la Solicitud';

	//Objetos especificos de la Tabla t_evento	
	$id_tipoEvento = $_SESSION['tipoEvento'];
	$nombreEvento = $_SESSION['nombreEvento'];
	$lugar = $_SESSION['lugarEvento'];
	$fechaInicio = $_SESSION['fIniEvento'];
	$fechaFin = $_SESSION['fFinEvento'];
	$hora = $_SESSION['horaEvento'];
	$numTIC = $_SESSION['numTICEvento'];
	$txtLineamientos = $_SESSION['lineamientoGraficos'];   

    //Creación de array para t_adjunto -- Más información evento
	$_FILES['adjInfoEvento']['type'] = $_SESSION['adjInfoEvento1'];
	$_FILES['adjInfoEvento']['size'] = $_SESSION['adjInfoEvento2'];
	$_FILES['adjInfoEvento']['name'] = $_SESSION['adjInfoEvento3'];
	$_FILES['adjInfoEvento']['tmp_name'] = $_SESSION['adjInfoEvento4'];

	//Creación de array para t_adjunto -- Información sitioweb del evento
	$_FILES['adjCubWEbEvento']['type'] = $_SESSION['adjCubWEbEvento1'];
	$_FILES['adjCubWEbEvento']['size'] = $_SESSION['adjCubWEbEvento2'];
	$_FILES['adjCubWEbEvento']['name'] = $_SESSION['adjCubWEbEvento3'];
	$_FILES['adjCubWEbEvento']['tmp_name'] = $_SESSION['adjCubWEbEvento4'];

	$_FILES['adjPresupuestoEvento']['type'] = $_SESSION['adjPresupuestoEvento1'];
	$_FILES['adjPresupuestoEvento']['size'] = $_SESSION['adjPresupuestoEvento2'];
	$_FILES['adjPresupuestoEvento']['name'] = $_SESSION['adjPresupuestoEvento3'];
	$_FILES['adjPresupuestoEvento']['tmp_name'] = $_SESSION['adjPresupuestoEvento4'];

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
	$id_cubAudio = $_SESSION['tipoCubAUEvento'];

	//Arra de Objetivo Público
	$id_objPublico = array(); //Referencia de t_resobjpublico
	$id_objPublico = $_SESSION['checkPublicoObj'];

	//Array para t_color
	$color = array();
	$color = $_SESSION['colorEvento'];

	//Array para cubriiento audiovisual
	$cubrimiento = array();
	$cubrimiento = $_SESSION["tipoCubAUEvento"];

	//Array para pieza impresa
	$pimp = array();
	$pimp = $_SESSION["selectPiezaIMPEvento"];

	//Array para acabado impresa
	$aimp = array();
	$aimp = $_SESSION["acabadoIMPEvento"];

	//Array para tipo papel impresa
	$timp = array();
	$timp = $_SESSION["tipoPapelIMPEvento"];

	//Array para tipo papel impresa
	$cimp = array();
	$cimp = $_SESSION["cantidadIMPEvento"];

	//Array para pieza digital
	$dig = array();
	$dig = $_SESSION["tipoDIGEvento"];

	//Objetos de t_requerimientoWeb
	$tipoSitio = $_SESSION['tipoCubWEbEvento'];
	$justificacionWeb = $_SESSION["jutifiCubWEbEvento"];

	
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
		
		for ($l=0; $l < $countCubri; $l++) {
			$cubri = $cubrimiento[$l];
			$inCubri = 'INSERT INTO t_cubrimiento(tipoCubrimiento, numST) VALUES ("'.$cubri.'","'.$newST.'")';
			$rstCubri = $conexion->query($inCubri);
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
			$inCubAu = 'INSERT INTO t_resaudiovisual(id_audiovisual, numST) VALUES ("'.$cubAu.'","'.$newST.'")';
			$rstCubAud = $conexion->query($inCubAu);
		}
		
		if (!empty($tipoSitio)) {
			$inCubri = 'INSERT INTO t_requerimientoweb(tipoWeb, justificacionWeb, numST) VALUES ("'.$tipoSitio.'","'.$justificacionWeb.'","'.$newST.'")';
			$rstCubri = $conexion->query($inCubri);
		}

		echo codigoSeguimiento($newST);

		//La eliminación de Sesión y cierre de conexión se debe hacer al final del envio de correo a solicitudes@usantotomas.edu.co
		mysqli_close($conexion);
		session_destroy();
		
	}else{
		mysqli_close($conexion);
		echo "No Funciono";
	}

}else{
	mysqli_close($conexion);
	session_destroy();
	echo "NO Existe";
}
?>