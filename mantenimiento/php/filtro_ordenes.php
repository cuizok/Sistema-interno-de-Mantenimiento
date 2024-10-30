<?php
require 'database_connection.php';

$status_filter = isset($_GET['estatus']) ? $_GET['estatus'] : '';

if ($status_filter) {
    $display_query = "SELECT codigo, falla, mecanico, fecha, idordenes, semana, usuario, falla, maquina, departamento, estatus, created_at 
    FROM ordenes 
    WHERE estatus = '$status_filter' 
    ORDER BY idordenes DESC";
} else {
    $display_query = "SELECT codigo, falla, mecanico, fecha, idordenes, semana, usuario, falla, maquina, departamento, estatus, created_at 
    FROM ordenes 
    ORDER BY idordenes DESC";
}

$results = mysqli_query($con, $display_query);
$count = mysqli_num_rows($results);

if ($count > 0) {
    while ($data_row = mysqli_fetch_array($results, MYSQLI_ASSOC)) {
        echo "<tr>
                <td>{$data_row['idordenes']}</td>
                <td>{$data_row['semana']}</td>
                <td>{$data_row['codigo']}</td>
                <td>{$data_row['maquina']}</td>
                <td>{$data_row['usuario']}</td>
                <td>{$data_row['created_at']}</td>
                <td>{$data_row['falla']}</td>
                <td>{$data_row['departamento']}</td>
                <td>{$data_row['mecanico']}</td>
                <td>{$data_row['estatus']}</td>
              </tr>";
    }
}
?>
