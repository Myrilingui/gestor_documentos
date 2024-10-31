<?php


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inicio de sesión</title>
    <link rel="stylesheet" href="estilos/styleindex.css">
    <link rel="icon" href="img/favicon-16x16.png" type="image/x-icon">
</head>

<body>
    <div class="body">
        <div class="grad"> </div>
        <div class="container">
            <h1>Iniciar sesión</h1>
            <div class="header">
                <div><span><img src="img/logo.png" style="width: 243px;height: 161px;"></span></div>
            </div>
            <br>
            <div class="login">
                <form action="Ldap.php" method="post">
                    <input type="text" placeholder="Nombre de usuario" name="username" required><br><br>
                    <input type="password" placeholder="Contraseña" name="password" required><br>
                    <?php
                    if (isset($_GET["fallo"]) && $_GET["fallo"] == 'true') {
                        echo "<div style='color:red'>Usuario o contraseña invalido </div>";
                    }
                    ?>
                    <input type="submit" value="Iniciar sesión">
                </form>
            </div>
        </div>
    </div>
</body>

</html>