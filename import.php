<?php

session_start();

require("connect_db.php");

$nombre = $_POST['Nombre'];

$fileContent = $_FILES['archivo'];
$fileContent = file_get_contents($fileContent['tmp_name']);

$fileContent = explode("\n",$fileContent);
$fileContent = array_filter($fileContent);

$filas = 0;
$columnas = 0;
//guardar las filas en array
foreach($fileContent as $fila)
{
    $filalist[] = explode(",",$fila);
    $filas++;
}


//crear tabla

$j=0;
foreach($filalist[0] as $campo1)
{
    $campos[] = explode(",",$campo1);
    $columnas++;
}

echo "FILAS:";
print_r($filas);
echo "<br>COLUMNAS:";
print_r($columnas);
echo "<br>";

$filas--;
$columnas--;

$campoprincipal = implode("",$campos[0]); 


$creartabla = "CREATE TABLE `" . $nombre. "`(
    `" . $campoprincipal. "` VARCHAR(100)
)";

$rescreartabla=mysqli_query($conexion, $creartabla);

$cadena = "";
$i=0;

foreach($campos as $campo)
{
    
    if($i != 0) 
   { 
    $campoactual = implode("",$campo);
    $campoactual = trim($campoactual);
    //$cadena = $campoactual. "," .$cadena ;
    $sqlcampos = "ALTER TABLE `" . $nombre. "` ADD COLUMN `" . $campoactual. "` VARCHAR(100) CHARACTER SET utf8 COLLATE utf8_spanish2_ci";
    $rescampos=mysqli_query($conexion, $sqlcampos);
    
  
    
    if($rescampos)
    {
        echo "Campo " .$campoactual. " agregado <br>";
    }else
    {
        echo "Error de registro de" .$campoactual. "|<br>" .mysqli_error($conexion);
    }


    }

   $i++;

    
}


//insertar datos

    for($f=1;$f<=$filas;$f++)
    {
        for($c=0;$c<=$columnas;$c++)
        {
            if($c==0)
            {
                $campoactual = $filalist[0][$c];
                settype($campoactual, 'string'); 
                $campoactual = trim($campoactual);

                $dato = $filalist[$f][$c];
                settype($dato, 'string'); 
                $dato = trim($dato);
                        
                $sqlinsertar=("INSERT INTO  `" . $nombre. "` (`" . $campoactual. "`) VALUES ('$dato')");

                $resinsertar=mysqli_query($conexion, $sqlinsertar);

                if($resinsertar)
                {
                    //echo "Registro insertado en " .$campoactual. "| con el dato " .$dato. "|<br>";
                }else
                {
                    echo "Error de registro de columna " .$campoactual. "| en con el dato " .$dato. "|\n" .mysqli_error($conexion). "<br>" ;
                }

                $id= $dato;
            }

            if($c != 0) 
            {

                $campoactual = $filalist[0][$c];
                settype($campoactual, 'string'); 
                $campoactual = trim($campoactual);

                $dato = $filalist[$f][$c];
                settype($dato, 'string'); 
                $dato = trim($dato);
                        
                $sqlinsertar=("UPDATE `" . $nombre. "` SET `".$campoactual."`='$dato' WHERE `".$campoprincipal."`='$id' ");

                $resinsertar=mysqli_query($conexion, $sqlinsertar);

                if($resinsertar)
                {
                    //echo "Registro insertado en " .$campoactual. "| con el dato " .$dato. "|<br>";
                }else
                {
                    echo "Error de registro de columna " .$campoactual. "| en con el dato " .$dato. "|\n" .mysqli_error($conexion). "<br>" ;
                }
            }
        }
    }

    //guardar registro de tabla

    $filas++;
    $columnas++;

    $sqltablas="Insert into tablasregistro (nombre,idusuario,filas,columnas) values ('$nombre','".$_SESSION['id']."',$filas,$columnas) " ;

    $resulttablas=mysqli_query($conexion, $sqltablas);

    if($resulttablas)
    {
    echo "registo exitoso";
    }else
    {
        echo "Error de registro <br>" .mysqli_error($conexion);
    }
    

    //guardar registro de campos

    $sqlidtabla="SELECT * FROM tablasregistro where nombre='$nombre'";
    $resultvertabla=mysqli_query($conexion,$sqlidtabla);

    while ($tabla=mysqli_fetch_array($resultvertabla)) {
        $idtabla=$tabla['idtabla'];
    }

    $_SESSION['tablaactual']=$idtabla;

    $columnas--;

    for($c=0;$c<=$columnas;$c++)
    {
        $dato = $filalist[0][$c];
        settype($dato, 'string'); 
        $dato = trim($dato);

        $sqlregistrocampos="Insert into campos (idtabla,nombre,posicion) values ($idtabla,'$dato',$c) " ;

        $resultcampos=mysqli_query($conexion, $sqlregistrocampos);


        if($resultcampos)
        {
            //echo "registo exitoso";
        }else
        {
            echo "Error de registro <br>" .mysqli_error($conexion);
        }
    }

    
    mysqli_close($conexion);

    echo "<script>location.href='registroexitoso.php'</script>";


?>
