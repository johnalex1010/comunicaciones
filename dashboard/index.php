<?php
session_start();
require_once 'config/config.php';

if (isset($_SESSION['usuario'])) {
	header('Location:' . URL . 'pages/admin.php');
}else{
	header('Location:' . URL . 'pages/login.php');
}
?>