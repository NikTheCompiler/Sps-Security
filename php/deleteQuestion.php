<?php
include_once('connect.php');

$id = $_POST["id"];
$stmt = sqlsrv_prepare($conn, "DELETE FROM Questions WHERE QID=?",array(&$id));

if (sqlsrv_execute($stmt)) {
    echo 1;
} else {
    echo 0;
}