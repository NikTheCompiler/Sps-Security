<?php
include_once('connect.php');

$id = $_POST["id"];
$sql = "SELECT TestID FROM Tests WHERE UserID='".$id."'";
$tests = sqlsrv_query($conn,$sql);

while ($row = sqlsrv_fetch_array($tests,SQLSRV_FETCH_ASSOC)) {
    $ans = sqlsrv_query($conn, "DELETE FROM UserAns WHERE TestID='".$row["TestID"]."' ");
}

$test = sqlsrv_query($conn, "DELETE FROM Tests WHERE UserID='".$id."' ");

$stmt = sqlsrv_prepare($conn, "DELETE FROM Users WHERE UserID=?",array(&$id));

if (sqlsrv_execute($stmt)) {
    echo 1;
} else {
    echo 0;
}

?>