<?php
require_once "conexion.php";

if (isset($_POST['idmaquina'])) {
    $idmaquina = filter_var($_POST['idmaquina'], FILTER_SANITIZE_NUMBER_INT);
    $nombre = filter_var($_POST['nombre'], FILTER_SANITIZE_STRING);
    $q = filter_var($_POST['q'], FILTER_SANITIZE_STRING);
    $modelo = filter_var($_POST['modelo'], FILTER_SANITIZE_STRING);
    $nserie = filter_var($_POST['nserie'], FILTER_SANITIZE_STRING);
    $tipo = filter_var($_POST['tipo'], FILTER_SANITIZE_STRING);
    $estatusE = filter_var($_POST['estatusE'], FILTER_SANITIZE_STRING);
    $m = filter_var($_POST['m'], FILTER_SANITIZE_STRING);
    $departamentoE = filter_var($_POST['departamentoE'], FILTER_SANITIZE_STRING);

    $query = "UPDATE equipos SET nombre=?, q=?, modelo=?, nserie=?, tipo=?, estatusE=?, m=?, departamentoE=? WHERE idmaquina=?";
    $stmt = mysqli_prepare($conexion, $query);

    if ($stmt) {
        mysqli_stmt_bind_param($stmt, "ssssssssi", $nombre, $q, $modelo, $nserie, $tipo, $estatusE, $m, $departamentoE, $idmaquina);

        // Ejecutamos la consulta
        if (mysqli_stmt_execute($stmt)) {
            echo ' <div class="notification is-info is-light">
            <strong>¡EQUIPO ACTUALIZADO!</strong><br>
            El equipo se actualizo con éxito. Verifica que los datos estén correctos en el listado.
                    </div>';

        } else {
            echo "Error al actualizar el equipo.";
        }

        mysqli_stmt_close($stmt);
    } else {
        echo "Error al preparar la consulta: " . mysqli_error($conexion);
    }
} else {
    // Si no se envió correctamente el idmaquina
    echo "Error: No se recibió el ID del equipo.";
}

// Cerramos la conexión
mysqli_close($conexion);
?>
