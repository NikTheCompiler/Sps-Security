<?php
include_once('connect.php');

$id = $_POST["id"];
$stmt = sqlsrv_prepare($conn, "DELETE FROM Categories WHERE CID=?",array(&$id));

if (sqlsrv_execute($stmt)) {
    echo 1;
} else {
    echo 0;
}