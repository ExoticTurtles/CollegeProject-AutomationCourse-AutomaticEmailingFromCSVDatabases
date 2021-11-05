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


  <div class="verbd">
      <h2>Bases de datos Importadas </h2>    
  </div>

<br><br><br>
<div class="col-lg-8 col-md-10 ml-auto mr-auto">
  <div class="table-responsive">
                <table class="table">
                    <thead>
                        <tr>
                            <th class="text-center">#</th>
                            <th>Nombre Tabla</th>
                            <th>Filas</th>
                            <th>Columnas</th>
                            <th class="text-right">Campos</th>
                            <th class="text-right">Acciones</th>
                        </tr>
                    </thead>
                    <tbody>

                      <?php

                      
                      require("connect_db.php");
                      $sql="SELECT * FROM tablasregistro WHERE idusuario='".$_SESSION['id']."'";
                      $result=mysqli_query($conexion,$sql);

                      while ($fila=mysqli_fetch_array($result)) {
                          $idtabla=$fila['idtabla'];
                          $nombre=$fila['nombre'];
                          $filas=$fila['filas'];
                          $columnas=$fila['columnas'];

                                                  
                                                                        
                          ?>

                        <tr>
                            <td><?php echo $idtabla ?></td>
                            <td><?php echo $nombre?></td>
                            <td ><?php echo $filas ?></td>
                            <td ><?php echo $columnas ?></td>
                            <td class="text-right"><?php

                            $sqlcampos="SELECT * FROM campos WHERE idtabla=$idtabla";
                            $result2=mysqli_query($conexion,$sqlcampos);

                            while ($campos=mysqli_fetch_array($result2)) {
                              $camponombre=$campos['nombre'];

                              echo $camponombre. "<br>" ;
                              
                            }  
                              ?>
                          
                            </td>

                            

                            <td class="td-actions text-right">
                            <?php echo "<button   type='button' rel='tooltip' class='btn btn-danger btn-just-icon btn-sm' data-original-title='' title=''>
                                          <i  class='material-icons'><a href='eliminartabla.php?id=$idtabla&nombre=$nombre'>Eliminar</a></i>
                                        </button>";?>
                            </td>
                        </tr>

                    <?php } ?>
                        
                    </tbody>
                </table>
                </div>
</div>
  

</body>
</html>
