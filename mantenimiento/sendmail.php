 <?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

// Establece la zona horaria
date_default_timezone_set('Etc/UTC');

// Incluye la clase PHPMailer y las excepciones
require '../vendor/autoload.php';

// Crea una instancia de PHPMailer
$mail = new PHPMailer(true);

// Establece el cuerpo del correo desde un archivo HTML
$body = file_get_contents('contents.html');

try {
    // Configura el envío SMTP
    $mail->isSMTP();
    $mail->Host = 'smtp.oliansa.com'; 
    $mail->SMTPAuth = true;
    $mail->SMTPKeepAlive = true;
    $mail->Port = 25;
    $mail->Username = 'notificacion@oliansa.com'; 
    $mail->Password = 'Not190224!'; 
    $mail->setFrom('notificacion@oliansa.com', 'notificacion');

    $mail->Subject = 'Prueba de envío de correos electrónicos a una lista';

    $mail->msgHTML($body);
    $mail->AltBody = 'Para ver este mensaje, por favor use un visor de correo electrónico compatible con HTML';

    $mysqli = new mysqli('localhost', 'root', 'DgZwUGraQsU2pHq', 'pdo');
    $result = $mysqli->query('SELECT usuario_nombre, usuario_email FROM usuario WHERE sent = FALSE;
');

    foreach ($result as $row) {
        $mail->addAddress($row['usuario_email'], $row['usuario_nombre']);
        if (!empty($row['photo'])) {
            $mail->addStringAttachment($row['photo'], 'YourPhoto.jpg');
        }

        $mail->send();

        $mysqli->query("UPDATE mailinglist SET sent = TRUE WHERE email = '{$row['email']}'");

        $mail->clearAddresses();
        $mail->clearAttachments();
    }

    echo '¡Los correos electrónicos han sido enviados correctamente!';
} catch (Exception $e) {
    echo 'Error al enviar el correo electrónico: ' . $mail->ErrorInfo;
}
?>