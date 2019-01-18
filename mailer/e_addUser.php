<?php
// ENVIAR CORREO ==============================================================
/*
Primero, obtenemos el listado de e-mails
desde nuestra base de datos y la incorporamos a un Array.
*/
require("datos-email.php");
$array = array($uSelb['email']);
// $array = array("prof.sopweb@usantotomas.edu.co");

/* 
Incluimos el PHPMailerAutoload, que se encarga de incorporar 
a nuestro código, todos los archivos necesarios para utilizar la librería.
Supongamos que guardamos dicha librería en un directorio llamado "phpmailer"
*/

require("PHPMailerAutoload.php"); 

$mail = new PHPMailer;

// Configuramos los datos de sesión para conectarnos al servicio SMTP de Mandrill
$mail->IsSMTP(); // Indicamos que vamos a utilizar SMTP
$mail->Host = $HostSMTP; // El Host de Gmail
$mail->Port = $puerto;  // El puerto que Mandrill nos indica utilizar
$mail->SMTPAuth = $autenticacion; // Indicamos que vamos a utilizar auteticación SMTP       
$mail->Username = $user; // Nuestro usuario en Gmail
$mail->Password = $pass; // Nuestro password en Gmail 
$mail->SMTPSecure = $cifrado; // Activamos el cifrado tls (también ssl)

// Ahora configuraremos los parámetros básicos de PHPMailer para hacer un envío típico
$mail->CharSet = 'UTF-8';
$mail->From = $correoContacto; // Nuestro correo electrónico
$mail->FromName = 'Universidad Santo Tomás'; // El nombre de nuestro sitio o proyecto
$mail->IsHTML(true); // Indicamos que el email tiene formato HTML                      
$mail->Subject = "Ha sido asignado a una solicitud"; // El asunto del email
$mail->Body = "<!doctype html>
<html>
<head>
<meta charset='UTF-8'>
<!-- utf-8 works for most cases -->
<meta name='viewport' content='width=device-width, initial-scale=1.0'>
<!-- Forcing initial-scale shouldn't be necessary -->
<meta http-equiv='X-UA-Compatible' content='IE=edge'>
<!-- Use the latest (edge) version of IE rendering engine -->
<title>Email</title>
<!-- The title tag shows in email notifications, like Android 4.4. -->

<!-- Please use an inliner tool to convert all CSS to inline as inpage or external CSS is removed by email clients -->
<!-- important in CSS is used to prevent the styles of currently inline CSS from overriding the ones mentioned in media queries when corresponding screen sizes are encountered -->

<!-- CSS Reset -->
<style type='text/css'>
	<style>
		html, body {
			margin: 0 !important;
			padding: 0 !important;
			height: 100% !important;
			width: 100% !important;
		}
		.contenido{
			width: 500px;
			margin: 0 auto;
			font-family: Verdana;
			text-align: center;
			border: 1px solid #EBEDEF;
			border-radius: 0.3rem;
		}
		.contenido .imgBox{
			background-color: #EBEDEF;
			padding: 0.4rem;
		}
		.contenido  img{
			width: 130px;
			display: block;
		}
		.contenido > h3{
			background-color: #00D17C;
			display: table;
			margin: 0 auto;
			padding: 0.5rem;
			border-radius: 0.3rem;
			color: #fff;
			font-size: 2rem;
			margin-top: 1rem;
		}
		.contenido p a{
			background-color: #1C67C7;
			color: #fff !important;
			text-decoration: none;
			padding: 2px 5px;
			transition: all 0.2s;
			border-radius: 0.3rem;
		}
		.contenido p a:hover{
			background-color: #FDBD3D;
		}
	</style>
</head>
<body>
	<div class='contenido' style='width: 500px; margin: 0 auto; font-family: Verdana; text-align: center; border: 1px solid #EBEDEF; border-radius: 0.3rem;'>
		<div class='imgBox' style='background-color: #EBEDEF; padding: 0.4rem;'>
			<img src='http://172.16.8.234/JohnAlexUSTA/comunicaciones/dashboard/public/images/solicita.fw.png' alt='Img'>
		</div>
		<p>Hola ".$uSelb['nombres']." ".$uSelb['apellidos'].", el usuario ".$uSela['nombres']." ".$uSela['apellidos']." te asignó a una solicitud</p>
		<h3 style='background-color: #00D17C;display: table; margin: 0 auto; padding: 0.5rem; border-radius: 0.3rem; color: #fff; font-size: 2rem; margin-top: 1rem;'>".$ts['numST']."</h3>
		<p>Para revisar esta solicitud ingrese <a style='background-color: #1C67C7; color: #fff !important;	text-decoration: none; padding: 2px 5px; transition: all 0.2s; border-radius: 0.3rem;' href='http://172.16.8.234/JohnAlexUSTA/comunicaciones/dashboard/' target='_blank'>aquí.</a></p>
	</div>
</body>
</html>"; // El cuerpo de nuestro mensaje

// Recorremos nuestro array de e-mails.

foreach ($array as $email) {
  $mail->AddAddress($email); // Cargamos el e-mail destinatario a la clase PHPMailer
  $exito = $mail->Send(); // Realiza el envío =)
  $mail->ClearAddresses(); // Limpia los "Address" cargados previamente para volver a cargar uno.
}
?>