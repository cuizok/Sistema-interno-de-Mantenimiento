<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

// Incluir las clases de PHPMailer
require 'PHPMailer-master/src/Exception.php';
require 'PHPMailer-master/src/PHPMailer.php';
require 'PHPMailer-master/src/SMTP.php';
require 'conexion.php'; // Asegúrate de tener el archivo de conexión a la base de datos

// Función para enviar el correo electrónico
function enviarCorreo($equipo, $quien_solicita, $idTicket, $problema, $fecha, $estatus, $descripcion_del_problema) {
    // Crea una nueva instancia de PHPMailer
    $mail = new PHPMailer(true);

    try {
        // Configura el servidor SMTP
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com'; // Reemplaza con la dirección del servidor SMTP
        $mail->SMTPAuth = true;
        $mail->Username = 'notificacionesoliansa@gmail.com'; // Reemplaza con tu nombre de usuario SMTP
        $mail->Password = 'vlgj nost ulxf awlx'; // Reemplaza con tu contraseña SMTP
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS; // Puedes usar PHPMailer::ENCRYPTION_SMTPS para SSL
        $mail->Port = 587; // Puertos: 587 para TLS, 465 para SSL

        // Establece el remitente
        $mail->setFrom('notificacionesoliansa@gmail.com');

        // Determinar el destinatario según quien solicita la orden
        switch ($quien_solicita) {
           case 'Cuitlahuac Ramirez':
       $correoDestino = 'cuitlahuac0920@gmail.com';
        break;
    case 'DIEGO MORALESSSSSS':
        $correoDestino = 'diegom@oliansa.com';
        break;
    case 'Leonardo Duran':
        $correoDestino = 'soporte@oliansa.com';
        break;
    case 'test test':
        $correoDestino = 'test@gmail.com';
        break;
    case 'raciel raciel': 
        $correoDestino = 'soporte@oliansa.com';
        break;
    case 'ISMAEL ROCHA':
        $correoDestino = 'ismael.rocha@oliansa.com';
        break;
    case 'VICTOR VAZQUEZ':
       $correoDestino = 'victor.ambriz@oliansa.com';
        break;
    case 'CRUZ MIGUEL PEREZ BECERRA':
       $correoDestino = 'cruz.becerra@oliansa.com';
        break;
    case 'LUIS JASSO': 
       $correoDestino = 'luis.jasso@oliansa.com';
        break;
    case 'ROCIO GOVEA':
        $correoDestino = 'rocio.govea@oliansa.com';
        break;
    case 'joel rodriguez':
        $correoDestino = 'joel.rodriguez@oliansa.com';
        break;
    case 'Abigail Rocha':
        $correoDestino = 'abigailr@oliansa.com';
        break;
    case 'Alejandra Flores':
        $correoDestino = 'alejandraf@oliansa.com';
        break;
    case 'America Cervantes':
       $correoDestino = 'america.cervantes@oliansa.com';
        break;
    case 'Ana Prado':
        $correoDestino = 'anap@oliansa.com';
        break;
    case 'Diana Segoviano':
       $correoDestino = 'dianasegoviano@oliansa.com';
        break;
    case 'Francisco Calvillo':
        $correoDestino = 'auditoriacalidad@oliansa.com';
        break;
    case 'Guadalupe Alonso':
        $correoDestino = 'guadalupealonso@oliansa.com';
        break;
    case 'Jose Rocha':
        $correoDestinoo = 'joserocha@oliansa.com';
        break;
    case 'Norma Ramirez':
        $correoDestino = 'normar@oliansa.com';
        break;
    case 'Octavio Palacios':
        $correoDestino = 'octaviop@oliansa.com';
        break;
    case 'Oliver Rocha':
        $correoDestino = 'oliverrocha@gmail.com';
        break;
    case 'Pablo silva':
        $correoDestino = 'pablos@oliansa.com';
        break;
    case 'Paola Villanuva':
        $correoDestino = 'paolav@oliansa.com';
        break;
    case 'Pilar Sanchez':
        $correoDestino = 'gerenciacalidad@oliansa.com';
        break;
    case 'Raymundo Verdin':
        $correoDestino = 'raymundov@oliansa.com';
        break;
    case 'Rogelio Rodriguez':
        $correoDestino = 'rogelior@oliansa.com';
        break;
    case 'Rosa Elena':
        $correoDestino = 'rosa.cano@oliansa.com';
        break;
        case 'Ximena Hernandez':
            $correoDestino = 'xramites@gmail.com';
            break;
    default:
        $correoDestino = 'default@example.com'; // En caso de no detectar correo, enviar a este correo predeteminado 
}

        // Agregar el destinatario
        $mail->addAddress($correoDestino);

        // Establecer el formato HTML
        $mail->isHTML(true);

        // Establecer el asunto
        $mail->Subject = 'Nuevo Ticket de Mantenimiento - Ticket #' . $idTicket;

        // Crear el cuerpo del correo electrónico con los datos del ticket
        $body = '<div style="font-family: Arial, sans-serif; background-color: #f5f5f5; padding: 20px; border-radius: 10px;">';
        $body .= '<h2 style="color: blue; text-align: center;">Nuevo ticket generado</h2>';
        $body .= '<p style="color: #555; font-size: 16px; text-align: justify; font-style: italic;">Se ha generado un nuevo ticket de mantenimiento con los siguientes detalles:</p>'; 
        $body .= '<ul>';
        $body .= "<li><strong>Equipo:</strong> $equipo</li>";
        $body .= "<li><strong>Quién solicita:</strong> $quien_solicita</li>";
        $body .= "<li><strong>Problema:</strong> $problema</li>";
        $body .= "<li><strong>Fecha:</strong> $fecha</li>";
        $body .= "<li><strong>Estatus:</strong> $estatus</li>";
        $body .= "<li><strong>Descripción del problema:</strong> $descripcion_del_problema</li>";
        $body .= '</ul>';
        $body .= '<p style="color: #555; font-size: 16px;">Para validar esta información, favor de ingresar al módulo Tickets.</p>';
        $body .= '</div>';

        // Establecer el cuerpo del correo
        $mail->Body = $body;

        // Establecer la codificación de caracteres
        $mail->CharSet = 'UTF-8';

        // Envía el correo electrónico
        $mail->send();
        echo "Correo electrónico enviado a: $correoDestino\n Redirigiendo....";
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
    $equipo = $_POST['equipo'];
    $estatus = $_POST['estatus'];
    $descripcion_del_problema = $_POST['descripcion_del_problema'];

    // Insertar los datos en la base de datos
    $sql = "INSERT INTO tickets (folio_equipo, problema, quien_solicita, fecha, equipo, estatus, descripcion_del_problema) VALUES ('$folio', '$problema', '$quien_solicita', '$fecha', '$equipo', '$estatus', '$descripcion_del_problema')";
    
    $resultado = mysqli_query($conexion, $sql);
    if($resultado) {
        // Obtener el ID del ticket recién insertado
        $idtickets = mysqli_insert_id($conexion);
        
        // Inserción correcta a la base de datos.
        echo "¡Se insertaron los datos correctamente!\n";

        echo "<script>
        Notification.requestPermission().then(function(permission) {
            if (permission === 'granted') {
                // Crear una nueva notificación
                var notification = new Notification('¡Notificación de nuevo ticket!', {
                    body: 'Se ha generado un nuevo ticket de mantenimiento.',
                });
    
                // Redirigir al usuario a la página de lista de tickets después de hacer clic en la notificación
                notification.onclick = function() {
                    window.location.href = 'http://localhost/app/mantenimiento/index.php?vista=tickets';
                };
    
                // Redirigir al usuario a la página de lista de tickets después de un breve retraso
                setTimeout(function() {
                    window.location.href = 'http://localhost/app/mantenimiento/index.php?vista=tickets';
                }, 3000); // Ajusta el tiempo (en milisegundos) según sea necesario
            } else {
                // Si el usuario no otorga el permiso, redirigir de inmediato
                window.location.href = 'http://localhost/app/mantenimiento/index.php?vista=tickets';
            }
        });
    </script>";
    
    

        // Enviar el correo electrónico
        enviarCorreo($equipo, $quien_solicita, $idtickets, $problema, $fecha, $estatus, $descripcion_del_problema);

    } else {
        // En caso de que se haya error con el registro
        echo "¡No se puede insertar la información!\n";
        echo "Error: " . $sql . "\n" . mysqli_error($conexion) . "\n";
    }
}



?>