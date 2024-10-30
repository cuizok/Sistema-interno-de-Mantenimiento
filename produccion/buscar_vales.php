<?php
require 'configuracion_bd.php';

try {
    // Establecer la conexión con la base de datos
    $conexion = new PDO("pgsql:host=$host;port=$puerto;dbname=$nombre_bd;user=$usuario;password=$contraseña");
    $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    $query = "SELECT *
    FROM k_oli.kdm1 WHERE c6 BETWEEN '0006685' AND '000900' ORDER BY c9 DESC";
    
    $statement = $conexion->prepare($query);
    $statement->execute();
    
    $resultados = $statement->fetchAll(PDO::FETCH_ASSOC);
    
} catch (PDOException $e) {
    echo "Error al conectar a la base de datos: " . $e->getMessage();
}
?>


