<?php 
include_once('../php/connect.php');
sqlsrv_configure("WarningsReturnAsErrors", 0);
$query="
    BACKUP DATABASE SpsSecurity
    TO DISK = 'C:/xampp/htdocs/Sps-Security/Backup/backup.bak'
    WITH 
        CHECKSUM,
        FORMAT,
        STATS = 1, 
        MEDIANAME = 'SQLServerBackups',
        NAME = 'Full Backup of SpsSecurity'
        
        BACKUP LOG SpsSecurity TO DISK = 'C:/xampp/htdocs/Sps-Security/Backup/backup-log.bak' 
        WITH NOFORMAT, NOINIT, NAME = 'backup-log', SKIP, NOREWIND, NOUNLOAD, STATS = 10";

$stmt = sqlsrv_query($conn, $query);
if ($stmt === false) {
    echo 0;
}

// Clear buffer
while (sqlsrv_next_result($stmt) != null){};
echo 1;

// End
sqlsrv_free_stmt($stmt);
sqlsrv_close($conn);

?>