<?php
include_once('connect.php');

$id = $_POST["UserID"];
$stmt = _prepare($con, "DELETE FROM `Users` WHERE `id`=?");
if (sqlsrv_execute($stmt)) {
    echo "TRUE";
} else {
    
    echo $sql;
}