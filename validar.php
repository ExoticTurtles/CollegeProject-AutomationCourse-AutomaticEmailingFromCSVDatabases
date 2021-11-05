<?php
session_start();

require("connect_db.php");
$username=$_POST['nombre'];
$pass=$_POST['contrasena'];
$_SESSION['username']=$username;


$sql=mysqli_query($conexion, "SELECT id, nombre, correo, contrasena, ocupacion from usuario where nombre ='$username'");

if($f=mysqli_fetch_assoc($sql)){
  if ($pass==$f['contrasena']) {
    $_SESSION['id']=$f['id'];
    $_SESSION['nombre']=$f['nombre'];
    $_SESSION['contrasena']=$f['contrasena'];
    $_SESSION['correo']=$f['correo'];
    $_SESSION['ocupacion']=$f['ocupacion'];
    


    

      echo '<script>alert("Bienvenido")</script>';
      echo "<script>location.href='home.php'</script>";
    


  }else
  {
    echo '<script>alert("Contrasena Incorrecta")</script>';
    echo "<script>location.href='index.php'</script>";
  }
}




 ?>
