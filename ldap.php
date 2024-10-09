<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $ldapconfig['host'] = '';
    $ldapconfig['port'] = 389;
    $ldapconfig['basedn'] = 'ou=,ou=,dc=,dc=';

    if (isset($_POST['username']) && isset($_POST['password'])) {
        $username = $_POST['username'];
        $password = $_POST['password'];

        if (!empty($username) && !empty($password)) {
            $ldap_conn = ldap_connect($ldapconfig['host'], $ldapconfig['port']);
            ldap_set_option($ldap_conn, LDAP_OPT_PROTOCOL_VERSION, 3);
            ldap_set_option($ldap_conn, LDAP_OPT_REFERRALS, 0);

            if (!$ldap_conn) {
                echo ("<p style='color: red;'>Couldn't connect to LDAP service</p>");
            } else {
                $ldapBindAdmin = ldap_bind($ldap_conn, '', '');

                if ($ldapBindAdmin) {
                    $filter = "(sAMAccountName=" . $username . ")";
                    $result = ldap_search($ldap_conn, $ldapconfig['basedn'], $filter);
                    $entries = ldap_get_entries($ldap_conn, $result);

                    if ($entries["count"] == 1) {
                        $isAdmin = $entries[0]["isadmin"][0]; // Definir atributo ejm:"isadmin" en active directory

                        if ($isAdmin == 1) {
                            $_SESSION['username'] = $username;
                            header("Location: admin/seccion1.php?fallo=true");
                            ldap_close($ldap_conn);
                            exit();
                        } else {
                            $_SESSION['username'] = $username;
                            header("Location: user/seccionU1.php?fallo=true");
                            ldap_close($ldap_conn);
                            exit();
                        }
                    } else {

                        include 'bd/conexion.php';
                        $query = "SELECT * FROM Usuarios WHERE NombreUsuario = :username";
                        $statement = $conexion->prepare($query);
                        $statement->bindParam(':username', $username);
                        $statement->execute();
                        $user = $statement->fetch(PDO::FETCH_ASSOC);

                        if ($user) {
                            $_SESSION['username'] = $username;
                            if ($user['Tipo'] == 'Administrador') {
                                header("Location: admin/seccion1.php?fallo=true");
                            } else {
                                header("Location: user/seccionU1.php?fallo=true");
                            }
                            exit();
                        } else {
                            // showErrorAlert("ERROR: Nombre de usuario no encontrado en Active Directory o en la base de datos");
                            ldap_close($ldap_conn);
                        }
                    }
                } else {
                    showErrorAlert("ERROR: No se pudo vincular con el administrador de LDAP");
                }

            }
        } else {
            // showErrorAlert("ERROR: Por favor, ingresa un nombre de usuario y una contraseña");
        }
    }
}

function showErrorAlert($errorMessage)
{
    echo "<script>alert('$errorMessage'); window.location = 'index.php';</script>";
    exit();
}
?>