<?php
// Verificar si se recibieron los datos del formulario
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Verificar si todos los campos necesarios están presentes
    if (
        isset($_POST['fecha_programacionTI']) &&
        isset($_POST['semanaTI']) &&
        isset($_POST['tipo_mantenimientoTI']) &&
        isset($_POST['comentarios']) &&
        isset($_POST['observacionesTI']) &&
        isset($_POST['observaciones_2TI']) &&
        isset($_POST['realizadoTI']) &&
        isset($_POST['posible_causaTI']) &&
        isset($_POST['solucionTI']) &&
        isset($_POST['observables_programacionTI']) &&
        isset($_POST['id_inventario']) // Asegúrate de que el id_inventario esté presente en el formulario
    ) {
        // Conectar a la base de datos (modifica las credenciales según tu configuración)
        require 'database_connection.php';

        // Obtener los datos del formulario
        $fecha_programacionTI = $_POST['fecha_programacionTI'];
        $semanaTI = $_POST['semanaTI'];
        $tipo_mantenimientoTI = $_POST['tipo_mantenimientoTI'];
        $ventiladores = implode(', ', $_POST['ventiladores']);
        $discosTI = implode(', ', $_POST['discosTI']);
        $procesadoresTI = implode(', ', $_POST['procesadoresTI']);
        $memoria_ramTI = implode(', ', $_POST['memoria_ramTI']);
        $tarjeta_redTI = implode(', ', $_POST['tarjeta_redTI']);
        $comentarios = $_POST['comentarios'];
        $cpuTI = implode(', ', $_POST['cpuTI']);
        $tecladoTI = implode(', ', $_POST['tecladoTI']);
        $mouseTI = implode(', ', $_POST['mouseTI']);
        $monitorTI = implode(', ', $_POST['monitorTI']);
        $equipo_adicionalTI = $_POST['equipo_adicionalTI'];
        $observacionesTI = $_POST['observacionesTI'];
        $eliminacion_sofwareTI = implode(', ', $_POST['eliminacion_sofwareTI']);
        $depuracion_swsoTI = implode(', ', $_POST['depuracion_swsoTI']);
        $actualizacion_antivirusTI = implode(', ', $_POST['actualizacion_antivirusTI']);
        $vacunar_equipoTI = implode(', ', $_POST['vacunar_equipoTI']);
        $observaciones_2TI = $_POST['observaciones_2TI'];
        $realizadoTI = implode(', ', $_POST['realizadoTI']);
        $posible_causaTI = $_POST['posible_causaTI'];
        $solucionTI = $_POST['solucionTI'];
        $observables_programacionTI = $_POST['observables_programacionTI'];
        $id_inventario = $_POST['id_inventario']; // Asegúrate de obtener el id_inventario

        // Preparar la consulta SQL para insertar los datos en la tabla mantenimiento_ti
        $query = "INSERT INTO mantenimiento_ti (fecha_programacionTI, semanaTI, tipo_mantenimientoTI, ventiladoresTI, discosTI, procesadoresTI, memoria_ramTI, tarjeta_redTI, comentariosTI, cpuTI, tecladoTI, mouseTI, monitorTI, equipo_adicionalTI, observacionesTI, eliminacion_sofwareTI, depuracion_swsoTI, actualizacion_antivirusTI, vacunar_equipoTI, observaciones_2TI, realizadoTI, posible_causaTI, solucionTI, observables_programacionTI, idinventarioTI) VALUES ('$fecha_programacionTI', '$semanaTI', '$tipo_mantenimientoTI', '$ventiladores', '$discosTI', '$procesadoresTI', '$memoria_ramTI', '$tarjeta_redTI', '$comentarios', '$cpuTI', '$tecladoTI', '$mouseTI', '$monitorTI', '$equipo_adicionalTI', '$observacionesTI', '$eliminacion_sofwareTI', '$depuracion_swsoTI', '$actualizacion_antivirusTI', '$vacunar_equipoTI', '$observaciones_2TI', '$realizadoTI', '$posible_causaTI', '$solucionTI', '$observables_programacionTI', '$id_inventario')";

        // Ejecutar la consulta y verificar si se insertaron los datos correctamente en la tabla mantenimiento_ti
        if (mysqli_query($con, $query)) {
            // Obtener el ID del último registro insertado
            $last_insert_id = mysqli_insert_id($con);

            // Preparar la consulta SQL para insertar los datos en la tabla historial_mantenimientoTI
            $historial_query = "INSERT INTO historial_mantenimientoTI (idmantenimientoTI) VALUES ('$last_insert_id')";

            // Ejecutar la consulta y verificar si se insertaron los datos correctamente en la tabla historial_mantenimientoTI
            if(mysqli_query($con, $historial_query)) {
                echo "Datos insertados correctamente";
            } else {
                echo "Error al insertar en el historial: " . mysqli_error($con);
            }
        } else {
            echo "Error al insertar los datos: " . mysqli_error($con);
        }

        // Cerrar la conexión a la base de datos
        mysqli_close($con);
    } else {
        echo "No se recibieron todos los campos necesarios";
    }
} else {
    echo "La solicitud no es de tipo POST";
}
?>
