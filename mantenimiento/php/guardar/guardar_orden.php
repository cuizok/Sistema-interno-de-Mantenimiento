<?php
//validamos datos del servidor
$host = "localhost";
$user = "root";
$pass = "DgZwUGraQsU2pHq";


//conetamos al base datos
$connection = mysqli_connect($host, $user, $pass);

//hacemos llamado al imput de formuario
    
if(isst($_POST[''])){
    if(
    
        strlen($_POST['semana']) >= 1 &&
        strlen($_POST['maquina']) >= 1 &&
        strlen($_POST['fecha']) >= 1 &&
        strlen($_POST['modelo']) >= 1 &&
        strlen($_POST['codigo']) >= 1 &&
        strlen($_POST['departamento']) >= 1 &&
        strlen($_POST['acciones']) >= 1 &&
        strlen($_POST['especificaciones']) >= 1 &&
        strlen($_POST['falla']) >= 1 &&
        
    
    
    
    )
    
    
    
    
    
}

$semana=$_POST['semana'];
$maquina=$_POST['maquina'];
$fecha=$_POST['fecha'];
$modelo=$_POST['modelo'];
$codigo=$_POST['codigo'];
$departamento=$_POST['departamento'];
$acciones=$_POST['acciones'];
$especificaciones=$_POST['especificaciones'];
$falla=$_POST['falla'];


 //insertamos datos de registro al mysql xamp, indicando nombre de la tabla y sus atributos
        $instruccion_SQL = "INSERT INTO ordenes (idordenes, semana, codigo, maquina, fecha, falla, departamento)
                             VALUES ('$semana','$maquina','$fecha','$modelo','$codigo','$departamento','$falla')";
                           
                            
        $resultado = mysqli_query($connection,$instruccion_SQL);

if ($resultado){
    
    
// aqui se agregan las validaciones de registro
    
    
    
}

    

//verificamos la conexion a base datos
//if(!$connection) 
        //{
            //echo "No se ha podido conectar con el servidor" . mysql_error();
        //}
  //else
        //{
            //echo "<b><h4>Hemos conectado al servidor</h45</b>" ;
        //}
        //indicamos el nombre de la base datos
        //$datab = "pdo";
        //indicamos selecionar ala base datos
        //$db = mysqli_select_db($connection,$datab);

        //if (!$db)
        //{
        //echo "No se ha podido encontrar la Tabla";
        //}
        //else
        //{
        //echo "<h3>Tabla seleccionada:</h3>" ;
        }

        

        //insertamos datos de registro al mysql xamp, indicando nombre de la tabla y sus atributos
        //$instruccion_SQL = "INSERT INTO ordenes (idordenes, semana, codigo, maquina, fecha, falla, departamento)
                             //VALUES ('$semana','$maquina','$fecha','$modelo','$codigo','$departamento','$falla')";
                           
                            
        //$resultado = mysqli_query($connection,$instruccion_SQL);




        //$consulta = "SELECT * FROM tabla where id ='2'"; si queremos que nos muestre solo un registro en especifivo de ID
        //$consulta = "SELECT * FROM ordenes ";//nombre de la tabla a consultar
        
//$result = mysqli_query($connection,$consulta);
//if(!$result) 
//{
    //echo "No se ha podido realizar la consulta";
//}
//echo "<table>";
//echo "<tr>";
//echo "<th><h5>id</th></h5>";
//echo "<th><h5>Nombre</th></h5>";
//echo "<th><h5>Apellido</th></h5>";
//echo "<th><h5>Edad</th></h5>";
//echo "<th><h5>Sexo</th></h5>";
//echo "<th><h5>Correo</th></h5>";
//echo "<th><h5>Telefono</th></h5>";
//echo "<th><h5>S.Salud</th></h5>";
//echo "<th><h5>Alergia</th></h5>";
//echo "<th><h5>Grupo San</th></h5>";
//echo "<th><h5>Observaciones</th></h5>";
//echo "</tr>";
//while ($colum = mysqli_fetch_array($result))
// {
    //echo "<tr>";    
    //echo "<td><h6>" . $colum['id']. "</td></h6>";
    //echo "<td><h6>" . $colum['nombre']. "</td></h6>";
    //echo "<td><h6>" . $colum['apellido']. "</td></h6>";    
    //echo "<td><h6>" . $colum['edad']. "</td></h6>";
    //echo "<td><h6>" . $colum['sexo']. "</td></h6>";
    //echo "<td><h6>" . $colum['correo']. "</td></h6>";
    //echo "<td><h6>" . $colum['telefono']. "</td></h6>";
    //echo "<td><h6>" . $colum['ssalud'] . "</td></h6>";
    //echo "<td><h6>" . $colum['alergico'] . "</td></h6>";
    //echo "<td><h6>" . $colum['gruposan'] . "</td></h6>";    
    //echo "<td><h6>" . $colum['observaciones'] . "</td></h6>";
    //echo "</tr>";
}
//echo "</table>";

mysqli_close( $connection );

   //echo "Fuera " ;
   echo'<a href="index.html"> Volver Atrás</a>';


?>



<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
   <title>consulta db</title>
    <style>
table {
  font-family: Arial, Helvetica, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

table td, table th {
  border: 1px solid #ddd;
  padding: 8px;
}

table tr:nth-child(even){background-color: #f2f2f2;}

table tr:hover {background-color: #ddd;}

table th {
  padding-top: 12px;
  padding-bottom: 12px;
  text-align: left;
  background-color: #04AA6D;
  color: white;
}
</style>
</head>
<body>

</body>
</html>










