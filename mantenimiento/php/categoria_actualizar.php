<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer-master/src/Exception.php';
require 'PHPMailer-master/src/PHPMailer.php';
require 'PHPMailer-master/src/SMTP.php';
require 'conexion.php';
require_once "main.php";

function enviarCorreo($id, $nombre, $estatus, $refacciones, $observaciones, $correo_destinatario, $archivo_adjunto_nombre = null, $archivo_adjunto_ruta = null) {
    $mail = new PHPMailer(true);

    try {
        // Configurar SMTP
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';
        $mail->SMTPAuth = true;
        $mail->Username = 'notificacionesoliansa@gmail.com'; 
        $mail->Password = 'vlgj nost ulxf awlx'; 
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        $mail->Port = 587;

        // Establecer remitente y destinatario
        $mail->setFrom('notificacionesoliansa@gmail.com'); 
        $mail->addAddress($correo_destinatario);

        // Configurar el contenido HTML del correo
        $mail->isHTML(true);
        $mail->CharSet = 'UTF-8';
        $mail->Subject = 'Actualización de Orden - ID: ' . $id;

        $body = '
            <div style="font-family: Arial, sans-serif; background-color: #f5f5f5; padding: 20px; border-radius: 10px;">
                <h2 style="color: blue; text-align: center;">Su orden con el ID #' . $id . ' ha sido actualizada.</h2>
                <p style="color: #555; font-size: 16px;">Nombre del mecánico: ' . $nombre . '</p>
                <p style="color: #555; font-size: 16px;">Estatus: ' . $estatus . '</p>
                <p style="color: #555; font-size: 16px;">Refacciones: ' . $refacciones . '</p>
                <p style="color: #555; font-size: 16px;">Observaciones: ' . $observaciones . '</p>
            </div>
        ';

        $mail->Body = $body;

        // Adjuntar archivo si se proporciona
        if (!empty($archivo_adjunto_nombre) && !empty($archivo_adjunto_ruta)) {
            $mail->addAttachment($archivo_adjunto_ruta, $archivo_adjunto_nombre);
        }

        // Enviar el correo electrónico
        $mail->send();
        return true;
    } catch (Exception $e) {
        return false;
    }
}

// Almacenar ID y otros datos del formulario
$id = limpiar_cadena($_POST['idordenes']);
$nombre = limpiar_cadena($_POST['mecanico']);
$ubicacion = limpiar_cadena($_POST['estatus']);
$refacciones = limpiar_cadena($_POST['refacciones']);
$observaciones = limpiar_cadena($_POST['observaciones']);
$estatus = limpiar_cadena($_POST['estatus']);
$firma = $_POST['firma']; // Firma en base64

// Verificar campos obligatorios
if ($nombre == "") {
    echo '
        <div class="notification is-danger is-light">
            <strong>¡Ocurrió un error inesperado!</strong><br>
            No has llenado todos los campos que son obligatorios
        </div>';
    exit();
}

// Verificar integridad de los datos
if (verificar_datos("[a-zA-Z0-9áéíóúÁÉÍÓÚñÑ ]{4,50}", $nombre)) {
    echo '
        <div class="notification is-danger is-light">
            <strong>¡Ocurrió un error inesperado!</strong><br>
            El NOMBRE no coincide con el formato solicitado
        </div>';
    exit();
}

if ($ubicacion != "" && verificar_datos("[a-zA-Z0-9áéíóúÁÉÍÓÚñÑ ]{5,150}", $ubicacion)) {
    echo '
        <div class="notification is-danger is-light">
            <strong>¡Ocurrió un error inesperado!</strong><br>
            La UBICACION no coincide con el formato solicitado
        </div>';
    exit();
}

// Verificar nombre y formato de refacciones y observaciones (si es necesario)
if ($refacciones != "" && verificar_datos("[a-zA-Z0-9áéíóúÁÉÍÓÚñÑ ]{5,150}", $refacciones)) {
    echo '
        <div class="notification is-danger is-light">
            <strong>¡Ocurrió un error inesperado!</strong><br>
            El formato de REFACCIONES no es válido
        </div>';
    exit();
}

if ($observaciones != "" && verificar_datos("[a-zA-Z0-9áéíóúÁÉÍÓÚñÑ ]{5,150}", $observaciones)) {
    echo '
        <div class="notification is-danger is-light">
            <strong> ¡Ocurrió un error inesperado!</strong><br>
            El formato de OBSERVACIONES no es válido
        </div>';
    exit();
}

// Verificar si la orden existe en el sistema
$check_orden = conexion()->query("SELECT * FROM ordenes WHERE idordenes='$id'");
if ($check_orden->rowCount() <= 0) {
    echo '
        <div class="notification is-danger is-light">
            <strong>¡Ocurrió un error inesperado!</strong><br>
            La orden no existe en el sistema
        </div>';
    exit();
} else {
    $datos = $check_orden->fetch();
}

/// Actualizar datos de la orden en la base de datos
$actualizar_orden = conexion()->prepare("UPDATE ordenes SET mecanico=:nombre, estatus=:ubicacion, refaccion=:refacciones, observaciones=:observaciones WHERE idordenes=:id");
$marcadores = [
    ":nombre" => $nombre,
    ":ubicacion" => $ubicacion,
    ":refacciones" => $refacciones,
    ":observaciones" => $observaciones,
    ":id" => $id
];
// Obtener datos anteriores de las refacciones
$consulta_refacciones_anteriores = conexion()->prepare("SELECT refaccion FROM ordenes WHERE idordenes=:id");
$consulta_refacciones_anteriores->bindParam(':id', $id, PDO::PARAM_INT);
$consulta_refacciones_anteriores->execute();
$refacciones_anteriores = $consulta_refacciones_anteriores->fetchColumn();

// Actualizar datos de la orden en la base de datos
$actualizar_orden = conexion()->prepare("UPDATE ordenes SET mecanico=:nombre, estatus=:ubicacion, refaccion=:refacciones, observaciones=:observaciones WHERE idordenes=:id");
$marcadores = [
    ":nombre" => $nombre,
    ":ubicacion" => $ubicacion,
    ":refacciones" => $refacciones,
    ":observaciones" => $observaciones,
    ":id" => $id
];

// Insertar en historial_ordenes
if ($actualizar_orden->execute($marcadores)) {
    $insertar_historial = conexion()->prepare("INSERT INTO historial_ordenes (idorden, observaciones, refacciones_historial, firma) VALUES (:idorden, :observaciones, :refacciones_historial, :firma)");
    $marcadores_historial = [
        ":idorden" => $id,
        ":observaciones" => $observaciones,
        ":refacciones_historial" => $refacciones_anteriores,
        ":firma" => $firma                                                // Utiliza los datos anteriores de las refacciones
    ];

    // ejecutamos el query 
    $insertar_historial->execute($marcadores_historial);

    // Adjuntar archivo si se proporciona
    $archivo_adjunto_nombre = $_FILES['archivo']['name'];
    $archivo_adjunto_ruta = $_FILES['archivo']['tmp_name'];

    // Notificar al usuario por correo electrónico
    $correo_destinatario = '';

    // Asignar el correo del destinatario basado en el usuario que solicita la orden
    switch ($datos['usuario']) {
        case 'Pilar Sanchez':
            $correo_destinatario = 'gerenciacalidad@oliansa.com';
            break;
        case 'VICTOR VAZQUEZ':
            $correo_destinatario = 'victor.ambriz@oliansa.com';
            break;
        case 'CUITLAHUAC RAMIREZ VELAZQUEZ':
            $correo_destinatario = 'soporte@oliansa.com';
            break;
        case 'DIEGO MORALES':
            $correo_destinatario = 'cuitlahuac0920@gmail.com';
            break;
        case 'Leonardo Duran':
            $correo_destinatario = 'leonardod@oliansa.com';
            break;
        case 'ISMAEL ROCHA':
            $correo_destinatario = 'ismael.rocha@oliansa.com';
            break;
        case 'CRUZ MIGUEL PEREZ BECERRA':
            $correo_destinatario = 'cruz.becerra@oliansa.com';
            break;
        case 'LUIS JASSO':
            $correo_destinatario = 'luis.jasso@oliansa.com';
            break;
        case 'joel rodriguez':
            $correo_destinatario = 'joel.rodriguez@oliansa.com';
            break;
        case 'ROCIO GOVEA':
            $correo_destinatario = 'rocio.govea@oliansa.com';
            break;
        case 'Abigail Rocha':
            $correo_destinatario = 'abigailr@oliansa.com';
            break;
        case 'Alejandra Flores':
            $correo_destinatario = 'alejandraf@oliansa.com';
            break;
        case 'America Cervantes':
           
            $correo_destinatario = 'america.cervantes@oliansa.com';
            break;
        case 'Ana Prado':
            $correo_destinatario = 'anap@oliansa.com';
            break;
        case 'Diana Segoviano':
            $correo_destinatario = 'dianasegoviano@oliansa.com';
            break;
        case 'Francisco Calvillo':
            $correo_destinatario = 'auditoriacalidad@oliansa.com';
            break;
        case 'Guadalupe Alonso':
            $correo_destinatario = 'guadalupealonso@oliansa.com';
            break;
        case 'Jose Rocha':
            $correo_destinatario = 'joserocha@oliansa.com';
            break;
        case 'Norma Ramirez':
            $correo_destinatario = 'normar@oliansa.com';
            break;
        case 'Octavio Palacios':
            $correo_destinatario = 'octaviop@oliansa.com';
            break;
        case 'Oliver Rocha':
            $correo_destinatario = 'oliverrocha@gmail.com';
            break;
        case 'Pablo silva':
            $correo_destinatario = 'pablos@oliansa.com';
            break;
        case 'Paola Villanuva':
            $correo_destinatario = 'paolav@oliansa.com';
            break;
        case 'Raymundo Verdin':
            $correo_destinatario = 'raymundov@oliansa.com';
            break;
        case 'Rogelio Rodriguez':
            $correo_destinatario = 'rogelior@oliansa.com';
            break;
        case 'Rosa Elena':
            $correo_destinatario = 'rosa.cano@oliansa.com';
            break;
        // Agregar más casos si es necesario
        default:
            $correo_destinatario = 'default@example.com'; // Correo predeterminado en caso de no coincidencia
    }

    // Enviar correo electrónico al usuario
    enviarCorreo($id, $nombre, $estatus, $refacciones, $observaciones, $correo_destinatario, $archivo_adjunto_nombre, $archivo_adjunto_ruta);

    echo '
        <div class="notification is-info is-light">
            <strong>¡ORDEN ACTUALIZADA!</strong><br>
            La orden se actualizó con éxito. Se ha enviado una notificación por correo electrónico al usuario.
        </div>';
} else {
    echo '
        <div class="notification is-danger is-light">
            <strong>¡Ocurrió un error inesperado!</strong><br>
            No se pudo actualizar la orden, por favor intente nuevamente.
        </div>';
}

$actualizar_orden = null;
?>

 