<?php 
include_once('../php/connect.php');

$query="BACKUP DATABASE SpsSecurity TO DISK='C:/xampp/htdocs/Sps-Security/Backup/backup.bak' WITH 
FORMAT,
STATS = 1, 
MEDIANAME = 'SQLServerBackups',
NAME = 'Full Backup of dbname';";

if ( $stmt = sqlsrv_query($conn, $query) )
{
    while (sqlsrv_next_result($stmt) != null){};
    echo 1;
}else{
    echo 0;
}

sqlsrv_free_stmt($stmt);
sqlsrv_close($conn);
?>