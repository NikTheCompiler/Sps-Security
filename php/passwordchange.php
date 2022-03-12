<?php
session_start();
include_once('connect.php');

$pass = $_POST["pass"];
$new_input = $_POST["newpass"];
$new = strip_tags($new_input);

$confirmpass = $_POST["confirmpass"];

$user = $_SESSION["username"];
$password = $_SESSION["password"];

$sql1 = "SELECT * FROM Users WHERE username='".$user."' AND password='".$pass."'";
$req =  sqlsrv_query($conn, $sql1) or die(print_r(sqlsrv_errors(),true));
$row = sqlsrv_fetch_array($req, SQLSRV_FETCH_ASSOC);

if ($password==$pass){
    //$new = hash("sha256", $new);
    $sql = "UPDATE Users SET password='".$new."' WHERE username = '".$user."'";

if (sqlsrv_query($conn,$sql))
{
  echo 1;
}
else
{
  echo $sql;
}
}
?>
