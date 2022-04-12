<?php
include_once('connect.php');

$id = $_POST["id"];

$sql = "SELECT QID FROM Questions WHERE Category='".$id."'";
$ques = sqlsrv_query($conn,$sql);

while ($row = sqlsrv_fetch_array($ques,SQLSRV_FETCH_ASSOC)) {
    $ans = sqlsrv_query($conn, "DELETE FROM UserAns WHERE QID='".$row["QID"]."' ");
}

$ques = sqlsrv_query($conn, "DELETE FROM Questions WHERE Category='".$id."' ");

$stmt = sqlsrv_prepare($conn, "DELETE FROM Categories WHERE CID=?",array($id));

if (sqlsrv_execute($stmt)) {
    echo 1;
} else {
    echo 0;
}