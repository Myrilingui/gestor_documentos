<?php

if (isset($_SESSION['username'])) {
    if ($_SESSION['username'] === 'Administrador') {
        include '../menus/administrador.php'; 
    } elseif ($_SESSION['username'] === 'Usuario') {
        include '../menus/usuario.php';
    } else {

        echo "Error: Tipo de usuario no reconocido";
    }
} else {

    echo "Error: Tipo de usuario no definido en la sesión";

}

?>

