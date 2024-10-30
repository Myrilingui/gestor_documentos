<?php

try{
    $conexion = new PDO("sqlsrv:server=;database=","","");
}catch(PDOException $exp){
    echo "error". $exp->getMessage();
}
?>
