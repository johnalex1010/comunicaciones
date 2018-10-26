<?php
session_start();
$numST = $_SESSION['numST'];
// ENVIAR CORREO ==============================================================
/*
Primero, obtenemos el listado de e-mails
desde nuestra base de datos y la incorporamos a un Array.
*/
require("../../../mailer/datos-email.php");
$array = array($correoSolicitudes);

/* 
Incluimos el PHPMailerAutoload, que se encarga de incorporar 
a nuestro código, todos los archivos necesarios para utilizar la librería.
Supongamos que guardamos dicha librería en un directorio llamado "phpmailer"
*/

require("../../../mailer/PHPMailerAutoload.php"); 

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
$mail->Subject = "Nueva solicitud"; // El asunto del email
$mail->Body = "
<p>Prueba de correo ST:". $numST ."</p>
"; // El cuerpo de nuestro mensaje

// Recorremos nuestro array de e-mails.

foreach ($array as $email) {
  $mail->AddAddress($email); // Cargamos el e-mail destinatario a la clase PHPMailer
  $exito = $mail->Send(); // Realiza el envío =)
  $mail->ClearAddresses(); // Limpia los "Address" cargados previamente para volver a cargar uno.
}



?>