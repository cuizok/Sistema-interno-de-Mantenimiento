<?php
// Incluir el archivo de conexión a la base de datos
require 'database_connection.php';

// Verificar si se recibió el ID del inventario
if(isset($_POST['id_inventario'])) {
    $idInventario = mysqli_real_escape_string($con, $_POST['id_inventario']);
    
   $query = "SELECT idmantenimientoTI, comentariosTI, Fecha_actualizacionTI FROM mantenimiento_TI WHERE idinventarioTI = '$idInventario'";

    
    $result = mysqli_query($con, $query);

    if(mysqli_num_rows($result) > 0) {
        $output = '<table class="table"><thead><tr><th>ID Historial</th><th>Comentarios</th><th>Fecha actualización</th><th>PDF</th></tr></thead><tbody>';
        while($row = mysqli_fetch_assoc($result)) {
            $output .= '<tr><td>' . $row['idmantenimientoTI'] . '</td><td>' . $row['comentariosTI'] . '</td><td>' . $row['Fecha_actualizacionTI'] . '</td>';
            $output .= '<td><a href="pdf_historialTI.php?idmantenimientoTI=' . $row['idmantenimientoTI'] . '&ACTION=VIEW" class="btn btn-danger"><i class="fa fa-file-pdf-o"></i> </a></td></tr>';
        }
        $output .= '</tbody></table>';
        
        echo $output;
    } else {
        echo '<div class="alert alert-info" role="alert">
        No hay registros de mantenimiento en este equipo
        </div>';
    }
} else {
    echo '<p>Error: No se recibió el ID del inventario.</p>';
}

mysqli_close($con);
?>
