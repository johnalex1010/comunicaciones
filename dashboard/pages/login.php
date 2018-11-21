<?php
session_start();
require_once '../config/config.php';
require_once '../config/config.database.php';
$_SESSION['usuario'] = 'John Alex';
if (isset($_SESSION['usuario'])) {
	header('Location:' . URL . 'pages/admin.php');
}

require_once '../views/view.login.php';
?>