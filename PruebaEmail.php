<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

session_start();

require("connect_db.php");
require 'phpmailer/src/PHPMailer.php';
require 'phpmailer/src/SMTP.php';
require 'phpmailer/src/Exception.php';

$nombre = $_POST['nombre'];
$correo = $_POST['correo'];
$password = $_POST['password'];

$mail = new PHPMailer(true);
$query = mysqli_query($conexion, "SELECT * FROM `" . $nombre. "`");
$result = mysqli_num_rows($query);
echo $result;
$email = $correo;
$password = $password;

echo $email;

if($result > 0){
    while($data = mysqli_fetch_array($query)){

        try{
            $mail->SMTPDebug = SMTP::DEBUG_SERVER;
            $mail->isSMTP();
            $mail->Host = 'smtp.gmail.com';
            $mail->SMTPAuth = true;
            $mail->Username = $email;
            $mail->Password = $password;
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
            $mail->Port = 587;

    
        
            $mail->setFrom($email, 'Prueba de base de datos');
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