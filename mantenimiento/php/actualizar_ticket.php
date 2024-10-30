<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer-master/src/Exception.php';
require 'PHPMailer-master/src/PHPMailer.php';
require 'PHPMailer-master/src/SMTP.php';
require 'conexion.php';
require_once "main.php";

function enviarCorreo($idtickets, $prioridades, $estatus, $ingeniero_asignado, $observaciones, $email_destinatario) {
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
        $mail->setFrom('notifiacionesoliansa@gmail.com'); 
        $mail->addAddress($email_destinatario); // Usar el email del destinatario proporcionado

        // Configurar el contenido HTML del correo
        $mail->isHTML(true);
        $mail->CharSet = 'UTF-8';
        $mail->Subject = 'Ticket de soporte Actualizado - Folio: ' . $idtickets;

        $body = '
            <div style="font-family: Arial, sans-serif; background-color: #f5f5f5; padding: 20px; border-radius: 10px;">
                <h2 style="color: blue; text-align: center;">Su ticket con el folio #' . $idtickets . ' ha sido atendida.</h2>
                <p style="color: #555; font-size: 16px;">Prioridades: ' . $prioridades . '</p>
                <p style="color: #555; font-size: 16px;">Estatus: ' . $estatus . '</p>
                <p style="color: #555; font-size: 16px;">Ingeniero asignado: ' . $ingeniero_asignado . '</p>
                <p style="color: #555; font-size: 16px;">Observaciones: ' . $observaciones . '</p>
            </div>
        ';

        $mail->Body = $body;

        // Enviar el correo electrónico
        $mail->send();
        return true;
    } catch (Exception $e) {
        return false;
    }
}

// Almacenar ID y otros datos del formulario
$idtickets = limpiar_cadena($_POST['idtickets']);
$prioridades = limpiar_cadena($_POST['prioridades']);
$estatus = limpiar_cadena($_POST['estatus']);
$ingeniero_asignado = limpiar_cadena($_POST['ingeniero_asignado']);
$observaciones = limpiar_cadena($_POST['observaciones']);
$quien_solicita = limpiar_cadena($_POST['quien_solicita']);

switch ($quien_solicita) {
    case 'Cuitlahuac Ramirez':
        $email_destinatario = 'cuitlahuac0920@gmail.com';
        break;
    case 'DIEGO MORALES':
        $email_destinatario = 'diegom@oliansa.com';
        break;
    case 'Leonardo Duran':
        $email_destinatario = 'soporte@oliansa.com';
        break;
    case 'test test':
        $email_destinatario = 'test@gmail.com';
        break;
    case 'raciel raciel': 
        $email_destinatario = 'soporte@oliansa.com';
        break;
    case 'ISMAEL ROCHA':
        $email_destinatario = 'ismael.rocha@oliansa.com';
        break;
    case 'VICTOR VAZQUEZ':
        $email_destinatario = 'victor.ambriz@oliansa.com';
        break;
    case 'CRUZ MIGUEL PEREZ BECERRA':
        $email_destinatario = 'cruz.becerra@oliansa.com';
        break;
    case 'LUIS JASSO': 
        $email_destinatario = 'luis.jasso@oliansa.com';
        break;
    case 'ROCIO GOVEA':
        $email_destinatario = 'rocio.govea@oliansa.com';
        break;
    case 'joel rodriguez':
        $email_destinatario = 'joel.rodriguez@oliansa.com';
        break;
    case 'Abigail Rocha':
        $email_destinatario = 'abigailr@oliansa.com';
        break;
    case 'Alejandra Flores':
        $email_destinatario = 'alejandraf@oliansa.com';
        break;
    case 'America Cervantes':
        $email_destinatario = 'america.cervantes@oliansa.com';
        break;
    case 'Ana Prado':
        $email_destinatario = 'anap@oliansa.com';
        break;
    case 'Diana Segoviano':
        $email_destinatario = 'dianasegoviano@oliansa.com';
        break;
    case 'Francisco Calvillo':
        $email_destinatario = 'auditoriacalidad@oliansa.com';
        break;
    case 'Guadalupe Alonso':
        $email_destinatario = 'guadalupealonso@oliansa.com';
        break;
    case 'Jose Rocha':
        $email_destinatario = 'joserocha@oliansa.com';
        break;
    case 'Norma Ramirez':
        $email_destinatario = 'normar@oliansa.com';
        break;
    case 'Octavio Palacios':
        $email_destinatario = 'octaviop@oliansa.com';
        break;
    case 'Oliver Rocha':
        $email_destinatario = 'oliverrocha@gmail.com';
        break;
    case 'Pablo silva':
        $email_destinatario = 'pablos@oliansa.com';
        break;
    case 'Paola Villanuva':
        $email_destinatario = 'paolav@oliansa.com';
        break;
    case 'Pilar Sanchez':
        $email_destinatario = 'gerenciacalidad@oliansa.com';
        break;
    case 'Raymundo Verdin':
        $email_destinatario = 'raymundov@oliansa.com';
        break;
    case 'Rogelio Rodriguez':
        $email_destinatario = 'rogelior@oliansa.com';
        break;
    case 'Rosa Elena':
        $email_destinatario = 'rosa.cano@oliansa.com';
        break;
    default:
        $email_destinatario = 'default@example.com'; // En caso de no detectar correo, enviar a este correo predeteminado 
}

// Validar el correo del destinatario
if (filter_var($email_destinatario, FILTER_VALIDATE_EMAIL)) {
    // El correo del destinatario es válido, procede con el envío del correo electrónico
    $actualizar_categoria = conexion();
    $actualizar_categoria = $actualizar_categoria->prepare("UPDATE tickets SET prioridades=:prioridades, estatus=:estatus, ingeniero_asignado=:ingeniero_asignado, observaciones=:observaciones WHERE idtickets=:idtickets");

    $marcadores = [
        ":prioridades" => $prioridades,
        ":estatus" => $estatus,
        ":ingeniero_asignado" => $ingeniero_asignado,
        ":observaciones" => $observaciones,
        ":idtickets" => $idtickets 
    ];

    if ($actualizar_categoria->execute($marcadores)) {
        // Notificar al usuario por correo electrónico
        enviarCorreo($idtickets, $prioridades, $estatus, $ingeniero_asignado, $observaciones, $email_destinatario);


        echo '
            <div class="notification is-info is-light">
                <strong>¡ORDEN ACTUALIZADA!</strong><br>
                La orden se actualizó con éxito. Se ha enviado una notificación por correo electrónico al usuario.
            </div>
        ';

        // Notificación en el navegador
    

    } else {
        echo '
            <div class="notification is-danger is-light">
                <strong>¡Ocurrió un error inesperado!</strong><br>
                No se pudo actualizar la orden, por favor intente nuevamente.
            </div>
        ';
    }

    $actualizar_categoria = null;
} else {
    // El correo del destinatario no es válido, mostrar un mensaje de error
    echo '
        <div class="notification is-danger is-light">
            <strong>¡Ocurrió un error!</strong><br>
            No se pudo encontrar el correo del usuario que solicita. Por favor, verifique el correo electrónico del usuario.
        </div>
    ';
}
?>
