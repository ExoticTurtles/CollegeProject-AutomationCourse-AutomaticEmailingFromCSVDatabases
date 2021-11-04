<?php


//creacion de conexion al servidor

$conexion= mysqli_connect("localhost","id17882313_root","i[_A=|*dk4?mCmV","d17882313_emmasive",3306);

//validar conexion
if($conexion-> connect_errno)
{
  die("Conexion fallida a la base: (.$conexion.mysqli_connect_error().").$conexion->mysqli_connect_error();
}

 ?>
