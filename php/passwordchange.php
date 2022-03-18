<?php
session_start();
include_once('connect.php');

$pass = $_POST["pass"];
$new_input = $_POST["newpass"];
$new = strip_tags($new_input);

$confirmpass = $_POST["confirmpass"];

$user = $_SESSION["username"];
$password = $_SESSION["password"];


if ($password==$pass){
    //$new = hash("sha256", $new);
    $sql = "UPDATE Users SET password='".$new."' WHERE username = '".$user."'";

if (sqlsrv_query($conn,$sql))
{
  $_SESSION["password"]=$new;
  echo 1;
}
else
{
  echo 0; 
}
}
?>
