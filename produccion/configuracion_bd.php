<?php
// Parámetros de credenciales para la conexion a la base de datos
$host = "127.0.0.1";
$puerto = "5432";
$nombre_bd = "oliansa_pruebas"; 
$usuario = "postgres"; 
$contraseña = "kepler123"; 


    $conexion = new PDO("pgsql:host=$host;port=$puerto;dbname=$nombre_bd;user=$usuario;password=$contraseña");
    
   
   
?>
