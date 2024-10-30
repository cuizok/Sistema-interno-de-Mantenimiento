<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

// Incluir las clases de PHPMailer
require 'PHPMailer-master/src/Exception.php';
require 'PHPMailer-master/src/PHPMailer.php';
require 'PHPMailer-master/src/SMTP.php';
require 'conexion.php'; // Asegúrate de tener el archivo de conexión a la base de datos

// Función para enviar el correo electrónico
function enviarCorreo($correoDestino, $semana, $codigo, $falla, $departamento, $estatus, $mecanico, $maquina, $idOrden) {
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

        // Establece el remitente y el destinatario
        $mail->setFrom('notificacionesoliansa@gmail.com');
        $mail->addAddress($correoDestino);

        // Establece el asunto y el cuerpo del correo electrónico, incluyendo el número de orden
        $mail->Subject = 'Nueva Orden de Mantenimiento - Orden #' . $idOrden;
        $mail->Body = "Se ha generado una nueva orden de servicio.\n\nDetalles de la orden:\nSemana: $semana\nCódigo: $codigo\nFalla: $falla\nDepartamento: $departamento\nEstatus: $estatus\nMecánico: $mecanico\nMáquina: $maquina";
        $mail->CharSet = 'UTF-8'; // Establece la codificación de caracteres

        // Envía el correo electrónico
        $mail->send();
        echo "Correo electrónico enviado a: $correoDestino\n redirigiendo...";
    } catch (Exception $e) {
        echo "Error al enviar el correo electrónico: {$mail->ErrorInfo}\n";
    }
}

// Validamos que el formulario y que el botón registro haya sido presionado
if (isset($_POST['registro'])) {
    // Obtener los valores enviados por el formulario
    $usuario = $_POST['usuario'];
    $semana = $_POST['semana'];
    $codigo = $_POST['codigo'];
    $falla = $_POST['falla'];
    $departamento = $_POST['departamento'];
    $estatus = $_POST['estatus'];
    $mecanico = $_POST['mecanico'];
    $maquina = $_POST['maquina'];

    // Insertar los datos en la base de datos
    $sql = "INSERT INTO ordenes (usuario, semana, codigo, departamento, falla, estatus, mecanico, maquina) VALUES ('$usuario','$semana', '$codigo', '$departamento', '$falla', '$estatus', '$mecanico', '$maquina')";
    $resultado = mysqli_query($conexion, $sql);

    if ($resultado) {
        // Inserción correcta
        echo "¡Se insertaron los datos correctamente!";

        echo "<script>
        Notification.requestPermission().then(function(permission) {
            if (permission === 'granted') {
                // Crear una nueva notificación
                var notification = new Notification('¡Notificación de nueva orden!', {
                    body: 'Se ha generado una nueva orden de mantenimiento.',
                });
    
                // Redirigir al usuario a la página de lista de tickets después de hacer clic en la notificación
                notification.onclick = function() {
                    window.location.href = 'http://localhost/app/mantenimiento/index.php?vista=ordenes_lista';
                };
    
                // Redirigir al usuario a la página de lista de tickets después de un breve retraso
                setTimeout(function() {
                    window.location.href = 'http://localhost/app/mantenimiento/index.php?vista=ordenes_lista';
                }, 3000); // Ajusta el tiempo (en milisegundos) según sea necesario
            } else {
                // Si el usuario no otorga el permiso, redirigir de inmediato
                window.location.href = 'http://localhost/app/mantenimiento/index.php?vista=ordenes_lista';
            }
        });
    </script>";
    
        
        // Realizar una consulta para obtener el número de orden
        $sqlConsultaOrden = "SELECT idordenes FROM ordenes ORDER BY idordenes DESC LIMIT 1;";
        $resultadoConsulta = mysqli_query($conexion, $sqlConsultaOrden);

        if ($resultadoConsulta) {
            // Obtener el número de orden de la consulta
            $fila = mysqli_fetch_assoc($resultadoConsulta);
            $idOrden = $fila['idordenes'];

            // Correo al que se enviará la notificación
           // $correoDestino = 'leonardod@oliansa.com';
            // $correoDestino = 'oliverrocha@oliansa.com';
             $correoDestino = 'cuitlahuac0920@gmail.com';

            
            // Enviar el correo electrónico al correo destino, incluyendo el número de orden
            enviarCorreo($correoDestino, $semana, $codigo, $falla, $departamento, $estatus, $mecanico, $maquina, $idOrden);
        } else {
            // Error al realizar la consulta
            echo "Error al obtener el número de orden";
        }
    } else {
        // Inserción fallida
        echo "¡No se puede insertar la información!" . "<br>";
        echo "Error: " . $sql . "<br>" . mysqli_error($conexion);
    }
}

// Redirigir al usuario a la página de lista de órdenes
//header("Location: http://localhost/app/mantenimiento/index.php?vista=ordenes_lista");
//exit();
?>
