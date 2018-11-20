<?php
session_start();
session_destroy();
require_once '../config/config.php';
require_once '../config/config.database.php';

if (isset($_SESSION['usuario'])) {
	header('Location:' . URL . 'pages/admin.php');
}

require_once '../views/view.login.php';
?>