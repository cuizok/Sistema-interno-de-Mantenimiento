<?php

include_once 'conexion.php';

// Verificar si se recibió el parámetro 'Idmaquina' en la solicitud GET
if (isset($_GET['Idmaquina'])) {
    $idmaquina = $_GET['Idmaquina'];

    try {
        // Preparar la consulta SQL con el parámetro :idmaquina
        $consulta = "SELECT NOMBRE, MODELO FROM EQUIPOS WHERE Idmaquina = ?";

        $statement = $conexion->prepare($consulta);
        if (!$statement) {
            die('Error al preparar la consulta SQL: ' . $conexion->error);
        }

        $success = $statement->bind_param("s", $idmaquina);
        if (!$success) {
            die('Error al ejecutar la consulta SQL: ' . $conexion->error);
        }

        $success = $statement->execute();
        if (!$success) {
            die('Error al ejecutar la consulta SQL: ' . $conexion->error);
        }

        $resultado = $statement->get_result()->fetch_assoc();

        if ($resultado) {
            echo $resultado['NOMBRE'] . ',' . $resultado['MODELO'];
        } else {
            echo 'No se encontró ningún equipo.';
        }
    } catch (Exception $e) {
        echo 'Error al ejecutar la consulta SQL: ' . $e->getMessage();
    }
} else {
    echo 'No se proporcionó ningún código.';
}
?>
