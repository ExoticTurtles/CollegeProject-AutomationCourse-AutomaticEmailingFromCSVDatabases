<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
 
  
  <link rel="stylesheet" href="CSS.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>


  <title>Emmasive</title>
</head>

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
$titulo = $_POST['titulo'];
$cuerpo = $_POST['cuerpo'];

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
            $mail->isSMTP();
            $mail->Host = 'smtp.gmail.com';
            $mail->SMTPAuth = true;
            $mail->Username = $email;
            $mail->Password = $password;
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
            $mail->Port = 587;

    
        
            $mail->setFrom($email, 'Correo de parte de EMMASIVE');
            $mail->addAddress($data["Correo"], 'Buenas tardes '.$data["Alumno"]);
            $mail->Subject = $titulo;
            $mail->Body = $cuerpo;

        
            $mail->send();
        
            echo 'Correo enviado';
        
        
        
        
        } catch(Excepcion $e){
        
        } 
    }


}
?>
<body>

<?php
   include 'plantillas/navbar.php'
 ?>


  <div class="register">
    
    <h2>Envio de correos exitoso.</h2>
    <div align="center"><img src="SRC/VSC-Logo.png" alt="" width="200" height="200" /></div>
    <br><br>
    <div id="Btn">
    <form action="home.php">
    <input type="submit" src="enviar.php" class="submit" value="Realizar otra accion">
    </form>
    </div>
  
    
</div>


  </nav>
</div>





	<footer id="main-footer">
		<p><a href="https://www.uanl.mx/">Preguntas frecuentes. </a></p>
		<p><a href="https://www.uanl.mx/">¿Quienes somos?. </a></p>
		<p><a href="https://www.uanl.mx/">Aviso de terminos y condiciones. </a></p>
	</footer> 
</body>
</html>