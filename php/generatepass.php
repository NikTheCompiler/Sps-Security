<?php
session_start();
include_once('connect.php');
include_once('passgenerator.php');

$id = $_POST["id"];

$password1 = $pass;

if ($password1==$pass){
    $password = hash("sha256", $password1);
    $sql = "UPDATE Users SET password='".$password."', newuser = '0' WHERE UserID = '".$id."'";

if (sqlsrv_query($conn,$sql))
{
    echo json_encode($password1);
}
else
{
  echo 0; 
}
}
?>