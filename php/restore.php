<?php
include_once('../php/connect.php');

$query = " USE MASTER 

RESTORE DATABASE SpsSecurity FROM DISK = 'C:\xampp\htdocs\Sps-Security\Backup\backup2.bak' WITH REPLACE

";

if ( $stmt = sqlsrv_query($conn, $query) )
{
    echo 1;
}else{
    die( print_r( sqlsrv_errors(), true));
    echo 0;
}



?>