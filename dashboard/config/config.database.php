<?php
$host = constant('HOST');
$db = constant('DB');
$user = constant('USER');
$pass = constant('PASSWORD');
$charset = constant('CHARSET');
try{		
	$conexion = new PDO('mysql:host='.$host.';dbname='.$db.'', ''.$user.'', ''.$pass.'');
}catch(PDOException $e){
	echo "Errror: " . $e->getMessage();
	die();
}
?>