<?php
session_start();
include_once('connect.php');

$id = $_POST["id"];
$sql = "SELECT TestID FROM Tests WHERE UserID='".$id."'";
$tests = sqlsrv_query($conn,$sql);

$username=$_SESSION['username'];

$sql2 = "SELECT * FROM Users WHERE UserID = '".$id."'";
$result = sqlsrv_query($conn, $sql2);
$row2 = sqlsrv_fetch_array($result,SQLSRV_FETCH_ASSOC);
$name=$row2["name"];
$surname=$row2["surname"];

    date_default_timezone_set('Europe/Riga');
    $today = date("F j, Y, g:i a");

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

$log  = "User: ".$_SERVER['REMOTE_ADDR'].' - '.$today.PHP_EOL.
    "Attempt to DELETE USER with name '$name $surname': ".($stmt?'Success':'Failed').PHP_EOL.
    "User: ".$username.PHP_EOL.
    "-------------------------".PHP_EOL;
    //Save string to log, use FILE_APPEND to append.
    file_put_contents('../logs/log_'.date("j.n.Y").'.log', $log, FILE_APPEND);

?>