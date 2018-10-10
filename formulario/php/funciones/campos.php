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
	$cod = "<div class='codigoSeguimiento'>Este es su codigo de seguimiento:".$newST."</div>";
	return $cod;
}
/*--*/
function campoFacDep($con){
	$r = "SELECT * FROM t_facDep";
	$rst = $con->query($r);
	while ($f = mysqli_fetch_array($rst)) {
		echo "<option value='".$f['id_facDep']."'>".$f['facDep']."</option>";
	}
}
function tipoEvento(){
	echo "<option value='Tipo Evento 1'>Tipo Evento 1</option>";
	echo "<option value='Tipo Evento 2'>Tipo Evento 2</option>";
	echo "<option value='Tipo Evento 3'>Tipo Evento 3</option>";
	echo "<option value='Tipo Evento 4'>Tipo Evento 4</option>";
	echo "<option value='Tipo Evento 5'>Tipo Evento 5</option>";
}
function piezaImpEvento(){
	echo "<option value='piezaImpEvetno 1'>piezaImpEvetno 1</option>";
	echo "<option value='piezaImpEvetno 2'>piezaImpEvetno 2</option>";
	echo "<option value='piezaImpEvetno 3'>piezaImpEvetno 3</option>";
	echo "<option value='piezaImpEvetno 4'>piezaImpEvetno 4</option>";
	echo "<option value='piezaImpEvetno 5'>piezaImpEvetno 5</option>";
}

function acabadosImpEvento(){
	echo "<option value='acabados Evento 1'>acabados Evento 1</option>";
	echo "<option value='acabados Evento 2'>acabados Evento 2</option>";
	echo "<option value='acabados Evento 3'>acabados Evento 3</option>";
	echo "<option value='acabados Evento 4'>acabados Evento 4</option>";
	echo "<option value='acabados Evento 5'>acabados Evento 5</option>";
}

function tipoPapelEvento(){
	echo "<option value='Tipo papel Evento 1'>Tipo papel Evento 1</option>";
	echo "<option value='Tipo papel Evento 2'>Tipo papel Evento 2</option>";
	echo "<option value='Tipo papel Evento 3'>Tipo papel Evento 3</option>";
	echo "<option value='Tipo papel Evento 4'>Tipo papel Evento 4</option>";
	echo "<option value='Tipo papel Evento 5'>Tipo papel Evento 5</option>";
}
function piezaDigEvento(){
	echo "<option value='piezaDigEvetno 1'>piezaDigEvetno 1</option>";
	echo "<option value='piezaDigEvetno 2'>piezaDigEvetno 2</option>";
	echo "<option value='piezaDigEvetno 3'>piezaDigEvetno 3</option>";
	echo "<option value='piezaDigEvetno 4'>piezaDigEvetno 4</option>";
	echo "<option value='piezaDigEvetno 5'>piezaDigEvetno 5</option>";
}
?>