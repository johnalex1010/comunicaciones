<?php
session_start();
require_once '../config/config.php';
require_once '../config/config.database.php';

if (!isset($_SESSION['usuario'])) {
	header('Location:' . URL . 'pages/login.php');
}
$ST = $_GET['ST'];
require_once '../models/model.functions.php';
require_once '../models/model.tipo-solicitud.php';
require_once '../models/model.trazabilidad.php';
require_once '../models/model.usuarioAsignados.php';
require_once '../models/model.usuarios.php';
require_once '../models/model.usuario.php';
require_once '../models/model.maxFaseTrazabilidad.php';
require_once '../models/model.permisosST.php';
require_once '../models/update/model.up.estado.php';
require_once '../models/model.estado.php';
require_once '../controllers/controller.estado.php';
require_once '../models/insert/model.in.userST.php';
require_once '../models/model.alertas.php';
require_once '../models/insert/model.in.alertas.php';
require_once '../views/view.trazabilidad.php';
?>