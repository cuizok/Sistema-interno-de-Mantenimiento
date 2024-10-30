<?php
// Establecer encabezados para indicar que se va a descargar un archivo Excel
header('Content-Type: application/vnd.ms-excel');
header('Content-Disposition: attachment; filename="informacion.xls"');

// Incluir la conexión a la base de datos
require 'database_connection.php';

// Consulta SQL para obtener los datos de la tabla
$query = "
                     SELECT 
                    r.id_recibos,
                    r.UUID,
                    r.Fecha_emision,
                    r.RFC_RECEPTOR,
                    r.RAZON_SOCIAL_RECEPTOR,
                    r.FECHA_INICIAL,
                    r.FECHA_FINAL,
                    r.TOTAL_PERCEPCIONES,
                    r.NUMERO_EMPLEADO,
                    r.NETO,
                    WEEK(r.FECHA_INICIAL) AS semana_inicio,
                    n.TOTAL - CAST(REPLACE(r.NETO, ',', '') AS DECIMAL(10, 2)) AS diferencia
                    FROM 
                        recibos_sat r
                    LEFT JOIN 
                        nominas n ON r.NUMERO_EMPLEADO = n.numero_empleado

                    ORDER BY 
                    id_recibos asc";
$result = mysqli_query($con, $query);

// Crear una tabla HTML en el archivo Excel
echo "<table border='1'>";
echo "<tr><th>Id</th><th>UUID</th><th>Fecha Emision</th><th>RFC RECEPTOR</th><th>Razon social Receptor</th><th>FECHA INICIAL</th><th>FECHA FIN</th><th>TOTAL PERCEPCIONES</th><th>NUMERO EMPLEADO</th><th>NETO</th><th>Numero de semana</th><th>DIFERENCIA</th></tr>";

// Iterar sobre los resultados y agregar cada fila al archivo Excel
while ($row = mysqli_fetch_assoc($result)) {
    echo "<tr>";
    echo "<td>".$row['id_recibos']."</td>";
    echo "<td>".$row['UUID']."</td>";
    echo "<td>".$row['Fecha_emision']."</td>";
    echo "<td>".$row['RFC_RECEPTOR']."</td>";
    echo "<td>".$row['RAZON_SOCIAL_RECEPTOR']."</td>";
    echo "<td>".$row['FECHA_INICIAL']."</td>";
    echo "<td>".$row['FECHA_FINAL']."</td>";
    echo "<td>".$row['TOTAL_PERCEPCIONES']."</td>";
    echo "<td>".$row['NUMERO_EMPLEADO']."</td>";
    echo "<td>".$row['NETO']."</td>";
    echo "<td>".$row['semana_inicio']."</td>";
    echo "<td>".$row['diferencia']."</td>";

    echo "</tr>";
}
echo "</table>";

// Liberar resultado
mysqli_free_result($result);

// Cerrar conexión
mysqli_close($con);
?>
