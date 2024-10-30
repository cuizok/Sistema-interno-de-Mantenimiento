<?php
include_once 'conexion.php'; 
try {

    $consulta = $conexion->query("SELECT usuario_nombre, usuario_apellido FROM usuario");

    if ($consulta) {
    } else {
        return array(); 
    }

    $usuarios = mysqli_fetch_all($consulta, MYSQLI_ASSOC);

    if (count($usuarios) > 0) {
        foreach ($usuarios as $usuario) {
        }
    } else {
    }

    // Cerrar la conexión
    $conexion->close();
} catch (PDOException $e) {
}
?>
