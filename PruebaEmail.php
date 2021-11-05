<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require 'phpmailer/src/PHPMailer.php';
require 'phpmailer/src/SMTP.php';
require 'phpmailer/src/Exception.php';

$mail = new PHPMailer(true);
$query = mysqli_query($conexion, "SELECT * FROM usuario");
$result = mysqli_num_rows($query);
echo $result;

if($result > 0){
    while($data = mysqli_fetch_array($query)){

        try{
            $mail->SMTPDebug = SMTP::DEBUG_SERVER;
            $mail->isSMTP();
            $mail->Host = 'smtp.office365.com';
            $mail->SMTPAuth = true;
            $mail->Username = 'LDGLBusiness@outlook.es';
            $mail->Password = '10FImE01';
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
            $mail->Port = 587;

    
        
            $mail->setFrom('LDGLBusiness@outlook.es', 'Correos masivos para ti y para todos');
            $mail->addAddress($data["correo"], 'COMPAS CDP');
        
            $mail->isHTML(true);
            $mail->Subject = 'Prueba de correo';
            $mail->Body = 'Esta es una prueba';
        
            $mail->send();
        
            echo 'Correo enviado';
        
        
        
        
        } catch(Excepcion $e){
            echo 'Correo enviado' . $mail->ErrorInfo;
        } 
    }


}
?>