<?php
require 'auth.php';

use Steampixel\Route;

define('ROUTE_URL_INDEX', rtrim($_ENV['AUTH0_BASE_URL'], '/'));
define('ROUTE_URL_LOGIN', ROUTE_URL_INDEX . '/login');
define('ROUTE_URL_CALLBACK', ROUTE_URL_INDEX . '/callback');
define('ROUTE_URL_LOGOUT', ROUTE_URL_INDEX . '/logout');

// Ruta para la página principal
Route::add('/', function () use ($auth0) {
    $session = $auth0->getCredentials();

    if ($session === null) {
        header("Location: " . ROUTE_URL_LOGIN);
        exit;
    }

    // Almacenar los datos del usuario en una variable para `index.php`
    global $userInfo;
    $userInfo = $session->user;
});

// Ruta de inicio de sesión
Route::add('/login', function () use ($auth0) {
    $auth0->clear();
    header("Location: " . $auth0->login(ROUTE_URL_CALLBACK));
    exit;
});

// Ruta para el callback de autenticación
Route::add('/callback', function () use ($auth0) {
    $auth0->exchange(ROUTE_URL_CALLBACK);
    header("Location: " . ROUTE_URL_INDEX);
    exit;
});

// Ruta para cerrar sesión
Route::add('/logout', function () use ($auth0) {
    header("Location: " . $auth0->logout(ROUTE_URL_INDEX));
    exit;
});

Route::run('/');
