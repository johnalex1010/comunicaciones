<?php
//Función que suma uno(1) en las ST
function consecutivoST($stOLD){
	$ST = "ST";
	$separar = explode("ST", $stOLD);
	$newST = $separar[1]+1;
	if (strlen($newST) == 1) {
		$newST = "ST00".$newST;
	}elseif (strlen($newST) == 2){
		$newST = "ST0".$newST;
	}else{
		$newST = "ST".$newST;
	}
	return $newST;
}
function codigoSeguimiento($newST){
	//$cod = "<div class='codigoSeguimiento'>Este es su codigo de seguimiento:".$newST."</div>";
	include 'numST.php';
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