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
require_once '../models/model.paginacionUsuarios.php';
require_once '../controllers/controller.paginacion.php';
require_once '../models/model.usuarios.php';
require_once '../views/view.users.php';
?>