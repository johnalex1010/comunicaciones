<?php 
//=====================
//DATOS SERVIDOR LOCAL
//=====================
//CREA LA CONEXIÓN A LA BD
 $host_db = "localhost";
 $user_db = "root";
 $pass_db = "Usta2018*";
 $db_name = "bdComunicaciones";
 $conexion = new mysqli($host_db, $user_db, $pass_db, $db_name);
 mysqli_set_charset($conexion,"utf8");

//VERIFICA LA CONEXION A LA BD
 if ($conexion->connect_error) {
 die("La conexion falló: " . $conexion->connect_error);
}
?>