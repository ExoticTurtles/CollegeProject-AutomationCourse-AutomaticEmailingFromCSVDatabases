<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
 
  
  <link rel="stylesheet" href="CSS.css">
 
  <title>Iniciar sesion</title>
</head>
<body>
<header id="main-header">
<h1>EMASSIVE</h1>
</header>


<div class="register">
    <form action="validar.php" method="post">
    <h2>Iniciar sesion.</h2>
    <p><b>Ingrese su nombre de usuario</b></p>
    <input type="text" placeholder="Nombre" name="nombre" class="nombre">
    <p><b>Ingrese su contraseña</b></p>
    <input type="password" placeholder="Contraseña"  name="contrasena" class="pass">
    <div id="Btn">
    <input type="submit" class="submit" value="INGRESAR">
    </div>
    
   <p class="hypervinculo">Si no tiene cuenta registrese  <a href="./registro.php"><u>aqui!</u></a></p>
    </form>
</div>


	<footer id="main-footer">
		<p><a href="https://www.uanl.mx/">Preguntas frecuentes. </a></p>
		<p><a href="https://www.uanl.mx/">¿Quienes somos?. </a></p>
		<p><a href="https://www.uanl.mx/">Aviso de terminos y condiciones. </a></p>
	</footer> 
</body>
</html>