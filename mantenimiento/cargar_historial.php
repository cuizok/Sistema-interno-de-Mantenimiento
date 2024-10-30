<?php
require 'database_connection.php';

$idMaquina = $_POST['id_maquina'] ?? '';

$query = "SELECT idmantenimiento, fecha_programacion, comentarios, idmaquina, Fecha_actualizacion FROM pro_mantenimiento WHERE idmaquina = ?";
$stmt = $con->prepare($query);
$stmt->bind_param("i", $idMaquina);
$stmt->execute();
$result = $stmt->get_result();

$html = '<table class="table table-bordered table-striped">';
$html .= '<thead class="thead-light"><tr><th>ID Mantenimiento</th><th>Fecha actualizacion</th><th>Comentarios</th><th>PDF</th></tr></thead>';
$html .= '<tbody>';

while ($row = $result->fetch_assoc()) {
    $html .= '<tr>';
    $html .= '<td>' . $row['idmantenimiento'] . '</td>';
    $html .= '<td>' . $row['Fecha_actualizacion'] . '</td>';    
    $html .= '<td>' . $row['comentarios'] . '</td>';
   $html .= '<td><a href="pdf_historial.php?idmantenimiento=' . $row['idmantenimiento'] . '&ACTION=VIEW" class="btn btn-danger"><i class="fa fa-file-pdf-o"></i> </a></td>';

    $html .= '</tr>';
}

$html .= '</tbody></table>';

$stmt->close();
$con->close();

// Verificar si hay datos para mostrar o no
if (mysqli_num_rows($result) > 0) {
    // Si hay datos, devolver el HTML generado
    echo $html;
} else {
    // Si no hay datos, mostrar un mensaje con la clase "alert"
    echo '<div class="alert alert-info" role="alert">
            No hay registros de mantenimiento en este equipo
          </div>';
}
?>
