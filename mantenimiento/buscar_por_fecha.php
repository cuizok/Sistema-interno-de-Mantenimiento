<?php
require 'database_connection.php'; 

// Verifica si se envió el formulario
if(isset($_POST['buscar'])) {
    $fecha = $_POST['fecha'];
    // Consulta SQL para filtrar los resultados por fecha
    $display_query = "SELECT NUMERO_EMPLEADO, nombre, rfc, semana, sueldo, impuesto, total, bancos FROM nominas WHERE fecha = '$fecha' ORDER BY id_nomina DESC";
} else {
    // Consulta SQL sin filtro de fecha
    $display_query = "SELECT NUMERO_EMPLEADO, nombre, rfc, semana, sueldo, impuesto, total, bancos FROM nominas ORDER BY id_nomina DESC";
}

$results = mysqli_query($con, $display_query);   
$count = mysqli_num_rows($results);

if($count > 0) {
    while($data_row = mysqli_fetch_array($results, MYSQLI_ASSOC)) {
        // Imprime los resultados
        // Aquí va tu código para mostrar los resultados de la consulta
    }
} else {
    // No se encontraron resultados
    echo "No se encontraron registros para la fecha seleccionada.";
}
?>
