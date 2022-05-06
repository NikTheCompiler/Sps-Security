<?php
session_start();
include_once('connect.php');

$id = $_POST["id"];

$username=$_SESSION['username'];

    date_default_timezone_set('Europe/Riga');
    $today = date("F j, Y, g:i a");

$sql2 = "SELECT * FROM Questions WHERE QID = '".$id."'";
$result = sqlsrv_query($conn, $sql2);
$row2 = sqlsrv_fetch_array($result,SQLSRV_FETCH_ASSOC);
$qname=$row2["Ques"];

$ans = sqlsrv_query($conn, "DELETE FROM UserAns WHERE QID='".$id."' ");

$stmt = sqlsrv_prepare($conn, "DELETE FROM Questions WHERE QID=?",array(&$id));

if (sqlsrv_execute($stmt)) {
    echo 1;
} else {
    echo 0;
}

$log  = "User: ".$_SERVER['REMOTE_ADDR'].' - '.$today.PHP_EOL.
    "Attempt to DELETE QUESTION '$qname': ".($stmt?'Success':'Failed').PHP_EOL.
    "User: ".$username.PHP_EOL.
    "-------------------------".PHP_EOL;
    //Save string to log, use FILE_APPEND to append.
    file_put_contents('../logs/log_'.date("j.n.Y").'.log', $log, FILE_APPEND);