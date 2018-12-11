<?php
session_start();
require_once '../config/config.php';
require_once '../config/config.database.php';

if (!isset($_SESSION['usuario'])) {
	header('Location:' . URL . 'pages/login.php');
}
$ST = $_GET['ST'];
require_once '../models/model.trazabilidad.php';
require_once '../models/model.usuarioAsignados.php';
require_once '../models/model.usuarios.php';
require_once '../views/view.trazabilidad.php';
?>