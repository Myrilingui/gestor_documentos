<<<<<<< HEAD

=======
>>>>>>> edgar
<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $captcha = $_POST['g-recaptcha-response'];
    
    if (!$captcha) {
        echo "Por favor, completa el reCAPTCHA.";
        exit;
    }

    $secretKey = "6LevI3UqAAAAAMj5wUTAqTF7ggVSdCxUe03yaNla";
    $url = "https://www.google.com/recaptcha/api/siteverify?secret=$secretKey&response=$captcha";
    $response = file_get_contents($url);
    $responseKeys = json_decode($response, true);

    if ($responseKeys["success"]) {
        echo "Formulario enviado correctamente.";
    } else {
        echo "Verificación de reCAPTCHA fallida. Inténtalo de nuevo.";
    }
}
?>
