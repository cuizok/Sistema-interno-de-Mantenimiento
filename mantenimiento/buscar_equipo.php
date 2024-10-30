<?php
// Incluye el archivo de conexión a la base de datos
include_once 'conexion.php';

// Si se ha enviado el formulario de búsqueda y se proporcionó un código
if (isset($_GET['codigo']) && !empty($_GET['codigo'])) {
    $codigo = $_GET['codigo'];

    $query = "SELECT nombre_equipo FROM inventario_ti WHERE codigo = ?";
    $statement = $conexion->prepare($query);
    $statement->bind_param("s", $codigo);
    $statement->execute();
    $result = $statement->get_result();

    if ($result->num_rows > 0) {
        $equipo = $result->fetch_assoc()['nombre_equipo'];
        echo $equipo; // Solo imprimir el nombre del equipo
    } else {
        // Envia un mensaje de error en el formato requerido
        echo "Error: Codigo no encontrado, Intenta de nuevo";
    }
} else {
    // Envia un mensaje de error en el formato requerido
    echo "Error: Por favor ingresa un folio válido";
}
?>
