<?php
//Función que suma uno(1) en las ST
function consecutivoST($stOLD){
	$anio =  date('Y');
	$anioALT = ".".$anio;
	$separarAnio = explode(".20", $anioALT);
	$STExplode = explode("ST", $stOLD);
	$STAnio = explode("_", $STExplode[1]);
	
	//Verificar que el año se el mismo
	if ($separarAnio[1] == $STAnio[0]) {
		//Crear el conseutivo ST
		$STNumExplode = explode("ST".$separarAnio[1]."_", $stOLD);
		$conseutivo = $STNumExplode[1]+1;
		if (strlen($conseutivo) == 1) {
			// $conseutivo = $conseutivo+1;
			$newST = "ST".$STAnio[0]."_00".$conseutivo;
		}elseif (strlen($conseutivo) == 2) {
			$newST = "ST".$STAnio[0]."_0".$conseutivo;
		}else{
			$newST = "ST".$STAnio[0]."_".$conseutivo;
		}
	}else{
		//Crear crear la carpeta año y crea el conseutivo ST 001
		include_once '../validaciones.php';
		$newST = "ST".$separarAnio[1]."_001";
		mkdir($rutaDestinoST.$anio, 0777);
	}

	return $newST;
}

/*--*/
function campoFacDep($con){
	$r = "SELECT * FROM t_facDep";
	$rst = $con->query($r);
	while ($f = mysqli_fetch_array($rst)) {
		echo "<option value='".$f['id_facDep']."'>".$f['facDep']."</option>";
	}
}
function tipoEvento($con){
	$r = "SELECT * FROM t_tipoevento";
	$rst = $con->query($r);
	while ($f = mysqli_fetch_array($rst)) {
		echo "<option value='".$f['id_tipoEvento']."'>".$f['tipoEvento']."</option>";
	}
}
function piezaImpEvento($con){
	$r = "SELECT * FROM t_piezaimp";
	$rst = $con->query($r);
	while ($f = mysqli_fetch_array($rst)) {
		echo "<option value='".$f['id_piezaImp']."'>".$f['listPiezaImp']."</option>";
	}
}

function acabadosImpEvento($con){
	$r = "SELECT * FROM t_acabadoimp";
	$rst = $con->query($r);
	while ($f = mysqli_fetch_array($rst)) {
		echo "<option value='".$f['id_acabadoImp']."'>".$f['listAcabadoImp']."</option>";
	}
}

function tipoPapelEvento($con){
	$r = "SELECT * FROM t_papelimp";
	$rst = $con->query($r);
	while ($f = mysqli_fetch_array($rst)) {
		echo "<option value='".$f['id_papelImp']."'>".$f['listPapelImp']."</option>";
	}
}
function piezaDigEvento($con){
	$r = "SELECT * FROM t_piezadig";
	$rst = $con->query($r);
	while ($f = mysqli_fetch_array($rst)) {
		echo "<option value='".$f['id_piezaDig']."'>".$f['listPiezaDig']."</option>";
	}
}
?>