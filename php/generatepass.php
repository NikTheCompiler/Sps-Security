<?php
session_start();
include_once('connect.php');
include_once('passgenerator.php');

$id = $_POST["id"];

$password1 = $pass;

$username=$_SESSION['username'];

    date_default_timezone_set('Europe/Riga');
    $today = date("F j, Y, g:i a");

    $sql2 = "SELECT * FROM Users WHERE UserID = '".$id."'";
$result = sqlsrv_query($conn, $sql2);
$row2 = sqlsrv_fetch_array($result,SQLSRV_FETCH_ASSOC);
$name=$row2["name"];
$surname=$row2["surname"];

if ($password1==$pass){
    $password = hash("sha256", $password1);
    $sql = "UPDATE Users SET password='".$password."', newuser = '0' WHERE UserID = '".$id."'";

if ($stmt=sqlsrv_query($conn,$sql))
{
    echo json_encode($password1);
}
else
{
  echo 0; 
}
}

$log  = "User: ".$_SERVER['REMOTE_ADDR'].' - '.$today.PHP_EOL.
    "Attempt to GENERATE PASS for the USER '$name $surname': ".($stmt?'Success':'Failed').PHP_EOL.
    "User: ".$username.PHP_EOL.
    "-------------------------".PHP_EOL;
    //Save string to log, use FILE_APPEND to append.
    file_put_contents('../logs/log_'.date("j.n.Y").'.log', $log, FILE_APPEND);
?>