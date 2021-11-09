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
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>


  <title>Emmasive</title>
</head>
<body>

<?php
   include 'plantillas/navbar.php'
 ?>


  <div class="importarbd">
    <form action="import.php" method="post" enctype="multipart/form-data">
      <h2>Importar base de datos</h2>
      <p><b>Asignar el nombre a la base de datos</b></p>
      <div class = "nombre">
      <input type="text" placeholder="nombre" name="Nombre" class="nombre">
      <p><b>Base de datos</b></p>
      <input type="file" placeholder="archivo"  name="archivo" class="localizacion">
      <br><br>
      <div id="Btn">
      <input type="submit" class="submit" value="Importar">
      <p><b><a class="a" href="https://1drv.ms/x/s!AnFQen1sdoGV62ncwlo25Aoa14gg?e=Ltxn7k">Plantilla de la base de datos</a></b></p>
       </div>
    
      </form>
  </div>
  
</body>
</html>


<script type="text/javascript">

function uploadfiles()
{
  var Form = new FormData($('#filesForm')[0]);
  $.ajax({

    url: "import.php",
    type: "post",
    data: Form, 
    processData: false,
    contentType: false,
    success: function(data)
    {
        alert('Base de datos agregada');
    }
  })
}

</script>