<?php
session_start();
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
 
  
  <link rel="stylesheet" href="CSS.css">
 
  <title>Registrarse</title>
</head>
<body>
<header id="main-header">
<a href="home.php"><h1 >EMASSIVE</h1></a>
</header>


<div class="register" id="formularioREG">
    <form action="modificarperfil.php" method="post">
    <h2>Modificar perfil</h2>
    <input type="hidden" name="id" value="<?php echo $_SESSION['id'] ?>">
    <input type="text" placeholder="Nombre" name="nombre" class="nombre" value="<?php echo $_SESSION['nombre']; ?>" required>
    <input type="password" placeholder="Contraseña"  name="contrasena" class="pass" value="<?php echo $_SESSION['contrasena']; ?>" required>
    <input type="text" placeholder="Correo" name="correo" class="nombre" value="<?php echo $_SESSION['correo']; ?>" required>
    <input type="text" placeholder="Ocupacion"  name="ocupacion" class="pass" value="<?php echo $_SESSION['ocupacion']; ?>" required>
    <div id="Btn">
      <input type="submit" class="submit" value="Modificar">
    </div>
    
    </form>
</div>


	<footer id="main-footer">
		<p><a href="https://www.uanl.mx/">Preguntas frecuentes. </a></p>
		<p><a href="https://www.uanl.mx/">¿Quienes somos?. </a></p>
		<p><a href="https://www.uanl.mx/">Aviso de terminos y condiciones. </a></p>
	</footer> 
</body>
</html>