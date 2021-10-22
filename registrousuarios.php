<?php
//creacion de conexion al servidor
$conexion= mysqli_connect("localhost","root","","emmasive",3306);
//validar conexion
if(!$conexion)
{
  die("Conexion fallida al servidor".mysqli_connect_error());
}

$sql="Insert into usuario (nombre,correo,contrasena,ocupacion) values ('".$_POST['Nombre']."','".$_POST['Correo']."','".$_POST['Contrasena']."','".$_POST['Ocupacion']."') " ;

$result=mysqli_query($conexion, $sql);

if($result)
{
  echo "registo exitoso";
}else
{
    echo "Error de registro" .$sql . "<br>" .mysqli_error($conexion);
}
mysqli_close($conexion);

ob_start();
header("refresh:2,url=index.php");
ob_end_flush();
 ?>