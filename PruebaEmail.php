<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require 'phpmailer/src/PHPMailer.php';
require 'phpmailer/src/SMTP.php';
require 'phpmailer/src/Excepcion.php';

$mail = new PHPMailer(true);

try{
    $mail->SMTPDebug = SMTP::DEBUG_SERVER;
    $mail->isSMTP();
    $mail->Host = 'smtp.hostinger.com';
    $mail->SMTPAuth = true;
    $mail->Username = 'ldgarcialeal@hotmail.com'
    $mail->Password = 'FimeEsChido'
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
    $mail->Port = 587;

    $mail->setFrom('ldgarcialeal@hotmail.com', 'Correos masivos para ti y para todos');
    $mail->addAddress('compras@codigospro.mx', 'COMPAS CDP');

    $mail->isHTML(true);
    $mail->Subject = 'Prueba de correo';
    $mail->Vody = 'Esta es una prueba';

    $mail->send();

    echo 'Correo enviado';




} catch(Excepcion $e){
    echo 'Correo enviado' . $mail->ErrorInfo;
}