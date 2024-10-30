<?php

if(isset($_POST['id_maquina'])) {
    // Obtener el ID de la máquina desde el formulario
    $idMaquina = $_POST['id_maquina'];

    require 'database_connection.php';

    $query = "SELECT e.fecha_actualizacion, e.comentarios
              FROM pro_mantenimiento e
              INNER JOIN historial_mantenimiento mt ON e.idmantenimiento = mt.idmantenimiento
              WHERE e.idmaquina = '$idMaquina'
              ORDER BY e.fecha_actualizacion DESC";

    $result = mysqli_query($con, $query);

    if(mysqli_num_rows($result) > 0) {
        // Inicializar una variable para almacenar el HTML del historial
        $historialHTML = '';

        while($row = mysqli_fetch_assoc($result)) {
            $fechaActualizacion = $row['fecha_actualizacion'];
            $comentarios = $row['comentarios'];

            $historialHTML .= "<p><strong>Fecha de Actualización:</strong> $fechaActualizacion</p>";
            $historialHTML .= "<p><strong>Comentarios:</strong> $comentarios</p>";
            $historialHTML .= "<hr>";
        }

        echo $historialHTML;
    } else {
        echo '<p>No hay registros de historial de mantenimiento para esta máquina.</p>';
    }

    // Cerrar la conexión a la base de datos
    mysqli_close($con);
} else {
    // Si no se recibió el ID de la máquina, mostrar un mensaje de error
    echo '<p>Se requiere el ID de la máquina para obtener el historial de mantenimiento.</p>';
}
?>
