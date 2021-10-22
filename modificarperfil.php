<?php

session_start();

extract($_POST);
require("connect_db.php");
$cambio="update usuario set nombre='$nombre', contrasena='$contrasena', correo='$correo', ocupacion='$ocupacion' where id='$id'";

$rescamb=mysqli_query($conexion, $cambio);
if($rescamb==null){
  echo "No se actualizaron datos";
  //header("Location:admi.php");

}else{
  echo '<script>alert("Registro exitoso")</script>';
 //header("Location:admi.php");
  echo "<script>location.href='home.php'</script>";
}
 ?>