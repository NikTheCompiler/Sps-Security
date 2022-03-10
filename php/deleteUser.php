<?php
include_once('connect.php');

$id = $_POST["id"];
$stmt = sqlsrv_prepare($conn, "DELETE FROM Users WHERE UserID=?",array(&$id));

if (sqlsrv_execute($stmt)) {
    echo 1;
} else {
    echo 0;
}