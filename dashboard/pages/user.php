<?php
session_start();
require_once '../config/config.php';
require_once '../config/config.database.php';

if (!isset($_SESSION['usuario'])) {
	header('Location:' . URL . 'pages/login.php');
}
require_once '../models/model.permisoU.php';
if ($pU['id_permiso'] != 1) {
	header('Location:' . URL . 'pages/login.php');
}
require_once '../models/model.user.php';
require_once '../models/model.cargo.php';
require_once '../models/model.permiso.php';
require_once '../views/view.user.php';
?>