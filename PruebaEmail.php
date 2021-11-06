<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

session_start();

require("connect_db.php");
require 'phpmailer/src/PHPMailer.php';
require 'phpmailer/src/SMTP.php';
require 'phpmailer/src/Exception.php';

$mail = new PHPMailer(true);
$query = mysqli_query($conexion, "SELECT * FROM pruebacsv2");
$result = mysqli_num_rows($query);
echo $result;
$email = $_SESSION['correo'];
echo $email;

if($result > 0){
    while($data = mysqli_fetch_array($query)){

        try{
            $mail->SMTPDebug = SMTP::DEBUG_SERVER;
            $mail->isSMTP();
            $mail->Host = 'smtp.gmail.com';
            $mail->SMTPAuth = true;
            $mail->Username = $_SESSION['correo'];
            $mail->Password = 'Admin1234*';
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
            $mail->Port = 587;

    
        
            $mail->setFrom($_SESSION['correo'], 'Prueba de base de datos');
            $mail->addAddress($data["Correo"], 'Contenido del correo que vamos a enviar');
        
            $mail->isHTML(true);
            $mail->Subject = 'Calificaciones de: '.$data["Alumno"];
            $mail->Body = 'Esta es una prueba <br> Calificaciones:'.$data["Calificacion"];

        
            $mail->send();
        
            echo 'Correo enviado';
        
        
        
        
        } catch(Excepcion $e){
            echo 'Correo enviado' . $mail->ErrorInfo;
        } 
    }


}
?>