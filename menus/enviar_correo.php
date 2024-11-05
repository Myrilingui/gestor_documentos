<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require '../vendor/autoload.php';

function enviarCorreoAlAdministrador() {
    $mail = new PHPMailer(true);

    try {
        // Configuración del servidor SMTP
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';
        $mail->SMTPAuth = true;
        $mail->Username = 'cesaroronacastillo@gmail.com'; // Tu correo
        $mail->Password = 'htsa wwvn bukz laoo'; // Tu contraseña
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        $mail->Port = 587;

        // Configuración del correo
        $mail->setFrom('cesaroronacastillo@gmail.com', 'Cesar Castillo');
        $mail->addAddress('pepinojose1919@gmail.com', 'Administrador');

        // Contenido del correo
        $mail->isHTML(true);
        $mail->Subject = 'Nuevo documento subido';
        $mail->Body = 'Un nuevo documento ha sido subido al sistema. Por favor, revisa el sistema para más detalles.';

        $mail->send();
        echo 'Correo enviado al administrador';
    } catch (Exception $e) {
        echo "Error al enviar el correo: {$mail->ErrorInfo}";
    }
}

// Llama a la función cuando el archivo sea subido
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Lógica para subir el archivo aquí...
    
    // Luego de subir el archivo, envía el correo
    enviarCorreoAlAdministrador();
}
?>
