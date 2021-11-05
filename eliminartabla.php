<?php
//conectar con la base de datos
extract($_GET);

require("connect_db.php");
    

$sqlborrartabla="DROP TABLE `$nombre`";
$resborrartabla=mysqli_query($conexion, $sqlborrartabla);
            
if($resborrartabla)
    {
        echo '<script>alert ("Tabla eliminada")</script>';
    }else
    {
        echo "Error de eliminacion <br>" .mysqli_error($conexion);
    }



//borrar registro de tablas
$sqlborrar="DELETE from tablasregistro where idtabla='$id'";
$resborrartabla=mysqli_query($conexion, $sqlborrar);
           
if($resborrartabla)
    {
        echo '<script>alert ("Registro de tablas eliminado")</script>';
    }else
    {
        echo "Error de eliminacion <br>" .mysqli_error($conexion);
    }


//borrar registro de campos
$sqlborrarcampos="DELETE from campos where idtabla='$id'";
$resborrarcampos=mysqli_query($conexion, $sqlborrarcampos);
               
if($resborrarcampos)
    {
        echo '<script>alert ("Registro de campos eliminado")</script>';
    }else
    {
        echo "Error de eliminacion <br>" .mysqli_error($conexion);
    }


   

echo "<script>location.href='verbd.php'</script>";

mysqli_close($conexion);



 ?>