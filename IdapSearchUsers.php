<?php
$ldapconfig['host'] = '10.202.10.204'; 
$ldapconfig['port'] = 389;
$ldapconfig['basedn'] = 'ou=Users Accounts,ou=Juarez,dc=PS-Plastics,dc=com';

$ldap_conn = ldap_connect($ldapconfig['host'], $ldapconfig['port']);
ldap_set_option($ldap_conn, LDAP_OPT_PROTOCOL_VERSION, 3);
ldap_set_option($ldap_conn, LDAP_OPT_REFERRALS, 0);

if (!$ldap_conn) {
    echo "Couldn't connect to LDAP service";
} else {
    $ldapBindAdmin = ldap_bind($ldap_conn, 'rodrigo.luna@PS-Plastics.com', 'Extremo8!');

    if ($ldapBindAdmin) {
        $filter = "(objectClass=user)"; // Filtro para buscar todos los usuarios
        $result = ldap_search($ldap_conn, $ldapconfig['basedn'], $filter);
        $entries = ldap_get_entries($ldap_conn, $result);

        if ($entries["count"] > 0) {
            $userList = array();
            for ($i = 0; $i < $entries["count"]; $i++) {
                if(isset($entries[$i]["samaccountname"][0])) {
                    $username = $entries[$i]["samaccountname"][0]; 
                    $userList[] = $username;
                }
            }
            echo json_encode($userList);
        } else {
            echo "No se encontraron usuarios en Active Directory.";
        }

        ldap_close($ldap_conn);
    } else {
        echo "Error: No se pudo vincular con el administrador de LDAP";
    }
}
?>
