<?php
// Incluir el archivo de configuración de la base de datos
    require './configuracion_bd.php';

try {
    // Se reciben los datos del formulario
    $fecha = $_POST['fecha'];
    $fecha_regreso = $_POST['fecha_regreso'];
    $entregado = $_POST['entregado'];
    $concepto = $_POST['concepto'];
    $generado = $_POST['generado'];
    $comentarios = $_POST['comentarios'];
    // se hace la insercion de los datos a la tabla indicada
    $sql = "INSERT INTO k_oli.kdm1 (c9, c18, c24, c32, c48, c85) VALUES (:c9, :c18, :c24, :c32, :c48, :c85)";
    
    $statement = $conexion->prepare($sql);
    // se preparan los parametros que recibira cada columna
    $statement->bindParam(':c9', $fecha); 
    $statement->bindParam(':c18', $fecha_ regreso);
    $statement->bindParam(':c24', $comentarios);
    $statement->bindParam(':c32', $entregado); 
    $statement->bindParam(':c48', $generado); 
    $statement->bindParam(':c85', $concepto); 
    // se prepara la ejecucion del query.
    if($statement->execute()) {
        echo "Datos insertados correctamente.";
    } else {
        echo "Error al ejecutar la inserción: " . $statement->errorInfo()[2];
    }
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}

// Cerrar la conexión PDO
unset($conexion);
?>
