<?php
session_start();
if($_SESSION['nombre']){
    session_destroy();



    ob_start();
      header("Location: index.php");
       ob_end_flush();



}
unset($_SESSION['nombre']);
 ?>
