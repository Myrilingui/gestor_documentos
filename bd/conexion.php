<?php

try{
    $conexion = new PDO("sqlsrv:server=localhost\plasticos4;database=PlastiDocs","sa","Plasticos123");
}catch(PDOException $exp){
    echo "error". $exp->getMessage();
}
?>