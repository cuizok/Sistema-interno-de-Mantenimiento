<?php
// guardarEquipo.php

        require 'database_connection.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $idmaquina = $_POST['idmaquina'];
    $nombre = $_POST['nombre'];
    $q = $_POST['q'];
    $modelo = $_POST['modelo'];
    $nserie = $_POST['nserie'];
    $tipo = $_POST['tipo'];
    $estatusE = $_POST['estatusE'];
    $m = $_POST['m'];
    $departamentoE = $_POST['departamentoE'];


    $sql = "INSERT INTO equipos (idmaquina, nombre, q, modelo, nserie, tipo, estatusE, m, departamentoE) 
            VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";

    if ($stmt = $con->prepare($sql)) {
        $stmt->bind_param("sssssssss", $idmaquina, $nombre, $q, $modelo, $nserie, $tipo, $estatusE, $m, $departamentoE);

        if ($stmt->execute()) {
            echo "Nuevo equipo registrado exitosamente.";
        } else {
            echo "Error: " . $stmt->error;
        }

        $stmt->close();
    } else {
        echo "Error: " . $conn->error;
    }

    $con->close();
}

 header("Location: http://192.168.10.116/app/mantenimiento/index.php?vista=category_list");
 exit();
?>
