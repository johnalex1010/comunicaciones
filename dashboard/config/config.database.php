<?php
$host = constant('HOST');
$db = constant('DB');
$user = constant('USER');
$pass = constant('PASSWORD');
$charset = constant('CHARSET');
try{
	$conexion = new PDO('mysql:host='.$host.';dbname='.$db.'', ''.$user.'', ''.$pass.'', array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES  \'UTF8\''));
}catch(PDOException $e){
	echo "Errror: " . $e->getMessage();
	die();
}
?>