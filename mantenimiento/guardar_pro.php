<?php
require 'database_connection.php';

// Verificar si se recibieron datos mediante POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $idMaquina = mysqli_real_escape_string($con, $_POST['id_maquina']);
    $comentarios = mysqli_real_escape_string($con, $_POST['comentarios']);

    $insert_query = "INSERT INTO pro_mantenimiento (idmaquina, comentarios, fecha_actualizacion) VALUES ('$idMaquina', '$comentarios', NOW())";
    if (mysqli_query($con, $insert_query)) {
        $idMantenimiento = mysqli_insert_id($con);

        $insert_historial_query = "INSERT INTO historial_mantenimiento (idmantenimiento) VALUES ('$idMantenimiento')";
        if (mysqli_query($con, $insert_historial_query)) {
            echo "Los datos se han insertado correctamente en la base de datos.";
        } else {
            echo "Error al insertar datos en la tabla historial_mantenimiento: " . mysqli_error($con);
        }
    } else {
        echo "Error al insertar datos en la tabla pro_mantenimiento: " . mysqli_error($con);
    }
} else {
    echo "No se han recibido datos mediante POST.";
}

// Redirigir al usuario a la página de lista de tickets
header("Location: http://192.168.10.116/app/mantenimiento/index.php?vista=programacion_mantenimiento");
exit();
?>
