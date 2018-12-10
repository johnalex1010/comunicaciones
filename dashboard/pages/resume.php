<?php
session_start();
require_once '../config/config.php';
require_once '../config/config.database.php';

if (!isset($_SESSION['usuario'])) {
	header('Location:' . URL . 'pages/login.php');
}
require_once '../models/model.usuario.php';
require_once '../models/model.tipo-solicitud.php';
require_once '../controllers/controller.tipo-solicitud.php';
require_once '../models/model.trasabilidad.php';
require_once '../models/model.maxFaseTrasabilidad.php';
require_once '../models/update/model.up.trasabilidad.php';
require_once '../models/model.estado.php';
require_once '../views/view.resume.php';
?>