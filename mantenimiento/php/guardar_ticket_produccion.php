<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

error_reporting(0);

require 'PHPMailer-master/src/Exception.php';
require 'PHPMailer-master/src/PHPMailer.php';
require 'PHPMailer-master/src/SMTP.php';
require 'conexion.php';

function enviarCorreo($equipo, $usuario, $idtickets, $problema, $quien_solicita, $fecha, $ingeniero_asignado, $prioridades, $estatus, $observaciones, $descripcion_del_problema) {

    $mail = new PHPMailer(true);

    try {
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';
        $mail->SMTPAuth = true;
        $mail->Username = 'notificacionesoliansa@gmail.com';
        $mail->Password = 'vlgj nost ulxf awlx';
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        $mail->Port = 587;

        // Establecer el remitente y los destinatarios
        $mail->setFrom('notificacionesoliansa@gmail.com');
        $mail->addAddress('soporte@oliansa.com');
        
        // estructura del html para el contenido del correo
        
        $mail->isHTML(true);

        // Establecer el asunto jeje
          $mail->Subject = 'Nuevo ticket generado - ID: ' . $idtickets;


        // Crear el cuerpo del correo electrónico con los datos llenados.
        $body = '<div style="font-family: Arial, sans-serif; background-color: #f5f5f5; padding: 20px; border-radius: 10px;">';
        $body .= '<h2 style="color: blue; text-align: center;">Nuevo ticket generado</h2>';
        $body .= '<p style="color: #555; font-size: 16px; text-align: justify; font-style: italic;">Se ha generado un nuevo ticket con los siguientes detalles:</p>'; 
        $body .= '<ul>';
        $body .= "<li><strong>Folio:</strong> $idtickets</li>"; 
        $body .= "<li><strong>Problema:</strong> $problema</li>";
        $body .= "<li><strong>Quién solicita:</strong> $quien_solicita</li>";
        $body .= "<li><strong>Fecha:</strong> $fecha</li>";
        $body .= "<li><strong>Ingeniero asignado:</strong> $ingeniero_asignado</li>";
        $body .= "<li><strong>Prioridades:</strong> $prioridades</li>";
        $body .= "<li><strong>Equipo:</strong> $equipo</li>";
        $body .= "<li><strong>Estatus:</strong> $estatus</li>";
        $body .= "<li><strong>Observaciones:</strong> $observaciones</li>";
        $body .= "<li><strong>Descripción del problema:</strong> $descripcion_del_problema</li>";
        $body .= '</ul>';
        $body .= '<p style="color: #555; font-size: 16px;">Para validar esta información, Favor de ingresar al modulo Tickets.</p>';
        $body .= '</div>';

        $mail->Body = $body;
        $mail->CharSet = 'UTF-8';

        // Enviar el correo electrónico al destinatario 
        $mail->send();
        echo "Correo electrónico enviado correctamente\n";
    } catch (Exception $e) {
        echo "Error al enviar el correo electrónico: {$mail->ErrorInfo}\n";
    }
}

// Validar que el formulario y el botón de registro para el registro
if(isset($_POST['registro'])) {
    // Obtener los valores enviados por el formulario
    $folio = $_POST['folio'];
    $problema = $_POST['problema'];
    $quien_solicita = $_POST['quien_solicita'];   
    $fecha = $_POST['fecha'];
    $ingeniero_asignado = $_POST['ingeniero_asignado'];
    $prioridades = $_POST['prioridades'];
    $equipo = $_POST['equipo'];
    $estatus = $_POST['estatus'];
    $observaciones = $_POST['observaciones'];
    $descripcion_del_problema = $_POST['descripcion_del_problema'];

    // Insertar los datos en la base de datos
    $sql = "INSERT INTO tickets (folio_equipo, problema, quien_solicita, fecha, ingeniero_asignado, prioridades, equipo, estatus, observaciones, descripcion_del_problema) VALUES ('$folio', '$problema', '$quien_solicita', '$fecha', '$ingeniero_asignado', '$prioridades', '$equipo', '$estatus', '$observaciones', '$descripcion_del_problema')";
    
    $resultado = mysqli_query($conexion, $sql);
    if($resultado) {
        // Obtener el ID del ticket recién insertado
        $idtickets = mysqli_insert_id($conexion);
        
        // Inserción correcta a la base de datos.
        echo "¡Se insertaron los datos correctamente!\n";
        // Enviar el correo electrónico
        enviarCorreo($equipo, $quien_solicita, $idtickets, $problema, $quien_solicita, $fecha, $ingeniero_asignado, $prioridades, $estatus, $observaciones, $descripcion_del_problema);
    } else {
        // En caso de que se haya error con el registro
        echo "¡No se puede insertar la información!\n";
        echo "Error: " . $sql . "\n" . mysqli_error($conexion) . "\n";
    }
}

// Redirigir al usuario a la página de lista de tickets


header("Location: http://192.168.10.116/app/mantenimiento/index.php?vista=tickets_produccion_produccion");
exit();
?>
