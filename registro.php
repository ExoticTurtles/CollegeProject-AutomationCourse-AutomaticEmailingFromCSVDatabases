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
<h1>EMASSIVE</h1>
</header>


<div class="register" id="formularioREG">
    <form action="registrousuarios.php" method="post">
    <h2>Registrarse</h2>
    <input type="text" placeholder="Nombre" name="Nombre" class="nombre" required>
    <input type="password" placeholder="Contraseña"  name="Contrasena" class="pass" required>
    <input type="text" placeholder="Correo" name="Correo" class="nombre" required>
    <input type="text" placeholder="Ocupacion"  name="Ocupacion" class="pass" required>
    <div id="Btn">
      <input type="submit" class="submit" value="Registrarse">
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