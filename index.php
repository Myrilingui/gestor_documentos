<<<<<<< HEAD
<?php
require 'vendor/autoload.php';
require 'auth.php';
require 'routes.php';

$session = $auth0->getCredentials();
=======
>>>>>>> edgar

if ($session === null) {
    header("Location: /login");
    exit;
}

$userInfo = $session->user;

// Imprimir el contenido del token para depuración
print_r($userInfo);

// Obtener app_metadata del token
$appMetadata = $userInfo['http://gestordocs/app_metadata'] ?? null;

// Acceder al rol desde app_metadata
$role = $appMetadata['role'] ?? null; // Asegúrate de que esto coincida con tu estructura de app_metadata

// Verificar el rol y redirigir según corresponda
$currentUrl = $_SERVER['REQUEST_URI']; // Obtener la URL actual

if ($role === 'admin') {
    // Verificar si ya está en la página de admin
    if (strpos($currentUrl, 'cargar_contenido_libreria.php') === false) {
        header("Location: menus/cargar_contenido_libreria.php?id=1");
        exit;
    }
} elseif ($role === 'user') {
    // Verificar si ya está en la página de user
    if (strpos($currentUrl, 'contenidoestandar.php') === false) {
        header("Location: menus/contenidoestandar.php?id=1");
        exit;
    }
} else {
    echo "Rol no reconocido. Contacte al administrador.";
}
